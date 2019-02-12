<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Task extends Model
{
	/**
	* поля для массового заплнения
	*/
    protected $fillable = [
        'task', 'autor', 'status'
    ];
}
