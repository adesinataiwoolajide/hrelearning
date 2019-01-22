<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="description" content=""/>
	<meta name="author" content=""/>
	<title>EZ37 Solutions E-Learning</title>
	  <!--favicon-->
	<link rel="icon" href="{{asset('styling/assets/images/favicon.ico')}}" type="image/x-icon"/>
	  <!-- Vector CSS -->
	<link href="{{asset('styling/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
	  <!-- simplebar CSS-->
	<link href="{{asset('styling/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
	  <!-- Bootstrap core CSS-->
	<link href="{{asset('styling/assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
	  <!-- animate CSS-->
	<link href="{{asset('styling/assets/css/animate.css')}}" rel="stylesheet" type="text/css"/>
	  <!-- Icons CSS-->
	<link href="{{asset('styling/assets/css/icons.css')}}" rel="stylesheet" type="text/css"/>
	  <!-- Sidebar CSS-->
	<link href="{{asset('styling/assets/css/sidebar-menu.css')}}" rel="stylesheet"/>
	  <!-- Custom Style-->
	<link href="{{asset('styling/assets/css/app-style.css')}}" rel="stylesheet"/>

	<link href="{{asset('styling/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
  	<link href="{{asset('styling/assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
  
</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   	<div id="sidebar-wrapper" class="bg-theme bg-theme4" data-simplebar="" data-simplebar-auto-hide="true">
     	<div class="brand-logo">
		    <a href="index.html">
		       <img src="{{asset('styling/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
		       <h5 class="logo-text">EZ37 Solutions</h5>
		   	</a>
   		</div>
		<div class="user-details">
		    <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
		      	<div class="avatar"><?php $partner_email = Auth::user()->email; 
		      		
		      		if(($partner_email = Auth::user()->email) AND (Auth::user()->is_admin == "Partner")){ ?>
			      		@foreach(loadPartnerImage($partner_email) as $photo)
			      			<img class="mr-3 side-user-img" src="{{asset('partner-logo/'.$photo->partner_logo)}}" alt="user avatar">
			      		@endforeach <?php
			      	}else{ ?>
			      		<img class="mr-3 side-user-img" src="{{asset('styling/assets/images/avatars/avatar-13.png')}}" alt="user avatar"><?php
			      	} ?>
		      	</div>
		        <div class="media-body">
		       		<h6 class="side-user-name"><?php $name = Auth::user()->name; ?> {{ $name }}</h6>
		      	</div>
		    </div>
     		<div id="user-dropdown" class="collapse">
		      	<ul class="user-setting-menu">
		            <li><a href="javaScript:void();"><i class="icon-user"></i>  My Profile</a></li>
		      		<li><a href="{{ route('admin.logout') }}"><i class="icon-power"></i> Logout</a></li>
		      	</ul>
		     </div>
      	</div>
	   	<ul class="sidebar-menu do-nicescrol">
	      	<li class="sidebar-header">MAIN NAVIGATION</li>
	      	
		    <?php 
		    $user_type = Auth::user()->is_admin; ?>
	        @if($user_type == "Admin")
	        	<li>
			        <a href="{{route('admin.dashboard')}}" class="waves-effect">
			          	<i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
			          	<small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
			        </a>
			    </li>
			    <li>
			        <a href="{{route('coursecategory.index')}}" class="waves-effect">
			          	<i class="zmdi zmdi-view-dashboard"></i> <span>Course Category</span>
			          	<small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
			        </a>
			    </li>

			    <li>
			        <a href="{{route('course.index')}}" class="waves-effect">
			          	<i class="zmdi zmdi-view-dashboard"></i> <span>Course Manger</span>
			          	<small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
			        </a>
			    </li>

			    <li>
			        <a href="{{route('partner.index')}}" class="waves-effect">
			          	<i class="zmdi zmdi-view-dashboard"></i> <span>Partner</span>
			          	<small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
			        </a>
			    </li>

			    <li>
			        <a href="{{route('user.create')}}" class="waves-effect">
			          	<i class="zmdi zmdi-view-dashboard"></i> <span>User</span>
			          	<small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
			        </a>
			    </li>

			    <li>
			        <a href="" class="waves-effect">
			          	<i class="zmdi zmdi-view-dashboard"></i> <span>Students</span>
			          	<small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
			        </a>
			    </li>

			    <li>
			        <a href="" class="waves-effect">
			          	<i class="zmdi zmdi-view-dashboard"></i> <span>Instructor</span>
			          	<small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
			        </a>
			    </li>
			@elseif($user_type == "Partner")
				<li>
			        <a href="{{route('admin.dashboard')}}" class="waves-effect">
			          	<i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
			          	<small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
			        </a>
			    </li>
			    <li>
			        <a href="" class="waves-effect">
			          	<i class="zmdi zmdi-view-dashboard"></i> <span>Bio Data</span>
			          	<small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
			        </a>
			    </li>
				<li>
			        <a href="" class="waves-effect">
			          	<i class="zmdi zmdi-view-dashboard"></i> <span>Course Material</span>
			          	<small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
			        </a>
			    </li>

			    <li>
			        <a href="" class="waves-effect">
			          	<i class="zmdi zmdi-view-dashboard"></i> <span>Feed Back</span>
			          	<small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
			        </a>
			    </li>

			    <li>
			        <a href="" class="waves-effect">
			          	<i class="zmdi zmdi-view-dashboard"></i> <span>My Instructor</span>
			          	<small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
			        </a>
			    </li>
			@else
				<li>
			        <a href="{{route('student.dashboard')}}" class="waves-effect">
			          	<i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
			          	<small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
			        </a>
			    </li>
				<li>
			        <a href="" class="waves-effect">
			          	<i class="zmdi zmdi-view-dashboard"></i> <span>Students</span>
			          	<small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
			        </a>
			    </li>
			@endif
		    <li>
		        <a href="{{ route('admin.logout') }}" class="waves-effect">
		          	<i class="zmdi zmdi-lock"></i> <span>Log Out</span>
		          	<small class="badge float-right badge-light"><i class="zmdi zmdi-long-arrow-right"></i></small>
		        </a>
		    </li>

	    </ul>
   
   </div>

