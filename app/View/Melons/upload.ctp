<script>$("li[id^='menu-']" ).removeClass('active'); $("#menu-upload").toggleClass('active');</script>

<form id="form" method="post" action="/melons/upload">
URL: <input type="text" name="image_url"><br>
<!---
File: 
<span class="fileinput-button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button" aria-disabled="false">
	<span class="ui-button-icon-primary ui-icon ui-icon-plusthick">
	</span>
	<span class="ui-button-text">
		<span>Select image</span>
	</span>
	<input type="file" name="image_path">
</span>
--->
<?php 
	require_once(App::path('Vendor')[0].'recaptchalib.php'); 
	$publickey = "6Leiy_gSAAAAANEgfvIHZCc1K7XfaL7N3TXeHNbT";
	echo recaptcha_get_html($publickey);
?>
<span id="upload" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary">Upload</span>

</div>
</form>

<?php echo $this->Html->script('upload'); 
		echo $this->Html->css('main');
	?>