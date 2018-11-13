$('.refreshCaptcha').on('click', function(){
    $.get(login_path+'/refresh', function(data){
        $('#captImg').html(data);
    });
});

$.validator.setDefaults({
    submitHandler: function () {
        //alert("submitted!");
        get_action();
    }
});

$("#register-form").validate({
    rules: {
        username: "required",
        cnic: "required",
        mobile: "required",
        city: "required",
        address: "required",
        email: "required",
        password : {
            minlength : 6
        },
        password_confirm : {
            minlength : 6,
            equalTo : '[name="password"]'
        },
        captcha: "required"
    },
    messages: {
        username: "Please enter username",
        cnic: "Please enter your cnic",
        mobile: "Please enter your mobile no",
        city: "Please select your city",
        address: "Please enter your address",
        email: "Please enter your email",
        password: "Please enter your password",
        confirm_password: "Please enter confirm password",
        captcha: "Please enter captcha code"
    }
});

function get_action() {
    document.getElementById('register-form').submit();
}

$('#mobile').inputmask({
    mask: "99999999999",
});

$('#cnic').inputmask({
    mask: "9999999999999",
});

$('#termsaccept').click(function() {
    $('#myModal').modal('toggle');
    $("#terms").attr("checked","checked");
});

$('#termsreject').click(function() {
    $('#myModal').modal('toggle');
    $("#terms").removeAttr("checked");
});