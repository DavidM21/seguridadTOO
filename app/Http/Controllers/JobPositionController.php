<?php

namespace App\Http\Controllers;

use App\JobPosition;
use App\Section;
use Illuminate\Http\Request;
use DB;

class JobPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puestos = JobPosition ::get();
        return view('crudPuestoDeTrabajo.mostrarPuesto',compact('puestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secciones = Section::all();
        return view('crudPuestoDeTrabajo.crearPuesto',compact('secciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //*Validaciones */
        $fields = request()->validate([
            'nombre'=> 'required',
            'salario'=> ['required','min:0']
        ]);

        JobPosition::create([
            'name' => request('nombre'),
            'salary' => request('salario'),
            'section_id' => request('seccion'),
        ]);

        //Para mensajes de error personalizados revisar el video 20 minuto 6

        return redirect()->route('puestos.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */
    public function show(JobPosition $jobPosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */
    public function edit(JobPosition $jobPosition)
    {
        $secciones = Section::all();
        return view('crudPuestoDeTrabajo.editarPuesto',[
            'jobPosition' => $jobPosition
        ],compact('secciones'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */
    public function update( JobPosition $jobPosition)
    {

        $fields = request()->validate([
            'nombre'=> 'required',
            'salario'=> ['required','min:0']
        ]);

        $jobPosition->update([
            'name' => request('nombre'),
            'salary' => request('salario'),
            'section_id' => request('seccion'),
        ]);

        return redirect()->route('puestos.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobPosition  $jobPosition
     * @return \Illuminate\Http\Response
     */

    public function confirm($id)
    {
        $puesto = JobPosition::findOrFail($id);

        return view('crudPuestoDeTrabajo.confirmPuesto', compact('puesto'));
    }

    public function destroy($id)
    {
        $jobPosition = JobPosition::findOrFail($id);
        $jobPosition->delete();
        return redirect()->route('puestos.show');
    }
}
