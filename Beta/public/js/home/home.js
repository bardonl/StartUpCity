$(document).ready(function(){
	$(".signup_button").click(function() {
		$(".overlay_signup").show();
		$("#overlay_bg").removeClass( "hidden" ).addClass( "visible" );
	});

	$(".signin_button").click(function() {
		$(".overlay_signin").show();
		$("#overlay_bg").removeClass( "hidden" ).addClass( "visible" );
	});

	$(".close_popup").click(function() {
		$(".overlay").hide();
		$("#overlay_bg").removeClass( "visible" ).addClass( "hidden" );
		$('.overlay_signin').css({"animation-name": "moveup" });
		$('.overlay_signup').css({"animation-name": "moveup" });
	});

	$(".to_signin").click(function() {
		$(".overlay_signup").hide();
		$(".overlay_forgot").hide();
		$('.overlay_signin').css({"animation-name": "moveleft" });
		$(".overlay_signin").show();
	});

	$(".to_signup").click(function() {
		$(".overlay_signin").hide();
		$(".overlay_forgot").hide();
		$('.overlay_signup').css({"animation-name": "moveleft" });
		$(".overlay_signup").show();
	});

	$(".forgot_password").click(function() {
		$(".overlay_signin").hide();
		$(".overlay_signup").hide();
		$('.overlay_forgot').css({"animation-name": "moveleft" });
		$(".overlay_forgot").show();
	});

	$(".close_notification").click(function() {
		$(".notification").slideUp("200");
	});
});
