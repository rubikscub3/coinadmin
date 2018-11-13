$('.refreshCaptcha').on('click', function(){
    $.get(login_path+'/refresh', function(data){
		var res = data.split('~');
        $('#captImg').html(res[0]);
        $('#sessCaptcha').val(res[1]);
		
    });
});

 $.validator.setDefaults({
    submitHandler: function () {
        //alert("submitted!");
        get_action();
    }
});

$("#login-form").validate({
    rules: {
        email: "required",
        password : {
            minlength : 6
        },
		captcha: "required",
    },
    messages: {
        email: "Please enter your email",
        password: "Please enter your password",
		captcha: "Please enter captcha code",
    }
});

function get_action() {
    document.getElementById('login-form').submit();
}