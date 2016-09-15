<div class="col-sm-5" style="padding-top: 10%;">
  
<div class="row">
      <div class="col-xs-12">
        <h1 style="font-family:helvetica light;">Tutorial Service Centre</h1>
        <h2 style="font-family:helvetica light">Login</h2>
        <form class="login" action="index.php" method="post">
          <div class="form-field">
            
            <input id="username" name="ldap" type="text" required placeholder="LDAP ID"><br>
          </div>
          <div class="form-field">
            
            <input id="password" name="pass" type="password" required placeholder="LDAP Password">
          </div> 
          <div class="form-field">
            <button class="btn btn-default" name="s_login">STUDENT</button> 
            <button class="btn btn-default" name="t_login">TUTOR</button>      
          </div>
          <?php if($error) echo'<p><font color="red">Wrong username or password!!</font></p>';
          elseif (isset($_GET['loggedin'])) echo'<p><font color="red">You are not logged in!!</font></p>'; ?>
        </form>
      </div></div> </div>
      <!--<div class="col-sm-5"  style="padding-top: 20%;">
      <div class="row">
        <div class="col-xs-6">
        <h3><div id="rotate"> 
        <div>Text1</div> 
        <div>Text2</div> 
        <div>Text3</div> 
        <div>Text4</div> </div></h3>
      </div></div></div>-->