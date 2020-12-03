<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use App\Department;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos=Department::all();
        return view('crudSeccion.crearSeccion', compact ('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $fields =request()->validate([
            'name' => 'required',
            'department_id' => 'required',
        ]);

        Section::create($fields);

        return redirect()->route('seccion.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        $datos['sections']=Section::paginate(5);
        return view('crudSeccion.mostrarSeccion', $datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        $departamentos=Department::all();
        return view('crudSeccion.editarSeccion', compact('section', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $fields=request()->validate([
            'name' => 'required',
            'department_id' => 'required',
        ]);

        $section->update($fields);

        return redirect()->route('seccion.show', $section);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('seccion.show');
    }
}
