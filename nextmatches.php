<div class="table-title br-clr-important">
	<span class="">Next Matches</span>
</div>

<div class="comparison-teams-list d-flex flex-column gap-2">
			
	<div class="comparison-teams-list-content d-flex flex-column">

		<div class="ui tabs light d-flex gap-2">
			<?php foreach( $data->br->head2head[ 'nextmatches' ] as $tab => $team ): ?>
				<?php $active = $tab == array_key_last( $data->br->head2head[ 'nextmatches' ] ) ? ' active' : ''; ?>
				<span class="tips item br-clr-regular<?php echo $active; ?>" data-tab="<?php echo $tab . '_next'; ?>">
					<span><?php echo $data->br->head2head[ 'teams' ][ $tab ]->name; ?></span>
				</span>
			<?php endforeach; ?>
		</div>

		<?php foreach( $data->br->head2head[ 'nextmatches' ] as $tab => $team ): ?>
		
			<?php $active = $tab == array_key_last( $data->br->head2head[ 'nextmatches' ] ) ? ' active' : ''; ?>
		
			<div class="ui tab segment mt-3<?php echo $active; ?>" data-tab="<?php echo $tab . '_next'; ?>">

				<?php foreach( $team->matches as $i => $match ): ?>

					<?php if( $i > 6 ) continue; ?>

					<div class="line">

						<div class="line-match-info">

							<div class="line-match-info-top">

								<div class="line-match-info-left">
									<span><?php echo date( 'd/m/y', $match->time->uts ); ?></span>
								</div>

								<div class="line-match-info-center">

									<span class="line-match-info-team-name fs-75">
										<?php echo $match->teams->home->name; ?>
										<img src="https://cdnimages3.gcdn.co/HRJLWPLB/images/config_logos_v2/scores24:t:<?php echo $match->teams->home->uid; ?>.png" width="18px">
									</span>

									<span class="line-match-info-result">
										<span class="additional-info"></span>
										<span class="scores-info">
											<?php echo $match->result->home ?? '-'; ?>:<?php echo $match->result->away ?? '-'; ?>
										</span>
										<span class="additional-info"></span>
									</span>

									<span class="line-match-info-team-name fs-75">
											<img src="https://cdnimages3.gcdn.co/HRJLWPLB/images/config_logos_v2/scores24:t:<?php echo $match->teams->away->uid; ?>.png" width="18px">
											<?php echo $match->teams->away->name; ?>

									</span>

								</div>

								<div class="line-match-info-right">
									<span><?php echo $team->tournaments->{$match->_tid}->name; ?></span>
								</div>

							</div>

						</div>

					</div>

				<?php endforeach; ?>

			</div>
		
		<?php endforeach; ?>

	</div>

</div>





