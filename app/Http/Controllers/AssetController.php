<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SatuanKerja;
use App\Models\Drone;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuanKerjas = SatuanKerja::All();
        $heads = [
            'Name',
            'Description',
            ['label' => 'Actions', 'no-export' => true]
        ];
        return view('asset.index', compact(['satuanKerjas','heads']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $heads = [
            'Jenis Pesawat',
            'Merk',
            'Tanda Pengenal',
            'Keterangan',
            ['label' => 'Actions','no-export' => true],
        ];
        $satuanKerja = SatuanKerja::find($id);
        $drones = Drone::where('satuan_kerja_id',$id)->get();
        $dronesModal = Drone::whereNull('satuan_kerja_id')->get();
        return view('asset.edit',compact('satuanKerja','heads','drones','dronesModal'));
    }
    public function addDrone($satuankerja_id,$drone_id)
    {
        $heads = [
            'Jenis Pesawat',
            'Merk',
            'Tanda Pengenal',
            'Keterangan',
            ['label' => 'Actions','no-export' => true],
        ];
        $satuanKerja = SatuanKerja::find($satuankerja_id);
        $drones = Drone::where('satuan_kerja_id',$satuankerja_id)->get();
        $dronesModal = Drone::whereNull('satuan_kerja_id')->get();
        Drone::where('id',$drone_id)->update(['satuan_kerja_id'=>$satuankerja_id]);
        return redirect()->route('assets.edit',$satuankerja_id)
                        ->with('message','From Asset, Drone Added successfully');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Drone::where('id',$id)->update(['satuan_kerja_id'=>null]);
        return redirect()->route('assets.edit',$id)
                        ->with('message','From Asset, Drone deleted successfully');
    }
}
