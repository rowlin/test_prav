$(function(){
	
	var note = $('#note'),
		ts = new Date(2017, 0, 19),
		now = new Date();

	if (now.getTime() < ts.getTime()) {
		ts = now.getTime() + (ts.getTime() - now.getTime());
	}
		
	$('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += "Дней: " + days +", ";
			message += "часов: " + hours + ", ";
			message += "минут: " + minutes + " и ";
			message += "секунд: " + seconds + " <br />";

			
			note.html(message);
		}
	});
	
});
