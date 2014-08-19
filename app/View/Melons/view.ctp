<div class="melons view">
<h2><?php echo __('Melon'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($melon['Melon']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Path'); ?></dt>
		<dd>
			<?php echo $this->Html->Image($melon['Melon']['path'], array('class'=>'contestant')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved'); ?></dt>
		<dd>
			<?php echo h($melon['Melon']['approved']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Melon'), array('action' => 'edit', $melon['Melon']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Melon'), array('action' => 'delete', $melon['Melon']['id']), array(), __('Are you sure you want to delete # %s?', $melon['Melon']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Melons'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Melon'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Wins'), array('controller' => 'wins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Win'), array('controller' => 'wins', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Wins'); ?></h3>
	<?php if (!empty($melon['Win'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Winner Id'); ?></th>
		<th><?php echo __('Looser Id'); ?></th>
		<th><?php echo __('Count'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($melon['Win'] as $win): ?>
		<tr>
			<td><?php echo $win['id']; ?></td>
			<td><?php echo $win['winner_id']; ?></td>
			<td><?php echo $win['looser_id']; ?></td>
			<td><?php echo $win['count']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'wins', 'action' => 'view', $win['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'wins', 'action' => 'edit', $win['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'wins', 'action' => 'delete', $win['id']), array(), __('Are you sure you want to delete # %s?', $win['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Win'), array('controller' => 'wins', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
