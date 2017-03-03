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