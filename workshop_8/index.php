<?php
   session_start();
?>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>PHP login workshop</title>

      <link rel="stylesheet" href="./../assets/css/bootstrap/bootstrap.min.css">
      <style type="text/css">
         body {
           display: flex;
           align-items: center;
           padding-top: 40px;
           padding-bottom: 40px;
           background-color: #f5f5f5;
         }

         .form-signin {
           max-width: 330px;
           margin: 0 auto;
         }

         /*#txtname {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
         }
         #txtemail, #txtpwd {
            border-radius: 0;
         }
         #txtconfpwd {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
         }*/
      </style>
  </head>

   <body>
      <div class="form-signin">
         <h4 class="text-center mb-4">WEB COMPUTING AND WEB SYSTEMS</h4>
         <?php
            $is_session_valid = 0;

            // echo "<pre>";
            // print_r($_SESSION);
            // exit();
            if(isset($_SESSION['valid'])){
               if(!empty($_SESSION['valid'])){
                  if($_SESSION['valid'] == '1'){
                     $is_session_valid = 1;
                  }
               }
            }
            if($is_session_valid == 0){
         ?>
            <h5>Login Form</h5>
            <?php
               if(isset($_SESSION['status_message'])){
                  if(!empty($_SESSION['status_message'])){
                     $msg = '';
                     if($_SESSION['status_message'] == 'invalid'){
                        $msg = "Invalid credentials.";
                        $_SESSION['status_message'] = '';
                     }
                     echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
                  }
               }
            ?>
            <form autocomplete="off" method="post" action="login_verify.php">
               <div class="col-md-12">
                  <?php
                     $username_remembered = 0;
                     $username = '';
                     if(isset($_COOKIE['rememberme'])){
                        if(!empty($_COOKIE['rememberme'])){
                           if(isset($_COOKIE['uname'])){
                              if(!empty($_COOKIE['uname'])){
                                 $username_remembered = 1;
                                 $username = $_COOKIE['uname'];
                              }
                           }
                        }
                     }
                  ?>
                  <label for="txtuname" >Username</label>
                  <input autocomplete="txtuname" type="text" id="txtuname" name="txtuname" class="form-control" autofocus="" value="<?php if($username_remembered == 1){ echo $username; } ?>">
               </div>

               <div class="col-md-12">
                  <label for="txtpwd" >Password</label>
                  <input autocomplete="txtpwd" type="password" id="txtpwd" name="txtpwd" class="form-control">
               </div>

               <div class="col-md-12">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" id="lblrememberme" name="lblrememberme" <?php if($username_remembered == 1){ echo 'checked="checked"'; } ?>>
                     <label class="form-check-label" for="lblrememberme">Remember me</label>
                  </div>
               </div>

               <div class="d-grid gap-2 text-center">
                  <br/>
                  <input type="hidden" name="login_token" value="KBYVYUR#TG$w87o9ort4hr4879hp0^&*(Odfgr" />
                  <button type="submit" class="btn btn-primary" type="submit">Login</button>
               </div>

               <p class="mt-3 mb-3 text-muted text-center">Made by YOUR_NAME @2021</p>
            </form>
         <?php } else { ?>
            <h5>You are already logged in <?php echo $_SESSION['userfullname']; ?></h5>
            <a href="logout.php">Logout</a>
         <?php } ?>
      </div>
   </body>
</html>