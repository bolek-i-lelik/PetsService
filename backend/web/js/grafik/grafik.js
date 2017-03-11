var visibleAddWorktime = false;
var visibleUpdateDay = 0;

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
        type: 'POST',
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
	var interval_start = document.getElementById('interval-start').value;
	var interval_end = document.getElementById('interval-end').value;
	interval_start = (new Date(interval_start).getTime()/1000);
	interval_end = (new Date(interval_end).getTime()/1000);
	window.location.href = "/grafik/default/filtergrafik?worker=" + id + "&start=" + interval_start + "&stop=" + interval_end;
}

function updateGrafik(day, worker_id){
	if(visibleUpdateDay == 0){
		document.getElementById('update_start_' + day).style.display = 'block';
		document.getElementById('update_stop_' + day).style.display = 'block';
		document.getElementById('update_break_' + day).style.display = 'block';
		document.getElementById('update_interval_' + day).style.display = 'block';
		document.getElementById('update_btn_' + day).style.display = 'none';
		document.getElementById('update_btn_result_' + day).style.display = 'block';
		visibleUpdateDay = day;
	}else{
		document.getElementById('update_start_' + visibleUpdateDay).style.display = 'none';
		document.getElementById('update_stop_' + visibleUpdateDay).style.display = 'none';
		document.getElementById('update_break_' + visibleUpdateDay).style.display = 'none';
		document.getElementById('update_interval_' + visibleUpdateDay).style.display = 'none';
		document.getElementById('update_btn_' + visibleUpdateDay).style.display = 'block';
		document.getElementById('update_btn_result_' + visibleUpdateDay).style.display = 'none';
		visibleUpdateDay = 0;
	}
}

function saveUpdateGrafik(date, worker_id, day){
	var start = document.getElementById('update_start-' + date).value;
	var stop = document.getElementById('update_stop-' + date).value;
	var start_break = document.getElementById('update_start_break_' + date).value;
	var stop_break = document.getElementById('update_stop_break_' + date).value;
	var interval = document.getElementById('pacient_time_' + date).value;
	var date = (new Date(day).getTime()/1000);
	var start = start.split(':',2);
	start = (start[0]*3600) + (start[1]*60);
	start = date + start;
	var stop = stop.split(':',2);
	stop = (stop[0]*3600) + (stop[1]*60);
	stop = date + stop;
	var startBreak = start_break.split(':',2);
	start_break = (startBreak[0]*3600) + (startBreak[1]*60);
	start_break = date + start_break;
	var stopBreak = stop_break.split(':',2);
	stop_break = (stopBreak[0]*3600) + (stopBreak[1]*60);
	stop_break = date + stop_break;
	$.ajax({
        url: '/grafik/default/updategrafik',
        type: 'GET',
        data: {
            'worker': worker_id, 
            'day': date, 
            'start': start,
            'stop': stop,
            'interval': interval,
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