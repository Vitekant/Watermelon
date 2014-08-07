<div class="melons index">
	<h2><?php echo __('Melons'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo 'id'; ?></th>
			<th><?php echo 'path'; ?></th>
			
	</tr>
	</thead>
	<tbody>
	<?php foreach ($melons as $melon): ?>
	<tr>
		<td><?php echo h($melon['Melon']['id']); ?>&nbsp;</td>
		<td><?php echo h($melon['Melon']['path']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $melon['Melon']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $melon['Melon']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>