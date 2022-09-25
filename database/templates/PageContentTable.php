<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PageContentTable
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up($tableName)
    {
        Schema::create($tableName, function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->string('file');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down($tableName)
    {
        Schema::dropIfExists($tableName);
    }
}
