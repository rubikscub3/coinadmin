$.validator.setDefaults({
    submitHandler: function () {
        //alert("submitted!");
        get_action();
    }
});

$("#beneficiary-form").validate({
    rules: {
        registration_no: "required",
        email: "required",
        mobile: "required",
		nick_name: "required",
    },
    messages: {
        registration_no: "Please enter Vehicle Registration No",
        email: "Please enter your email",
        mobile: "Please enter your mobile no",
		nick_name: "Please enter your nick name",
    }
});

function get_action() {
    document.getElementById('beneficiary-form').submit();
}

var modalConfirm = function(callback){
		var id;
  $(".delete_ben").on("click", function(){
	 id = $(this).data("id");
	$("#mi-modal").modal('show');
  });

  $("#modal-btn-si").on("click", function(){
    callback(id);
    $("#mi-modal").modal('hide');
  });
  
  $("#modal-btn-no").on("click", function(){
    callback();
    $("#mi-modal").modal('hide');
  });
};

modalConfirm(function(id){
  if(id){
	location.href = beneficiary_path+"/delete/"+id;
	}else{
  }
});

$('#mobile').inputmask({
    mask: "99999999999",
});