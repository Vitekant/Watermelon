<script>$("li[id^='menu-']" ).removeClass('active'); $("#menu-upload").toggleClass('active');</script>
<form action="">
Name: <input type="text" name="user"><br>
File: <div id="file"><span class="ui-button-icon-primary ui-icon ui-icon-plusthick fileicon"></span><span id="filetext" class="ui-button-text">
                <span>Add files...</span>
                
            </span><input type="file" id="fileinput"></div>
</form>
<?php echo $this->Html->script('upload'); 
		echo $this->Html->css('main');
	?>