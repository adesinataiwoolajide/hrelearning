@extends("layouts.newheader")
    @section("content")
    <div class="clearfix"></div>

	<div class="content-wrapper">
   		<div class="container-fluid">
    		<div class="row mt-3">
    			<?php $email = Auth::user()->email;
    			 ?>
    			@foreach(loadPartnerImage($email) as $list )
    				
					    <div class="col-12 col-lg-6 col-xl-3">
					      	<div class="card gradient-blooker">
					       		<div class="card-body">
							        <div class="media align-items-center">
							            <div class="w-icon"><i class="fa fa-money text-white"></i></div>
							            <div class="media-body ml-3 border-left-xs border-white-2">
					              			<h4 class="mb-0 ml-3 text-white"></h4>
					              			<p class="mb-0 ml-3 extra-small-font text-white">Courses</p>
					            		</div>
					          		</div>
					        	</div>
					      	</div>
					    </div>

					    <div class="col-12 col-lg-6 col-xl-3">
					      	<div class="card gradient-drupal">
					       		<div class="card-body">
							        <div class="media align-items-center">
							            <div class="w-icon"><i class="fa fa-money text-white"></i></div>
							            <div class="media-body ml-3 border-left-xs border-white-2">
					              			<h4 class="mb-0 ml-3 text-white"></h4>
					              			<p class="mb-0 ml-3 extra-small-font text-white">Courses</p>
					            		</div>
					          		</div>
					        	</div>
					      	</div>
					    </div>

					    <div class="col-12 col-lg-6 col-xl-3">
					      	<div class="card gradient-bloody">
					       		<div class="card-body">
							        <div class="media align-items-center">
							            <div class="w-icon"><i class="fa fa-money text-white"></i></div>
							            <div class="media-body ml-3 border-left-xs border-white-2">
					              			<h4 class="mb-0 ml-3 text-white"></h4>
					              			<p class="mb-0 ml-3 extra-small-font text-white">Courses</p>
					            		</div>
					          		</div>
					        	</div>
					      	</div>
					    </div>
					
			    @endforeach
		   </div><!--End Row-->
		   
    	</div>
    
    </div>
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
@endsection