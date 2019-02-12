@extends('layouts.app')
@section('content')
<form action="/addtask" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="task" placeholder="Название задачи"></input>
    <?php echo $errors->first('task'); ?>
    <input type="text" name="autor" placeholder="Имя автора"></input>
    <?php echo $errors->first('autor'); ?>
    <select name="status">
    	<option disabled selected>Выбрать статус</option>
		<option value="1">Не срочная</option>
		<option value="2">Срочная</option>
		<option value="3">Обычная</option>
		<option value="4">Очень срочная</option>
	</select>
	<?php echo $errors->first('status'); ?>
	<button type="submit">Добавить задачу</button>
</form>
@endsection