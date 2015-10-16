<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	/**
     * 사용자를 json형태로 가져옴
     *
	 * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
	public function getUserAsJSON(Request $request) {
		$type = $request->get('type', 'dept_id');
		$value = $request->get('value', '0');
		
		
	}
	
	/**
     * 사용자를 가져와서 설정된 view로 뿌려줌
     *
	 * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
	public function getUser(Request $request) {
		$list = $this->getUserAsJSON($request);
	}
}
