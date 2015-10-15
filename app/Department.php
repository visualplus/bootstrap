<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['p_id', 'dept_name', 'useflag'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
	
	/**
     * 하위 부서를 가져옴
     *
     * @return Illuminate\Support\Collection
     */
    public function childDepartments() {
    	return $this->hasMany('App\Department', 'id', 'p_id');
    }
}
