<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::whereNotNull('approved_at')->get();
        $heads = [
            'User name',
            'Email',
            'Admin',
            'Registered at',
            ['label' => 'Actions', 'no-export' => true],
        ];
        return view('user.index', compact(['users','heads']));
    }
    public function create()
    {
        
    }
    public function show()
    {
        
    }

    public function approve()
    {
        $users = User::whereNull('approved_at')->get();
        $heads = [
            'User name',
            'Email',
            'Registered at',
            ['label' => 'Actions', 'no-export' => true],
        ];
        return view('user/user-approval', compact(['users','heads']));
    }

    public function approved($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => now()]);
        return redirect()->route('users.approval')->withMessage('User approved successfully');
    }
    public function notApproved($user_id)
    {
        User::find($user_id)->delete();
        return redirect()->route('users.approval')->withMessage('User Not Approve successfully');
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('message','User deleted successfully');
    }
    public function edit($id)
    {
        $config = [
            "placeholder" => "Select multiple options...",
            "allowClear" => true,
        ];
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name')->all();
        return view('user.edit',compact('user','roles','userRole','config'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
}