<?php

	$promotions_height = ( count( $data->br->head2head[ 'positionhistory' ]->promotions ) * 20 ) + 20;
	$th = 20;
	$round_text_height = 25;
	$offset_bottom = $promotions_height + $round_text_height;
	$graphic_height = 430;

	$offset_left = 30;
	$offset_right = 10;
	$offset_top = 0;
	$roundcount = $data->br->head2head[ 'positionhistory' ]->roundcount;
	$roundcount = $data->br->formtable->currentround + ( $data->br->formtable->currentround % 2 );
	$teamcount = $data->br->head2head[ 'positionhistory' ]->teamcount;
	$viewBoxWidth = 1200;
	$viewBoxHeight = $graphic_height + $offset_bottom;
	
	$real_height = $viewBoxHeight - $offset_bottom - $offset_top;
	$real_width = $viewBoxWidth - $offset_left - $offset_right;
	//$step_x = ( $real_width ) / ( $roundcount / 2 );
	$step_x = ( $real_width ) / ( ($roundcount - 1) / 1 );
	$step_y = ( $real_height ) / ( $teamcount );

	$bottom = $offset_top + $real_height;
	$op = 0;


?>

<div class="table-title br-clr-important">
	<span class="">Position History</span>
</div>

<svg width="100%" viewBox="0 0 <?php echo $viewBoxWidth; ?> <?php echo $viewBoxHeight; ?>" xmlns="http://www.w3.org/2000/svg">

	<g>
		
		<g class="graphics-background-contrast-medium-stroke" stroke="#84a0d0">
			<?php for( $i = 0; $i <= $roundcount / 1; $i++ ): ?>
				<?php //if( $i > 0 ): ?>
					<line x1="<?php echo $offset_left + ( $i * $step_x ); ?>" y1="<?php echo $offset_top + $step_y; ?>" x2="<?php echo $offset_left + ( $i * $step_x ); ?>" y2="<?php echo $offset_top + $real_height; ?>"></line>
				<?php //endif; ?>
			<?php endfor; ?>
		</g>

		<g class="graphics-background-contrast-medium-stroke" stroke="#84a0d0">
			<?php for( $i = 0; $i <= $teamcount; $i++ ): ?>
				<?php if( $i > 0 ): ?>
					<line x1="<?php echo $offset_left; ?>" y1="<?php echo $offset_top + ( $i * $step_y ); ?>" x2="<?php echo $offset_left + $real_width; ?>" y2="<?php echo $offset_top + ( $i * $step_y ); ?>"></line>
				<?php endif; ?>
			<?php endfor; ?>
		</g>

		<g class="graphics-text-regular-fill">
			<?php for( $i = 0; $i < $roundcount / 1; $i++ ): ?>
				<?php if( true ): ?>
					<text x="<?php echo $offset_left + ( $i * $step_x ); ?>" y="<?php echo $offset_top + $real_height + $round_text_height; ?>" transform="" direction="ltr" dir="ltr" style="text-anchor: middle; font-size: 14px;"><?php echo ($i * 1) + 1; ?></text>
				<?php endif; ?>
			<?php endfor; ?>
		</g>

		<g class="graphics-text-regular-fill">
			<?php for( $i = 0; $i <= $teamcount; $i++ ): ?>
				<?php if( $i > 0 ): ?>
					<text x="10" y="<?php echo $offset_top + ( $i * $step_y ); ?>" transform="" direction="ltr" dir="ltr" style="alignment-baseline: central; text-anchor: middle; font-size: 14px;"><?php echo $i; ?></text>
				<?php endif; ?>	
			<?php endfor; ?>
		</g>


		<?php /*if( !empty( $data->br->head2head[ 'positionhistory' ]->positiondata ) ): ?>
			<?php foreach( $data->br->head2head[ 'positionhistory' ]->promotions as $name => $item ): ?>
				<rect x="<?php echo $offset_left; ?>" y="<?php echo $offset_top + ( $step_y * $item[ 'positions' ][ 0 ] ) - 10; ?>" width="1.75" height="<?php echo $step_y * ( count( $item[ 'positions' ] ) ) - ( array_key_last( $data->br->head2head[ 'positionhistory' ]->promotions ) == $name ? 10 : 0 ); ?>" fill="<?php echo $item[ 'color' ]; ?>"  stroke="<?php echo $item[ 'color' ]; ?>" ></rect>
			<?php endforeach; ?>
		<?php endif;*/ ?>

		<?php if( !empty( $data->br->head2head[ 'positionhistory' ]->promotions ) ): ?>
			<?php foreach( $data->br->head2head[ 'positionhistory' ]->promotions as $name => $item ): ?>
				<rect x="<?php echo $offset_left - 2; ?>" y="<?php echo $offset_top + ( $step_y * $item[ 'positions' ][ 0 ] ); ?>" width="1.75" height="<?php echo $step_y * ( count( $item[ 'positions' ] ) ) - ( array_key_last( $data->br->head2head[ 'positionhistory' ]->promotions ) == $name ? $step_y : 0 ); ?>" fill="<?php echo $item[ 'color' ]; ?>"  stroke="<?php echo $item[ 'color' ]; ?>" ></rect>
			<?php endforeach; ?>
		<?php endif; ?>


		<?php if( !empty( $data->br->head2head[ 'positionhistory' ]->positiondata ) ): ?>

			<g class="graphics-text-regular-fill" transform="translate(0, 30)">

				<?php foreach( $data->br->head2head[ 'positionhistory' ]->promotions as $name => $item ): ?>

					<g transform="translate(<?php echo $offset_left; ?>, <?php echo $m1 = !empty( $m1 ) ? $m1 + $th : $bottom + $th; ?>)">
						<rect y="0" width="10" height="10" stroke="<?php echo $item[ 'color' ]; ?>" fill="<?php echo $item[ 'color' ]; ?>" ></rect>
						<text x="20" y="10" transform="" direction="ltr" dir="ltr" style="font-size: 14px;"><?php printf( '%s %s', $name, $item[ 'position' ] ); ?></text>
					</g>

				<?php endforeach; ?>

				<?php foreach( $data->br->head2head[ 'positionhistory' ]->teams as $id => $team ): ?>

					<g transform="translate(610.56, <?php echo $m2 = !empty( $m2 ) ? $m2 + $th : $bottom + $th; ?>)">
						<circle cy="6" r="5" class="graphics-opponent-<?php echo (++$op); ?>" style="stroke-width: 1;"></circle>
						<text x="10" y="10" transform="" direction="ltr" dir="ltr" style="font-size: 14px;"><?php echo $team->name; ?></text>
					</g>

				<?php endforeach; ?>

			</g>

		<?php endif; ?>


		<?php if( !empty( $data->br->head2head[ 'positionhistory' ]->currentseason ) ): $op = 0; ?>

			<?php foreach( $data->br->head2head[ 'positionhistory' ]->currentseason as $id => $positions ): ++$op; ?>

				<?php $polyline = [ ]; ?>

				<?php foreach( $positions as $i => $position ): ?>

					<?php $cx = $offset_left + ( ( $step_x / 1 ) * $position->round - $step_x ); ?>
					<?php $cy = $offset_top + ( $step_y * $position->position ); ?>
					<circle cx="<?php echo $cx; ?>" cy="<?php echo $cy; ?>" r="3" class="graphics-opponent-<?php echo ($op); ?>" style="stroke-width: 3;"></circle>
					<?php $polyline[ ] = sprintf( '%s,%s', $cx, $cy ); ?>

				<?php endforeach; ?>

				<polyline points="<?php echo implode( ' ', $polyline ); ?>" class="graphics-opponent-<?php echo ($op); ?>" style="stroke-width: 3; fill: none;"></polyline>

			<?php endforeach; ?>

		<?php endif; ?>



	</g>

</svg>