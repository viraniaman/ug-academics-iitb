<?php

$host = "10.105.177.5";
$user = "ugacademics";
$password ="ug_acads";
$database = "ugacademics";

$id = "";
$name = "";
$genre = "";
$author = "";
$currently_with = "";
$from = "";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['name'];
    $posts[2] = $_POST['genre'];
    $posts[3] = $_POST['author'];
    $posts[4] = $_POST['currently_with'];
    $posts[5] = $_POST['from'];
    return $posts;
}

// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM book WHERE id = $data[0]";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $id = $row['id'];
                $name = $row['name'];
                $genre = $row['genre'];
                $author = $row['author'];
                $currently_with = $row['currently_with'];
                $from = $row['from'];
            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}


// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `book`(`name`, `genre`, `author`,`currently_with`,`from`) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";
    try{
        $insert_Result = mysqli_query($connect, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Inserted';
            }else{
                echo 'Data Not Inserted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }
}

// Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `book` WHERE `id` = $data[0]";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}

// Edit
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE `book` SET `name`='$data[1]',`genre`='$data[2]',`author`='$data[3]',`currently_with`='$data[4]',`from`=$data[5] WHERE `id` = $data[0]";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Updated';
            }else{
                echo 'Data Not Updated';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Update '.$ex->getMessage();
    }
}



?>


<!DOCTYPE Html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <title>Admin Panel</title>
        <style type="text/css">
            body{
                font-family: sans-serif;
                background-color: #c3c3c3;
            }
             @font-face {
    font-family: myFirstFont;
    src: url(sansation_bold.woff);
    font-weight: bold;
}
            h2{
                color:  #FF8C00;
                font-family: myFirstFont;
            }
           
        </style>
    </head>
    <body >
    <h2 align="center" color="red"> Admin Panel : Add, Delete, Update</h2>
     <div align="center" style="background-color: grey; text-align:center; color:#FFCC00;padding:10% 20%;">
        <form action="admin.php" method="post" >
            <input type="number" name="id" placeholder="Id" value="<?php echo $id;?>"><br><br>
            <input type="text" name="name" placeholder="Name" value="<?php echo $name;?>"><br><br>
            <input type="text" name="genre" placeholder="Genre" value="<?php echo $genre;?>"><br><br>
             <input type="text" name="author" placeholder="Author" value="<?php echo $author;?>"><br><br>
            <input type="text" name="currently_with" placeholder="Currently With" value="<?php echo $currently_with;?>"><br><br>
            <input type="date" name="from" placeholder="From" value="<?php echo $from;?>"><br><br>
            <div>
                <!-- Input For Add Values To Database-->
                <input type="submit" name="insert" value="Add">
                
                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="Update">
                
                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="Delete">
                
                <!-- Input For Find Values With The given ID -->
                <input type="submit" name="search" value="Find">
            </div>
        </form>
        </div>
    </body>
</html>
