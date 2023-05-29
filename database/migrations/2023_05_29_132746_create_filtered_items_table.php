<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use SebastianBergmann\Type\VoidType;

class CreateFilteredItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */




    public function up(): Void
    {
        Schema::create('filtered_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down(): void
    {
        Schema::dropIfExists('filtered_items');
    }
};
