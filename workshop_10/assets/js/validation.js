// Using manual javascript validation
  function validateForm() {
    // name validation
      let name_value = document.forms["frmregistration"]["txtname"].value;
      if (name_value == "") {
        alert("Name must be filled out.");
        document.getElementById('txtname').focus();
        return false;
      }
    // name validation ends

    // email validation using regex
      let email_value = document.forms["frmregistration"]["txtemail"].value;
      var re = /\S+@\S+\.\S+/; // email validation regex - Ex: abc@xyz.com - \S+ -> String

      if (email_value == "") {
        alert("Email must be filled out.")
        document.getElementById('txtemail').focus();
        return false;

      } else if(!re.test(email_value)){
        alert("Email is invalid.")
        document.getElementById('txtemail').focus();
        return false;

      }
    // email validation using regex ends

  }