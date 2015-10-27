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
    	
    	return $this->hasMany('App\Department', 'p_id', 'id');
    }
	
	/**
	 * 모든 하위 부서를 가져옴
	 * 
	 * @return Illumicate\Support\Collection
	 */
	private function getChildDepartmentsRecursive($dept) {
		$list = collect([]);
		
		foreach ($dept->childDepartments as $childDept) {
			$list->push($childDept);
			
			$list = $list->merge($this->getChildDepartmentsRecursive($childDept));
		}
		
		return $list;
	}
	
	public function allChildDepartments() {
		$list = $this->getChildDepartmentsRecursive($this);
		$list->push($this);
		
		return $list;
	}
}
