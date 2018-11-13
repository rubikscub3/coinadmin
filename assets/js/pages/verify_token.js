$('#resendOTP').click(function(){
	mobile = $('#mobile').val();
	email = $('#email').val();
	tokenType = $('#token_type').val();
	
	$.ajax({ 
				url: base_url+'/home/resend_otp',
				type: 'POST',
				dataType: "JSON",
				data: {mobile:mobile,email:email,tokenType:tokenType },
				success: function (response) {
					//alert(response.message);
					if(response.error == 1) {
						$('.resend-msg').css('color', 'red');
					}
					else {
						$('.resend-msg').css('color', 'green');
					}
					
					$('.resend-msg-box').show();
					$('.resend-msg').text(response.message);
				},
				error: function () {
					console.log('Error in retrieving Site.');
				}
			});
});

 $.validator.setDefaults({
    submitHandler: function () {
        //alert("submitted!");
        get_action();
    }
});

$("#token-form").validate({
    rules: {
        token: "required"
    },
    messages: {
        token: "Please enter 4 digit token"
    }
});

function get_action() {
    document.getElementById('token-form').submit();
}

$('#token').inputmask({
    mask: "9999",
});
