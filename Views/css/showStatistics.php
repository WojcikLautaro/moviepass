<?php
use Models\PopupAlert;
include ('navbaradmin.php');
?>

<div class="modal" tabindex="-1" role="dialog" id="myModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Attention</h5>
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>No results for the given dates</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<main class="d-flex  justify-content-center ">
	<div class="content">
		<header class="text-center">
			<div class="p-2 text-center">
				<form method="POST">
					<div class="p-2">
						<button formaction="<?php echo FRONT_ROOT ?>Cinema/ShowCinemas"
							class="btn btn-secondary" type="submit" name="action"
							value="register">Back</button>
					</div>
				</form>
			</div>
			<br>
			<?php
if ($stats == false) {
    ?>
			<script>
   				 $("#myModal").modal('show');
   				 
   			</script>
	<?php

} else {
    ?>
  
			<h2 class="fuente4 text-center">Statistics </h2>
			<h3 class="p-3 mb-2 bg-dark text-white">from <?php echo $stats->getStartDate(); ?> to   <?php echo $stats->getFinishDate(); ?>  </h3>
			<br>
		</header>
		<div class="table-responsive">
			<table class="table">
				<tbody class="table-hover">
					<tr>
						<td>
							<div class="card text-white  bg-info mb-3"
								style="max-width: 18rem;">
								<div class="card-header">Cinema</div>
								<div class="card-body">
									<h1 class="card-text"><?php echo $stats->getCinemaName();?></h1>
								</div>
							</div>

						</td>

						<td>
							<div class="card text-white bg-success mb-3"
								style="max-width: 18rem;">
								<div class="card-header">Sold tickets</div>
								<div class="card-body">
									<h1 class="card-text"><?php echo $stats->getTicketsSold();?></h1>
								</div>
							</div>

						</td>

						<td>
							<div class="card text-white bg-danger mb-3"
								style="max-width: 18rem;">
								<div class="card-header">Unsold tickets</div>
								<div class="card-body">
									<h1 class="card-text"><?php echo $stats->getUnsoldTickets();?></h1>
								</div>
							</div>

						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<div class="card text-white bg-primary mb-3"
								style="max-width: 18rem;">
								<div class="card-header">Revenue</div>
								<div class="card-body">
									<h1 class="card-text">$<?php echo $stats->getRevenue();?></h1>
								</div>
							</div>
						</td>
						<td></td>
					</tr>
				</tbody>
			</table>

		</div>

		<br>
	</div>

</main>

<?php

    include ('footer.php');
}
?>