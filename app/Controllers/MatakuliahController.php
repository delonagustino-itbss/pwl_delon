<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return Mahasiswa::all();\
        return view('matakuliah.index', [
            'matakuliah' => MataKuliah::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        MataKuliah::create($data);

        return redirect()->action([MataKuliahController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        MataKuliah::find('data');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit ($id)
    {
        return view('matakuliah.edit', [
            'matakuliah' => MataKuliah::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        MataKuliah::find($id)->update($data);

        return redirect()->action([MataKuliahController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MataKuliah::find($id)->delete();

        return redirect()->action([MataKuliahController::class, 'index']);
    }
}
