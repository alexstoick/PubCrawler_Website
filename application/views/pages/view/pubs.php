<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">List of All Pubs</h4>
		</div>
		<div class="modal-body">
			<div class="bs-example">
				<table class="table">
					<thead>
						<tr>
							<th>Pub</th>
							<th>Address</th>
							<th>Rating</th>
							<th>Zone</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($pubs as $pub): ?>
					<tr>
						<td><?php echo $pub['pub']->pub_name; ?></td>
						<td>
						<?php
							if (!empty($pub['attributes'])) {
								foreach ($pub['attributes'] as $attribute) {
									if ($attribute->pub_attr_id == 1) {
										echo $attribute->pub_attr_value;
									}
								}
							} else {
								echo 'Missing';
							}
						?>
						</td>
						<td>
							not available
						</td>
						<td><?php echo $pub['pub']->zone_name; ?></td>
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save changes</button>
		</div>
	</div>
</div>
