@extends('layouts.app')
@section('content')
	<?php $status_vis = array(1=>'Не срочная',2=>'Срочная',3=>'Обычная',4=>'Очень срочная');?>
	<div class="taskbook-title"><h1>Задачник</h1></div>
	<div class="taskbook-btn"><a class="btn-new" href="/taskform">Новая задача</a></div>
	<div class="taskbook-panel" >
		<form action="/" id="taskbook_filter">
			<select name="autor" id="s_autor">
				<option value="">Все авторы({{count($flt_params['autor'])}})</option>
				@foreach ($flt_params['autor'] as $a)
					<option value="{{$a->autor}}" {{$a->autor == request()->autor ? 'selected' : ''}}>{{$a->autor}}({{$a->total}})</option>
				@endforeach
			</select>
			<select name="status" id="s_status">
				<option value="">Все статусы({{count($flt_params['status'])}})</option>
				@foreach ($flt_params['status'] as $s)
					<option value="{{$s->status}}" {{$s->status == request()->status ? 'selected' : ''}}>{{$status_vis[$s->status]}}({{$s->total}})</option>
				@endforeach
			</select>
		</form>
	</div>
    <table>
    <tr><th></th><th>Название задачи</th><th>Автор</th><th>Статус</th></tr>
	@foreach ($tasks as $task)
		<tr>
		    <td><a href="#feedback" rel="nofollow" class="btn-del" data="{{$task->id}}">x</a></td>
		    <td>{{$task->task}}</td>
		    <td>{{$task->autor}}</td>
		    <td>{{$status_vis[$task->status]}}</td>
		</tr>
	@endforeach
	</table>
	{!! $tasks->appends(array('autor' => request()->autor,'status'=>request()->status))->links('pagination')!!}
@endsection
