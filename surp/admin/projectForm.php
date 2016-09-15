<?php
/*$username = 'ugadmin';
$password = 'adminpass';
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
  header('HTTP/1.1 401 Unauthorized');
  header('WWW-Authenticate: Basic realm="SURP"');
  exit('<h2>SURP</h2>Enter a valid username and password to access the page');
}*/
?>
<?php 
$edit = false;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $edit = true;
    include ('../connect.php');
  $query = "SELECT * FROM projects_2015 WHERE id = '$id'";
  $result = mysqli_query($link, $query) or die ('Error connecting to database');
  $row = mysqli_fetch_array($result);
  mysqli_close($link);
}
?>
<form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Enter Prof. Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required value = "<?php if ($edit) echo $row['prof_name'];?>">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputTitle">Enter Project Title</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="InputTitle" id="InputTitle" placeholder="Enter Project Title" required value = "<?php if ($edit) echo $row['project_title'];?>">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Enter Department</label>
                    <div class="input-group"> <select name="Department">
                        <option value="BioSchool">BioSchool</option>
                        <option value="CHE">Chemical</option>
                        <option value="AE">Aerospace</option>
                        <option value="CHEM">Chemistry</option>
                        <option value="CIVIL">Civil</option>
                        <option value="CSE">CS</option>
                        <option value="ESE">Energy</option>
                        <option value="CTARA">CTARA</option>
                        <option value="CSRE">CSRE</option>
                        <option value="GEOS">Earth Science</option>
                        <option value="EE">EE</option>
                        <option value="HSS">HSS</option>
                        <option value="IDC">IDC</option>
                        <option value="MAT">Mathematics</option>
                        <option value="ME">Mechanical</option>
                        <option value="MET">MEMS</option>
                        <option value="PHY">Physics</option>
                        <option value="treelabs">Treelabs</option>

                    </select>
                    

                    </div>
                </div>
                <div class="form-group">
                    <label for="Project Description">Project Description</label>
                    <div class="input-group">
                        <textarea name="Description" id="InputDescription" class="form-control" rows="5"><?php if ($edit) echo $row['project_description'];?></textarea>
                        <span class="input-group-addon"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Eligibility">Eligibility</label>
                    <div class="input-group">
                        <textarea name="Eligibility" id="InputEligibility" class="form-control" rows="3"><?php if ($edit) echo $row['eligibility'];?></textarea>
                        <span class="input-group-addon"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Duration">Duration</label>
                    <div class="input-group">
                        <textarea name="Duration" id="InputDuration" class="form-control" rows="1"><?php if ($edit) echo $row['duration'];?></textarea>
                        <span class="input-group-addon"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Duration">Duration</label>
                    <div class="input-group">
                        <input type="checkbox" name="purview" value="1"> Outside surp purview<br>
                        <span class="input-group-addon"></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
            <?php
            if ($edit) echo '<input type="hidden" name="id" value="'.$id.'">';
            ?>
            
        </form>
        