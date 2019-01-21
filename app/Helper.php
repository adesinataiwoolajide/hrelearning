<?php

   	function gettingCourses($id){
   		return \DB::table('courses')->where([
   			"id" => $id
   		])->get();
    }

    function loadCourseAllocaation($id){
        return \DB::table('partners')->where([
            "id" => $id
        ])->get();
    }


    function getCourseCategory($id){
        return \DB::table('course_categories')->where([
            "id" => $id
        ])->get();
    }

    function gettingCourseCategory($id){
        return \DB::table('course_categories')->where([
            "id" => $id
        ])->get();
    }

   	function gettingPartners($id){
   		return \DB::table('partners')->where([
   			"id" => $id
   		])->get();
       }
       
    function gettingPartnerLearners($partner_id){
        return \DB::table('learners')->where([
            "partner_id" => $partner_id
        ])->get();
    }

    function gettingLearnersCourse($course_id){
        return \DB::table('learners')->where([
            "course_id" => $course_id
        ])->get();
    }

    function gettingLearnersCoursePartner($course_id, $partner_id){
        return \DB::table('learners')->where([
            "course_id" => $course_id,
            "partner_id" => $partner_id
        ])->get();
    }

    function interpreteRole($is_admin)
    {
        if($is_admin == "Admin"){ ?>
            <p style="color: green">Administrator </p><?php
        }elseif($is_admin == "Instructor"){ ?>
            <p style="color: pink">Instructor </p><?php 
        }else{?>
            <p style="color: grey">Student </p><?php 
        }
    }

    function listInstructor()
    {
         return \DB::table('users')->where([
            "is_admin" => "Instructor",
        ])->get();
    }

    function listCourse()
    {
         return \DB::table('courses')->get();
    }

    function interpreteRoleStatus($status)
    {
        if($status == 1){ ?>
            <p style="color: green">Active </p><?php
        }else{?>
            <a href="{{route('user.delete', $users->id)}}" class="btn btn-success"> Not Activate </a><?php 
        }
    }

   
   
?>