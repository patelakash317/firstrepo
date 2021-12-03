<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>PHP API and Ajax workshop</title>

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
         
         .float_alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 5000;
         }
      </style>
   </head>

   <body>
      <div class="form-signin">
         <h4 class="text-center mb-4">WEB COMPUTING AND WEB SYSTEMS</h4>

         <h5>API and AJAX Form</h5>
         <div class="col-md-12">
            <label for="txtname" >Full name</label>
            <input autocomplete="txtname" type="text" id="txtname" name="txtname" class="form-control" autofocus="">
         </div>

         <div class="d-grid gap-2 text-center">
            <br/>
            <button type="button" class="btn btn-primary" onclick="saveData();">Save</button>
         </div>

         <p class="mt-3 mb-3 text-muted text-center">Made by YOUR_NAME @2021</p>
         <div id="alrtsuccess" class="float_alert alert alert-success alert-dismissible fade show" style="display: none;">
           <p class="title m-0"></p>
         </div>
         <div id="alrtdanger" class="float_alert alert alert-danger alert-dismissible fade show" style="display: none;">
           <p class="title m-0">Invalid login credentials. Please try again.</p>
         </div>
      </div>
      <script src="../assets/js/jquery-3.6.0.min.js"></script>
      <script type="text/javascript">
         function saveData() {
            let txtname = $('#txtname').val();
            if (txtname != "") {
               $.ajax({
                 type:"POST",
                 url:"http://localhost/html/workshop_9/apis/save_data.php",
                 data: JSON.stringify({'api_token': 'k4tviwdfergug78H(@#I$BUdfg', 'txtname': txtname}),
                 success:function(html){
                     var data = JSON.parse(html);
                     if(data.response_status != ''){
                        if(data.response_status == '1'){
                          console.log("Saved - "+data.response_desc);
                          $("#alrtsuccess").fadeIn("slow").delay(1500).fadeOut(700);
                          $('#alrtsuccess .title').html(data.response_desc);
                          document.getElementById('txtname').focus();
                          document.getElementById('txtname').value = '';

                        } else if(data.response_status >= '2'){
                          console.log("Unable to save."+data.response_desc);
                          $("#alrtdanger").fadeIn("slow").delay(1500).fadeOut(700);
                          $('#alrtdanger .title').html(data.response_desc);
                        }

                     } else {
                        console.log("uns: Unable to update.");
                        $("#alrtdanger").fadeIn("slow").delay(1500).fadeOut(700);
                        $('#alrtdanger .title').html(data.response_desc);
                     }
                 },
                 error: function(XMLHttpRequest, textStatus, errorThrown) {
                   if (XMLHttpRequest.readyState == 4) {
                     // HTTP error (can be checked by XMLHttpRequest.status and XMLHttpRequest.statusText)
                     if(textStatus === 'timeout'){     
                       console.log("uns: Failed from timeout.");
                     } else {
                       console.log("uns: HTTP error.");
                     }

                   } else if (XMLHttpRequest.readyState == 0) {
                     // Network error (i.e. connection refused, access denied due to CORS, etc.)
                     if(textStatus === 'timeout'){     
                       console.log("uns: Failed from timeout.");
                     } else {
                       console.log("uns: A network error occurred. Please try again.");
                     }

                   } else {
                     // something weird is happening
                     if(textStatus === 'timeout'){     
                       console.log("uns: Failed from timeout.");
                     } else {
                       console.log("uns: Something weird is happening.");
                     }
                   }
                 },
                 timeout: 20000,
               }).fail(function(jqXHR, textStatus){
               });

            } else {
               alert("Name must be filled out.");
               document.getElementById('txtname').focus();
               return false;
            }
         }
      </script>
   </body>
</html>