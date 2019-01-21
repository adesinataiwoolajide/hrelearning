<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ Course, CourseCategory};
use App\Repositories\Repository;
use DB;

class CourseController extends Controller
{
	protected $model;

    public function __construct(Course $course)
    {
       // set the model
       $this->model = new Repository($course);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$category = CourseCategory::orderBy("category_name", "asc")->get();
    	$course = $this->model->all();
    	
        return view('admin.course.create')->with([
        	"category" => $category,
        	"course" => $course,
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
            'course_name' =>'required|min:5|max:255|unique:courses',
            'course_material' => 'file|required|mimes:pdf,PDF,doc,DOC,ppt,PPT,docx,DOCS,pptx,PPTX|max:1999',
            'category_id' =>'required|min:1|max:255',
        ]);

        if($request->hasFile('course_material')){
            //Getting File Name With Extension
            $filenameWithExt = $request->file('course_material')->getClientOriginalName();
            // Get Just File Name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('course_material')->getClientOriginalExtension();
            // file name to store
            $fileNameToStore = time().'.'.$extension;
            //upload the image
            $path=$request->file('course_material')->move('course-materials', $fileNameToStore);
        }else{
            $fileNameToStore = 'No File';
        }

        if(Course::where("course_name", $request->input("course_name"))->exists()){
            return redirect()->back()->with("error", "You Have Added The Course Before");
        }

        $data = [
            'course' => new Course,
            "course_name" => $request->input('course_name'),
            "course_material" =>  $fileNameToStore,
            "category_id" => $request->input('category_id'),
        ];

        if($this->model->create($data)){
            return redirect()->route("course.index")->with("success", "You Have Added The Course Material Successfully");
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
        //Finding the selected Id
        $course =  $this->model->show($id);  
        
        //deleting the selected Id
        if($course->delete($id)){
            //redirect back to the cinema page
            return redirect()->back()->with("success", "You Have Deleted The Course Successfully");
        }
    }
}
