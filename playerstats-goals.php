<div class="table-title br-clr-important">
	<span class="">Player goal statistics</span>
</div>

<div class="d-flex flex-column">

	<div class="playerstats-goals">

		<div class="ui tabs light d-flex gap-2">
			<?php foreach( $data->br->head2head[ 'playerstats' ][ 'topgoals' ][ 'teams' ] as $tab => $players ): ?>
				<?php $active = $tab == array_key_last( $data->br->head2head[ 'playerstats' ][ 'topgoals' ][ 'teams' ] ) ? ' active' : ''; ?>
				<span class="tips item br-clr-regular<?php echo $active; ?>" data-tab="<?php echo $tab . '_players_goals'; ?>">
					<span><?php echo $data->br->head2head[ 'teams' ][ $tab ]->name; ?></span>
				</span>
			<?php endforeach; ?>
		</div>

		<?php foreach( $data->br->head2head[ 'playerstats' ][ 'topgoals' ][ 'teams' ] as $tab => $players ): ?>
		
			<?php $active = $tab == array_key_last( $data->br->head2head[ 'playerstats' ][ 'topgoals' ][ 'teams' ] ) ? ' active' : ''; ?>
		
			<div class="ui tab segment mt-3<?php echo $active; ?>" data-tab="<?php echo $tab . '_players_goals'; ?>">

				<div class="head-row">
					<?php foreach( $data->br->head2head[ 'playerstats' ][ 'topgoals' ][ 'head' ] as $i => $head_item ): ?>
						<div class="head-row-item">
							<span class="flex-fill d-flex align-items-center justify-content-<?php echo $i == 0 ? 'start ps-3' : 'center'; ?>">
								<span class="d-sm-none"><?php echo $head_item[ 'm' ]; ?></span>
								<span class="d-none d-sm-inline"><?php echo $head_item[ 'd' ]; ?></span>	
							</span>
						</div>
					<?php endforeach; ?>
				</div>

				<?php foreach( $players as $item ): ?>

					<div class="row-container">
						<div class="row-item">
							<span class="br-clr-regular fs-7"><?php echo $item->player->position->shortname; ?></span>
							<?php if( !empty( $item->player->nationality ) ): ?>
								<img src="https://img-cdn001.akamaized.net/ls/crest/medium/<?php echo $item->player->nationality->a2; ?>.png" style="width: 16px;">
							<?php endif; ?>
							<span class="fs-75 text-truncate"><?php echo $item->player->name; ?></span>
						</div>
						<div class="row-item">
							<span><?php echo $item->total->matches ?? 0; ?></span>
						</div>
						<div class="row-item">
							<span><?php echo $item->total->goals ?? 0; ?></span>
						</div>
						<div class="row-item">
							<span><?php echo $item->total->penalties ?? 0; ?></span>
						</div>
						<div class="row-item">
							<span><?php echo round( ( $item->total->goals ?? 0 ) / ( $item->total->matches ?? 0 ), 2 ); ?></span>
						</div>
					</div>

				<?php endforeach; ?>

			</div>
		
		<?php endforeach; ?>

	</div>

</div>

