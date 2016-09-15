<?php
session_start();
require_once 'connection.php';

$all_depts = array("Computer Science and Engineering",
                    "Civil Engineering",
                    "Electrical Engineering",
                    "Energy Science and Engineering",
                    "Aerospace Engineering",
                    "Chemical Engineering",
                    "Biosciences and Bioengineering",
                    "Chemistry",
                    "Earth Sciences",
                    "Humanities and Social Science",
                    "Industrial Design Centre",
                    "Mathematics",
                    "Mechanical Engineering",
                    "Metallurgical Engineering and Materials Science",
                    "Physics");
                    
$depname_to_short = to_shortform($all_depts);

$short_to_depname = to_longform($depname_to_short, $all_depts);

function to_longform($depname_to_short_array, $all_depts_array)
{
    $short_to_depname = array();
    for($i=0; $i<count($all_depts_array); $i++)
    {
        $item = array(($depname_to_short_array[$all_depts_array[$i]]) => $all_depts_array[$i]);
        array_merge($short_to_depname, $item);
    }
    return $short_to_depname;
}

function to_shortform($all_depts_array)
{
    $depname_to_short = array();
    for($i=0; $i<count($all_depts_array); $i++)
    {
        $string = preg_replace('/\s+/', '', $all_depts_array[i]);
        $item = array(($all_depts_array[i]) => $string);
        array_merge($depname_to_short, $item);
    }
    return $depname_to_short;
}

function array_has_course_code($arr)
{
    for($i=0; $i<count($arr); $i++)
    {
        $str = $arr[$i];
        return (preg_match("\b([A-Z]{2,3})(\d{0,3})\b", $str));
    }
    
}

$department_to_very_short=array(
    "CSE" => "Computer Science and Engineering",
    "CIVIL" => "Civil Engineering",
    "EE" => "Electrical Engineering",
    "ESE" => "Energy Science and Engineering",
    "AERO" => "Aerospace Engineering",
    "CHE" => "Chemical Engineering",
    "BioSchool" => "Biosciences and Bioengineering",
    "CHEM" => "Chemistry",
    "Earth Sciences",
    "HSS" => "Humanities and Social Science",
    "IDC" => "Industrial Design Centre",
    "MATH" => "Mathematics",
    "ME" => "Mechanical Engineering",
    "MET" => "Metallurgical Engineering and Materials Science",
    "PHY" => "Engineering Physics"
);

?>
