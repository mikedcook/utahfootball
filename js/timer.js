
$(document).ready(function($){
	var minuteCount = $('span.dminuteCounter').html();
	var hourCount = $('span.hourCounter').html();
	var dayCount = $('span.dayCounter').html();
	
	setInterval(function() {
		timerSecond();
	}, 1000);
	
	function timerSecond()
	{
		var count = $('span.secondCounter').html();
		
		count=count-1;
		if(dayCount == 0 && hourCount == 0 && minuteCount == 0){
			if (count == -1)
			{
				count=0;
				exit();
			}
		}else{
			if (count == -1)
			{
				count=59;
			}
			$('span.secondCounter').html(count);
			if (count == 59){
				timerMinute();
			}
		}
	};
	
	function timerMinute()
	{
		var count = $('span.minuteCounter').html();
		
		if(dayCount == 0 &&  hourCount == 0 && count == 0){
			minuteCount = 0;
		}else{
			count=count-1;
			if (count == -1)
			{
				count=59;
			} 
		}			
			
		$('span.minuteCounter').html(count);
		if (count == 59){
			timerHour();
		}
	}
	
	function timerHour()
	{
		var count = $('span.hourCounter').html();

		if(dayCount == 0 && count == 0){
			hourCount = 0;
		}else{
			count=count-1;
			if (count == -1)
			{
				count=23;
			} 
		}
		
		$('span.hourCounter').html(count);
		if (count == 23){
			timerDay();
		}
	}
	
	function timerDay()
	{
		var count = $('span.dayCounter').html();
		
		if (count != 0)
		{
			count=count-1;
		}else{
			dayCount = 0;
		}
		$('span.dayCounter').html(count);
	}
});