<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
	/**
	 * 부서 / 사원 관리 페이지
	 *
	 * @return \Illuminate\View\View
	 */
	public function getManagement() {
		return view('pages.management');
	}

	/**
	 * 전자결재 페이지
	 *
	 * @return \Illuminate\View\View
	 */
	public function getDocument() {
		return view('pages.document');
	}
}
