<?php

use kartik\datecontrol\DateControl;
use kartik\daterange\DateRangePicker;
use kartik\time\TimePicker;

$today = date('Y-m-d');

?>

<div class="row">
	<div class="col-lg-12">
		<b><?= $worker['familie'].' '.$worker['name'].' '.$worker['father'] ?></b><br/>
		<?= $worker['position'] ?>
	</div>
</div>
<hr/>
<div class="row">
	<div class="col-lg-2">
		<a href="#" onclick="addNewWorktime(<?= $worker['id'] ?>)">Добавить</a>
	</div>
	
</div>
<hr/>
<div class="row" id="newWorktime">
	<div class="col-lg-12">
		<div class="panel panel-default">
		  	<div class="panel-heading">Создать событие в графике</div>
		  	<div class="panel-body">
		  		<div class="row">
		  			<div class="col-lg-1">
		  				Дата
		  			</div>
		  			<div class="col-lg-2">
				    	<?php
				    		$addon = '<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>';
				    		echo '<div class="input-group drp-container">';
							echo DateRangePicker::widget([
							    'name'=>'date_event',
							    'id' => 'date_event',
							    'value'=>$today,
							    'useWithAddon'=>true,
							    'pluginOptions'=>[
							        'singleDatePicker'=>true,
							        'showDropdowns'=>true
							    ]
							]) . $addon;
							echo '</div>';
						?>
					</div>
					<div class="col-lg-1">
						Начало
					</div>
					<div class="col-lg-2">
						<?php
							echo TimePicker::widget([
							    'name' => 'start_event',
							    'id' => 'start_event', 
							    'pluginOptions' => [
							        'minuteStep' => 1,
							        'showSeconds' => false,
							        'showMeridian' => false,
							    ]
							]);
						?>
					</div>
					<div class="col-lg-1">
						Окончание
					</div>
					<div class="col-lg-2">
						<?php
							echo TimePicker::widget([
							    'name' => 'stop_event',
							    'id' => 'stop_event', 
							    'pluginOptions' => [
							        'minuteStep' => 1,
							        'showSeconds' => false,
							        'showMeridian' => false,
							    ]
							]);
						?>
					</div>
					<div class="col-lg-2">
						Среднее время приема одного пациента, мин
					</div>
					<div class="col-lg-1">
						<input type="text" class="form-control" id="pacient_time">
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="col-lg-1">
						Начало перерыва
					</div>
					<div class="col-lg-2">
						<?php
							echo TimePicker::widget([
							    'name' => 'start_break',
							    'id' => 'start_break', 
							    'pluginOptions' => [
							        'minuteStep' => 1,
							        'showSeconds' => false,
							        'showMeridian' => false,
							    ]
							]);
						?>
					</div>
					<div class="col-lg-1">
						Окончание перерыва
					</div>
					<div class="col-lg-2">
						<?php
							echo TimePicker::widget([
							    'name' => 'stop_break',
							    'id' => 'stop_break', 
							    'pluginOptions' => [
							        'minuteStep' => 1,
							        'showSeconds' => false,
							        'showMeridian' => false,
							    ]
							]);
						?>
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="col-lg-1">
						<button type="button" class="btn btn-success" onclick="saveWorktimeEvent(<?= $worker['id'] ?>)">Сохранить</button>
					</div>
				</div>
		  	</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
			<div class="col-lg-1">
				<b>Фильтр по дате</b>
			</div>
			<div class="col-lg-4">
			<?php
				$today = date('Y-m-d');
				$today_timestamp = time();
				$second_date = $today_timestamp + (86400 * 7);
				$second_date = date('Y-m-d', $second_date);
				echo '<div class="input-group drp-container">';
				echo DateRangePicker::widget([
				    'name'=>'kvdate2',
				    'id' => 'interval',
				    'useWithAddon'=>true,
				    'convertFormat'=>true,
				    'startAttribute' => 'filter_from_date',
				    'endAttribute' => 'filter_to_date',
				    'startInputOptions' => ['value' => $today],
				    'endInputOptions' => ['value' => $second_date],
				    'pluginOptions'=>[
				        'locale'=>['format' => 'Y-m-d'],
				    ],
				    'pluginEvents' => [
						'apply.daterangepicker' => 'function() { filterDate('.$worker["id"].'); }',
					],
				]) . $addon;
				echo '</div>';
			?>
			<hr/>
			</div>
			<div id="worktime">
				<table class="table table-striped table-bordered">
					<tr>
						<td>
							<b>Дата</b>
						</td>
						<td>
							<b>Начало</b>
						</td>
						<td>
							<b>Окончание</b>
						</td>
						<td>
							<b>Перерыв</b>
						</td>
						<td>
							<b>Время на одного пациента</b>
						</td>
						<td>

						</td>
					</tr>
					<?php foreach($worktimes as $worktime):?>
						<tr>
							<td>
								<?= $worktime['day'] ?>
							</td>
							<td>
								<?= $worktime['start'] ?>
								<div class="update_start" id="update_start_<?= $worktime['day'] ?>">
									<?php
										echo TimePicker::widget([
										    'name' => 'update_start-'.$worktime['day'],
										    'id' => 'update_start-'.$worktime['day'], 
										    'value' => $worktime['start'],
										    'pluginOptions' => [
										        'minuteStep' => 1,
										        'showSeconds' => false,
										        'showMeridian' => false,
										    ]
										]);
									?>
								</div>
							</td>
							<td>
								<?= $worktime['stop'] ?>
								<div class="update_stop" id="update_stop_<?= $worktime['day'] ?>">
									<?php
										echo TimePicker::widget([
										    'name' => 'update_stop-'.$worktime['day'],
										    'id' => 'update_stop-'.$worktime['day'], 
										    'value' => $worktime['stop'],
										    'pluginOptions' => [
										        'minuteStep' => 1,
										        'showSeconds' => false,
										        'showMeridian' => false,
										    ]
										]);
									?>
								</div>
							</td>
							<td>
								<?= $worktime['start_break'].' - '.$worktime['stop_break'] ?>
								<div class="update_break" id="update_break_<?= $worktime['day'] ?>">
									<?php
										echo TimePicker::widget([
										    'name' => 'update_start_break_'.$worktime['day'],
										    'id' => 'update_start_break_'.$worktime['day'],
										    'value' => $worktime['start_break'], 
										    'pluginOptions' => [
										        'minuteStep' => 1,
										        'showSeconds' => false,
										        'showMeridian' => false,
										    ]
										]);
									?>
									<?php
										echo TimePicker::widget([
										    'name' => 'update_stop_break_'.$worktime['day'],
										    'id' => 'update_stop_break_'.$worktime['day'], 
										    'value' => $worktime['stop_break'],
										    'pluginOptions' => [
										        'minuteStep' => 1,
										        'showSeconds' => false,
										        'showMeridian' => false,
										    ]
										]);
									?>
								</div>
							</td>
							<td>
								<?= $worktime['interval'] ?>
								<div class="update_interval" id="update_interval_<?= $worktime['day'] ?>">
									<input type="text" class="form-control" id="pacient_time_<?= $worktime['day'] ?>" value="<?= $worktime['interval'] ?>">
								</div>
							</td>
							<td>
								<div class="update_btn" id="update_btn_<?= $worktime['day'] ?>">
									<a href="#" onclick="updateGrafik('<?= $worktime['day'] ?>', <?= $worker['id'] ?>)">Редактировать</a>
								</div>
								<div class="update_btn_result" id="update_btn_result_<?= $worktime['day'] ?>">
									<a href="#" onclick="saveUpdateGrafik('<?= $worktime['day'] ?>', <?= $worker['id'] ?>, '<?= $worktime['date'] ?>')">Сохранить</a>
									<a href="#" onclick="updateGrafik(<?= $worktime['day'] ?>, <?= $worker['id'] ?>)">Отмена</a>
								</div>
							</td>
						</tr>
					<?php endforeach;?>
				</table>
			</div>
		
		
	</div>
</div>
