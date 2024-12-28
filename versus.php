<div class="table-title br-clr-important">
	<span class="">History since <?php echo $data->br->head2head[ 'versusmatch' ][ 'home' ]->oldestmatchdate
; ?></span>
</div>

<div class="py-3 px-1">

	<div class="ui tabs light d-flex gap-2 justify-content-center">
		<?php foreach( $data->br->head2head[ 'versusmatch' ][ 'home' ]->totalmatches as $tab => $item ): ?>
			<?php $active = $tab == 'total' ? ' active' : ''; ?>
			<span class="tips item br-clr-regular<?php echo $active; ?>" data-tab="<?php echo $tab . '_versus'; ?>">
				<span><?php echo mb_convert_case( $tab, MB_CASE_TITLE, 'UTF-8' ); ?></span>
			</span>
		<?php endforeach; ?>
	</div>

	<?php $versus = $data->br->head2head[ 'versusmatch' ]; ?>
	<?php foreach( $versus[ 'home' ]->totalmatches as $tab => $item ): ?>
		<?php $active = $tab == 'total' ? ' active' : ''; ?>
		<div class="ui tab segment mt-3<?php echo $active; ?> p-3 m-p-0" data-tab="<?php echo $tab . '_versus'; ?>">

			<div class="d-flex align-items-start justify-content-between" >

				<div class="d-flex flex-row align-items-center justify-content-center" style="flex: 33.333%">
					<div class="d-flex flex-column gap-4 flex-grow-0">

						
						<?php $svg = $data->br->head2head[ 'recentform' ][ 'home' ]->diagram->{$tab}->svg; ?>
						<div class="d-flex justify-content-center">
							<div class="round-diagram-svg-container">
								<svg class="round-diagram-sector" viewBox="0 0 110 110"><defs><filter id="round"><feComposite operator="atop"></feComposite></filter></defs><path class="draw-color" filter="url(#round)" pathLength="100" d="M3,55a52,52 0 1,0 104,0a52,52 0 1,0 -104,0"></path><path class="win-color" stroke-dasharray="<?php echo $svg->win; ?>" stroke-dashoffset="0" filter="url(#round)" pathLength="100" stroke-linecap="round" d="M3,55a52,52 0 1,0 104,0a52,52 0 1,0 -104,0"></path><path class="lose-color" stroke-dasharray="<?php echo $svg->lose; ?>" stroke-dashoffset="<?php echo '-' . $svg->offset; ?>" pathLength="100" filter="url(#round)" stroke-linecap="round" d="M3,55a52,52 0 1,0 104,0a52,52 0 1,0 -104,0"></path></svg>

								<div class="round-diagram-win-perc">
									<span><?php echo $svg->cf . '%'; ?></span>
									<span class="round-diagram-win-perc-caption">Current form</span>
								</div>
							</div>
						</div>

						<div class="d-flex justify-content-center">
							<div class="win-defeat-squads">
								<?php foreach( $data->br->head2head[ 'recentform' ][ 'home' ]->lastmatchesform->{$tab} as $type ): ?>
									<span class="squad squad-<?php echo str_replace( [ 'D', 'W', 'L' ], [ 'draw', 'win', 'lose' ], $type->value ); ?>">
										<?php echo $type->value; ?>
									</span>
								<?php endforeach; ?>
							</div>
						</div>

						<div class="br-clr-important fs-8 d-flex flex-column text-center team-facts">
							
							<?php if( !empty( $versus[ 'home' ]->highestwin->{$tab} ) ): ?>
								<span><?php printf( 'Highest Win %s:%s', $versus[ 'home' ]->highestwin->{$tab}->home, $versus[ 'home' ]->highestwin->{$tab}->away ); ?></span>
							<?php endif; ?>
							
							<span><?php printf( 'Total Goals %s', $versus[ 'home' ]->totalgoals->{$tab} ); ?></span>
							<span><?php printf( 'Average Goals %s', round( $versus[ 'home' ]->averagegoals->{$tab}, 2 ) ); ?></span>
						</div>



						


					</div>
				</div>

				<div class="d-flex flex-row align-items-center justify-content-center" style="flex: 33.333%">
					<div class="d-flex flex-row gap-3 win-defeat-draw flex-grow-0">

						<div class="d-flex justify-content-center flex-column text-center">
							<span class="fw-bold fs-5 m-fs-75 br-clr-important">
								<?php echo $versus[ 'home' ]->teamwins->{$tab}; ?>		
							</span>
							<span class="br-clr-regular fs-75">
								Wins
							</span>
						</div>

						<div class="d-flex justify-content-center flex-column text-center gap-5">
							<span class="d-flex justify-content-center flex-column">
								<span class="fw-bold fs-5 m-fs-75 br-clr-important">
									<?php echo $versus[ 'home' ]->totalmatches->{$tab}; ?>
									/
									<?php echo $versus[ 'away' ]->totalmatches->{$tab}; ?>		
								</span>
								<span class="br-clr-regular fs-75">
									<?php printf( 'matches <br> since %s', $versus[ 'home' ]->oldestmatchdate ); ?>
								</span>
							</span>

							<span class="d-flex justify-content-center flex-column">
								<span class="fw-bold fs-5 m-fs-75 br-clr-important">
									<?php echo $versus[ 'home' ]->teamdraws->{$tab}; ?>		
								</span>
								<span class="br-clr-regular fs-75">
									Draws
								</span>
							</span>
						</div>

						<div class="d-flex justify-content-center flex-column text-center">
							<span class="fw-bold fs-5 m-fs-75 br-clr-important">
								<?php echo $versus[ 'away' ]->teamwins->{$tab}; ?>		
							</span>
							<span class="br-clr-regular fs-75">
								Wins
							</span>
						</div>

					</div>
				</div>

				<div class="d-flex flex-row align-items-center justify-content-center" style="flex: 33.333%">
					<div class="d-flex flex-column gap-4 flex-grow-0">

						<?php $svg = $data->br->head2head[ 'recentform' ][ 'away' ]->diagram->{$tab}->svg; ?>
						<div class="d-flex justify-content-center">
							<div class="round-diagram-svg-container">
								<svg class="round-diagram-sector" viewBox="0 0 110 110"><defs><filter id="round"><feComposite operator="atop"></feComposite></filter></defs><path class="draw-color" filter="url(#round)" pathLength="100" d="M3,55a52,52 0 1,0 104,0a52,52 0 1,0 -104,0"></path><path class="win-color" stroke-dasharray="<?php echo $svg->win; ?>" stroke-dashoffset="0" filter="url(#round)" pathLength="100" stroke-linecap="round" d="M3,55a52,52 0 1,0 104,0a52,52 0 1,0 -104,0"></path><path class="lose-color" stroke-dasharray="<?php echo $svg->lose; ?>" stroke-dashoffset="<?php echo '-' . $svg->offset; ?>" pathLength="100" filter="url(#round)" stroke-linecap="round" d="M3,55a52,52 0 1,0 104,0a52,52 0 1,0 -104,0"></path></svg>

								<div class="round-diagram-win-perc">
									<span><?php echo $svg->cf . '%'; ?></span>
									<span class="round-diagram-win-perc-caption">Current form</span>
								</div>
							</div>
						</div>

						<div class="d-flex justify-content-center">
							<div class="win-defeat-squads">
								<?php foreach( $data->br->head2head[ 'recentform' ][ 'away' ]->lastmatchesform->{$tab} as $type ): ?>
									<span class="squad squad-<?php echo str_replace( [ 'D', 'W', 'L' ], [ 'draw', 'win', 'lose' ], $type->value ); ?>">
										<?php echo $type->value; ?>
									</span>
								<?php endforeach; ?>
							</div>
						</div>

						<div class="br-clr-important fs-8 d-flex flex-column text-center team-facts">
							<?php if( !empty( $versus[ 'away' ]->highestwin->{$tab} ) ): ?>
								<span><?php printf( 'Highest Win %s:%s', $versus[ 'away' ]->highestwin->{$tab}->home, $versus[ 'away' ]->highestwin->{$tab}->away ); ?></span>
							<?php endif; ?>
							<span><?php printf( 'Total Goals %s', $versus[ 'away' ]->totalgoals->{$tab} ); ?></span>
							<span><?php printf( 'Average Goals %s', round( $versus[ 'away' ]->averagegoals->{$tab}, 2 ) ); ?></span>
						</div>


					</div>
				</div>

			</div>

		</div>
	<?php endforeach; ?>

</div>