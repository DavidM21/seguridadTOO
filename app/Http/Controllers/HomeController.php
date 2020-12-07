<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\JobPosition;
use App\Organization;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all()->count();

        $roles_and_permisison = Role::all()->count() + Permission::all()->count();

        $organizations = Organization::where('user_id', '=', auth()->user()->id)->count();

        $organizations2 = Organization::where('user_id', '=', auth()->user()->id)->pluck('id');
        $departments = Department::whereIn('organization_id', $organizations2)->count();

        $departments2 = Department::whereIn('organization_id', $organizations2)->pluck('id');
        $sections = Section::whereIn('department_id', $departments2)->count();


        $sections2 = Section::whereIn('department_id', $departments2)->pluck('id');
        $jobpositions = JobPosition::whereIn('section_id', $sections2)->count();


        $jobpositions2 = JobPosition::whereIn('section_id', $sections2)->pluck('id');
        $employee = Employee::whereIn('job_position_id', $jobpositions2)->count();

        //dd($organizations);
        return view('home', compact('users', 'roles_and_permisison','organizations',
            'departments', 'sections', 'jobpositions', 'employee'));
    }
}
