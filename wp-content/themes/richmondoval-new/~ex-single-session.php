<div class="row">
	<div class="col-md-6">
		<?php $instructor = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/instructors/' . $session->InstructorId ); ?>
		<p>Instructor: <br>
			<strong><?= $instructor->FirstName . ' ' . $instructor->LastName; ?></strong>
		</p>

		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet velit non dolor finibus euismod aliquam eget metus. Nullam facilisis nisi eget lacus consequat, venenatis lacinia tellus ullamcorper. Mauris vitae enim urna. Curabitur gravida, sem in cursus luctus, nulla sapien blandit nunc, sed efficitur diam mi id dui.
		</p>
	</div>
	<div class="col-md-6">
		<img src="<?= get_stylesheet_directory_uri() ?>/images/stages/fans.png">
		<div class="first-row">
			<div class="bike coach">
				<div class="bike-num" style="background-color: "></div>
				<span>Coach</span>
			</div>
			<div class="projector">
				<span>Screen</span>
			</div>

		</div>
		<div class="row seven-cols">
			<?php
			//$sessionBikes = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/sessions/' . $session->Id . '/bikes' );
			$sessionBookings = getCurl( $authCode, 'https://stagesflight.com/locapi/v1/sessions/' . $session->Id . '/bookings' );
			$bikesBooked = array();
			foreach ( $sessionBookings as $sessionBooking ) {
				array_push( $bikesBooked, $sessionBooking->Bike->Id );

			}
			//if ( count( $sessionBikes ) > 0 ) {
			//foreach ( $sessionBikes as $bike ) {
			foreach ( $bikes as $bike ) {
				$disabledBike = '';
				if ( in_array( $bike->Id, $bikesBooked ) ) {
					$disabledBike = 'disabled';
				}
				?>

				<div class="col-sm-1">
					<div class="bike <?= $disabledBike; ?>">
						<?php
						$isPower = 'yes';
						if ( ! $bike->IsPower ) {
							$isPower = 'no';
						} ?>
						<!-- <span class="is-power <?/*= $isPower */ ?>"></span>-->
						<div class="bike-num" onclick="bookBike(
							'<?= $authCode; ?>',
						<?= $userId; ?>,
						<?= $session->Id; ?>,
						<?= $bike->Id; ?>,
						<?= $bike->Number; ?>,
							'<?= $session->Name; ?>',
							'<?= $sessionDate; ?>',
							'<?= $sessionTime; ?>')">
							<?= $bike->Number; ?>
						</div>
					</div>
				</div>
				<?php
			}
			//}
			?>
		</div>
		<br>
		<img src="<?= get_stylesheet_directory_uri() ?>/images/stages/fans.png">
	</div>
</div>