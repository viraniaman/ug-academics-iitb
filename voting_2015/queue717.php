<?php
$dg_count = array ( "yes" => 0, "no" => 0, "neutral" => 0);
$ceag_count = array ( "yes" => 0, "no" => 0, "neutral" => 0);
$cr3s1_count = array ( "yes" => 0, "no" => 0, "neutral" => 0);
$cr3s2_count = array ( "yes" => 0, "no" => 0, "neutral" => 0);
$cr2s1_count = array ( "yes" => 0, "no" => 0, "neutral" => 0);
$cr2s2_count = array ( "yes" => 0, "no" => 0, "neutral" => 0);
$vf = file('./queue115.dat');
if(count($vf) > 0){
			foreach ($vf as $key => $line)
			{
				$line1 = explode(" ", $line);
				$dg = trim($line1[1]);
				$ceag = trim($line1[2]);
				$cr3s1 = trim($line1[3]);
				$cr3s2 = trim($line1[4]);
				$cr2s1 = trim($line1[5]);
				$cr2s2 = trim($line1[6]);
				if ($dg == 'DG-yes') $dg_count['yes']++; elseif ($dg == 'DG-no') $dg_count['no']++; elseif ($dg == 'DG-neutral') $dg_count['neutral']++;
				if ($ceag == 'CEAG-yes') $ceag_count['yes']++; elseif ($ceag == 'CEAG-no') $ceag_count['no']++; elseif ($ceag == 'CEAG-neutral') $ceag_count['neutral']++;
				if ($cr3s1 == 'CR3S1-yes') $cr3s1_count['yes']++; elseif ($cr3s1 == 'CR3S1-no') $cr3s1_count['no']++; elseif ($cr3s1 == 'CR3S1-neutral') $cr3s1_count['neutral']++;
				if ($cr3s2 == 'CR3S2-yes') $cr3s2_count['yes']++; elseif ($cr3s2 == 'CR3S2-no') $cr3s2_count['no']++; elseif ($cr3s2 == 'CR3S2-neutral') $cr3s2_count['neutral']++;
				if ($cr2s1 == 'CR2S1-yes') $cr2s1_count['yes']++; elseif ($cr2s1 == 'CR2S1-no') $cr2s1_count['no']++; elseif ($cr2s1 == 'CR2S1-neutral') $cr2s1_count['neutral']++;
				if ($cr2s2 == 'CR2S2-yes') $cr2s2_count['yes']++; elseif ($cr2s2 == 'CR2S2-no') $cr2s2_count['no']++; elseif ($cr2s2 == 'CR2S2-neutral') $cr2s2_count['neutral']++;
				}
		}
?> 
<table>
<tr>
<th></th>
<td>yes</td>
<td>no</td>
<td>neutral</td>
</tr>
<tr>
<th> Dept. G. Sec </th>
<td> <?php echo $dg_count['yes']; ?> </td>
<td> <?php echo $dg_count['no']; ?> </td>
<td> <?php echo $dg_count['neutral']; ?> </td>
</tr> 
<tr>
<th> CEA G. Sec </th>
<td> <?php echo $ceag_count['yes']; ?> </td>
<td> <?php echo $ceag_count['no']; ?> </td>
<td> <?php echo $ceag_count['neutral']; ?> </td>
</tr> 
<tr>
<th> Class Rep. 3rd year(S1) </th>
<td> <?php echo $cr3s1_count['yes']; ?> </td>
<td> <?php echo $cr3s1_count['no']; ?> </td>
<td> <?php echo $cr3s1_count['neutral']; ?> </td>
</tr> 
<tr>
<th> Class Rep. 3rd year(S2) </th>
<td> <?php echo $cr3s2_count['yes']; ?> </td>
<td> <?php echo $cr3s2_count['no']; ?> </td>
<td> <?php echo $cr3s2_count['neutral']; ?> </td>
</tr> 
<tr>
<th> Class Rep. 2nd year(S1) </th>
<td> <?php echo $cr2s1_count['yes']; ?> </td>
<td> <?php echo $cr2s1_count['no']; ?> </td>
<td> <?php echo $cr2s1_count['neutral']; ?> </td>
</tr> 
<tr>
<th> Class Rep. 2nd year(S2) </th>
<td> <?php echo $cr2s2_count['yes']; ?> </td>
<td> <?php echo $cr2s2_count['no']; ?> </td>
<td> <?php echo $cr2s2_count['neutral']; ?> </td>
</tr> 
</table>