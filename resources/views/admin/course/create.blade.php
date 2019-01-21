@extends("layouts.newheader")
    @section("content")
    <div class="clearfix"></div>
    <div class="content-wrapper">
   		<div class="container-fluid">
   			<div class="row pt-2 pb-2">
		        <div class="col-sm-9">
				    <ol class="breadcrumb">
				    	<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
			            <li class="breadcrumb-item"><a href="{{route('course.index')}}">View courses</a></li>
			            <li class="breadcrumb-item active" aria-current="page">Saved Vourses</li>
			         </ol>
			   	</div>
			</div>
   			<div class="row">
		    	<div class="col-lg-12">

		    		@include('layouts.message')
		          	<div class="card">
		            	<div class="card-header"><i class="fa fa-table"></i> Please Fill The Below Form To Add The Course Details</div>
	            		<div class="card-body">
	            			<form action="{{route('course.store')}}" method="POST" enctype="multipart/form-data">
	            				{{ csrf_field() }}
		            			
		            			<div class="form-group row ">
		            				<div class="col-sm-3">
					                    <input type="file" class="form-control" name="course_material" required>
					                    <span style="color: red">** This Field is Required **</span>
					                     @if ($errors->has('course_material'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
										        <button type="button" class="close" data-dismiss="alert">&times;</button>
										        <div class="alert-icon contrast-alert">
										            <i class="fa fa-check"></i>
										        </div>
										        <div class="alert-message">
										            <span><strong>Error!</strong> {{ $errors->first('course_material') }} !</span>
										        </div>
										    </div>
                                        @endif  
					                 </div>
					                <div class="col-sm-3">
					                    <input type="text" class="form-control"  name="course_name" placeholder="Course Name Here" min="4" required>
					                    <span style="color: red">** This Field is Required **</span>
					                     @if ($errors->has('course_name'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
										        <button type="button" class="close" data-dismiss="alert">&times;</button>
										        <div class="alert-icon contrast-alert">
										            <i class="fa fa-check"></i>
										        </div>
										        <div class="alert-message">
										            <span><strong>Error!</strong> {{ $errors->first('course_name') }} !</span>
										        </div>
										    </div>
                                        @endif  
					                </div>
					                
					                <div class="col-sm-3">
					                    <select class="form-control" required="" name="category_id">
					                    	<option value="">-- Select The Category --</option>
					                    	<option value=""></option>
					                    	@foreach($category as $list)
					                    		<option value="{{ $list->id}}">{{ $list->category_name}}</option>
					                    	@endforeach
					                    </select>
					                    <span style="color: red">** This Field is Required **</span>
					                     @if ($errors->has('category_id'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
										        <button type="button" class="close" data-dismiss="alert">&times;</button>
										        <div class="alert-icon contrast-alert">
										            <i class="fa fa-check"></i>
										        </div>
										        <div class="alert-message">
										            <span><strong>Error!</strong> {{ $errors->first('category_id') }} !</span>
										        </div>
										    </div>
                                        @endif  
					                 </div>
					                 <div class="col-sm-2">
					                      <button type="submit" class="btn btn-primary">ADD THE CATEGORY</button>
					                 </div>
						            
					            </div>
				            </form>
		            	</div>
		            </div>
		        </div>
		    </div>
			 <div class="row">
		    	<div class="col-lg-12">
		          	<div class="card">
		          		
			            	<div class="card-header"><i class="fa fa-table"></i> List of Saved courses</div>
		            		<div class="card-body">
		              			<div class="table-responsive">
		              				<table id="example" class="table table-bordered">
		              					<thead>
						                    <tr>
						                        <th>Serial Number</th>
						                        <th>Course Name</th>
						                        <th>Course Material</th>
						                        <th>Category Name</th>
						                    </tr>
						                </thead>

						                <tfoot>
						                    <tr>
						                        <th>Serial Number</th>
						                        <th>Course Name</th>
						                        <th>Course Material</th>
						                        <th>Category Name</th>
						                    </tr>
						                </tfoot>
						                <tbody>
						                	<?php $number =1; ?>
						                	@foreach($course as $courses)
							                    <tr>
							                        <td>
							                        	{{$number}}
							                        	<a href="{{route('course.delete', $courses->id)}}" class="btn btn-danger">
							                        		<i class="fa fa-trash-o"></i>
							                        	</a>
							                        	<a href="" class="btn btn-success">
							                        		<i class="fa fa-pencil"></i>
							                        	</a>

							                        </td>
							                        <td>
							                        	<img src="{{asset('styling/book.png')}}" class="logo-icon" alt="logo icon">
							                        	<a href="{{asset('course-materials/'.$courses->course_material)}}" target="_blank"> {{$courses->course_material}}</a>
							                        </td>
							                        <td>{{$courses->course_name}}</td>
							                        <td>@foreach(getCourseCategory($courses->category_id) as $show)
							                        		{{$show->category_name}}
							                        	@endforeach
							                        </td>
							                    </tr><?php
							                    $number++; ?>
							                @endforeach
						                </tbody>
						               
		              				</table>
		              			</div>
		              		</div>
		             
	              	</div>
	            </div>
	        </div>
	     </div>
	</div>


    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
@endsection