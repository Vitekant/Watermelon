var locked = false;

$( document ).ready(function() {

function showWinner(event){
	locked = true;
	$(event.target).toggleClass('winner');
}

function updateImages(){
	$.ajax({
		async:false, 
		dataType:"json", 
		success:function (data, textStatus) {reloadImages(data);}, 
		url:"\/melons\/random_pair.json"}
		);
}

function reloadImages(data){
	$("#left").attr("src",data.left.path);
	$("#left_hidden").attr("value",data.left.id);
	$("#right").attr("src",data.right.path);
	$("#right_hidden").attr("value",data.right.id);
	$('#canary').attr("value",data.canary);
}

function processVote(event){
	showWinner(event);
	submitResults(event);
	$('#timer').pietimer({
	    seconds: 5,
	    color: 'rgba(255, 255, 255, 0.8)',
	    height: 60,
	    width: 60
	},
	function(e){
		processFurther(event)
	});
	$('#timer').pietimer('start');
	//setTimeout(function(){processFurther(event)},5000);

}

function submitResults(event){
	var winner_id = $("#"+event.target.id+"_hidden").val();
	var looser_id = $("#left_hidden").val() == winner_id ? $("#right_hidden").val() : $("#left_hidden").val();
	var canary = $('#canary').val();
	var is_left_winner = $("#left_hidden").val() == winner_id;
	$.ajax({
		async:false, 
		dataType:"json", 
		success:function (data, textStatus) {showResults(is_left_winner,data);}, 
		url:"\/wins\/results.json?winner="+winner_id+"&looser="+looser_id+"&canary="+canary}
		);
}

function showResults(is_left_winner,data){
	var sum = data.winner_count+data.looser_count;
	if(is_left_winner){
		$("#left_result").text(Math.round(data.winner_count/sum*100)+"%");
		$("#left-cropper").css('height',Math.round((data.winner_count/sum)*400)+"px");
		$("#right_result").text(Math.round(data.looser_count/sum*100)+"%");
		$("#right-cropper").css('height',Math.round((data.looser_count/sum)*400)+"px");
		$("#right").addClass('greyout');
	}else{
		$("#left_result").text(Math.round(data.looser_count/sum*100)+"%");
		$("#left-cropper").css('height',Math.round((data.looser_count/sum)*400)+"px");
		$("#right_result").text(Math.round(data.winner_count/sum*100)+"%");
		$("#right-cropper").css('height',Math.round((data.winner_count/sum)*400)+"px");
		$("#left").addClass('greyout');
	}
	$(".result-wrapper").toggleClass('hidden');
	jQuery({ Counter: 0 }).animate({ Counter: $('#right_result').text() }, {
		  duration: 1000,
		  easing: 'swing',
		  step: function () {
		    $('#right_result').text(Math.ceil(this.Counter));
		  }
		});
	jQuery({ Counter: 0 }).animate({ Counter: $('#left_result').text() }, {
		  duration: 1000,
		  easing: 'swing',
		  step: function () {
		    $('#left_result').text(Math.ceil(this.Counter));
		  }
		});
	//$(".result-wrapper").toggleClass('hidden');
	$("#left-cropper").show("slide", { direction: "down" }, 1000);
	$("#right-cropper").show("slide", { direction: "down" }, 1000);
	//$("#left-cropper").show("slide", { direction: "up" }, 1000);
	//$("#right-cropper").show("slide", { direction: "up" }, 1000);
}

function processFurther(event){
	updateImages();
	$(".result-wrapper").toggleClass('hidden');
	//$("#right_result").toggleClass('hidden');
	//$("#left_result").toggleClass('hidden');
	$("#left").removeClass('greyout');
	$("#right").removeClass('greyout');
	$("#left-cropper").hide();
	$("#right-cropper").hide();
	//$("#left-cropper").hide("slide", { direction: "down" }, 1000);
	//$("#right-cropper").hide("slide", { direction: "down" }, 1000);
	$(event.target).toggleClass('winner');
	locked = false;
}

$('#left').click(function(e){if(!locked){processVote(e);};});
$('#right').click(function(e){if(!locked){processVote(e);};});

updateImages();
});




