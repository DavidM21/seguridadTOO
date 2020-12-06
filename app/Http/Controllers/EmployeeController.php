<?php

namespace App\Http\Controllers;

use App\Department;
use App\Gender;
use App\MaritalStatus;
use App\City;
use App\Organization;
use App\Section;
use App\State;
use App\JobPosition;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the empleados.
     * Muestra una lista de los objetos creados
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $organizations = Organization::where('user_id', '=', auth()->user()->id)->pluck('id');
        $departments = Department::whereIn('organization_id', $organizations)->pluck('id');
        $sections = Section::whereIn('department_id', $departments)->pluck('id');
        $jobpositions = JobPosition::whereIn('section_id', $sections)->pluck('id');
        $empleados = Employee::whereIn('job_position_id', $jobpositions)->pluck('id');
        //dd($empleados);
        return view('crudEmpleado.mostrarEmpleado',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     * Muestrar el formulario para agregar un nuevo empleado
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {

        $generos = Gender::all();
        $estadoCiviles = MaritalStatus::all();
        $municipios = City::all();
        $departamentos = State::all();
        $puestos = JobPosition::all();
        //dd($puestos);
        return view('crudEmpleado.crearEmpleado',compact('generos','estadoCiviles','municipios','departamentos','puestos'));
    }

    /**
     * Store a newly created resource in storage.
     * Guarda el empleado en la base de datos que fue enviado previamente por el método create
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
         //*Validaciones */
         $fields = request()->validate([
            'nombre'=> 'required|max:50',
            'apellido'=> 'required|max:50',
            'dui'=> 'required|max:10',
            'nit'=> 'required|max:17',
            'isss'=> 'required|max:10',
            'nup'=> 'required|max:12',
            'direccion'=> 'required|max:300',
            'puestoDeTrabajo'=> 'required',
            'estadoCivil'=> 'required',
            'genero'=> 'required',
            'municipio'=> 'required'
        ]);

        Employee::create([
            'first_name' => request('nombre'),
            'last_name' => request('apellido'),
            'dui' => request('dui'),
            'nit' => request('nit'),
            'isss' => request('isss'),
            'nup' => request('nup'),
            'address' => request('direccion'),
            'job_position_id' => request('puestoDeTrabajo'),
            'marital_status_id' => request('estadoCivil'),
            'gender_id' => request('genero'),
            'city_id' => request('municipio'),
        ]);

        //Para mensajes de error personalizados revisar el video 20 minuto 6

        return redirect()->route('empleado.show');
    }

    /**
     * Display the specified resource.
     * Muestra un empleado específico
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * Mostramos el formulario para editar un recurso que ya existe
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Employee $employee)
    {
        $generos = Gender::all();
        $estadoCiviles = MaritalStatus::all();
        $municipios = City::all();
        $departamentos = State::all();
        $puestos = JobPosition::all();
        return view('crudEmpleado.editarEmpleado',['employee' => $employee],
            compact('generos','estadoCiviles','municipios','departamentos','puestos'));
    }

    /**
     * Update the specified resource in storage.
     * Guarda los cambios realizados en el formulario del método edit
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //*Validaciones */
        $fields = request()->validate([
            'nombre'=> 'required|max:50',
            'apellido'=> 'required|max:50',
            'dui'=> 'required|max:10',
            'nit'=> 'required|max:17',
            'isss'=> 'required|max:10',
            'nup'=> 'required|max:12',
            'direccion'=> 'required|max:300',
            'puestoDeTrabajo'=> 'required',
            'estadoCivil'=> 'required',
            'genero'=> 'required',
            'municipio'=> 'required'
        ]);

        $employee->update([
            'first_name' => request('nombre'),
            'last_name' => request('apellido'),
            'dui' => request('dui'),
            'nit' => request('nit'),
            'isss' => request('isss'),
            'nup' => request('nup'),
            'address' => request('direccion'),
            'job_position_id' => request('puestoDeTrabajo'),
            'marital_status_id' => request('estadoCivil'),
            'gender_id' => request('genero'),
            'city_id' => request('municipio'),
        ]);
        //Para mensajes de error personalizados revisar el video 20 minuto 6

        return redirect()->route('empleado.show');
    }

    /**
     * Remove the specified resource from storage.
     * Eliminamos un empleado de acuerdo a un id
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */

    public function confirm($id)
    {
        $empleado = Employee::findOrFail($id);

        return view('crudEmpleado.confirmEmpleado', compact('empleado'));
    }

    public function destroy($id)
    {

        $empleado = Employee::findOrFail($id);
        $empleado->delete();
        return redirect()->route('empleado.show');
    }

    public function byDepartamentos($id)
    {
        return City::where('state_id',$id)->get();
    }
}
