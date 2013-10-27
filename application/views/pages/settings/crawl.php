<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Crawl Settings</h4>
		</div>
		<div class="modal-body">
			<div id="slider-range"></div>
			<br/>
			<form id="settings_form" action="<?php echo site_url('/update/settings'); ?>" method="POST">
				<label for="number_of_pubs"><h4>How many pubs I would like to visit?</h4></label>
				<select name="number_of_pubs" id="number_of_pubs">
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
				</select>
				<br/>
				<label for="my_budget"><h4>My budget</h4></label>
				<select name="my_budget" id="my_budget">
					<option>£</option>
					<option>££</option>
					<option>£££</option>
					<option>££££</option>
					<option>£££££</option>
				</select>
			</form>

			<script type="text/javascript">
				$(function() {
					var select_pubs = $("#number_of_pubs");
					var select_budget = $("#my_budget");

					var slider_pubs = $("<div id='slider_pubs'></div>").insertAfter(select_pubs).slider({
						min: 1,
						max: 9,
						range: "min",
						value: select_pubs[0].selectedIndex + 1,
						slide: function(event, ui) {
							select_pubs[0].selectedIndex = ui.value - 1;
						}
					});

					var slider_budget = $("<div id='slider_budget'></div>").insertAfter(select_budget).slider({
						min: 1,
						max: 5,
						range: "min",
						value: select_budget[0].selectedIndex + 1,
						slide: function(event, ui) {
							select_budget[0].selectedIndex = ui.value - 1;
						}
					});

					$("#number_of_pubs").change(function() {
						slider_pubs.slider("value", this.selectedIndex + 1);
					});

					$("#my_budget").change(function() {
						slider_budget.slider("value", this.selectedIndex + 1);
					});

					$( "#settings_form_trigger" ).click(function() {
						$( "#settings_form" ).submit();
					});
				});
			</script>

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button id="settings_form_trigger" type="button" class="btn btn-primary">Save changes</button>
		</div>
	</div>
</div>
