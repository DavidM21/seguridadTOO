<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Rules\especial;
use App\Rules\mayuscula;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\ActivityStatistic;
use Carbon\Carbon;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'string', 'min:12',new especial, new mayuscula],
        ];
    }
    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        $all_activities = ActivityStatistic::where('user_id', $request->user()->id)->orderBy('updated_at', 'asc')->get();

        if ($all_activities->count()>0)
        {
            $last_activity = $all_activities->last();
            //dd($last_activity);
            $suma = ($last_activity->password_changes)+1;
            $activity2 = ActivityStatistic::updateOrCreate([
            'user_id'   => $request->user()->id,
            'number_of_roles'    => $last_activity->number_of_roles,
            'number_of_locks'    => $last_activity->number_of_locks,
            'password_changes'    => $suma,
            'updated_at' => Carbon::now()
            ]);   
            $activity2->save();
        }
        else{
            $activity2 = ActivityStatistic::Create([
                'user_id'   => $request->user()->id,
                'password_changes'    => 1,
                'updated_at' => Carbon::now()
            ]); 
            $activity2->save();
        }

        return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($request, $response)
                    : $this->sendResetFailedResponse($request, $response);
    }
}
