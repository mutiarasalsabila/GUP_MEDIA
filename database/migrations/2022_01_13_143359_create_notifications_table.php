<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pendaftaran_webinar_id')->nullable();
            $table->unsignedBigInteger('pendaftaran_internship_id')->nullable();
            $table->string('jenis');
            $table->string('header');
            $table->string('body');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pendaftaran_internship_id')->references('id')->on('pendaftaran_internships')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pendaftaran_webinar_id')->references('id')->on('pendaftaran_webinars')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
