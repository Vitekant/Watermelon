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
			<?php echo h($melon['Melon']['path']); ?>
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
	</ul>
</div>
