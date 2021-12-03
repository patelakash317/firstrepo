<?php
   session_start();
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['login_token']) ) {
         if (!empty($_POST['login_token']) ) {
            if (isset($_POST['txtuname']) && isset($_POST['txtpwd']) ) {
               if (!empty($_POST['txtuname']) && !empty($_POST['txtpwd']) ) {

                  if ($_POST['txtuname'] == 'mcmaster' && 
                     $_POST['txtpwd'] == '1234') {
                     $_SESSION['userfullname'] = 'McMaster';
                     $_SESSION['valid'] = true;

                     $lblrememberme = '0';
                     if (isset($_POST['lblrememberme'])){
                        if (!empty($_POST['lblrememberme'])){
                           setcookie('rememberme', '1', time() + (86400 * 30), "/"); // 86400 = 1 day
                           setcookie('uname', $_POST['txtuname'], time() + (86400 * 30), "/"); // 86400 = 1 day
                        } else {
                         setcookie('rememberme', null, -1, '/'); 
                         setcookie('uname', null, -1, '/'); 
                        }
                     } else {
                        setcookie('rememberme', null, -1, '/'); 
                        setcookie('uname', null, -1, '/'); 
                     }
                     
                     // echo 'You have entered valid use name and password';
                     $url = "http://localhost/html/workshop_8/";
                     header('Location: ' . $url);
                  } else {
                     $_SESSION['status_message'] = 'invalid';
                     $url = "http://localhost/html/workshop_8/";
                     header('Location: ' . $url);                     
                  }
               } else {
                  echo 'invalid_request';
               }
            } else {
               echo 'invalid_request';
            }
         } else {
            echo 'invalid_request';
         }
      } else {
         echo 'invalid_request';
      }
   } else {
      echo 'invalid_request';
   }
?>