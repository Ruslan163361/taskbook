<?php
namespace App\Filters;

abstract class QueryFilter
{
	protected $builder;
	protected $request;
	
	public function __construct($builder,$request) 
	{	
		$this->request = $request;
		$this->builder = $builder;
	}
	
	public function apply() 
	{
		foreach ($this->filters() as $filter=>$value) {
			if(method_exists($this, $filter)) {
				if($value) $this->$filter($value);
			}
		}
		return $this->builder;
	}
	
	public function filters() 
	{
		return $this->request->all();
	}
}		 
?>