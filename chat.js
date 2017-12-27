$(document).ready(function () 
{
	var Interval = 150;
	var $userName = $("#userName");
	var $chatout = $("#chatout");
	var $chatinput = $("#chatinput");
	var $send = $("#send");

	function sendMsg()
	{
		var usernameString = $userName.val();
		var chatinputString = $chatinput.val();
		$.get("./write.php", 
		{
			username: usernameString,
			text: chatinputString
		});
		$userName.val("");
		retrieveMsg();

	}
	function retrieveMsg() 
	{
		$.get("./read.php", function(data)
		{
			$chatout.html(data);
		});
	}

	$send.click(function()
	{
		sendMsg();
	});

	setInterval(function()
	{
		retrieveMsg();
	},Interval);
});