<script>$("li[id^='menu-']" ).removeClass('active'); $("#menu-random").toggleClass('active');</script>
<?php echo $this->Html->script('app'); ?>
<?php echo $this->Html->script('jquery.pietimer'); ?>
<?php echo $this->Form->hidden('canary'); ?>
<div id="voting_area">

<div id="left_panel" class="panel">
	<div class="contestant-image"><?php 
	echo $this->Html->image('blank.png', array('id' => 'left', 'class'=>'contestant'));
	echo $this->Form->hidden('left_hidden');
	//echo "<br/>";?></div>
	<div class="bar-wrapper">
	<div id="left-cropper" class="cropper hidden"><?php echo $this->Html->image('progress-bar.png', array('class'=>'progress-bar')); ?>
	</div>
	<div class="result-wrapper hidden"><span id="left_result">test</span>%</div>
	</div>
	<?php
	//echo $this->Html->tag('span', '', array('id'=>'left_result','class' => 'result hidden'));
	?>
</div>

<div id="timer_panel">
	<div id="timer"></div>
</div>

<div id="right_panel" class="panel">
	<div class="bar-wrapper">
	<div id="right-cropper" class="cropper hidden"><?php echo $this->Html->image('progress-bar.png', array('class'=>'progress-bar')); ?>
	</div>
	<div class="result-wrapper hidden"><span id="right_result">test</span>%</div>
	</div>
	<div class="contestant-image"><?php
	echo $this->Html->image('blank.png', array('id' => 'right', 'class'=>'contestant'));
	echo $this->Form->hidden('right_hidden');
	//echo "<br/>";?></div>

	<?php
	//echo $this->Html->tag('span', '', array('id'=>'right_result','class' => 'result hidden'));
	?></div>
	<?php
	//$function = "if(!locked){showWinner(event); setTimeout(function(){reloadImages(event)},2000);}";
	//$function = "'function(e){alert();}'";
	//$event =  $this->Js->request(
	//    array('controller'=>'melons','action' => 'random_pair.json'),
	//    array('success'=>$function,'async' => true,'type'=>'json')
	//	);

	//$this->Js->get('#img1')->event('click', );
	//$this->Js->get('#img2')->event('click', $event);
	?>
</div>

