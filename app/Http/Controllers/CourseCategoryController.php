<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ CourseCategory};
use App\Repositories\Repository;
use DB;

class CourseCategoryController extends Controller
{
    protected $model;

    public function __construct(CourseCategory $category)
    {
       // set the model
       $this->model = new Repository($category);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category= $this->model->all();
        return view('admin.coursecategory.create')->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coursecategory.create');
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
            'category_name' =>'required|min:5|max:255|unique:course_categories',
        ]);

        if(CourseCategory::where("category_name", $request->input("category_name"))->exists()){
            return redirect()->back()->with("error", "You Have Added The Course category Before");
        }

        $data = [
            'category' => new CourseCategory,
            "category_name" => $request->input('category_name'),
        ];

        if($this->model->create($data)){
            return redirect()->route("coursecategory.index")->with("success", "You Have Added The Course category Successfully");
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
        $category =  $this->model->show($id);  
        
        //deleting the selected Id
        if($category->delete($id)){
            //redirect back to the cinema page
            return redirect()->back()->with("success", "You Have Deleted The Course Category Successfully");
        }
    }
}
