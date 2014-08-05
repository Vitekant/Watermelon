	<?php echo $this->Html->script('app'); ?>
	<?php echo $this->Html->css('main'); ?>

	<div id="VoitingArea">
	<div id="left_panel" class="panel">
	<?php 
	echo $this->Html->image('yes.jpg', array('id' => 'left', 'class'=>'contestant'));
	echo $this->Form->hidden('left_hidden');
	echo "<br/>";
	echo $this->Html->tag('span', '', array('id'=>'left_result','class' => 'result hidden'));
	?>
	</div>
	<div id="right_panel" class="panel">
	<?php
	echo $this->Html->image('no.jpg', array('id' => 'right', 'class'=>'contestant'));
	echo $this->Form->hidden('right_hidden');
	echo "<br/>";
	echo $this->Html->tag('span', '', array('id'=>'right_result','class' => 'result hidden'));
	?>
	</div>
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
