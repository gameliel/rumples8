<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFindMyspecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('find_myspecs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('neck_id');
            $table->string('body_id');
            $table->string('foot_id');
            $table->string('leg_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('find_myspecs');
    }
}
