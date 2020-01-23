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
            $table->string('title_kana')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('sub_title_kana')->nullable();
            $table->string('series_name')->nullable();
            $table->string('series_name_kana')->nullable();
            $table->string('contents')->nullable();
            $table->string('author');
            $table->string('author_kana')->nullable();
            $table->string('publisher_name');
            $table->string('size')->nullable();
            $table->string('isbn');
            $table->text('item_caption');
            $table->string('sales_date');
            $table->integer('item_price')->nullable();
            $table->string('item_url')->nullable();
            $table->text('small_image_url')->nullable();
            $table->text('medium_image_url')->nullable();
            $table->text('large_image_url');
            $table->text('review_count')->nullable();
            $table->text('review_average')->nullable();
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
