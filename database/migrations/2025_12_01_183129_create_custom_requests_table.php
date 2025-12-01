<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('request_type_id')->unsigned();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->text('attach')->nullable();
            $table->tinyInteger('status')->default('1')->comment('0 Rejected, 1 Pending, 2 Approved');
            $table->longText('response')->nullable();
            $table->bigInteger('approved_by')->unsigned()->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->bigInteger('rejected_by')->unsigned()->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('request_type_id')->references('id')->on('custom_request_types')->onDelete('cascade');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('rejected_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_requests');
    }
};
