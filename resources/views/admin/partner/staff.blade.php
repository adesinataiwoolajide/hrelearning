@extends("layouts.newheader")
    @section("content")
    <div class="clearfix"></div>
    <div class="content-wrapper">
   		<div class="container-fluid">
   			<div class="row pt-2 pb-2">
		        <div class="col-sm-9">
				    <ol class="breadcrumb">
				    	<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
			            <li class="breadcrumb-item"><a href="{{route('partner.index')}}">View partners</a></li>
			            <li class="breadcrumb-item active" aria-current="page">Saved Partner</li>
			         </ol>
			   	</div>
			</div>
   			<div class="row">
		    	<div class="col-lg-12">

		    		@include('layouts.message')
		          	<div class="card">
		            	<div class="card-header"><i class="fa fa-table"></i> Please Fill The Below Form To Add The Partner Details</div>
	            		<div class="card-body">
	            			<form action="{{route('partner.store')}}" method="POST" enctype="multipart/form-data">
	            				{{ csrf_field() }}
		            			
		            			<div class="form-group row ">
		            				<div class="col-sm-5">
					                    <input type="file" class="form-control" name="partner_logo" required>
					                    <span style="color: red">** This Field is Required **</span>
					                     @if ($errors->has('partner_logo'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
										        <button type="button" class="close" data-dismiss="alert">&times;</button>
										        <div class="alert-icon contrast-alert">
										            <i class="fa fa-check"></i>
										        </div>
										        <div class="alert-message">
										            <span><strong>Error!</strong> {{ $errors->first('partner_logo') }} !</span>
										        </div>
										    </div>
                                        @endif  
					                 </div>
					                <div class="col-sm-5">
					                    <input type="text" class="form-control"  name="partner_name" placeholder="Partner Name Here" min="4" required>
					                    <span style="color: red">** This Field is Required **</span>
					                     @if ($errors->has('partner_name'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
										        <button type="button" class="close" data-dismiss="alert">&times;</button>
										        <div class="alert-icon contrast-alert">
										            <i class="fa fa-check"></i>
										        </div>
										        <div class="alert-message">
										            <span><strong>Error!</strong> {{ $errors->first('partner_name') }} !</span>
										        </div>
										    </div>
                                        @endif  
					                </div>
					                

					                 <div class="col-sm-2">
					                      <button type="submit" class="btn btn-primary">ADD PARTNER</button>
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
		          		
			            	<div class="card-header"><i class="fa fa-table"></i> List of Saved partners</div>
		            		<div class="card-body">
		              			<div class="table-responsive">
		              				<table id="example" class="table table-bordered">
		              					<thead>
						                    <tr>
						                        <th>Serial Number</th>
						                        <th>Partner Name</th>
						                        <th>Partner Logo</th>
						                        <th> Operations</th>
						                    </tr>
						                </thead>

						                <tfoot>
						                    <tr>
						                        <th>Serial Number</th>
						                        <th>Partner Name</th>
						                        <th>Partner Logo</th>
						                        <th> Operations</th>
						                    </tr>
						                </tfoot>
						                <tbody>
						                	<?php $number =1; ?>
						                	@foreach($partner as $partners)
							                    <tr>
							                        <td>
							                        	{{$number}}
							                        	<a href="{{route('partner.delete', $partners->id)}}" class="btn btn-danger">
							                        		<i class="fa fa-trash-o"></i>
							                        	</a>
							                        	<a href="" class="btn btn-success">
							                        		<i class="fa fa-pencil"></i>
							                        	</a>

							                        </td>
							                        <td>{{$partners->partner_name}}</td>
							                        <td>
							                        	<img src="{{asset('partner-logo/'.$partners->partner_logo)}}" class="logo-icon" alt="logo icon" style="width: 50px; height: 50px"> 
							                        	
							                        </td>
							                        <td>
							                        	<a href="Add-staff" class="btn btn-primary">Add Staff</a>
							                        	<a href="view staff" class="btn btn-success">View Staff</a>
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