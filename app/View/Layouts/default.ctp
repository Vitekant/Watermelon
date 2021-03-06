<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Watermelon');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('menu');
		echo $this->Html->css('main');
		echo $this->Html->css('jquery-ui');
		echo $this->Html->css('jquery-ui.structure');
		echo $this->Html->css('jquery-ui.theme');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('jquery');
		echo $this->Html->script('jquery-ui');
		echo $this->Html->script('analytics');
	?>
	<script type="text/javascript">
	 	var RecaptchaOptions = {
	    theme : 'blackglass'
		 };
	 </script>
</head>
<body>
	<div id="container">
		<div id="header">
			<?php
			$logo = $this->Html->image('logo.png', array("id"=>"logo"));
			echo $this->Html->link($logo,
			    array(
			        'controller' => 'melons',
			        'action' => 'watermelon'
			    	),
			    array('escape' => false)
			);
			?>
			<div id='cssmenu'>
<ul>
   <li id="menu-random" class='active'>
	   <?php echo $this->Html->link(
	    'Random',
	    array(
	        'controller' => 'melons',
	        'action' => 'watermelon'
	    	)
		);
			?>
   </li>
   <li id="menu-top10">	   
   		<?php echo $this->Html->link(
	    'Top10',
	    array(
	        'controller' => 'melons', 
	        'action' => 'top10'
	    	)
		);
		?>
	</li>
      <li id="menu-upload">	   
   		<?php echo $this->Html->link(
	    'Upload',
	    array(
	        'controller' => 'melons',
	        'action' => 'upload'
	    	)
		);
		?>
	</li>
   <!--- <li class='last'><a href='#'><span>Contact</span></a></li> --->
</ul>
</div>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<div id="disclaimer">
			All content presented in service is the sole responsibility of the person who uploaded it. <br/>
			We may not monitor or control the content published via the service and, we cannot take responsibility. <br/>
			If you believe that content in service infiringes your copyrights, please inform us.
			</div>
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php //echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
	<?php echo $this->Js->writeBuffer(); ?>
</body>
</html>
