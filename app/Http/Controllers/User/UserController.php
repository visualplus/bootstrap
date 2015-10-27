<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Department;
use App\User;

class UserController extends Controller
{
	/**
     * 사용자를 json형태로 가져옴
     *
	 * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
	private function getUserCollection(Request $request) {
		$type = $request->get('type', 'dept_id');
		$value = $request->get('value', '0');
		$list = collect([]);
		
		switch ($type) {
			case 'dept_id':
				$dept = Department::find($value);
				if ($dept) {
					$allDepts = $dept->allChildDepartments();
					
					$list = User::whereIn('dept_id', $allDepts->pluck('id')->toArray())->get();
				}
				break;
		}
		
		return $list;
	}
	
	/**
     * 사용자를 가져와서 설정된 view로 뿌려줌
     *
	 * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
	public function getUser(Request $request) {
		$list = $this->getUserCollection($request);
		
		return view('renderer.'.$request->get('renderer'))->with(compact('list'));
	}
}
