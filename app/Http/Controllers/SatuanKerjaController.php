<?php

namespace App\Http\Controllers;

use App\Models\SatuanKerja;
use Illuminate\Http\Request;
use App\Exports\SatuanKerjaExport;
use App\Imports\SatuanKerjaImport;
use Maatwebsite\Excel\Facades\Excel;

class SatuanKerjaController extends Controller
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
            ['label' => 'Actions', 'no-export' => true],
        ];
        return view('satuankerja.index', compact(['satuanKerjas','heads']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('satuankerja.create');
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
            'name' => 'required',
            'description' => 'required',
        ]);
    
        SatuanKerja::create($request->all());
    
        return redirect()->route('satuankerja.index')
                        ->with('message','Satuan Kerja created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SatuanKerja  $satuanKerja
     * @return \Illuminate\Http\Response
     */
    public function show(SatuanKerja $satuanKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SatuanKerja  $satuanKerja
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $satuanKerja = SatuanKerja::find($id);
        return view('satuankerja.edit',compact('satuanKerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SatuanKerja  $satuanKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $satuanKerja = SatuanKerja::find($id);
        $satuanKerja->update($request->all());
        return redirect()->route('satuankerja.index')
                        ->with('message','Satuan Kerja Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SatuanKerja  $satuanKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SatuanKerja::find($id)->delete();
        return redirect()->route('satuankerja.index')
                        ->with('message','Satuan Kerja deleted successfully');
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
        return Excel::download(new SatuanKerjaExport, 'satuankerja.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new SatuanKerjaImport,request()->file('file'));
             
        return back();
    }
}
