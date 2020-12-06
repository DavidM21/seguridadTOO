<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('crudOrganizacion.crearOrganizacion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $fields = request()->validate([
            'name' => 'required',
        ]);
        $organization = new Organization;
        $organization->name = $request->name;
        $organization->user_id = auth()->user()->id;
        $organization->save();
        return redirect()->route('organizacion.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Organization $organization)
    {
        //dd(auth()->user()->id);
        // Consulta que entrega las organizaciones del usuario logueado
        $datos['organizations']=Organization::where('user_id', '=', auth()->user()->id)->paginate(10);
        return view('crudOrganizacion.mostrarOrganizacion',$datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Organization $organization)
    {

        return view('crudOrganizacion.editarOrganizacion', [
            'organization' => $organization
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        $fields=request()->validate([
            'name' => 'required',
        ]);

        $organization->update($fields);

        return redirect()->route('organizacion.show', $organization);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */

    public function confirm($id)
    {
        $organization = Organization::findOrFail($id);

        return view('crudOrganizacion.confirmOrganizacion', compact('organization'));
    }
    public function destroy($id)
    {

        $organization = Organization::findOrFail($id);
        $organization->delete();
        return redirect()->route('organizacion.show');
    }
}
