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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();
            $table->string('value');
            $table->boolean('editable')->default(0);
            $table->boolean('status')->nullable(); // 1 for mother and 0 for children and null for all

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('attribute_user', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('attribute_id');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('value');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('attribute_children', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('attribute_id');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');

            $table->unsignedBigInteger('child_id')->nullable();
            $table->foreign('child_id')->references('id')->on('children')->onDelete('cascade');

            $table->string('value');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_child');
        Schema::dropIfExists('attribute_values');
        Schema::dropIfExists('attributes');
    }
};
