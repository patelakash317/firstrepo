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
         .centerme{
            max-width: 530px;
            margin: 0 auto;
         }
      </style>
  </head>

   <body>
      <div class="container centerme">
         <h4 class="text-center mb-4">WEB COMPUTING AND WEB SYSTEMS</h4>
         <h5>All data</h5>

         <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "webcomputing";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT usr_id, usr_fullname FROM users";
            $result = $conn->query($sql); ?>
            
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full name</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        if ($result->num_rows > 0) { // output data of each row
                           while($row = $result->fetch_assoc()) { ?>
                              <tr>
                                 <td><?php echo $row["usr_id"]; ?></td>
                                 <td><?php echo $row["usr_fullname"]; ?></td>
                              </tr>
                           <?php } 
                        } else {
                           echo "<td colspan='2'>No data available</td>";
                        }
                     ?>
                  </tbody>
               </table>               
            <?php
               $conn->close();
            ?>
         <div class="col-md-12">

         </div>

         <div class="d-grid gap-2 text-center">
            <a href="http://localhost/html/workshop_7/">Go back</a>
         </div>
      </div>
   </body>
</html>