<header class="topbar-nav">
 	<nav class="navbar navbar-expand fixed-top">
  		<ul class="navbar-nav mr-auto align-items-center">
		    <li class="nav-item">
		      	<a class="nav-link toggle-menu" href="javascript:void();">
			       <i class="icon-menu menu-icon"></i>
			     </a>
		    </li>
		    
		    <h4 align="center"><p >EZ37 Solutions E-Learning</p></h4>
  		</ul>
     
  		<ul class="navbar-nav align-items-center right-nav-link">
   
			<li class="nav-item">
			    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
			        <span class="user-profile"><img src="{{asset('styling/assets/images/avatars/avatar-13.png')}}" class="img-circle" alt="user avatar"></span>
			    </a>
			    <ul class="dropdown-menu dropdown-menu-right">
			        <li class="dropdown-item"><i class="icon-settings mr-2"></i> Change Password</li>
			        <li class="dropdown-divider"></li>
			        <li class="dropdown-item"><a href="{{ route("admin.logout") }}"><i class="icon-power mr-2"></i> </a>Logout</li>
			    </ul>
    		</li>
  		</ul>
	</nav>
</header>
<div class="clearfix"></div>
	<div class="">
	       @yield('content')  
	</div>
	<footer class="footer">
      	<div class="container">
        	<div class="text-center">
          		Copyright © <?php echo date("Y") ?> EZ37 Solutions
        	</div>
      	</div>
    </footer>
    <!-- <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
    </ul>
    <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
    </ul>
       -->
     
   
</div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('styling/assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('styling/assets/js/popper.min.js')}}"></script>
  <script src="{{asset('styling/assets/js/bootstrap.min.js')}}"></script>
	
 <!-- simplebar js -->
  <script src="{{asset('styling/assets/plugins/simplebar/js/simplebar.js')}}"></script>
  <!-- sidebar-menu js -->
  <script src="{{asset('styling/assets/js/sidebar-menu.js')}}"></script>
  <!-- loader scripts -->
  <script src="{{asset('styling/assets/js/jquery.loading-indicator.html')}}"></script>
  <!-- Custom scripts -->
  <script src="{{asset('styling/assets/js/app-script.js')}}"></script>
  <!-- Chart js -->
  
  <script src="{{asset('styling/assets/plugins/Chart.js/Chart.min.js')}}"></script>
  <!-- Vector map JavaScript -->
  <script src="{{asset('styling/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
  <script src="{{asset('styling/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
  <!-- Easy Pie Chart JS -->
  <script src="{{asset('styling/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
  <!-- Sparkline JS -->
  <script src="{{asset('styling/assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
  <script src="{{asset('styling/assets/plugins/jquery-knob/excanvas.js')}}"></script>
  <script src="{{asset('styling/assets/plugins/jquery-knob/jquery.knob.js')}}"></script>


   	<script src="{{asset('styling/assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
  	<script src="{{asset('styling/assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>
  	<script src="{{asset('styling/assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('styling/assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{asset('styling/assets/plugins/bootstrap-datatable/js/jszip.min.js')}}"></script>
	<script src="{{asset('styling/assets/plugins/bootstrap-datatable/js/pdfmake.min.js')}}"></script>
	<script src="{{asset('styling/assets/plugins/bootstrap-datatable/js/vfs_fonts.js')}}"></script>
	<script src="{{asset('styling/assets/plugins/bootstrap-datatable/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('styling/assets/plugins/bootstrap-datatable/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('styling/assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js')}}"></script>

    
    <script>
        $(function() {
            $(".knob").knob();
        });
    </script>
     <script>
     $(document).ready(function() {
      //Default data table
       $('#default-datatable').DataTable();


       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print' ]
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );

    </script>
  <!-- Index js -->
  <script src="{{asset('styling/assets/js/index.js')}}"></script>

  
</body>
</html>
