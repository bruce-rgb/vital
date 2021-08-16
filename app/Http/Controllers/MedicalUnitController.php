<?php

namespace App\Http\Controllers;

use App\Models\MedicalUnit;
use Illuminate\Http\Request;

class MedicalUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = MedicalUnit::all();
        return view('unit.unit', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        MedicalUnit::create($request->all());
        session()->flash('success', 'Unit added succesfully');
        return redirect(route('units'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalUnit  $medicalUnit
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalUnit $medicalUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalUnit  $medicalUnit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = MedicalUnit::find($id);
        return view('unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicalUnit  $medicalUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $unit=request()->except(['_token','_method']);

        MedicalUnit::findOrFail($id)->update($unit);
        return redirect(route('units'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalUnit  $medicalUnit
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $unit = MedicalUnit::findOrFail($id);
        $unit->delete();

        return back()->with('deleted','Eliminación exitosa');
    }
}
