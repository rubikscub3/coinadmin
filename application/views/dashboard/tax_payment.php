<!-- start: PAGE -->
<div class="main-content">
	
	
    
	<div class="container">
    <!-- end: SPANEL CONFIGURATION MODAL FORM -->
	<?php 
		$attributes = array('class' => 'tax-form', 'id' => 'tax-form');
		echo form_open(base_url().'Tax', $attributes);
	?>
	<input type="hidden" name="amount" id="total" value="" />
		<!-- start: PAGE HEADER -->
		<div class="row">
			<div class="col-sm-12">
				
				<!-- start: PAGE TITLE & BREADCRUMB -->
				
				<div class="page-header">
					<h1>Tax Payment</h1>
				</div>
				<!-- end: PAGE TITLE & BREADCRUMB -->
			</div>
			
			
			
		</div>
		
		<!-- end: PAGE HEADER -->
		<!-- start: PAGE CONTENT -->
		<div class="row">
			<div class="col-md-12">
				<!-- start: FORM VALIDATION 1 PANEL -->
				<div class="panel panel-default">
					
					<div class="panel-body">
					
						<?php if($this->session->flashdata('failure')){?>
                          <div class="alert alert-danger alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong><?php echo $this->session->flashdata('failure');?></strong> 
                          </div>
                        <?php } ?>

							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Select Beneficiary<span class="symbol required"></span>
										</label>
										<select class="form-control" id="beneficiary" name="beneficiary">
											<option value="">Select Beneficiary</option>
											<?php if($ben_info){
												foreach($ben_info as $key => $value){
												?>
												<option value="<?php echo $value['registration_no'] ?>"><?php echo $value['registration_no'] ?></option>
											<?php } } ?>
										</select>
									</div>
									<div class="form-group">
										<label class="control-label">
											<strong>Tax Period</strong>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label">
											Period<span class="symbol required"></span>
										</label>
										<select class="form-control" id="slab" name="slab">
											<option value="">Select Period</option>
										</select>
									</div>
									
								</div>
								
								<div class="col-md-6">
								</div>
								
							</div>
							
								
								<div class="pull-right">
									<button class="btn def-btn" id="calculate_tax" type="button">
										Calculate Charges
									</button>
								</div>
						
					</div>
				</div>
				<!-- end: FORM VALIDATION 1 PANEL -->
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<!-- start: DYNAMIC TABLE PANEL -->
				<div class="panel panel-default">
					
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover table-full-width table-no-action">
							<thead>
								<tr>
									<th>Head</th>
									<th>Arrears</th>
									<th>Amount</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
				<!-- end: DYNAMIC TABLE PANEL -->
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
            <div class="pull-right">	
				<button class="btn def-btn" id="otpn" type="submit" disabled>
					Generate OTPN
				</button></div>
			</div>
		</div>
		<br>
		<!-- end: PAGE CONTENT-->
	</div>
	<?php echo form_close();?>
</div>
<!-- end: PAGE -->
</div>

<!-- JS for this page only -->
<script src="<?php echo base_url()?>assets/admin/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>

<script>
	var tax_path = "<?php echo base_url()?>Tax";
</script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/pages/tax_payment.js"></script>