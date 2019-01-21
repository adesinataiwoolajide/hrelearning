@extends("layouts.newheader")
    @section("content")
    <div class="clearfix"></div>
    <div class="content-wrapper">
   		<div class="container-fluid">
   			<div class="row pt-2 pb-2">
		        <div class="col-sm-9">
				    <ol class="breadcrumb">
				    	<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
				    	<li class="breadcrumb-item"><a href="{{ route('allocate', $partnering->id)}}">Allocate Course</a></li>
			            <li class="breadcrumb-item"><a href="{{route('partner.index')}}">View Partners</a></li>
			            
			            <li class="breadcrumb-item active" aria-current="page">Adding Course To Partners</li>
			         </ol>
			   	</div>
			</div>
   			<div class="row">
		    	<div class="col-lg-12">

		    		@include('layouts.message')
		          	<div class="card">
		            	<div class="card-header"><i class="fa fa-table"></i> Please Fill The Below Form To Add The Partner Course </div>
	            		<div class="card-body">
	            			<form action="{{route('allocate.store')}}" method="POST" enctype="multipart/form-data">
	            				{{ csrf_field() }}
		            			
		            			<div class="form-group row ">
		            				<div class="col-sm-3">
					                    <input type="text" class="form-control" readonly value="{{$partnering->partner_name}}">
					                    <input type="hidden" class="form-control" name="partner_id" required value="{{$partnering->id}}">
					                    <span style="color: red">** This Field is Required **</span>
					                     @if ($errors->has('partner_id'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
										        <button type="button" class="close" data-dismiss="alert">&times;</button>
										        <div class="alert-icon contrast-alert">
										            <i class="fa fa-check"></i>
										        </div>
										        <div class="alert-message">
										            <span><strong>Error!</strong> {{ $errors->first('partner_id') }} !</span>
										        </div>
										    </div>
                                        @endif  
					                 </div>
					                <div class="col-sm-3">
					                    <select class="form-control" required="" name="course_id"  id="course_id">>
					                    	<option value="">-- Select The Course --</option>
					                    	<option value=""></option>
					                    	@foreach($course as $list)
					                    		@foreach(getCourseCategory($list->category_id) as $show)  	
						                    		<option value="{{ $list->id}}">
						                    			{{ $list->course_name . " For ". $show->category_name}}
						                    		</option>
					                    		@endforeach
					                    	@endforeach
					                    </select>
					                    <span style="color: red">** This Field is Required **</span>
					                     @if ($errors->has('course_id'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
										        <button type="button" class="close" data-dismiss="alert">&times;</button>
										        <div class="alert-icon contrast-alert">
										            <i class="fa fa-check"></i>
										        </div>
										        <div class="alert-message">
										            <span><strong>Error!</strong> {{ $errors->first('course_id') }} !</span>
										        </div>
										    </div>
                                        @endif  
					                </div>
					                
					                <div class="col-sm-3">
					                    <select class="form-control" required="" name="instructor_id">
					                    	<option value="">-- Select The Instructor --</option>
					                    	<option value=""></option>
					                    	@foreach(listInstructor() as $lists)
					                    		<option value="{{ $lists->id}}">{{ $lists->name}}</option>
					                    	@endforeach
					                    </select>
					                    <span style="color: red">** This Field is Required **</span>
					                     @if ($errors->has('instructor_id'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
										        <button type="button" class="close" data-dismiss="alert">&times;</button>
										        <div class="alert-icon contrast-alert">
										            <i class="fa fa-check"></i>
										        </div>
										        <div class="alert-message">
										            <span><strong>Error!</strong> {{ $errors->first('instructor_id') }} !</span>
										        </div>
										    </div>
                                        @endif  
					                </div>
					                

					                 <div class="col-sm-3" align="">
					                      <button type="submit" class="btn btn-primary">ALLOCATE COURSE</button>
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
		          		
		            	<div class="card-header"><i class="fa fa-table"></i> List of Allocated Courses For {{$partnering->partner_name}}</div>
	            		<div class="card-body">
	              			<div class="table-responsive">
	              				<table id="example" class="table table-bordered">
	              					<thead>
					                    <tr>
					                       <th>Serial Number</th>
					                        <th>Course Name</th>
					                        <th>Course Material</th>
					                        <th>Course Category</th>
					                        <th>Instructor</th>
					                        <th> Operations</th>
					                    </tr>
					                </thead>

					                <tfoot>
					                    <tr>
					                        <th>Serial Number</th>
					                        <th>Course Name</th>
					                        <th>Course Material</th>
					                        <th>Course Category</th>
					                        <th>Instructor</th>
					                        <th> Operations</th>
					                    </tr>
					                </tfoot>
					                <tbody>
					                	<?php $number =1; ?>
					                	@foreach($all as $part)
						                    <tr>
						                        <td>
						                        	{{$number}}
						                        	<a href="" class="btn btn-danger">
						                        		<i class="fa fa-trash-o"></i>
						                        	</a>
						                        	<a href="" class="btn btn-success">
						                        		<i class="fa fa-pencil"></i>
						                        	</a>

						                        </td>
						                        <td>{{$part->course_id}}</td>
						                       	<td></td>
						                       	<td></td>
						                       	<td>{{$part->instructor_id}}</td>
						                       	<td>
						                        	<a href="" class="btn btn-danger">Allocate Course</a>
						                        	<a href="Add-staff" class="btn btn-primary">Add Staff</a>
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