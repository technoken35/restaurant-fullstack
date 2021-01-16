<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('image_url');
            $table->float('price',8,2);
            // linking category id to food category table
            // we make it nullable so if we delete one category we dont delete ALL items just items associated with deleted category
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('food_items', function (Blueprint $table) {

            // foreign means we are pointing the value of this column to a key(column) on another table
            // refrences means we want to get the value for this table from the id column on the roles table
            // we are using set null so the items dont delete and we are able to assign items to a different category
            $table->foreign('category_id')->references('id')->on('food_categories')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_items');
    }
}
