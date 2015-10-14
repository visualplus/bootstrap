<?php

namespace App\Http\Controllers\Department;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Department;

class DepartmentController extends Controller
{
    /**
     * 부서를 가져옴
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$deptList = Department::all();
		$retArr = [];
		
		foreach ($deptList as $dept) {
			$retArr[] = [
				'id'		=> "{$dept->id}",
				'parent'	=> $dept->p_id == null ? '#' : "{$dept->p_id}",
				'text'		=> $dept->dept_name,
			];
		}
		
		return Response()->json($retArr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
