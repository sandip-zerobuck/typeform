

						</div>

						
					</div>
					<!-- /main charts -->

					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2021. <a href="#">Typeform</a> by <a href="javascript:void(0)" target="_blank">Zerobuck</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	<?php $this->load->view('admin/message'); ?>
	<script type="text/javascript">

		$(document).ready(function(){
			
/*$('.date').datepicker({
  multidate: true,
	format: 'dd-mm-yyyy',startDate: "dateToday"
});*/

		});


		function show_notify(text, bg_class) {
			console.log(text+ "......."+bg_class);
			new PNotify({
	            text: text,
	            addclass: bg_class
	        });
		}
	</script>
</body>
</html>
