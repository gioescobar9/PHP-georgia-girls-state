$().ready(function() {
    // validate the form when it is submitted
     $("#loginForm").validate();
     $("#username").rules("add", {
         required:true,
         email: true,
         messages: {
                required: "Please provide an email address",
                pattern: "Please enter a valid email address"
         }
      });
     $("#password").rules("add", {
         required:true,
         minlength: 5,
         maxlength: 20,
         pattern: /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/, 
         messages: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                maxlength: "Your password can not exceed 20 characters long",
                pattern: "Your password must at least contain at least one number, one uppercase letter, and one lowercase letter."
         }
      });
});

$().ready(function() {
    // validate the form when it is submitted
     $("#applicationForm").validate();
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
      $("#number").rules("add", {
          required: true,
          pattern: /^[0-9]+$/,
          messages: {
              pattern: "Can only be numbers."
          }
      });
      $("#gradDate").rules("add", {
          date: true,
          messages: {
              date: "Graduation Date must be a date."
          }
      });
      $("#nameSpaces").rules("add", {
          pattern: /^[a-zA-Z\s\.'-]+$/,
          messages: {
              pattern: "Name can only contain letters, and following symbols: .'-"
          }
      });
});