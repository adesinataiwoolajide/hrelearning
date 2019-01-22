<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ Partner, Course, User, CourseCategory};
use App\Repositories\Repository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class PartnerController extends Controller
{
    protected $model;

    public function __construct(Partner $partner)
    {
       // set the model
       $this->model = new Repository($partner);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partner = $this->model->all();
        
        return view('admin.partner.create')->with([
            "partner" => $partner,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'partner_name' =>'required|min:5|max:255|unique:partners',
            'partner_logo' => 'file|required|mimes:jpeg,bmp,png,PNG,jpg,JPEG|max:1999',
            'partner_email' => 'required|min:5|max:255|unique:partners',
           // 'password' => 'nullable',
        ]);

        if($request->hasFile('partner_logo')){
            //Getting File Name With Extension
            $filenameWithExt = $request->file('partner_logo')->getClientOriginalName();
            // Get Just File Name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('partner_logo')->getClientOriginalExtension();
            // file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload the image
            $path=$request->file('partner_logo')->move('partner-logo', $fileNameToStore);
        }else{
            $fileNameToStore = 'no-image.png';
        }

        if(Partner::where("partner_name", $request->input("partner_name"))->exists()){
            return redirect()->back()->with("error", "You Have Added A Partner with this name Before");
        }

        if(User::where("email", $request->input("partner_email"))->exists()){
           return redirect()->back()->with("error", "The E-Mail is In Use By Another User");
        }

        $data = [
            'partner' => new Partner,
            "partner_name" => $request->input('partner_name'),
            "partner_logo" =>  $fileNameToStore,
            'partner_email' => $request->input('partner_email'),
            "password" => Hash::make($request->input("partner_email")),
        ];
        
        $use = new User([
            "email" => $request->input("partner_email"),
            "name" => $request->input("partner_name"),
            "password" => Hash::make($request->input("partner_email")),
            "is_admin" => 'Partner',
            "status" => 1,
        ]);

        if($use->save() AND ($this->model->create($data))){
           return redirect()->route("partner.index")->with("success", "You Have Added The Partner Successfully");
        } 
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function staff($id)
    {
        $partner =  $this->model->show($id);  
        return view('admin.partner.staff')->with(
            [
                "partner" =>$partner,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id){

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $partner =  $this->model->show($id);  
        
        //deleting the selected Id
        if($partner->delete($id)){
            //redirect back to the cinema page
            return redirect()->back()->with("success", "You Have Deleted The Partner Successfully");
        }
    }
}
