<div class="melons index">
	<h2><?php echo __('Melons'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('path'); ?></th>
			<th><?php echo $this->Paginator->sort('approved'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($melons as $melon): ?>
	<tr>
		<td><?php echo h($melon['Melon']['id']); ?>&nbsp;</td>
		<td><?php echo h($melon['Melon']['path']); ?>&nbsp;</td>
		<td><?php echo h($melon['Melon']['approved']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $melon['Melon']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $melon['Melon']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $melon['Melon']['id']), array(), __('Are you sure you want to delete # %s?', $melon['Melon']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Melon'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Wins'), array('controller' => 'wins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Win'), array('controller' => 'wins', 'action' => 'add')); ?> </li>
	</ul>
</div>
