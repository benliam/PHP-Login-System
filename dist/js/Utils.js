/*
	Module export Login Function
	Author: Ben Liam	
*/

export function LoginPage() {

	// Response area
	var divRespon = $('#message-response');

	var message = {
		username: 'Please enter username or password',
		password: 'Please enter password'
	}

	var responseClass = {
		success: 'alert alert-success alert-dismissible',
		error: 'alert alert-danger alert-dismissible',
		warning: 'alert alert-warnig alert-dismissible'
	}
	
	var LoginForm = $('form#frm_Login');

		LoginForm.on('submit', function(e){

			// Clear response message
			divRespon.html('');

			var thisForm = $(this),
				buttonSubmit = thisForm.find('button[type="submit"]'),
				buttonSubmitText = buttonSubmit.text();


			e.preventDefault();

			// Username
			var Username = $(this).find('#txtUsername'),
			 	Password = $(this).find('#txtPassword');

			if(Username.val() == '') {
				divRespon.html(`<div class="${responseClass.error}">${message.username}</div>`);
				Username.focus();
				return false;
			}

			if(Password.val() == '') {
				divRespon.html(`<div class="${responseClass.error}">${message.password}</div>`);
				Password.focus();
				return false;
			}

			// make disabled button
			buttonSubmit.prop('disabled', true).html('Working...');



			// Submit login using ajax
			$.ajax({
				type: $(this).attr('method'),
				dataType: 'json',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				cache: false,
				
			}).done(function(res){
				
				buttonSubmit.prop('disabled', false).html(buttonSubmitText);


				// res.code != mean login failed.
				if(res.code != 0) {
					// Release button submit
					divRespon.html(`<div class="${responseClass.error}">${res.message || 'An error occurred'}</div>`);
					buttonSubmit.prop('disabled', false).html(buttonSubmitText);

				}
				else{
					
					buttonSubmit.html('Redirecting...');
					window.location.href = res.callback;


				}	

			});

		});

} 


// Exporting Register functions
export function RegisterPage () {

	   // Validate register form  
    $('#frmRegister').validate({
      // rules 
      rules: {
      	username: {
      		required: true,
      		minlength: 4,
      		maxlength: 20
      	},
        firstName: 'required',
        lastName: 'required',
        email: {email: true, required: true},
        phone: "required",
        password: {
          minlength: 6,
          required: true,
        },
        confirmPassword: {
          equalTo: "#password"
        }
      },
      messages: {
      	username: {
      		required: "Please enter a username",
      		minlength: "Username must be at least 4 character",
      		maxlength: "Username can not be longer than 20 character"
      	},
        firstName: "Please enter your first name",
        lastName: "Please enter your last name",
        email: {
          required: "Please enter your email address",
          email: "Please enter a vaild email address"
        },
        phone: "Please enter your phone number",
        password: {minlength: "Password must be at least 6 character long", required: "Please enter password"},
        confirmPassword: {equalTo: "Please enter the same password as above"}
      },
      errorElement: "em",
      errorPlacement: function ( error, element ) {
         // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element ); 
          }
        },  
      submitHandler: (form) => {
       	var reponseDiv = $('#response-msg');	

       	var thisForm = $(form),
       		data = thisForm.serialize(),
       		action = thisForm.attr('action'),
       		method = thisForm.attr('method');

       	var button = thisForm.find('button[type="submit"]'),
       		buttonText = button.html();	

       	// before submit
       	button.prop('disabled', true).html('Working...');	

       	// setup ajax posting data
       	$.ajax({
       		type: method,
       		dataType: "json",
       		url: action,
       		data: data,
       		cache: false
       	}).done(res => {

       		// Released button
       		button.prop('disabled', false).html(buttonText);

       		console.log(res);

       		// if response code is not 0 means cannot register new account
       		if(res.code != 0) {
       			reponseDiv.html(bootstrapAlert('danger', res.message));
       		}
       	  
          if(res.code == 0) {
              $('.card-register').html(res.html)
          }


       	});

      }
    });

}

function bootstrapAlert(type, message) {
	var res = `<div class="alert alert-${type} alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  	${message}
</div>`;
	return res;
}