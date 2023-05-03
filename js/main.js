//register new user
$(document).ready(function (){
  $(document).on("click", "#btn-signUp", function(e){
      e.preventDefault();

      var name = $("#txt-name").val();
      var email = $("#txt-email").val();
      var password = $("#txt-password").val();
      var occupation = $("#txt-occupation").val();
      var state = $("#txt-state").val();
      var lga = $("#txt-lga").val();
      var phone = $("#txt-phone").val();
      var language = $("#txt-language").val();

      if (name == '') {
          alert('Please enter name');
        }
        else if (email == '') {
          alert('Email is empty');
        }
      //   else if (atpos <1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
      //     alert('Please enter a valid email address');
      //   }
        else if (password.length < 3) {
          alert('Password must be atleast 4 characters');
        }
        else if (password == '') {
          alert('Password is empty');
        }
        else if (occupation == '') {
          alert('Enter your occupation');
        }
        else if (state == '') {
          alert('Please enter your state');
        }
        else if (lga == '') {
          alert('Please enter your LGA');
        }
        else if(phone == '') {
          alert('phone number is required');
        }
        else if (language == '') {
          alert('Enter you language');
        } else {
          $.ajax({
              url: "/auth/register.php",
              method: "post",
              data: {
                  name: name,
                  email: email,
                  state: state,
                  password: password,
                  occupation: occupation,
                  phone: phone,
                  language: language,
                  lga: lga,
              }, 

              success: function (data) {
                  $("#msg-status").html(data);
             },
          });

        }
  });
});

//Login User

$(document).ready(function () {
  $(document).on("click", "#btn-login", function(e){
    e.preventDefault();

    var loginId = $("#txt-loginId").val();
    var password = $("#txt-password").val();

    if (loginId == '') {
      alert('please enter your email.');
    } 
    else if (password == '') {
      alert('Please enter your password');
    }
    else {
      $.ajax({
        url: "/auth/login.php",
        method: "post",
        data: {
          loginId: loginId,
          password: password,
        },
        success: function (data) {
          $("#msg-status").html(data)
        },
      });
    }

  });
});