//creates time
function createTime() {
	var d = new Date();
	var startHour = Date.UTC(d.getUTCFullYear(), d.getUTCMonth(), d.getUTCDate(), 0, 0, 0, 0);
	var rlDayElapsedS = (Date.now() - startHour) / 1000;
	var secsIntoGameDay = (rlDayElapsedS + 200 * 60 + 20 * 60) % (240 * 60);

	// Daily reset = midnight UTC
	var secsUntilDailyReset=0;
	if (rlDayElapsedS>=57600){
		secsUntilDailyReset=Math.ceil(24 * 60 * 60 - rlDayElapsedS)+57600;
	} else {
		secsUntilDailyReset=Math.ceil(24 * 60 * 60 - rlDayElapsedS)-28800;
	}
	var minsUntilDailyReset = Math.ceil(secsUntilDailyReset / 60);
	var hoursUntilDailyReset = Math.floor(minsUntilDailyReset / 60);
	var minsRemainderUntilDailyReset = minsUntilDailyReset % 60;
	
	if (hoursUntilDailyReset > 0) {
		document.getElementById('daily_span').innerHTML = 'Game reset trong' + ' ' + hoursUntilDailyReset + 'h' + ' ' + minsRemainderUntilDailyReset + 'm';
	} else if (minsUntilDailyReset > 1) {
		document.getElementById('daily_span').innerHTML = 'Game reset trong' + ' ' + minsUntilDailyReset + 'm';
	} else if (secsUntilDailyReset > 0) {
		document.getElementById('daily_span').innerHTML = 'Game reset trong' + ' ' + secsUntilDailyReset + 's';
	}

	// Imperial delievery reset
	var newrlDayElapsedS = 24*60*60-secsUntilDailyReset;
	var secsUntilImperialReset = Math.ceil(3 * 60 * 60 - newrlDayElapsedS % (60 * 60 * 3));
	var minsUntilImperialReset = Math.ceil(secsUntilImperialReset / 60);
	var hoursUntilImperialReset = Math.floor(minsUntilImperialReset / 60);
	var minsRemainderUntilImperialReset = minsUntilImperialReset % 60;
	if (hoursUntilImperialReset > 0) {
		document.getElementById('imperial_span').innerHTML = 'Imperial reset trong' + ' ' + hoursUntilImperialReset + 'h' + ' ' + minsRemainderUntilImperialReset + 'm';
	} else if (minsUntilImperialReset > 1) {
		document.getElementById('imperial_span').innerHTML = 'Imperial reset trong' + ' ' + minsUntilImperialReset + 'm';
	} else if (secsUntilImperialReset > 0) {
		document.getElementById('imperial_span').innerHTML = 'Imperial reset trong' + ' ' + secsUntilImperialReset + 's';
	}
  
  // timer for black spirit adventure
  var secsUntilBoardReset = Math.ceil(60*60*24) - ((rlDayElapsedS-(5*60*60))%(60*60*24));
  if( secsUntilBoardReset > (60*60*24) ) {
				secsUntilBoardReset -= (60*60*24);
			}

    
  var minsUntilBoardReset = Math.ceil(secsUntilBoardReset / 60);
	var hoursUntilBoardReset = Math.floor(minsUntilBoardReset / 60);
	var minsRemainderUntilBoardReset = minsUntilBoardReset % 60;
    	if (hoursUntilBoardReset > 0) {
		document.getElementById('board_span').innerHTML = 'BSA resets in' + ' ' + hoursUntilBoardReset + 'h' + ' ' + minsRemainderUntilBoardReset + 'm';
	} else if (minsUntilBoardReset > 1) {
		document.getElementById('board_span').innerHTML = 'BSA resets in' + ' ' + minsUntilBoardReset + 'm';
	} else if (secsUntilBoardReset > 0) {
		document.getElementById('board_span').innerHTML = 'BSA resets in' + ' ' + secsUntilBoardReset + 's';
	}
    
	// timer for day/night
	if (secsIntoGameDay >= 12000) {
		var secsIntoGameNight = secsIntoGameDay - 12000;
		var pctOfNightDone = secsIntoGameNight / (40 * 60);
		var gameHour = 9 * pctOfNightDone;
		gameHour = gameHour < 2 ? 22 + gameHour : gameHour - 2;
		var secsUntilNightEnd = Math.ceil(40 * 60 - secsIntoGameNight);
		var minsUntilNightEnd = Math.ceil(secsUntilNightEnd / 60);
	} else {
		var secsIntoGameDaytime = secsIntoGameDay;
		var pctOfDayDone = secsIntoGameDay / (200 * 60);
		var gameHour = 7 + (22 - 7) * pctOfDayDone;
		var secsUntilNightStart = Math.ceil(12000 - secsIntoGameDaytime);
		var minsUntilNightStart = Math.ceil(secsUntilNightStart / 60);
		var hoursUntilNightStart = Math.floor(minsUntilNightStart / 60);
		var minsRemainderUntilNightStart = minsUntilNightStart % 60;
	}

	// ingame time
	if (secsIntoGameDay >= 12000) {
		var secsIntoGameNight = secsIntoGameDay - 12000;
		var pctOfNightDone = secsIntoGameNight / (40 * 60);
		var gameHour = 9 * pctOfNightDone;
		gameHour = gameHour < 2 ? 22 + gameHour : gameHour - 2;
		var secsUntilNightEnd = Math.ceil(40 * 60 - secsIntoGameNight);
		var minsUntilNightEnd = Math.ceil(secsUntilNightEnd / 60);
	} else {
		var secsIntoGameDaytime = secsIntoGameDay;
		var pctOfDayDone = secsIntoGameDay / (200 * 60);
		var gameHour = 7 + (22 - 7) * pctOfDayDone;
		var secsUntilNightStart = Math.ceil(12000 - secsIntoGameDaytime);
		var minsUntilNightStart = Math.ceil(secsUntilNightStart / 60);
		var hoursUntilNightStart = Math.floor(minsUntilNightStart / 60);
		var minsRemainderUntilNightStart = minsUntilNightStart % 60;
	}
	updateTime();
  
  
	//creates am/pm
	function updateTime() {
		var minutes = gameHour % 1 * 60 >> 0;
		var hours = gameHour / 1 >> 0;
		if (minutes < 10) {
			minutes = "0" + minutes;
		}
		var t_str = hours + ":" + minutes + " ";
		if (hours > 12) {
    		t_str = (hours - 12) + ":" + minutes + " " + "PM";
		} else if (hours > 11) {
			t_str += "PM";
    	} else {
			t_str += "AM";
		}
		document.getElementById('time_span').innerHTML = t_str;                            
	}

 
	if (hoursUntilNightStart > 0) {
		document.getElementById('night_span').innerHTML = 'Ngày còn' + ' ' + hoursUntilNightStart + 'h' + ' ' + minsRemainderUntilNightStart + 'm';
	} else if (minsUntilNightStart > 1) {
		document.getElementById('night_span').innerHTML = 'Ngày còn' + ' ' + minsUntilNightStart + 'm';
  	} else if (secsUntilNightStart > 0) {
		document.getElementById('night_span').innerHTML = 'Ngày còn' + ' ' + secsUntilNightStart + 's';
	} else if (minsUntilNightEnd > 1) {
		document.getElementById('night_span').innerHTML = 'Đêm còn' + ' ' + minsUntilNightEnd + 'm';
	} else {
    	document.getElementById('night_span').innerHTML = 'Đêm còn' + ' ' + secsUntilNightEnd + 's';
  	}

	
  
	
	//Turns text orange if mins is 15 or less
	if (minsUntilNightStart < 16 || minsUntilNightEnd < 16) {
		document.getElementById("night_span").style.color = "#ff7700";
	} else {
    	document.getElementById("night_span").style.color = "#fff";
  	}
	if (minsUntilDailyReset < 16) {
		document.getElementById("daily_span").style.color = "#ff7700";
	} else {
    	document.getElementById("daily_span").style.color = "#fff";
  	}
	if (minsUntilImperialReset < 16) {
		document.getElementById("imperial_span").style.color = "#ff7700";
	} else {
    	document.getElementById("imperial_span").style.color = "#fff";
  	}
  	if (minsUntilBoardReset < 16) {
		document.getElementById("board_span").style.color = "#ff7700";
	} else {
    	document.getElementById("board_span").style.color = "#fff";
  	}
}


window.onload = function(){
        setInterval(createTime, 1000);
};	