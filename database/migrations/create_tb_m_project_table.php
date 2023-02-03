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
        Schema::create('tb_m_project', function (Blueprint $table) {
            $table->id('project_id');
            $table->string('project_name');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('client_id')->on('tb_m_client')->onDelete('cascade');
            $table->string('project_start');
            $table->string('project_end');
            $table->string('project_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_m_project');
    }
};
