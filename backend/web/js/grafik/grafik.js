var visibleAddWorktime = false;

function addNewWorktime(id){
	if(visibleAddWorktime == false){
		document.getElementById('newWorktime').style.display = 'block';
		visibleAddWorktime = true;
	}
	else{
		document.getElementById('newWorktime').style.display = 'none';
		visibleAddWorktime = false;
	}
}

function saveWorktimeEvent(id){
	var date = document.getElementById('date_event').value;
	var start_event = document.getElementById('start_event').value;
	var stop_event = document.getElementById('stop_event').value;
	var pacient_time = document.getElementById('pacient_time').value;
	var start_break = document.getElementById('start_break').value;
	var stop_break = document.getElementById('stop_break').value;
	//получаем таймстемпы
	//таймстемп даты
	date = (new Date(date).getTime()/1000);
	var startEvent = start_event.split(':',2);
	start_event = (startEvent[0]*3600) + (startEvent[1]*60);
	start_event = date + start_event;
	var stopEvent = stop_event.split(':',2);
	stop_event = (stopEvent[0]*3600) + (stopEvent[1]*60);
	stop_event = date + stop_event;
	var startBreak = start_break.split(':',2);
	start_break = (startBreak[0]*3600) + (startBreak[1]*60);
	start_break = date + start_break;
	var stopBreak = stop_break.split(':',2);
	stop_break = (stopBreak[0]*3600) + (stopBreak[1]*60);
	stop_break = date + stop_break;
	$.ajax({
        url: '/grafik/default/creategrafik',
        type: 'GET',
        data: {
            'worker': id, 
            'day': date, 
            'start': start_event,
            'stop': stop_event,
            'interval': pacient_time,
            'start_break': start_break,
            'stop_break': stop_break,
        },
        success: function(){
            location.reload();
        },
        error: function(){
            console.log('False');
        }
    });
}

function filterDate(id){
	console.log(id);
	var interval_start = document.getElementById('interval-start').value;
	var interval_end = document.getElementById('interval-end').value;
	console.log(interval_start);
	console.log(interval_end);
}