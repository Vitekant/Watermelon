<script>$("li[id^='menu-']" ).removeClass('active'); $("#menu-top10").toggleClass('active');</script>
<?php echo $this->Html->css('top10'); ?>
<div class="melons index">
	<h2><?php echo __('Top10 Booties'); ?></h2>
	<table cellpadding="0" cellspacing="0" id="top10table" width="600px">
	<thead>
	<tr>
			<!--<th><?php echo 'id'; ?></th>-->
			<th><?php echo 'image'; ?></th>
			<th><?php echo 'score'; ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($melons as $melon): ?>
	<tr>
		<!--<td><?php echo h($melon['Melon']['id']); ?>&nbsp;</td>-->
		<td><?php 
			$src = ltrim($melon['Melon']['path'],"img\/");
			echo $this->Html->image($src); 
			?>&nbsp;
		</td>
		<td><?php echo h($melon['Melon']['score']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>