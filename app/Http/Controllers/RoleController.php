<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:read-role|create-role|update-role|delete-role', ['only' => ['index','store']]);
         $this->middleware('permission:create-role', ['only' => ['create','store']]);
         $this->middleware('permission:update-role', ['only' => ['edit','update']]);
         $this->middleware('permission:delete-role', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::All();
        $heads = [
            ['label' => 'Name', 'width' => 20],
            ['label' => 'Permission', 'width' => 60],
            'Guard-Name',
            ['label' => 'Actions', 'no-export' => true,'width' => 20],
        ];
        return view('role.index', compact(['roles','heads','permissions']));
    }
    public function destroy($role_id){
        $role = Role::findOrFail($role_id);
        if ($role) $role->delete();
        return redirect()->route('roles.index')->withMessage('Role deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('role.edit',compact('role','permission','rolePermissions'));
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
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')
                        ->with('message','Role updated successfully');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('role.create',compact('permission'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')
                        ->with('message','Role created successfully');
    }
    
}
