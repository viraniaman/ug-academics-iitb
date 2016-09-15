<?php
	if(isset($_POST['upload_btn'])){
		$image_info=$_POST["image_info"];
		$image_info = preg_replace('/\s+/', ' ', trim($image_info));
//////////////////////////////////////
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/x-png")
		|| ($_FILES["file"]["type"] == "image/png"))
		&& ($_FILES["file"]["size"] < 2000*1024)
		&& in_array($extension, $allowedExts))
		  {
		  if ($_FILES["file"]["error"] > 0)
		    {
		    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		    }
		  else
		    {
		    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		    echo "Type: " . $_FILES["file"]["type"] . "<br>";
		    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

		    if (file_exists("upload/" . $_FILES["file"]["name"]))
		      {
		      echo $_FILES["file"]["name"] . " already exists. ";
		      }
		    else
		      {
			      move_uploaded_file($_FILES["file"]["tmp_name"],
			      "../img/" . $_FILES["file"]["name"]);
			      echo "Stored in: " . "/img/" . $_FILES["file"]["name"];

			      $file_json="./image_info.json";
			      $lines=file($file_json);
			      $last=sizeof($lines);
			      echo "last".$last;
			      unset($lines[$last-1]);

			      $to_put=','."\n\t{\n\t\t". '"src":'.'"'.$_FILES["file"]["name"].'"'.",\n\t\t";
			      $to_put.='"title":'.' "'.$image_info.'"'."\n\t}\n]";
			      echo $to_put;
			      $lines[$last-2].=$to_put;
				$fp=fopen($file_json, "w");
				fwrite($fp, implode('', $lines));
				fclose($fp);
		      }
		    }
		  }
		else
		  {
		  echo "Invalid file";
		  }
/////////////////////////////////////////
	}
	//echo var_dump(get_defined_vars());
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="file">
		<textarea name="image_info"></textarea>
		<input type="submit" name="upload_btn" value="upload">
	</form>
</body>
</html>