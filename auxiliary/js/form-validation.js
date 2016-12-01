$().ready(function() {
    // validate the form when it is submitted
     $("#loginForm").validate();
     $("#unitNumber").rules("add", {
         required:true,
         pattern: /(?=.*\d)/,
         maxlength: 20,
         messages: {
                required: "Please provide your unit number",
                pattern: "Please enter only numbers"
         }
      });
     $("#password").rules("add", {
         required:true,
         minlength: 5,
         maxlength: 20,
         pattern: /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/, 
         messages: {
                required: "Please provide your password",
                minlength: "Your password must be at least 5 characters long",
                maxlength: "Your password can not be more than 20 characters long",
                pattern: "Your password must at least contain at least one number, one uppercase letter, and one lowercase letter."
         }
      });
      $("#auxEmail").rules("add", {
          required:true,
          email: true,
          messages: {
              required: "Please provide a valid email.",
              email: "Please provide a valid email."
        }   
    });
    $("#confirmPassword").rules("add",{
        required: true,
        equalTo: "#password",
        messages: {
            equalTo: "passwords do not match",
            required: "Please confirm password."
        }
    });
});

$().ready(function() {
    // validate the form when it is submitted
     $("#auxillaryForm").validate();
     $("#name").rules("add", {
         pattern: /^[a-zA-Z-']+$/,
         messages: {
             pattern: "Name can only contain uppercase, lower case letters, and certain symbols. No spaces."
         }
      });
      $("#address").rules("add", {
          required: true,
          pattern: /^[a-zA-Z\d\s]+$/,
          messages: {
              pattern: "Address can only contain digits, uppercase, and lower case letter."
         }
      });
      $("#phoneNumber").rules("add", {
          pattern: /^[\d\(\)-]+$/,
          messages: {
              pattern: "Phone number can only contain digits, and symbols: ( ) -"
          }
      });
      $("#email").rules("add", {
          required: true,
          email: true,
          messages: {
              required: "Please provide a valid email.",
              email: "Please provide a valid email.",
          }
      });
      $("#nameSpaces").rules("add", {
          pattern: /^[a-zA-Z\s\.'-]+$/,
          messages: {
              pattern: "Name can only contain letters, and following symbols: .'-"
          }
      });
      $("#unitNumber").rules("add", {
          pattern: /(?=.*[0-9])/,
          messages: {
              pattern: "Unit Number can only be numbers"
          }
      });
      $("#number").rules("add", {
          pattern: /(?=.*[0-9])/,
          messages: {
              pattern: "Unit Number can only be numbers"
          }
      });
});