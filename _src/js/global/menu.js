$(function() {
	$('.outer-nav .nav-icon').click(function() {
		clearTimeout(timeout1);
		clearTimeout(timeout2);
		clearTimeout(timeout3); 
		selectMenuItem(this); 
	});

	var urlpieces = document.URL.split("/");
	var page = "";
	if(urlpieces.length > 3){
		page = urlpieces[3];
	}

	if(page == ""){
		if($(".nav-icon.selected").length)
			selectMenuItem($(".outer-nav .nav-icon.selected").first());
		else
			selectMenuItem($(".outer-nav .nav-icon").first());
	} else {
		if($(".nav-icon."+page).length)
			selectMenuItem($(".outer-nav .nav-icon."+page));
		else {
			window.location.href="/pages/404.html";
		}
	}

	// startServer();
	checkLog(window.location.origin+"/_src/_logs/terraria.log");
});

var timeout1 = null;
var timeout2 = null;
var timeout3 = null;

function selectMenuItem(mitem) {
	var time = 200;
	window.history.pushState({}, "Pixelchata • " + $(mitem).data('tab'), "/"+$(mitem).data('tab'));

	$('.outer-nav .nav-icon').removeClass('selected');
	$(mitem).addClass('selected');

	$('.page').addClass('shrink');
	timeout1 = setTimeout(function(){ $('.page').addClass('hide'); }, time);
	timeout2 = setTimeout(function(){
		$('.page.'+$(mitem).data('tab')).removeClass('hide');
		timeout3 = setTimeout(function() { 
			$('.page.'+$(mitem).data('tab')).removeClass('shrink');
		}, time);
	}, time + 1);

	return false;
}

function login() {
	var useremail = $("#user-email").val();
	var userpassw = $("#user-passw").val();

	$.ajax({
		type: "POST",
		url: "/_src/php/login-backend.php",
	  	data: {
	  		email: useremail,
	  		password: userpassw
	  	},
	  	success: function(data, status){
			if(data == "success"){
				$('.outer-nav').removeClass("before-login");
				$('.login-form').css("display", "none");
			}
		}
	});
}



