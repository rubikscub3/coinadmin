$.validator.setDefaults({
    submitHandler: function () {
        // alert("submitted!");
        get_action();
    }
});

$("#register-form").validate({
    rules: {
		password : {
            minlength : 6
        },
        confirm_password : {
            minlength : 6,
            equalTo : '#password'
        }
    },
    messages: {
        password: "Please enter your password",
        confirm_password: "Please enter confirm password",
    }
});

function get_action() {
    document.getElementById('register-form').submit();
}
