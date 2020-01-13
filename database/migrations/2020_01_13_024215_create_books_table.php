<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('title_kana');
            $table->string('sub_title');
            $table->string('sub_title_kana');
            $table->string('series_name');
            $table->string('series_name_kana');
            $table->string('contents');
            $table->string('author');
            $table->string('author_kana');
            $table->string('publisher_name');
            $table->string('size');
            $table->string('isbn');
            $table->text('item_caption');
            $table->string('sales_date');
            $table->integer('item_price');
            $table->string('item_url');
            $table->text('small_image_url');
            $table->text('medium_image_url');
            $table->text('large_image_url');
            $table->text('review_count');
            $table->text('review_average');
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
        Schema::dropIfExists('books');
    }
}
