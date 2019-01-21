<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ Allocation, Partner, Course, User, CourseCategory };
use App\Repositories\Repository;
use DB;
class AllocationController extends Controller
{
     protected $model;

    public function __construct(Allocation $allocation)
    {
       // set the model
       $this->model = new Repository($allocation);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function partnerCourse($id)
    {
       $partnering =  Partner::find($id); 
        $course = Course::orderBy("course_name", "asc")->get(); 
        $partner = $this->model->all();
        $all = Allocation::where('partner_id', $id)->get();

        $category = CourseCategory::orderBy("category_name", "asc")->get();
        return view('admin.allocation.courselist')->with(
            [
                "partner" =>$partner,
                "course" => $course,
                "partnering" => $partnering,
                "category" =>$category,
                "all" => $all,
            ]
        );
    }

    public function courseallocation($id)
    {
        $partnering =  Partner::find($id); 
        $course = Course::orderBy("course_name", "asc")->get(); 
        $partner = $this->model->all();
        $all = Allocation::where('partner_id', $id)->get();

        $category = CourseCategory::orderBy("category_name", "asc")->get();
        return view('admin.allocation.allocate')->with(
            [
                "partner" =>$partner,
                "course" => $course,
                "partnering" => $partnering,
                "category" =>$category,
                "all" => $all,
            ]
        );
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
            'partner_id' =>'required|min:1|max:255',
            'course_id' => 'required|min:1|max:255',
            'instructor_id' => 'required|min:1|max:255',
            'status' => 'nullable',
            
        ]);
        

        // if(Allocation::where("partner_id", $request->input("partner_id")) AND ("course_id", $request->input("course_id"))->exists()){
        //     return redirect()->back()->with("error", "You Have Added This Course To The Partner Before");
        // }

        $data = [
            'allocation' => new Allocation,
            "partner_id" => $request->input('partner_id'),
            "course_id" => $request->input('course_id'),
            "instructor_id" => $request->input('instructor_id'),
            "status" => 1,
        ];

        if($this->model->create($data)){
            return redirect()->back()->with("success", "You Have Added The Course To The Partner Successfully");
        } 
     }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $allocation =  $this->model->show($id);  
        
        //deleting the selected Id
        if($allocation->delete($id)){
            //redirect back to the cinema page
            return redirect()->back()->with("success", "You Have Deleted The Allocated Course Successfully");
        }
    }
}
