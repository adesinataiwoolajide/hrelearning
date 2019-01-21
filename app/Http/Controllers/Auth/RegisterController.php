<?php

namespace App\Http\Controllers\Auth;

use App\Register;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function index()
    {
        $user = $this->model->all();
        
        return view('admin.user.create')->with([
            "user" => $user,
        ]);
    }
    
    protected function register(Request $request)
    {

        /** @var User $user */
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'is_admin' => ['required','integer', 'min:1'],
            'status' => ['nullable','integer', '1'],
        ]);
        try{
            if(User::where("email", $request->input("email"))->exists()){
                return redirect()->back()->with("error", "The E-Mail is In Use By Another User");
            }
            $data = ([
                'user' => new User,
                'name' => $request->input['name'],
                'email' => $request->input['email'],
                'password' => $request->input(Hash::make($data['password'])),
                'is_admin' => $request->input['is_admin'],
                'status' => $request->input['status'],
            ]);
            if($this->model->create($data)){
                return redirect()->route("user.create")->with("success", "You Have Added The User Successfully");
            } 
            
        }catch(\Exception $exception){
            logger()->error($exception);
            return redirect()->back()->with('message', 'Unable to create new user.');

        }
    }

    public function destroy($id)
    { 
        $user =  $this->model->show($id);  
        
        //deleting the selected Id
        if($user->delete($id)){
            //redirect back to the cinema page
            return redirect()->back()->with("success", "You Have Deleted The User Successfully");
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'is_admin' => $data['is_admin'],
    //         'status' => $date['status'],
    //     ]);
    // }
}
