$.validator.setDefaults({
    submitHandler: function () {
        //alert("submitted!");
        get_action();
    }
});

$("#beneficiary-verify-form").validate({
    rules: {
        mobile_otp: "required",
        email_otp: "required",
    },
    messages: {
        mobile_otp: "Please enter Mobile OTP",
        email_otp: "Please enter Email OTP",
    }
});

function get_action() {
    document.getElementById('beneficiary-verify-form').submit();
}

$('#mobile_otp').inputmask({
    mask: "9999",
});

$('#email_otp').inputmask({
    mask: "9999",
});

$("#resendToken").click(function(){
    var email = $("#ben_email").val();
    var mobile = $("#ben_mobile").val();
    var name = $("#ben_nick_name").val();

    $.ajax({ 
        url: beneficiary_path+'/resendToken',
        type: 'POST',
        data: {email:email, mobile:mobile, name:name},
        success: function (response) {
            if(response != "fail"){
                alert("New token has been sent on your mobile and email");
            } else{
                alert("Token could not be sent, please try again");
            }
        },
        error: function () {
            console.log('Error in retrieving Site.');
        }
    });
});