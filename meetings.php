<div class="table-title br-clr-important">
	<span class="">Last Meetings</span>
</div>


<div class="comparison-teams-list d-flex flex-column gap-2">
		
<div class="comparison-teams-list-content d-flex flex-column">

	<?php foreach( $data->br->head2head[ 'lastmeetings' ] as $item ): ?>

		<div class="line">

			<div class="line-match-info">

				<div class="line-match-info-top">

					<div class="line-match-info-left">
						<span><?php echo date( 'd/m/y', $item->time->uts ); ?></span>
					</div>

					<div class="line-match-info-center">

						<span class="line-match-info-team-name fs-75">
							<?php echo $data->br->head2head[ 'teams' ][ $item->homeuniqueteamid ]->name; ?>
							<img src="https://cdnimages3.gcdn.co/HRJLWPLB/images/config_logos_v2/scores24:t:<?php echo $item->homeuniqueteamid; ?>.png" width="18px">
						</span>

						<span class="line-match-info-result">
							<span class="additional-info"></span>
							<span class="scores-info">
								<?php echo $item->result->home ?? '-'; ?>:<?php echo $item->result->away ?? '-'; ?>
							</span>
							<span class="additional-info"></span>
						</span>

						<span class="line-match-info-team-name fs-75">
								<img src="https://cdnimages3.gcdn.co/HRJLWPLB/images/config_logos_v2/scores24:t:<?php echo $item->awayuniqueteamid; ?>.png" width="18px">
								<?php echo $data->br->head2head[ 'teams' ][ $item->awayuniqueteamid ]->name; ?>

						</span>

					</div>

					<div class="line-match-info-right">
						<span><?php echo $item->tournament->name; ?></span>
					</div>

				</div>

			</div>

		</div>

	<?php endforeach; ?>

</div>

</div>


