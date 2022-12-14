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
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('color');
            $table->string('brand');
            $table->string('model');
           
            $table->string('size');
            $table->string('price');
            $table->string('description');
            $table->timestamps();


            // Foreign key
            $table->foreignId('bike_type_id')
                ->constrained('bike_types')
                ->onUpdate('restrict')
                ->onDelete('restrict');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bike');
    }
};
