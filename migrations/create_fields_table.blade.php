<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create({{ $fieldTable }}, function ($table) {
            $table->increments('id');
            $table->string('title');
            $table->string('type');
            $table->text('description');
            $table->longText('options');
            $table->boolean('hidden')->default(false);
            $table->unsignedInteger('form_id');
            $table->timestamps();

            $table->foreign('form_id')->references('id')->on({{ $formTable }})
                  ->onUpdate('cascade')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop({{ $fieldTable }});
    }
}
