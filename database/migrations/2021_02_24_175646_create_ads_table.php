<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('category', ['Accomodation', 'Fashion', 'Furniture', 'Jobs', 'Leisure', 'Motors', 'Multimedia', 'Pets', 'Services']);
            $table->text('description');
            $table->string('picture');
            $table->unsignedInteger('price');
            $table->string('location');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('ads');
    }
}
