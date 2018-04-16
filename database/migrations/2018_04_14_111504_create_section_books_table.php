<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('section_name');
            $table->string('description');
            $table->timestamps();
        });
        $faker = \Faker\Factory::create();
        for ($i=0; $i<5; $i++){
            $sectionBooks = new \App\SectionBooks();
            $sectionBooks->section_name = $faker->text(random_int(10, 50));
            $sectionBooks->description = $faker->text;
            $sectionBooks->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('section_books');
    }
}
