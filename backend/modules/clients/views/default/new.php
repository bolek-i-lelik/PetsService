<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-info">
	        	<div class="panel-heading">Поиск пациента</div>
	        	<div class="panel-body">
	        		<div class="row">
	        		<div class="col-lg-4">
	        		<form  class="form-horizontal" role="form">
	        			<div class="form-group">
				    		<div class="col-sm-12">
				    			<input type="text" class="form-control" id="familie_search" placeholder="Фамилия">
				    		</div>
				    	</div>
				    	<div class="form-group">
          					<div class="col-sm-12">
            					<input type="text" class="form-control" id="name_search" placeholder="Имя">
          					</div>
        				</div>
				    	<div class="form-group">
				    		<div class="col-sm-12">
				    			<input type="text" class="form-control" id="father_search" placeholder="Отчество">
				    		</div>
				    	</div>
				    	<div class="form-group">
				    		<div class="col-sm-12">
				    			<input type="text" class="form-control" id="passport_search" placeholder="Паспорт">
				    		</div>
				    	</div>
				    	<div class="form-group">
				    		<div class="col-sm-12">
				    			<input type="text" class="form-control" id="adress_search" placeholder="Адрес">
				    		</div>
				    	</div>
				    	<div class="form-group">
				    		<div class="col-sm-12">
				    			<input type="text" class="form-control" id="phone_search" placeholder="Телефон">
				    		</div>
				    	</div>
				    	<div class="form-group">
				    		<div class="col-sm-12">
				    			<input type="email" class="form-control" id="email_search" placeholder="email">
				        	</div>
				        </div>
				         <div class="form-group">
				    		<div class="col-sm-12">
				    			<input type="text" class="form-control" id="vid_search" placeholder="Вид">
				        	</div>
				        </div>
				        <div class="form-group">
				    		<div class="col-sm-12">
				    			<input type="text" class="form-control" id="pets_name_search" placeholder="Кличка питомца">
				        	</div>
				        </div>
				        <div class="form-group">
				    		<div class="col-sm-12">
				    			<input type="text" class="form-control" id="chip_search" placeholder="Номер чипа">
				        	</div>
				        </div>
				        <div class="form-group">
				    		<div class="col-sm-12">
				    			<input type="text" class="form-control" id="social_account_search" placeholder="Аккаунт в PetsSocial">
				        	</div>
				        </div>
				        <div class="form-group">
				        	<div class="col-sm-12">
				        		<button type="button" onclick="searchClient(<?= $worker['parent'] ?>)" class="btn btn-default">Искать</button>
				        	</div>
				        </div>
	        		</form>
	        		</div>
	        		<div class="col-lg-8">
	        			<div class="search_results" id="search_results">
	        			</div>
	        		</div>
	        		</div>
	        	</div>
	        </div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-info">
	        	<div class="panel-heading">Новый пациент</div>
	        	<div class="panel-body">
	        		<form  class="form-horizontal" role="form">
	        			<div class="form-group">
				    		<label for="familie" class="col-sm-3 control-label">Фамилия</label>
				    		<div class="col-sm-9">
				    			<input type="text" class="form-control" id="familie" placeholder="Фамилия">
				    		</div>
				    	</div>
				    	<div class="form-group">
          					<label for="name" class="col-sm-3 control-label">Имя</label>
          					<div class="col-sm-9">
            					<input type="text" class="form-control" id="name" placeholder="Имя">
          					</div>
        				</div>
				    	<div class="form-group">
				    		<label for="father" class="col-sm-3 control-label">Отчество</label>
				    		<div class="col-sm-9">
				    			<input type="text" class="form-control" id="father" placeholder="Отчество">
				    		</div>
				    	</div>
				    	<div class="form-group">
				    		<label for="passport" class="col-sm-3 control-label">Паспорт</label>
				    		<div class="col-sm-9">
				    			<input type="text" class="form-control" id="passport" placeholder="Паспорт">
				    		</div>
				    	</div>
				    	<div class="form-group">
				    		<label for="phone" class="col-sm-3 control-label">Адрес</label>
				    		<div class="col-sm-9">
				    			<input type="text" class="form-control" id="adress" placeholder="Адрес">
				    		</div>
				    	</div>
				    	<div class="form-group">
				    		<label for="phone" class="col-sm-3 control-label">Телефон</label>
				    		<div class="col-sm-9">
				    			<input type="text" class="form-control" id="phone" placeholder="Телефон">
				    		</div>
				    	</div>
				    	<div class="form-group">
				    		<label for="email" class="col-sm-3 control-label">email</label>
				    		<div class="col-sm-9">
				    			<input type="email" class="form-control" id="email" placeholder="email">
				        	</div>
				        </div>
				        <div class="form-group">
				    		<label for="pets_name" class="col-sm-3 control-label">Кличка питомца</label>
				    		<div class="col-sm-9">
				    			<input type="text" class="form-control" id="pets_name" placeholder="Кличка питомца">
				        	</div>
				        </div>
				        <div class="form-group">
				    		<label for="vid" class="col-sm-3 control-label">Вид</label>
				    		<div class="col-sm-9">
				    			<input type="text" class="form-control" id="vid" placeholder="Вид">
				        	</div>
				        </div>
				        <div class="form-group">
				    		<label for="chip" class="col-sm-3 control-label">Номер чипа</label>
				    		<div class="col-sm-9">
				    			<input type="text" class="form-control" id="chip" placeholder="Номер чипа">
				        	</div>
				        </div>
				        <div class="form-group">
				    		<label for="social_account" class="col-sm-3 control-label">Аккаунт в социальной сети PetsSocial</label>
				    		<div class="col-sm-9">
				    			<input type="text" class="form-control" id="social_account" placeholder="Аккаунт в PetsSocial">
				        	</div>
				        </div>
				        <div class="form-group">
				        	<div class="col-sm-offset-2 col-sm-10">
				        		<button type="button" onclick="saveNewClient(<?= $worker['parent'] ?>)" class="btn btn-default">Сохранить</button>
				        	</div>
				        </div>
	        		</form>
	        	</div>
	        </div>
		</div>
	</div>
</div>