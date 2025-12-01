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
        Schema::create('curriculum_adjustments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('program_id')->unsigned();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('regulation_reference')->nullable()->comment('Referencia a normativa');
            $table->date('effective_date')->nullable()->comment('Fecha de aplicación');
            $table->longText('changes_summary')->nullable()->comment('Resumen de cambios');
            $table->text('attach')->nullable()->comment('Documento de normativa');
            $table->tinyInteger('status')->default('1')->comment('0 Inactive, 1 Active, 2 Pending Approval');
            $table->bigInteger('approved_by')->unsigned()->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('curriculum_adjustments');
    }
};
