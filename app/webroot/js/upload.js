$('#fileinput').change(function(){
    $this = $(this);
    $('#filetext').text($this.val().replace(/^.*(\\|\/|\:)/, ''));
})

$('#file').click(function(){
	$('#fileinput').click();
}).show();