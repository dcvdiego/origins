$(document).ready(function() {
    var cloud = $("#startCloud"); 
    function loop() {
    cloud.animate({top: "+=20"}, 1000); cloud.animate({top: "-=20"}, 1000, loop);
}
cloud.click(function () {
    cloud.fadeOut("slow");
    document.getElementById("hidden").style.visibility = "visible";
});
loop();
});
//Username	a9130784
//Password: jishua