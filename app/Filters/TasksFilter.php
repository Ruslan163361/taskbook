<?php
namespace App\Filters;

use App\Filters\QueryFilter;

class TasksFilter extends QueryFilter
{
	//фильтрация по автору
	public function autor($value)
	{
		$this->builder->where('autor', $value);
	}
	//фильтрация по статусу
	public function status($value)
	{
		$this->builder->where('status', $value);
	}
}
	
?>