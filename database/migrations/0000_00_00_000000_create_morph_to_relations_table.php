<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class CreateMorphToRelationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(Config::get('amethyst.morph-to-relation.data.morph-to-relation.table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('entity');
            $table->string('attribute');
            $table->string('target');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('amethyst.morph-to-relation.data.morph-to-relation.table'));
    }
}
