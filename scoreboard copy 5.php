<div class="table-title br-clr-important">
	<span class="">Scoreboard</span>
</div>

<?php if( !empty( $data->br->head2head[ 'scoreboard' ] ) ): $match = $data->br->head2head[ 'scoreboard' ]; ?>
							
	<div class="headline-layout-info">
		<div class="headline-info p-3 ">
			
			<div class="d-flex align-items-start justify-content-center gap-4 flex-xs-column align-items-xs-center">
			
				<div class="headline-team d-flex align-items-center justify-content-center gap-2 gap-xs-0 flex-xs-wrap flex-xs-row">
		
	
					<?php $team1 = $match->teams->home; ?>
					<?php $team2 = $match->teams->away; ?>
					<div class="headline-team-logo me-xs-2">
						<img src="https://cdnimages3.gcdn.co/HRJLWPLB/images/config_logos_v2/scores24:t:<?php echo $team1->uid; ?>.png" class="large" alt="">
					</div>

					<div class="ui dropdown h2h floating center d-flex align-items-center justify-content-center">
			            <input type="hidden" name="h2h_1" value="<?php echo $team1->uid; ?>">
			            <div class="default text headline-team-name fw-bold title-font br-clr-important text-center lh-sm">
			            	<?php echo $team1->mediumname; ?>		
			            </div>
			            <i class="icon expand ms-2"></i>
			            <div class="menu" style="height: 200px;">
			            	<?php foreach( $data->br->formtable->teams as $item ): ?>
			            		<?php if( !in_array( $item->team->uid, [ $team1->uid, $team2->uid ] ) ): ?>
				            		<div class="item" data-value="<?php echo $item->team->uid; ?>">
				            			<?php echo $item->team->mediumname; ?>		
				            		</div>
				            	<?php endif; ?>
			            	<?php endforeach; ?>
			            </div>
			        </div>

			        <?php /* ?>

					<div class="headline-team-name fw-bold title-font br-clr-important text-center lh-sm">
						<span><?php echo $team1->mediumname; ?></span>
						<i class="icon expand ms-2"></i>
					</div>

					<?php*/ ?>


					<?php if( !empty( $match->currentmanagers->{$team1->uid} ) ): ?>
						<div class="headline-team-manager fw-normal fs-75 my-1 d-flex align-items-center gap-1 br-clr-regular">
							<span class="flag small">
								<!--<img src="//origin.bk6bba-resources.com/ContentCommon/NewFlags/<?php //echo Buffstreams\Betradar_Competition::maybe_alias( $match->currentmanagers->{$team1->uid}[ 0 ]->nationality->name ); ?>.svg" style="width: 16px;">-->
								<img src="https://img-cdn001.akamaized.net/ls/crest/medium/<?php echo $match->currentmanagers->{$team1->uid}[ 0 ]->nationality->a2; ?>.png">
							</span>
							<span><?php echo $match->currentmanagers->{$team1->uid}[ 0 ]->name; ?></span>
						</div>
					<?php endif; ?>

					

				</div>

				<div class="d-flex justify-content-center">
					
					<div class="headline-info-match gap-4 gap-xs-0 title-font br-clr-regular">

						<?php if( !empty( $match->stadium ) ): ?>
							<span class="headline-info-venue d-flex flex-column fs-6 fw-500">
								<span><?php echo $match->stadium->name; ?></span>
								<span><?php //echo $stats->next->stadium->country; ?></span>
								<span><?php //echo $stats->next->stadium->city; ?></span>	
							</span>
						<?php endif; ?>

						<span class="headline-info-date d-flex flex-column">

							<div class="d-flex align-items-center">
								<span class="headline-info-day">
									<?php echo date( 'd F', $match->_dt->uts ); ?>		
								</span>
								<span class="headline-info-time ms-1">
									<?php echo date( 'H:i', $match->_dt->uts ); ?>		
								</span>
							</div>

							<?php if( $match->matchstatus == 'live' ): ?>
								<span class="headline-info-time">
									<?php $t1 = $match->p == 2 ? 45 : 0; ?>
									<?php $cm = round( ( time( ) - $match->ptime ) / 60 ); ?>
									<?php echo $match->p . 'nd half ' . ( $t1 + $cm ) . '\''; ?>	
								</span>
							<?php else: ?>
								<span class="headline-info-time">
									<?php echo $match->status->name; ?>	
								</span>
							<?php endif; ?>
							
						</span>


						

						
						<?php if( !empty( $match->result->home ) ): ?>
							<div class="headline-info-score">
								<span class="headline-team-score fw-500 fs-4"><?php echo $match->result->home; ?></span>
								<span class="headline-info-divider fw-500 fs-4">:</span>
								<span class="headline-team-score fw-500 fs-4"><?php echo $match->result->away; ?></span>
							</div>
						<?php endif; ?>

						<?php if( !empty( $match->referees ) ): ?>
							<div class="headline-info-referee d-flex align-items-center gap-1">
								<span class="flag small">
									<img src="//origin.bk6bba-resources.com/ContentCommon/NewFlags/<?php echo $match->referees[ 0 ]->nationality->name; ?>.svg" style="width: 16px;">
								</span>
								<span><?php echo $match->referees[ 0 ]->name; ?></span>
							</div>
						<?php endif; ?>
					
					</div>

				</div>
				

				<div class="headline-team d-flex align-items-center justify-content-center gap-2 gap-xs-0 flex-xs-wrap flex-xs-row">

					<?php $team2 = $match->teams->away; ?>
					
					<div class="headline-team-logo me-xs-2">
						<img src="https://cdnimages3.gcdn.co/HRJLWPLB/images/config_logos_v2/scores24:t:<?php echo $team2->uid; ?>.png" class="large" alt="">
					</div>

					<div class="ui dropdown h2h floating center d-flex align-items-center justify-content-center">
			            <input type="hidden" name="h2h_2" value="<?php echo $team2->uid; ?>">
			            <div class="default text headline-team-name fw-bold title-font br-clr-important text-center lh-sm">
			            	<?php echo $team2->mediumname; ?>		
			            </div>
			            <i class="icon expand ms-2"></i>
			            <div class="menu" style="height: 200px;">
			            	<?php foreach( $data->br->formtable->teams as $item ): ?>
			            		<?php if( !in_array( $item->team->uid, [ $team1->uid, $team2->uid ] ) ): ?>
				            		<div class="item" data-value="<?php echo $item->team->uid; ?>">
				            			<?php echo $item->team->mediumname; ?>		
				            		</div>
				            	<?php endif; ?>
			            	<?php endforeach; ?>
			            </div>
			        </div>

			        <?php /*

					<div class="headline-team-name fw-bold title-font br-clr-important text-center lh-sm">
						<span><?php echo $team2->mediumname; ?></span>
						<i class="icon expand ms-2"></i>
					</div>

					*/ ?>

					<?php if( !empty( $match->currentmanagers->{$team2->uid} ) ): ?>
						<div class="headline-team-manager fw-normal fs-75 my-1 d-flex align-items-center gap-1 br-clr-regular">
							<span class="flag small">
								<img src="//origin.bk6bba-resources.com/ContentCommon/NewFlags/<?php echo $match->currentmanagers->{$team2->uid}[ 0 ]->nationality->name; ?>.svg" style="width: 16px;">
								<!--<img src="https://img-cdn001.akamaized.net/ls/crest/medium/<?php //echo $stats->next->manager->away->nationality->a2; ?>.png">-->
							</span>
							<span><?php echo $match->currentmanagers->{$team2->uid}[ 0 ]->name; ?></span>
						</div>
					<?php endif; ?>

				</div>

			</div>


		</div>
	</div>

<?php endif; ?>