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
		url:"\/watermelon\/melons\/random_pair.json"}
		);
}

function reloadImages(data){
	$("#left").attr("src",data.left.path);
	$("#left_hidden").attr("value",data.left.id);
	$("#right").attr("src",data.right.path);
	$("#right_hidden").attr("value",data.right.id);
}

function processVote(event){
	showWinner(event);
	submitResults(event);
	setTimeout(function(){processFurther(event)},3000);

}

function submitResults(event){
	var winner_id = $("#"+event.target.id+"_hidden").val();
	var looser_id = $("#left_hidden").val() == winner_id ? $("#right_hidden").val() : $("#left_hidden").val();
	var is_left_winner = $("#left_hidden").val() == winner_id;
	$.ajax({
		async:false, 
		dataType:"json", 
		success:function (data, textStatus) {showResults(is_left_winner,data);}, 
		url:"\/watermelon\/wins\/results.json?winner="+winner_id+"&looser="+looser_id}
		);
}

function showResults(is_left_winner,data){
	if(is_left_winner){
		$("#left_result").text(data.winner_count);
		$("#right_result").text(data.looser_count);
	}else{
		$("#left_result").text(data.looser_count);
		$("#right_result").text(data.winner_count);
	}
	$("#right_result").toggleClass('hidden');
	$("#left_result").toggleClass('hidden');
}

function processFurther(event){
	updateImages();
	$("#right_result").toggleClass('hidden');
	$("#left_result").toggleClass('hidden');
	$(event.target).toggleClass('winner');
	locked = false;
}

$('#left').click(function(e){if(!locked){processVote(e);};});
$('#right').click(function(e){if(!locked){processVote(e);};});
updateImages();
});

