$('#beneficiary').change(function (){
	registration_no = this.value;
	
	if(registration_no != ""){
		$('#slab').prop("disabled", true); 
		$('#otpn').prop("disabled", true); 
		$.ajax({ 
				url: tax_path+'/get_slab',
				type: 'POST',
				dataType: "JSON",
				data: {registration_no:registration_no},
				success: function (response) {
					$('#slab').prop("disabled", false);
					var select = $('#slab');

					select.empty();
					select.append('<option value="">Select Period</option>');
					if (response.length != 0) {
						$.each(response, function (i, fb) {
							if(fb == "registration_failure"){
								$('#slab').prop("disabled", "disabled");
								alert("Registration No. "+registration_no+" is not added in your beneficiary list");
								return false;
							} else{
								select.append('<option value="' + fb._SLAB_ID_ + '">' + fb._SLAB_VALUE_ + '</option>');
							}
						});
					}  else{
						alert("service not responding!");
					}
					
				},
				error: function () {
					console.log('Error in retrieving Site.');
				}
			});
	}
	else{
	}
	
});

$('#calculate_tax').click(function (){
	slab = $('#slab').val();
	beneficiary = $('#beneficiary').val();
	
	if(beneficiary == ""){
		$('#beneficiary').focus();
	}
	else if(slab== "" )
	{
		$('#slab').focus();
	}
	else{
		$('#beneficiary').prop("disabled", true); 
		$('#slab').prop("disabled", true); 
		$('#otpn').prop("disabled", true); 
		$.ajax({ 
				url: tax_path+'/get_tax_inquiry',
				type: 'POST',
				dataType: "JSON",
				data: {slab:slab , registration_no:beneficiary },
				success: function (response) {
					 
						if (response.length != 0) {
							$.each(response, function (i, fb) {
								if(fb == "registration_failure"){
									$('#slab').prop("disabled", "disabled");
									alert("Registration No. "+beneficiary+" is not added in your beneficiary list");
									return false;
								}
							});
						}  else{
							alert("service not responding!");
							return false;
						}
					
						var table = $('table tbody');
						table.empty();
						charges = response._LIST_OF_CHARGES_;
						charge = Array.isArray(charges);
						
						if(charge == false)
						{
							taxes = [];
							taxes[0] = charges;
						}
						else{
							taxes = charges;
						}
						total = response._TOTAL_;
						$('#beneficiary').prop("disabled", false); 
						$('#slab').prop("disabled", false);
						$('#otpn').prop("disabled", false);
						$('#total').val(total);
						
						$.each(taxes, function (i, fb) {
							table.append("<tr><td>"+fb._CHARGE_NAME_+"</td><td>"+fb._ARREARS_+"</td><td>"+fb._AMOUNT_+"</td></tr>");
						});
						table.append("<tr><td colspan='2'><strong>TOTAL<strong></td><td><strong>"+response._TOTAL_+"</strong></td></tr>");
					
				},
				error: function () {
					var table = $('table tbody');
					table.empty();
					$('#beneficiary').prop("disabled", false); 
					$('#slab').prop("disabled", false);
					
					console.log('Error in retrieving Site.');
				}
			});
			}
	
});

