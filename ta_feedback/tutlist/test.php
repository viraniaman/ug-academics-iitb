<?php
$vf = file('d4.txt');
if(count($vf) > 0){
	foreach ($vf as $key => $line)
        {
            $line1 = explode("  ", $line);
			$no = trim($line1[0]);
			$rollno = trim($line1[1]);
			$name = trim($line1[2]);
			$tut = trim($line1[3]);
			echo $no." ".$rollno." ".$name." ".$tut."<br>";
        }
    }
?>     