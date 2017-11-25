<style type="text/css">
    body > .container {
      height: 50%;
      margin-top: 125px;
      margin-bottom: 110px;
      /*margin-bottom: -35px;*/
    }
</style>
  
<?php 
  // session_start()
?>

<?php 
  include 'header.php';
?>

<div class="container">
    <!-- <div class="col-sm-6 col-md-4 col-md-offset-4"> -->
  <div class="col-lg-6 col-lg-offset-3">
    <form class="form-horizontal" id="form1" name="form1" method="post" action="script/kd_signin.php">
      <div class="panel panel-primary">
        <div class="panel-heading" align="center" style="font-size: 20px">
           <i class="glyphicon glyphicon-user"></i>&nbsp;SIGN IN
        </div>
      <div class="panel-body">  
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required="" autofocus="">
        <br>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required="">
      </div> 
        <!-- <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label> -->
  <!--   <div class="form-group"> -->
      <div class="col-lg-6">
        <label class="text-center" style="font-size:13;">
           <a href="lupapassword.php" class="text-center">   Lupa Password ? </a>
        </label>
      </div> 
    <!-- <div class="col-lg-6">
    <button class="btn btn-sm btn-primary" type="submit">Sign in</button>
    </div>
    </div> --> 

    <div class="form-group">
      <div class="col-xs-offset-9 col-lg-6">
            <button class=" btn btn-sm btn-primary" type="submit" value="signin" name="signin"><i class="glyphicon glyphicon-log-in"></i>&nbsp; Sign In</button>
      </div>
   </div>
        
    </div>
  </form>
       <button class="btn btn-primary btn-block">Belum punya akun ? <a href="signup.php">Sign Up</a></button> 
  </div>
        
</div>

<?php 
    include "footer.php" ; 
?>