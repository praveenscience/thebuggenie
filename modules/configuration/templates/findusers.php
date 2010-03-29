<?php if ($too_short): ?>
	<div style="padding: 3px; margin-top: 5px; font-weight: normal; font-size: 14px;" class="faded_medium">
		<?php echo __('Please enter something to search for'); ?>
	</div>
<?php else: ?>
	<div style="padding: 3px; margin-top: 5px; font-weight: normal; font-size: 14px;" class="faded_medium">
		<?php echo __('%count% users found when searching for "%searchstring%"', array('%count%' => "<span class=\"find_users_num_results\">{$total_results}</span>", '%searchstring%' => $findstring)); ?>
	</div>
	<?php if ($total_results > 0): ?>
		<table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-top: 5px;">
			<thead>
				<tr>
					<th style="width: 20px;">&nbsp;</th>
					<th><?php echo __('Username'); ?></th>
					<th><?php echo __('Real name (nickname)'); ?></th>
					<th><?php echo __('E-mail'); ?></th>
					<th><?php echo __('Actv.'); ?></th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user): ?>
				<tr class="canhover_light" id="users_results_user_<?php echo $user->getID(); ?>" onclick="$('users_results_user_<?php echo $user->getID(); ?>').toggleClassName('selected_green');">
					<?php include_template('finduser_row', array('user' => $user)); ?>
				</tr>
				<tr class="canhover_light" id="users_results_user_<?php echo $user->getID(); ?>_edit" style="display: none;">
					<?php include_template('finduser_row_editable', array('user' => $user)); ?>
				</tr>
				<tr id="users_results_user_<?php echo $user->getID(); ?>_permissions" style="display: none;">
					<td colspan="4"></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>