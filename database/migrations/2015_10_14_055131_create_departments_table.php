<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('departments', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('p_id')->unsigned()->nullable();
			
			$table->string('dept_name');
			$table->boolean('useflag')->default(true);
			$table->timestamps();
			
			$table->foreign('p_id')->references('id')->on('departments');
		});
		
		Schema::table('users', function ($table) {
			$table->engine = 'InnoDB';
			
			$table->integer('dept_id')->unsigned();
			
			$table->foreign('dept_id')->references('id')->on('departments');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('users', function ($table) {
    		$table->dropForeign('users_dept_id_foreign');
			$table->dropColumn('dept_id');
    	});
		
		Schema::drop('departments');
    }
}