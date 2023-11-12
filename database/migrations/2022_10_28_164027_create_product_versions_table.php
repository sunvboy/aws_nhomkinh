<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_versions', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('id_version');
            $table->string('title_version');
            $table->string('code_version');
            $table->string('image_version');
            $table->integer('price_version');
            $table->integer('price_sale_version');
            $table->string('_stock_status');
            $table->integer('_stock');
            $table->integer('_outstock_status');
            $table->integer('userid_created');
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
        Schema::dropIfExists('product_versions');
    }
}
