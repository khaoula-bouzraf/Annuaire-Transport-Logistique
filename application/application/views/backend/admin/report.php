<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('date_wise_filter'); ?>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-offset-3 col-lg-6">
						<form class="form-inline" action="<?php echo site_url('admin/report/filter_by_date_range') ?>" method="get">
							<div class="col-lg-10">
								<div id="reportrange" class="daterange daterange-inline add-ranges" data-format="MMMM D, YYYY" data-start-date="<?php echo date("F d, Y" , $timestamp_start); ?>" data-end-date="<?php echo date("F d, Y" , $timestamp_end); ?>">
									<i class="entypo-calendar"></i>
									<span id="selectedValue"><?php echo date("F d, Y" , $timestamp_start) . " - " . date("F d, Y" , $timestamp_end);?></span>
								</div>
								<input id="date_range" type="hidden" name="date_range" value="<?php echo date("d F, Y" , $timestamp_start) . " - " . date("d F, Y" , $timestamp_end);?>">
							</div>
							<div class="col-lg-2">
								<button type="submit" class="btn btn-info" id="submit-button" onclick="update_date_range();"> <?php echo get_phrase('filter');?></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div><!-- end col-->
	<div class="col-lg-12">
		<div class="panel panel-primary" data-collapsed = "0">
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('purchase_histories'); ?>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<table class="table table-bordered datatable">
							<thead>
								<tr>
									<th width="80"><div>#</div></th>
									<th><div><?php echo get_phrase('date');?></div></th>
									<th><div><?php echo get_phrase('buyer');?></div></th>
									<th><div><?php echo get_phrase('package');?></div></th>
									<th><div><?php echo get_phrase('amount_paid');?></div></th>
									<th><div><?php echo get_phrase('actions');?></div></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$total_amount = 0;
								foreach ($purchase_histories->result_array() as $key => $purchase_history):
									$total_amount += $purchase_history['amount_paid']; ?>
									<tr>
										<td><?php echo $key+1; ?></td>
										<td>
											<?php
											echo date('D d-M-Y', $purchase_history['purchase_date']);
											?>
										</td>
										<td>
											<?php
											$user_details = $this->user_model->get_all_users($purchase_history['user_id'])->row_array();
											echo $user_details['name'];
											?>
										</td>
										<td>
											<?php
											$package_details = $this->crud_model->get_packages($purchase_history['package_id'])->row_array();
											echo $package_details['name'];
											?>
										</td>
										<td>
											<?php
											echo currency($purchase_history['amount_paid']);
											?>
											<?php
											if($purchase_history['amount_paid'] > 0 ){
												if($purchase_history['payment_method'] == 'stripe' || $purchase_history['payment_method'] == 'paypal'){
													?>
													<small><span class="badge badge-success "><?php echo $purchase_history['payment_method']; ?></span></small>
												<?php }else{
													?>
													<small><span class="badge badge-info "><?php echo $purchase_history['payment_method']; ?></span></small>
													<?php
												}
											}else{  ?>
												<small><span class="badge badge-dark "><?php echo $purchase_history['payment_method']; ?></span></small>
											<?php }  ?>
										</td>
										<td class="">
											<a href="<?php echo site_url('admin/package_invoice/'.$purchase_history['id']); ?>" class="btn btn-info"><i class="mdi mdi-printer"></i> <?php echo get_phrase('invoice'); ?></a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function update_date_range()
{
	var x = $("#selectedValue").html();
	$("#date_range").val(x);
}
</script>
