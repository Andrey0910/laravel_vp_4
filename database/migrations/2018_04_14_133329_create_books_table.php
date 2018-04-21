<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('book_name', 255);
            $table->integer('section_books_id');
            $table->integer('price');
            $table->string('photo', 255)->default(null);
            $table->string('description')->default(null);
            $table->boolean('show')->default(1);
            $table->timestamps();
        });


        $faker = \Faker\Factory::create();
        for ($i=0; $i<20; $i++){
            $book = new \App\Books();
            $book->book_name = $faker->text(random_int(10, 50));
            $book->section_books_id = random_int(1, 5);
            $book->price = random_int(100, 2000);
            $book->photo = random_int(1, 10000).$faker->firstName.'.jpg';
            $book->description = $faker->text;
            $book->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
