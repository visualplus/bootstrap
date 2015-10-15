<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('department_managers', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('dept_id')->unsigned();
			$table->enum('role', ['manager', 'sub-manager'])->default('sub-manager');
			$table->timestamps();
			
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('dept_id')->references('id')->on('departments')->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('department_managers', function ($table) {
			$table->dropForeign('department_managers_user_id_foreign');
			$table->dropForeign('department_managers_dept_id_foreign');
		});
		
		Schema::drop('department_managers');
    }
}
