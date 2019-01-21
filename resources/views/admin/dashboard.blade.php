@extends("layouts.newheader")
    @section("content")
    <div class="clearfix"></div>

	<div class="content-wrapper">
   		<div class="container-fluid">
    		<div class="row mt-3">
    			<div class="col-12 col-lg-6 col-xl-3">
		         	<div class="card gradient-deepblue">
		           		<div class="card-body">
		              		<h5 class="text-white mb-0">{{count($course_category)}} <span class="float-right"><i class="fa fa-shopping-cart"></i></span></h5>
		                	<div class="progress my-3" style="height:3px;">
		                   		<div class="progress-bar" style="width:55%"></div>
		                	</div>
		              		<p class="mb-0 text-white small-font">Course Categories <span class="float-right">{{count($course_category)}}% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
		            	</div>
		         	</div> 
		       </div>
			    <div class="col-12 col-lg-6 col-xl-3">
			        <div class="card gradient-orange">
			            <div class="card-body">
			              	<h5 class="text-white mb-0">{{count($course)}}  <span class="float-right"><i class="fa fa-usd"></i></span></h5>
			                <div class="progress my-3" style="height:3px;">
			                   	<div class="progress-bar" style="width:55%"></div>
			                </div>
			              <p class="mb-0 text-white small-font">Course <span class="float-right">{{count($course_category)}} % <i class="zmdi zmdi-long-arrow-up"></i></span></p>
			            </div>
			         </div>
			    </div>
			    <div class="col-12 col-lg-6 col-xl-3">
			        <div class="card gradient-ohhappiness">
			            <div class="card-body">
			              	<h5 class="text-white mb-0">{{count($partner)}}  <span class="float-right"><i class="fa fa-eye"></i></span></h5>
			                <div class="progress my-3" style="height:3px;">
			                   <div class="progress-bar" style="width:55%"></div>
			                </div>
			              <p class="mb-0 text-white small-font">Partners <span class="float-right">{{count($partner)}} % <i class="zmdi zmdi-long-arrow-up"></i></span></p>
			            </div>
			        </div>
			    </div>
			    <div class="col-12 col-lg-6 col-xl-3">
			        <div class="card gradient-ibiza">
			            <div class="card-body">
			              	<h5 class="text-white mb-0">{{count($learner)}}  <span class="float-right"><i class="fa fa-envira"></i></span></h5>
			                <div class="progress my-3" style="height:3px;">
			                   <div class="progress-bar" style="width:55%"></div>
			                </div>
			              	<p class="mb-0 text-white small-font">Learners <span class="float-right">{{count($learner)}} % <i class="zmdi zmdi-long-arrow-up"></i></span></p>
			            </div>
			        </div>
			    </div>

     		</div>
     		<div class="row">
     			@foreach($partner as $partners)
	                
	                <div class="col-12 col-lg-6 col-xl-3">
					  	<div class="card">
							<div class="card-body" align="center">
							 	 <img src="{{asset('partner-logo/'.$partners->partner_logo)}}" alt="Card image cap" class="avatar-img rounded" style="width: 100px; height: 100px;" align="center">
							   <p align="">{{$partners->partner_name}}</p>
						  </div>
					  </div>
				   </div>

	            @endforeach

               
            </div>
     		<div class="row mt-3">
				<div class="col-12 col-lg-6 col-xl-3">
				  	<div class="card">
						<div class="card-body">
						 	 <p class="mb-0 text-primary">Total Orders <span class="float-right"><i class="icon-basket-loaded"></i></span></p>
							   <div class="text-center">
								 	<h4 class="mb-0 py-3 text-primary">4856</h4>
							   </div>
						   <div class="progress-wrapper">
							  	<div class="progress" style="height:5px;">
									<div class="progress-bar bg-primary" style="width:50%"></div>
							   	</div>
							</div>
					  </div>
				  </div>
			   </div>


			   <div class="col-12 col-lg-6 col-xl-3">
				  <div class="card">
					<div class="card-body">
						  <p class="text-success mb-0">Total Expenses <span class="float-right"><i class="icon-wallet"></i></span></p>
						   <div class="text-center">
							 <h4 class="mb-0 py-3 text-success">7850</h4>
						   </div>
						   <div class="progress-wrapper">
							  <div class="progress" style="height:5px;">
								<div class="progress-bar bg-success" style="width:50%"></div>
							   </div>
							</div>
					  </div>
				  </div>
			   </div>

			   <div class="col-12 col-lg-6 col-xl-3">
				  <div class="card">
					<div class="card-body">
						  <p class="text-danger mb-0">Total Revenue <span class="float-right"><i class="icon-pie-chart"></i></span></p>
						   <div class="text-center">
							 <h4 class="mb-0 py-3 text-danger">87.5%</h4>
						   </div>
						   <div class="progress-wrapper">
							  <div class="progress" style="height:5px;">
								<div class="progress-bar bg-danger" style="width:50%"></div>
							   </div>
							</div>
					  </div>
				  </div>
			   </div>

			   <div class="col-12 col-lg-6 col-xl-3">
				  <div class="card">
					<div class="card-body">
						  <p class="text-warning mb-0">New Users <span class="float-right"><i class="icon-user"></i></span></p>
						   <div class="text-center">
							 <h4 class="mb-0 py-3 text-warning">8400</h4>
						   </div>
						   <div class="progress-wrapper">
							  <div class="progress" style="height:5px;">
								<div class="progress-bar bg-warning" style="width:50%"></div>
							   </div>
							</div>
					  	</div>
				  </div>
			   </div>

		    </div>
		   
		    <div class="row mt-3">
			    <div class="col-12 col-lg-6 col-xl-3">
			      	<div class="card gradient-scooter">
			       		<div class="card-body">
			          		<div class="media align-items-center">
			            		<div class="w-icon"><i class="fa fa-users text-white"></i></div>
					            <div class="media-body ml-3 border-left-xs border-white-2">
					              	<h4 class="mb-0 ml-3 text-white">{{count($user)}} </h4>
					              	<p class="mb-0 ml-3 extra-small-font text-white">Users</p>
					            </div>
			          		</div>
			        	</div>
			      	</div>
			    </div>

			    <div class="col-12 col-lg-6 col-xl-3">
			      	<div class="card gradient-bloody">
			       		<div class="card-body">
			          		<div class="media align-items-center">
					            <div class="w-icon"><i class="fa fa-book text-white"></i></div>
					            <div class="media-body ml-3 border-left-xs border-white-2">
			              			<h4 class="mb-0 ml-3 text-white">{{count($allocation)}} </h4>
			              			<p class="mb-0 ml-3 extra-small-font text-white">Course Allocation</p>
			            		</div>
			          		</div>
			        	</div>
			      	</div>
			    </div>

			    <div class="col-12 col-lg-6 col-xl-3">
			      	<div class="card gradient-quepal">
			       		<div class="card-body">
			          		<div class="media align-items-center">
					            <div class="w-icon"><i class="fa fa-sitemap text-white"></i></div>
					            <div class="media-body ml-3 border-left-xs border-white-2">
					              	<h4 class="mb-0 ml-3 text-white">{{count($course_category)}} </h4>
			              			<p class="mb-0 ml-3 extra-small-font text-white">Course Category</p>
			            		</div>
			          		</div>
			        	</div>
			      	</div>
			    </div>

			    <div class="col-12 col-lg-6 col-xl-3">
			      	<div class="card gradient-blooker">
			       		<div class="card-body">
					        <div class="media align-items-center">
					            <div class="w-icon"><i class="fa fa-money text-white"></i></div>
					            <div class="media-body ml-3 border-left-xs border-white-2">
			              			<h4 class="mb-0 ml-3 text-white">23.5%</h4>
			              			<p class="mb-0 ml-3 extra-small-font text-white">Support Costs</p>
			            		</div>
			          		</div>
			        	</div>
			      	</div>
			    </div>

		   </div><!--End Row-->
		   
    	</div>
    
    </div>
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
@endsection