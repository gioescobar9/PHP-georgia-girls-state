// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='login']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      unitNumber: {
        required: true,
        pattern: /(?=.*\d)/
      },
      password: {
        required: true,
        minlength: 5,
        pattern: /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/
      }
    },
    // Specify validation error messages
    messages: {
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long",
        pattern: "Your password must at least contain at least one number, one uppercase letter, and one lowercase letter."

      },
      unitNumber: {
          required: "Please provide a username",
          pattern: "Please enter only numbers"
      },
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

    $("form[name='application']").validate({
    // Specify validation rules
    rules: {
      schoolName: {
        required: true,
        pattern: /^[a-zA-Z_\- ]$/
      },
      name:
      {
          pattern: /^[a-zA-Z']+$/
      },
      address: {
        required: true,
        pattern: /^[a-zA-Z,- ]+$/
      },
      phoneNumber: {
          pattern: /(?=.*\d)/
      },
      classRank:
      {
          required: true,
          pattern: /^[0-9]+$/
      },
      gradDate: {
          date: true
      },
      signature: {
          pattern: /^[a-zA-Z ]+$/
      }, 
      emergencyName: {
          pattern: /^[a-zA-Z' ]$/
      }, 
      unitNumber: {
          pattern: /(?=.*[0-9])/
      }
    },
    
    // Specify validation error messages
    messages: {
      schoolName: {
          pattern: "Your name can only contain uppercase and lower case letters."
      },
      name: {
          pattern: "Your name can only contain uppercase and lower case letters, no spaces."
      },
      address: {
          pattern: "Your address can only contain at least one digit, uppercase, and lower case letter"
      },
      phoneNumber: {
          pattern: "Your phone number can only contain digits, and symbols: ( ) -"
      },
      classRank: {
          pattern: "Class Rank can only be numbers, at most three"
      },
      gradDate: {
          date: "Graduation Date must be a date"
      },
      signature: {
          pattern: "Signature is not in right format"
      },
      emergencyName: {
          pattern: "Name can only contain letters, and '"
      },
      unitNumber: {
          pattern: "Unit Number can only be numbers"
      }
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});