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
        // A table to store the books user's enter/upload
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('title');
            $table->string('author');
            $table->text('description');
            $table->string('isbn', 13)->nullable();
            $table->string('image_path')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });

        // A table that can be used to quickly pull default information on some books, made for searching
        Schema::create('default_books', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->string('author')->index();
            $table->string('isbn', 13)->unique();
            $table->string('image_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
        Schema::dropIfExists('default_books');
    }
}
