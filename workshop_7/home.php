<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>PHP database workshop</title>

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
         <form class="text-center" method="get" action="http://localhost/html/workshop_7/create_db_table.php">
            <input type="hidden" name="create_token" value="fdugin@*E&#GREFiudjdefr" />
            <button type="submit" class="btn btn-primary">Create a database and table</button>
         </form>

         <h5>PHP Form</h5>
         <form autocomplete="off" method="post" action="http://localhost/html/workshop_7/save_data.php">
            <div class="col-md-12">
               <label for="txtname" >Full name</label>
               <input autocomplete="txtname" type="text" id="txtname" name="txtname" class="form-control" autofocus="">
            </div>

            <div class="d-grid gap-2 text-center">
               <br/>
               <input type="hidden" name="save_token" value="k4tviwdfergug78H(@#I$BUdfg" />
               <button type="submit" class="btn btn-primary" type="submit">Save</button>
               <a href="http://localhost/html/workshop_7/get_all_data.php">View all added records</a>
            </div>

            <p class="mt-3 mb-3 text-muted text-center">Made by YOUR_NAME @2021</p>
         </form>
      </div>
   </body>
</html>