<button data-toggle="modal" data-target="#cancel_modal" class="btn btn-sm btn-warning" onclick="cancel_order(<?php echo $order->booking_id; ?>)"> Cancel</button>



			<div class="modal fade" id="cancel_modal" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="example-Modal3">Cancel Order</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?php echo URLROOT; ?>/admin/cancel_order_admin" method="POST">
								<div class="form-group">
									<label for="recipient-name" class="form-control-label">ORDER #</label>
									<input type="text" readonly class="form-control" name="order_id" id="order_id" hidden>
								</div>
								<div class="form-group">
									<label for="message-text" class="form-control-label">Remark:</label>
									<textarea class="form-control" name="cancel_remark"></textarea>
								</div>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Cancel Order </button>
						</div>
						</form>
					</div>
				</div>
			</div>



		

			<script>
				function cancel_order(bid){
					$('#order_id').val(bid);
				}
			</script>