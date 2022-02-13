//subtitle
window.addEventListener("load", function(subtitle) {
	document.querySelector('#subtitle').innerHTML = "Anytime, Anywhere, Anything";
}, false);
//iFrame Change
function jsFilter(strInc)
{
	document.getElementById("display").src =  "show" + strInc;
}
//jQuery Search
$("#search").keyup(function () {
	var search_term = $(this).val();
	$.post("search.php", {search_term: search_term}, function(data) {
		$("#search_results").html(data);
	});
});
//Friend Search
$("#friendsearch").keyup(function () {
	var search_term = $(this).val();
	$.post("actualfriendsearch.php", {search_term: search_term}, function(data) {
		$("#search_results").html(data);
	});
});
//resize friend image! jQuery!
$(function(){
    var width = $("#profilepicfortopbar").width()*0.1;
     $("#profilepicfortopbar").css('width',width);
});
//make input box
function newGeneralPost() {
    var element = document.createElement("textarea");
	element.className = "fields";
	element.innerHTML = "What up?";
	element.name = "general";
    document.getElementById("form").appendChild(element);
    var secondElement = document.createElement("input");
    secondElement.type = "submit";
    secondElement.value = "GO!";
    secondElement.className = "buttons";
    document.getElementById("form").appendChild(secondElement);
	document.getElementById("newText").style.visibility = "visible";

}