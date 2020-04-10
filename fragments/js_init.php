<?php

	$channelId = -1;

	$filename = strtolower(basename($_SERVER["PHP_SELF"]));

	switch ($filename) {

		case "index.php":

			$channelId = 0;

			break;

		case "products.php":

		case "product.php":

		case "cases.php":

			$channelId = 1;

			break;

		case "dev.php":

		case "applications.php":

		case "application.php":

			$channelId = 2;

			break;

		case "downloads.php":

		case "download.php":

		case "ver.php":

		case "file.php":

		case "appform.php":

		case "reg_user.php":

		case "reg_distributor.php":

		case "reg_developer.php":

			$channelId = 3;

			break;

		case "news.php":

		case "news_detail.php":

			$channelId = 4;

			break;

		case "partner.php":

			$channelId = 5;

			break;

		case "profile.php":

		case "network.php":

		case "sitemap.php":

			$channelId = 6;

			break;

	}

?>

// current channel id

var channelId = <?php echo $channelId ?>;


// nav

var popupCount = 0;

var popupId = 0;

var restoreDelay = 20;

var restore = function(id) {

	if (popupCount > 0) return;

	if (id != channelId) $("div.nav ul img").get(id).src = "img/" + $($("div.nav > ul > li > a").get(id)).attr("class") + "a.jpg";

	$($("div.nav > ul > li > a").get(id)).closest("li").css("overflow", "hidden");

}


$(function() {

	// set current channel

	var img = $($("div.nav img").get(channelId));

	img[0].src = "img/" + img.closest("a").attr("class") + "b.jpg"; 

	$("a.dummy").click(function() {return false;});

	// nav

	$("div.nav > ul > li > a").mouseover(function() {

		var id = $("div.nav > ul > li > a").index(this);

		if (popupId != id) {

			popupCount = 0;

			restore(popupId);

		}

		popupId = id;

		$("img", this)[0].src = "img/" + $(this).attr("class") + "b.jpg";

		$(this).closest("li").css("overflow", "visible");

		popupCount++;

	});

	$("div.nav > ul > li > a").mouseout(function() {

		popupCount--;

		window.setTimeout("restore(" + $("div.nav > ul > li > a").index(this) + ")", restoreDelay);

	});

	$("div.nav ul ul").hover(

		function() {

			popupCount++;

		},

		function() {

			popupCount--;

			window.setTimeout("restore(" + $("div.nav > ul > li").index($(this).closest("li")[0]) + ")", restoreDelay);

		}

	);

	

	

	// 语言

	$("div.a dd a").click(function() {

		if ($("div.a dt div").is(".close")) $("div.a dt div").removeClass("close");

		else $("div.a dt div").addClass("close");

	});

	

	$("div.a dt a:first").click(function() {

		if ($(this).closest("div").is(".close")) $(this).closest("div").removeClass("close");

		else $(this).closest("div").addClass("close");

		return false;

	});

	

	$(document).click(function() {

		$("div.a dt div").addClass("close");

	});

	

	

	// search

	$("input#search").focus(function() {

		if ($(this).val() == "Search site") $(this).val("");

	});

	$("input#search").blur(function() {

		if ($(this).val() == "") $(this).val("Search site");

	});

});

