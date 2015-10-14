<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	/**
     * 하위 부서를 가져옴
     *
     * @return Illuminate\Support\Collection
     */
    public function childDepartment() {
    	return $this->hasMany('App\Department', 'id', 'p_id');
    }
}
