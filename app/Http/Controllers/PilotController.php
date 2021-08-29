<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pilot;
use App\Models\User;
use App\Models\Satker;

class PilotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pilots = Pilot::join('users', 'users.id', '=', 'pilots.user_id')
                    ->join('satkers', 'satkers.id', '=', 'pilots.satker_id')
                    ->select('pilots.*', 'users.name as name_user','satkers.name as name_satuan_kerja')
                    ->get();
        $heads = [
            'Nama',
            'Satuan Kerja',
            'No Kontak',
            'No License',
            'Masa Berlaku',
            ['label' => 'Actions', 'no-export' => true],
        ];
        return view('pilot.index', compact(['pilots','heads']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::doesntHave('pilot')->whereNotNull('approved_at')->get();
        $satuanKerjas = Satker::All();
        $heads = [
            'User name',
            'Email',
            ['label' => 'Actions', 'no-export' => true],
        ];
        $configDate = ['format' => 'YYYY-MM-DD'];
        $heads1 = [
            'Nama',
            'Description',
            ['label' => 'Actions', 'no-export' => true],
        ];
        return view('pilot.create', compact(['users','heads','satuanKerjas','heads1','configDate']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'satuankerja' => 'required',
            'no_license' => 'unique:pilots,no_license',
            'no_kontak' => 'numeric'
        ]);
        $input = [
            'user_id' => $request->idusername,
            'satker_id' => $request->idSatuanKerja,
            'no_license' => $request->no_license,
            'masa_berlaku' => $request->masa_berlaku,
            'no_kontak' =>$request->no_kontak,
            'riwayat_training' => $request->riwayat_training
        ];
        Pilot::create($input);
        return redirect()->route('pilots.index')
                        ->with('message','Pilot added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pilot= Pilot::findOrFail($id);
        $inputs = [
            'id' => $pilot->id,
            'idusername' =>$pilot->user->id,
            'idSatuanKerja' =>$pilot->satker->id,
            'no_license' =>$pilot->no_license,
            'masa_berlaku' =>$pilot->masa_berlaku,
            'no_kontak' =>$pilot->no_kontak,
            'riwayat_training' =>$pilot->riwayat_training,
            'satuankerja' =>$pilot->satker->name,
            'username' =>$pilot->user->name,
        ];
        $users = User::doesntHave('pilot')->whereNotNull('approved_at')->get();
        $satuanKerjas = Satker::All();
        $heads = [
            'User name',
            'Email',
            ['label' => 'Actions', 'no-export' => true],
        ];
        $configDate = ['format' => 'YYYY-MM-DD'];
        $heads1 = [
            'Nama',
            'Description',
            ['label' => 'Actions', 'no-export' => true],
        ];
        return view('pilot.edit',compact(['inputs','users','satuanKerjas','configDate','heads','heads1']));
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
        request()->validate([
            'username' => 'required',
            'satuankerja' => 'required',
            'no_kontak' => 'numeric'
        ]);
        $input = [
            'user_id' => $request->idusername,
            'satker_id' => $request->idSatuanKerja,
            'no_license' => $request->no_license,
            'masa_berlaku' => $request->masa_berlaku,
            'no_kontak' =>$request->no_kontak,
            'riwayat_training' => $request->riwayat_training
        ];
        $pilot = Pilot::find($id);
        $pilot->update($input);
        return redirect()->route('pilots.index')
                        ->with('message','Pilot updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pilot::find($id)->delete();
        return redirect()->route('pilots.index')
                        ->with('message','Pilot deleted successfully');
    }
}
