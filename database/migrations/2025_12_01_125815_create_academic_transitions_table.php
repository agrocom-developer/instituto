<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicTransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_transitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->unsigned();
            $table->tinyInteger('type')->comment('1 Program Change, 2 Work Shift Change');
            $table->integer('current_program_id')->unsigned()->nullable();
            $table->integer('new_program_id')->unsigned()->nullable();
            $table->integer('current_work_shift_id')->unsigned()->nullable();
            $table->integer('new_work_shift_id')->unsigned()->nullable();
            $table->text('reason');
            $table->text('note')->nullable();
            $table->tinyInteger('status')->default('1')->comment('1 Pending, 2 Approved, 3 Rejected');
            $table->bigInteger('approved_by')->unsigned()->nullable();
            $table->bigInteger('rejected_by')->unsigned()->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->dateTime('rejected_at')->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('current_program_id')->references('id')->on('programs')->onDelete('set null');
            $table->foreign('new_program_id')->references('id')->on('programs')->onDelete('set null');
            $table->foreign('current_work_shift_id')->references('id')->on('work_shift_types')->onDelete('set null');
            $table->foreign('new_work_shift_id')->references('id')->on('work_shift_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_transitions');
    }
}

