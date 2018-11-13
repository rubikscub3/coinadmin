$.validator.setDefaults({
    submitHandler: function () {
        //alert("submitted!");
        get_action();
    }
});

$("#update-form").validate({
    rules: {
        username: "required",
        cnic: "required",
        mobile: "required",
        city: "required",
        address: "required",
        email: "required",
       
    },
    messages: {
        username: "Please enter username",
        cnic: "Please enter your cnic",
        mobile: "Please enter your mobile no",
        city: "Please select your city",
        address: "Please enter your address",
        email: "Please enter your email",
        
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
