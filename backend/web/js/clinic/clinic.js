var showNewDepartmensForm = false;
var showNewWorkerPanel = false;


//Добавление информации о клинике/сети клиник
function addInfoAboutClinic(id){
	var div = document.getElementById('modal-content');
	var html = '<div class="row">';
    html += '<div class="col-lg-10 col-lg-offset-1">';
      html += '<form class="form-horizontal" role="form">';
        html += '<div class="form-group">';
          html += '<label for="name" class="col-sm-2 control-label">Название</label>';
          html += '<div class="col-sm-10">';
            html += '<input type="text" class="form-control" id="name" placeholder="Название">';
          html += '</div>';
        html += '</div>';
        html += '<div class="form-group">';
          html += '<label for="adress" class="col-sm-2 control-label">Адрес</label>';
          html += '<div class="col-sm-10">';
            html += '<input type="text" class="form-control" id="adress" placeholder="Адрес">';
          html += '</div>';
        html += '</div>';
        html += '<div class="form-group">';
          html += '<label for="phone" class="col-sm-2 control-label">Телефон</label>';
          html += '<div class="col-sm-10">';
            html += '<input type="text" class="form-control" id="phone" placeholder="Телефон">';
          html += '</div>';
        html += '</div>';
        html += '<div class="form-group">';
          html += '<label for="email" class="col-sm-2 control-label">Email</label>';
          html += '<div class="col-sm-10">';
            html += '<input type="email" class="form-control" id="email" placeholder="Email">';
          html += '</div>';
        html += '</div>';
        html += '<div class="form-group">';
          html += '<label for="site" class="col-sm-2 control-label">Сайт</label>';
          html += '<div class="col-sm-10">';
            html += '<input type="text" class="form-control" id="site" placeholder="Сайт">';
          html += '</div>';
        html += '</div>';
        html += '<div class="form-group">';
          html += '<div class="col-sm-offset-2 col-sm-10">';
            html += '<button type="button" onclick="saveInfoAboutClinic('+ id +')" class="btn btn-default">Сохранить</button>';
          html += '</div>';
        html += '</div>';
      html += '</form>';
    html += '</div>';
	html += '</div>';
	div.innerHTML = html;
	$('#default-modal .modal-header center h2').text('Прикреплённые документы');
	$('#default-modal').modal({
        keyboard: false
    });
}

function saveInfoAboutClinic(id){
  var name = document.getElementById('name').value;
  var adress = document.getElementById('adress').value;
  var phone = document.getElementById('phone').value;
  var email = document.getElementById('email').value;
  var site = document.getElementById('site').value;
  $.ajax({
    url: '/clinic/default/createinfo',
    type: 'POST',
    data: {
      'id': id, 
      'name': name,
      'adress': adress,
      'phone': phone,
      'email': email,
      'site': site,
    },
    success: function(data){
      var html = document.getElementById('clinic_info');
      data = JSON.parse(data);
      var div = '<table>';
      div += '<tr>';
      div += '<td>';
      div += 'Название';
      div += '</td>';
      div += '<td>';
      div += data[0]['name'];
      div += '</td>';
      div += '</tr>';
      div += '<tr>';
      div += '<td>';
      div += 'Адрес';
      div += '</td>';
      div += '<td>';
      div += data[0]['adress'];
      div += '</td>';
      div += '</tr>';
      div += '<tr>';
      div += '<td>';
      div += 'Телефон';
      div += '</td>';
      div += '<td>';
      div += data[0]['phone'];
      div += '</td>';
      div += '</tr>';
      div += '<tr>';
      div += '<td>';
      div += 'Email';
      div += '</td>';
      div += '<td>';
      div += data[0]['email'];
      div += '</td>';
      div += '</tr>';
      div += '<tr>';
      div += '<td>';
      div += 'Сайт';
      div += '</td>';
      div += '<td>';
      div += data[0]['site'];
      div += '</td>';
      div += '</tr>';
      div += '</table>';
      html.innerHTML = div;
    },
    error: function(){
      console.log('Внутренняя ошибка сервера');
    }
  });
}

function saveUser(id, role){
  var email = document.getElementById('user_email').value;
  var login = document.getElementById('user_login').value;
  var password = document.getElementById('user_password').value;
  $.ajax({
    url: '/clinic/default/createuser',
    type: 'POST',
    data: {
      'role': role,
      'id': id, 
      'email': email,
      'login': login,
      'password': password,
    },
    success: function(data){
      console.log(data);
    },
    error: function(){
      console.log('Внутренняя ошибка сервера');
    }
  });
}

function changeUser(){
  var username = document.getElementById('changeUser').value;
  var div = document.getElementById('user_manager');
  div.innerHTML = 'Выбран пользователь '+username;
  alert('ОК');
}

function saveInfoAboutManager(id){
  var name = document.getElementById('name').value;
  var familie = document.getElementById('familie').value;
  var father = document.getElementById('father').value;
  var position = document.getElementById('position').value;
  var phone = document.getElementById('phone').value;
  var email = document.getElementById('email').value;
  var username = document.getElementById('changeUser').value;
  $.ajax({
    url: '/clinic/default/createmanager',
    type: 'POST',
    data: {
      'parent': id, 
      'name': name,
      'familie': familie,
      'father': father,
      'position': position,
      'email': email,
      'phone': phone,
      'username': username,
    },
    success: function(data){
      console.log(data);
    },
    error: function(){
      console.log('Внутренняя ошибка сервера');
    }
  });
}

function showNewDepartmentsForm(){
  if(showNewDepartmensForm == false){
    document.getElementById('newDepartmentsForm').style.display = 'block';
    showNewDepartmensForm = true;
  }else{
    document.getElementById('newDepartmentsForm').style.display = 'none';
    showNewDepartmensForm = false;
  }
}

function saveInfoAboutDepartment(id){
  var name = document.getElementById('department_name').value;
  var adress = document.getElementById('department_adress').value;
  var phone = document.getElementById('department_phone').value;
  var email = document.getElementById('department_email').value;
  var manager = document.getElementById('manager').value;
  $.ajax({
    url: '/clinic/default/createdepartment',
    type: 'get',
    data: {
      'manager': manager,
      'parent': id, 
      'name': name,
      'adress': adress,
      'email': email,
      'phone': phone,
    },
    success: function(data){
      console.log(data);
    },
    error: function(){
      console.log('Внутренняя ошибка сервера');
    }
  });
}

function showCreateWorkers(){
  if(showNewWorkerPanel == false){
    document.getElementById('createNewWorker').style.display = 'block';
    showNewWorkerPanel = true;
  }else{
    document.getElementById('createNewWorker').style.display = 'none';
    showNewWorkerPanel = false;
  }
}

function saveInfoAboutWorker(id){
  var name = document.getElementById('name').value;
  var familie = document.getElementById('familie').value;
  var father = document.getElementById('father').value;
  var position = document.getElementById('position').value;
  var phone = document.getElementById('phone').value;
  var email = document.getElementById('email').value;
  var username = document.getElementById('changeUser').value;
  $.ajax({
    url: '/clinic/default/createworker',
    type: 'POST',
    data: {
      'parent': id, 
      'name': name,
      'familie': familie,
      'father': father,
      'position': position,
      'email': email,
      'phone': phone,
      'username': username,
    },
    success: function(data){
      console.log(data);
    },
    error: function(){
      console.log('Внутренняя ошибка сервера');
    }
  });
}