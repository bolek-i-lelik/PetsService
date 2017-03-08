function saveNewClient(clinic_id){
	var name = document.getElementById('name').value;
	var familie = document.getElementById('familie').value;
	var father = document.getElementById('father').value;
	var passport = document.getElementById('passport').value;
	var adress = document.getElementById('adress').value;
	var pets_name = document.getElementById('pets_name').value;
	var phone = document.getElementById('phone').value;
	var email = document.getElementById('email').value;
	var social_account = document.getElementById('social_account').value;
	var chip = document.getElementById('chip').value;
	var vid = document.getElementById('vid').value;
	$.ajax({
            url: '/clients/default/createclients',
            type: 'POST',
            data: {
                'name': name, 
                'familie': familie, 
                'father': father,
                'passport': passport,
                'adress': adress,
                'pets_name': pets_name,
                'phone': phone,
                'email': email,
                'social_account': social_account,
                'chip': chip,
                'vid': vid,
                'clinic_id': clinic_id,
            },
            success: function(){
                console.log('OK');
            },
            error: function(){
                console.log('False');
            }
        });
}

function searchClient(){
    var name = document.getElementById('name_search').value;
    var familie = document.getElementById('familie_search').value;
    var father = document.getElementById('father_search').value;
    var passport = document.getElementById('passport_search').value;
    var adress = document.getElementById('adress_search').value;
    var pets_name = document.getElementById('pets_name_search').value;
    var phone = document.getElementById('phone_search').value;
    var email = document.getElementById('email_search').value;
    var social_account = document.getElementById('social_account_search').value;
    var chip = document.getElementById('chip_search').value;
    var vid = document.getElementById('vid_search').value;
    $.ajax({
            url: '/clients/default/searchclients',
            type: 'GET',
            data: {
                'name': name, 
                'familie': familie, 
                'father': father,
                'passport': passport,
                'adress': adress,
                'pets_name': pets_name,
                'phone': phone,
                'email': email,
                'social_account': social_account,
                'chip': chip,
                'vid': vid
            },
            success: function(data){
                console.log(data);
                data = JSON.parse(data);
                var div = document.getElementById('search_results');
                var html = '';
                data.forEach(function(element) {
                    //console.log(element);
                    html += '<div class="client">';
                    html += '<p class="fio">';
                    html += element['familia'] + ' ' + element['name'] + ' ' + element['father'];
                    html += '<span class="passport">Паспорт: ' + element['passport'] + '</span>';
                    html += '</p>';
                    html += '<p class="clients_contacts">';
                    html += '<b>Адрес:</b> ' + element['adress'] + ' , <b>телефон:</b> ' + element['phone'] + ', <b>email:</b> ' + element['email'];
                    html += '</p>';
                    html += '<p class="pet">';
                    html += '<b>Питомец:</b> ' + element['vid'] + ' ' + element['pets_name'] + ', <b>Чип:</b> ' + element['chip'] + ', <b>Аккаунт:</b> ' + element['pets_social_account'] + '<br/>';
                    html += '</p>'; 
                    html += '<a href="#">Редактировать</a><a href="#">Направить</a><a href="#">Записать на приём</a><a href="#">Ветеринарная карта</a><hr>';              
                    html += '</div>';
                });
                div.innerHTML = html;
            },
            error: function(){
                console.log('False');
            }
        });
}

var Man = function(name){
    this.name = name;
    this.canSpeek = true;
    this.sayHello = function(){
        return 'Привет, меня зовут ' + this.name;
    };

};

var alex = new Man('Alex');

console.log(alex.sayHello());