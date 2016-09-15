<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

//$course_info = NULL;
//
//foreach($_POST as $key => $value)
//{
//    if($value == "Go to course page")
//    {
//        $query = "SELECT * FROM course_info WHERE course_code='".$key."'";
//        $result = mysqli_query($conn, $query);
//        if(mysqli_num_rows($result)>0)
//        {
//            while($row = mysqli_fetch_assoc($result))
//            {
//                $course_info = $row;
//            }
//        }
//        else
//        {
//            die("Some error occured while fetching course info. Please contact Aman Virani at 9821212128");
//        }
//    }
//}
//
//$student_info = NULL;
//
//$student_query = "SELECT * FROM student_details WHERE ldap_id='".$_SESSION['ldap_id']."'";
//$result_student = mysqli_query($conn, $student_query);
//if(mysqli_num_rows($result_student)>0)
//{
//    while($row = mysqli_fetch_assoc($result_student))
//    {
//        $student_info = $row;
//    }
//}
//else
//{
//    die("Some error occured while fetching student info. Please contact Aman Virani at 9821212128");
//}
//
//$student_application_info = NULL;
//
//$student_application_query = "SELECT * FROM application_details WHERE course_code='".$course_info['course_code']."', ldap_id='".$student_info['ldap_id']."'";
//$result_student_application_query = mysqli_query($conn, $student_application_query);
//if(mysqli_num_rows($result_student_application_query)>0)
//{
//    while($row = mysqli_fetch_assoc($result_student_application_query))
//    {
//        $student_application_info = $row;
//    }
//}
//else
//{
//    die("Some error occured while fetching student application info. Please contact Aman Virani at 9821212128");
//}
//    
//function refresh_student_variables()
//{
//    foreach($_POST as $key => $value)
//    {
//        if($value == "Go to course page")
//        {
//            $query = "SELECT * FROM course_info WHERE course_code='".$key."'";
//            $result = mysqli_query($conn, $query);
//            if(mysqli_num_rows($result)>0)
//            {
//                while($row = mysqli_fetch_assoc($result))
//                {
//                    $course_info = $row;
//                }
//            }
//            else
//            {
//                die("Some error occured while fetching course info. Please contact Aman Virani at 9821212128");
//            }
//        }
//    }
//
//    $student_info = NULL;
//
//    $student_query = "SELECT * FROM student_details WHERE ldap_id='".$_SESSION['ldap_id']."'";
//    $result_student = mysqli_query($conn, $student_query);
//    if(mysqli_num_rows($result_student)>0)
//    {
//        while($row = mysqli_fetch_assoc($result_student))
//        {
//            $student_info = $row;
//        }
//    }
//    else
//    {
//        die("Some error occured while fetching student info. Please contact Aman Virani at 9821212128");
//    }
//
//    $student_application_info = NULL;
//
//    $student_application_query = "SELECT * FROM application_details WHERE course_code='".$course_info['course_code']."', ldap_id='".$student_info['ldap_id']."'";
//    $result_student_application_query = mysqli_query($conn, $student_application_query);
//    if(mysqli_num_rows($result_student_application_query)>0)
//    {
//        while($row = mysqli_fetch_assoc($result_student_application_query))
//        {
//            $student_application_info = $row;
//        }
//    }
//    else
//    {
//        die("Some error occured while fetching student application info. Please contact Aman Virani at 9821212128");
//    }
//}