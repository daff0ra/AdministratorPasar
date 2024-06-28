<?php

namespace App\Http\Controllers;

use App\Models\pasar;
use Illuminate\Http\Request;

class ManagemenPasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pasar::orderBy('id', 'desc')->paginate(3);
        return view('Management.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('Management.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric|unique:pasar,id',
            'Nama' => 'required',
            'Id_wilayah' =>'required',
        ], [
            
                'id.required' => 'id wajib di isi',
                'nama.required' => 'nama wajib di isi',
                'Id_wilayah' =>'id wajib di isi',
                
        ]);
        $data = [
            'id' => $request->id,
            'nama'=>$request->Nama,
            'id_wilayah'=>$request->Id_wilayah,
        ];
        pasar::create($data);
        return redirect()->to('ManagemenPasar')->with('success','bershasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = pasar::where('id', $id)->first();
        return view('Management.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Nama' => 'required',
            'Id_wilayah' =>'required',
        ], [
            
                'id.required' => 'id wajib di isi',
                'nama.required' => 'nama wajib di isi',
                'Id_wilayah' =>'id wajib di isi',
                
        ]);
        $data = [
            'nama'=>$request->Nama,
            'id_wilayah'=>$request->Id_wilayah,
        ];
        pasar::where('id',$id)->update($data);
        return redirect()->to('ManagemenPasar')->with('success','bershasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pasar::where('id',$id)->delete();
        return redirect()->to('ManagemenPasar')->with('success','berhasil dihapus');
    }
}
