<?php

namespace App\Http\Controllers;

use App\Models\Drone;
use Illuminate\Http\Request;
use App\Exports\DroneExport;
use App\Imports\DroneImport;
use Maatwebsite\Excel\Facades\Excel;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drones = Drone::All();
        $heads = [
            'Jenis Pesawat',
            'Merk',
            'Tanda Pengenal',
            'Keterangan',
            ['label' => 'Actions', 'no-export' => true],
        ];
        return view('drone.index', compact(['drones','heads']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drone.create');
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
            'jenis_pesawat' => 'required',
            'merk' => 'required',
        ]);
        print_r($request->jenis_pesawat);
        Drone::create($request->all());
    
        return redirect()->route('drones.index')
                        ->with('message','Drone created successfully.');
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
        $drone = Drone::find($id);
        return view('drone.edit',compact('drone'));
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
            'jenis_pesawat' => 'required',
            'merk' => 'required',
        ]);
        $satuanKerja = SatuanKerja::find($id);
        $satuanKerja->update($request->all());
        return redirect()->route('satuankerja.index')
                        ->with('message','Satuan Kerja Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Drone::find($id)->delete();
        return redirect()->route('drones.index')
                        ->with('message','Drone deleted successfully');
    }
      /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new DroneExport, 'Drones.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new DroneImport,request()->file('file'));
             
        return back();
    }
}
