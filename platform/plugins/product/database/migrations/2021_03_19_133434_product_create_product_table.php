<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ProductCreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // $table->string('name', 255);
            // $table->string('status', 60)->default('published');
            $table->string('product_name',100);
            $table->string('slug');
            $table->string('product_img')->nullable();
            $table->string('product_detail');
            $table->string('price');
            $table->string('qty');
            $table->unsignedBigInteger('cate_id');
            $table->foreign('cate_id')->references('id')->on('cates')->onDelete('cascade');
            $table->integer('purchase')->default(0);
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
        Schema::dropIfExists('products');
    }
}
