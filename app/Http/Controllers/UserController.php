<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ User};
use App\Repositories\Repository;
use DB;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
       // set the model
       $this->model = new Repository($user);
    }

    public function index()
    {
        $user = $this->model->all();
        
        return view('admin.user.create')->with([
            "user" => $user,
        ]);
    }
    
    public function store(Request $request)
    {

        $this->validate($request, [
            'email' =>'required|min:5|max:255|unique:users',
            'name' => 'required|min:1|max:255',
            'password' => 'required|min:1|max:10',
            'is_admin' => 'required|string|min:1|max:10',
            'status' => 'nullable',
        ]);

        if(User::where("email", $request->input("email"))->exists()){
           return redirect()->back()->with("error", "The E-Mail is In Use By Another User");
        }
        $data = ([
            "user" => new User,
            "email" => $request->input("email"),
            "name" => $request->input("name"),
            "password" => Hash::make($request->input("password")),
            "is_admin" => $request->input("is_admin"),
            "status" => 0,
        ]);

        if($this->model->create($data)){
            return redirect()->route("user.create")->with("success", "You Have Added The User Successfully");
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

   
}
