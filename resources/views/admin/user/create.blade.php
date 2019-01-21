@extends("layouts.newheader")
    @section("content")
    <div class="clearfix"></div>
    <div class="content-wrapper">
   		<div class="container-fluid">
   			<div class="row pt-2 pb-2">
		        <div class="col-sm-9">
				    <ol class="breadcrumb">
				    	<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
				    	<li class="breadcrumb-item"><a href="{{route('user.create')}}">Add User</a></li>
			            <li class="breadcrumb-item active" aria-current="page">Saved Partner</li>
			         </ol>
			   	</div>
			</div>
   			<div class="row">
		    	<div class="col-lg-12">

		    		@include('layouts.message')
		          	<div class="card">
		            	<div class="card-header"><i class="fa fa-table"></i> Please Fill The Below Form To Add The User Details</div>
	            		<div class="card-body">
	            			<form action="{{route('user.save')}}" method="POST" enctype="multipart/form-data">
	            				{{ csrf_field() }}
		            			
		            			<div class="form-group row ">
		            				<div class="col-sm-3">
					                    <input type="text" class="form-control" name="name" required placeholder="Enter Name">
					                    <span style="color: red">** This Field is Required **</span>
					                     @if ($errors->has('name'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
										        <button type="button" class="close" data-dismiss="alert">&times;</button>
										        <div class="alert-icon contrast-alert">
										            <i class="fa fa-check"></i>
										        </div>
										        <div class="alert-message">
										            <span><strong>Error!</strong> {{ $errors->first('name') }} !</span>
										        </div>
										    </div>
                                        @endif  
					                 </div>
					                <div class="col-sm-3">
					                    <input type="email" class="form-control"  name="email" placeholder="Enter E-Mail" min="4" required>
					                    <span style="color: red">** This Field is Required **</span>
					                     @if ($errors->has('email'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
										        <button type="button" class="close" data-dismiss="alert">&times;</button>
										        <div class="alert-icon contrast-alert">
										            <i class="fa fa-check"></i>
										        </div>
										        <div class="alert-message">
										            <span><strong>Error!</strong> {{ $errors->first('email') }} !</span>
										        </div>
										    </div>
                                        @endif  
					                </div>

					                <div class="col-sm-3">
					                	<?php $list = array("Admin", "Instructor", "Student")    ?>
					                   	<select class="form-control" name="is_admin" required>
					                   		<option value="">-- User Type --</option>
					                   		<option value=""></option>
					                   		@foreach($list as $used)
					                   			<option value="{{ $used }}">{{ $used }}</option>
					                   		@endforeach
					                   	</select>
					                    <span style="color: red">** This Field is Required **</span>
					                     @if ($errors->has('is_admin'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
										        <button type="button" class="close" data-dismiss="alert">&times;</button>
										        <div class="alert-icon contrast-alert">
										            <i class="fa fa-check"></i>
										        </div>
										        <div class="alert-message">
										            <span><strong>Error!</strong> {{ $errors->first('is_admin') }} !</span>
										        </div>
										    </div>
                                        @endif  
					                </div>

					                <div class="col-sm-3">
					                    <input type="password" class="form-control" name="password" required placeholder="Enter Password">
					                    <span style="color: red">** This Field is Required **</span>
					                     @if ($errors->has('password'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
										        <button type="button" class="close" data-dismiss="alert">&times;</button>
										        <div class="alert-icon contrast-alert">
										            <i class="fa fa-check"></i>
										        </div>
										        <div class="alert-message">
										            <span><strong>Error!</strong> {{ $errors->first('password') }} !</span>
										        </div>
										    </div>
                                        @endif  
					                 </div>
					                 <input type="hidden" name="status" value="1">
					                 <div class="col-sm-12" align="center">
					                      <button type="submit" class="btn btn-primary">ADD THE USER DETAILS</button>
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
		          		@if(count($user) ==0)
			            	<div class="card-header" align="center" style="color: red"><i class="fa fa-table"></i> The List is Empty
			            	</div>

			            @else
			            	<div class="card-header"><i class="fa fa-table"></i> List of Saved Users</div>
		            		<div class="card-body">
		              			<div class="table-responsive">
		              				<table id="example" class="table table-bordered">
		              					<thead>
						                    <tr>
						                        <th>Serial Number</th>
						                        <th>Full Name</th>
						                        <th>E-Mail</th>
						                        <th>User Type</th>
						                        <th>Operations</th>
						                    </tr>
						                </thead>

						                <tfoot>
						                    <tr>
						                        <th>Serial Number</th>
						                        <th>Full Name</th>
						                        <th>E-Mail</th>
						                        <th>User Type</th>
						                        <th>Operations</th>
						                    </tr>
						                </tfoot>
						                <tbody>
						                	<?php $number =1; ?>
						                	@foreach($user as $users)
							                    <tr>
							                        <td>{{$number}}
							                        	<a href="{{route('user.delete', $users->id)}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
							                        	<a href="" class="btn btn-success"><i class="fa fa-pencil"></i></a>
							                        </td>
							                        <td>{{$users->name}}</td>
							                        <td>{{$users->email}}</td>
							                        <td>{{ interpreteRole($users->is_admin) }}</td>
							                        <td>{{ interpreteRoleStatus($users->status) }}</td>
							                    </tr><?php
							                    $number++; ?>
							                @endforeach
						                </tbody>
						               
		              				</table>
		              			</div>
		              		</div>
		             	@endif
	              	</div>
	            </div>
	        </div>
	     </div>
	</div>


    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
@endsection