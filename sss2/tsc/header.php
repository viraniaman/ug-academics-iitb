<?php
if ($s_loggedin) $info=ldap_find_all('uid',$_SESSION['ldap']);
if ($t_loggedin) $info=ldap_find_all('uid',$_SESSION['t_ldap']);
$photo = false;
$file = "./profile_pics/".$username.".jpg";
if (file_exists ( $file )) {$photo = true;} else $file = "./image/noprofile.png";
?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header" style="margin-left: 5%">
        <a href="index.php"><img src="image/tsc_logo.png" style="height:50px;width:auto"></a>
        <!--<a class="navbar-brand" rel="home" href="index.php" style="font-size:20px;">TSC</a>-->
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse pull-right">
		<ul class="nav navbar-nav">
      <?php if($admin) { ?><li><a href="update.php">Update</a></li> <?php } ?>
      <li><a href="register.php"><b>Course Home</b></a></li>
      <li><a href="calendar.php"><b>Calendar</b></a></li>
			<li><a href="demand.php"><b>Demand Tutorial</b></a></li>
			<li><a href="tas.php"><b>Know Your TAs</b></a></li>
      <li><a href="contact.php"><b>Contact Us</b></a></li>
			<?php
      if(($s_loggedin) || ($t_loggedin)) {
        $fullname = $info[0]["cn"][0];
      ?>
      <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                <b> <?php echo $fullname; ?></b><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php" style="display: inline;"><b>My Profile</b></a>
                  <?php 
                    echo '<img src="'.$file.'" style="height:50px;">';
                  ?>
                </li>
                <li class="divider"></li>
                <!--<li><a href="#">Action</a></li>-->
                <!--<li><a href="register.php">Registered Courses</a></li>
                <li class="divider"></li>-->
                <!--<li><a href="profile.php"><b>My Profile</b></a></li>
                <li class="divider"></li>-->
                <?php if ($t_loggedin) { } else { ?>
                <li><a href="registered.php"><b>Registered Courses</b></a></li>
                <li class="divider"></li> <?php } ?>
                <li><a href="index.php?logout=true"><b>Logout</b></a></li>
              </ul>
            </li> <?php } ?>
		</ul>
		<!--<div class="col-sm-3 col-md-3 pull-right">
          <form class="navbar-form" role="search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
          </form>
		</div> -->
	</div>
</nav>
