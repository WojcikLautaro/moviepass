<?php
use Models\PopupAlert;
use Models\Cinema as Cinema;
include('navbaradmin.php');
?>
<main class="d-flex  justify-content-center ">
	<div class="content">
		<header class="text-center">
			<h2 class="fuente4 text-center">Cinema: </h2>

			<form method="POST">
				<div class="p-2">
					<button formaction="<?php echo FRONT_ROOT ?>Cinema" class="btn btn-secondary" type="submit" name="action" value="register"> Back </button>
				</div>
				<?php
				$cinemaFound=new Cinema();
				if (empty($foundCinema)) {
				
					$popupAlert=new PopupAlert(["Message:","Cinema dont found"]);
					$popupAlert->Show();
				} else {
					?>


				</header>
				<div class="login-form bg-dark-alpha p-5 bg-light">
					<section>
						<br>                         
						<div class="form-group">
							<div class="form-group">
								<br>
								<input type="text" name="id"  value="<?php echo $foundCinema->getcinemaId() ?>"  required class="form-control"readonly="readonly">
								<br>
								<input type="text" name="name" value="<?php echo $foundCinema->getnameCinema() ?>" required class="form-control"readonly="readonly" >
								<br>
								<input type="text" name="adress" value="<?php echo $foundCinema->getaddress() ?>" required class="form-control"readonly="readonly">
								<br>
								<input type="text" name="openingTime" value="<?php echo $foundCinema->getopeningTime() ?>"  required class="form-control"readonly="readonly">
								<br>
								<input type="text" name="closingTime" value="<?php echo $foundCinema->getclosingTime()?>" required class="form-control"readonly="readonly">
								<br>
								<input type="text" name="ticketValue" value="<?php echo $foundCinema->getTicketValue() ?>" required class="form-control"readonly="readonly">
								<br>
								<input type="text" name="capacity" value="<?php echo $foundCinema->getcapacity() ?>" required class="form-control"readonly="readonly">
								<br>
							</div>
						</div>
					</section>
				</div>
			</div>
		</main>
		<?php
	}
	?>



