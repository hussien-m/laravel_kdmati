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
        Schema::create('settings', function (Blueprint $table) {
            $table->string('site_name',20)->nullable();
            $table->string('logo',255)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('email',25)->nullable();
            $table->string('whatsapp',15)->nullable();
            $table->string('facebook',25)->nullable();
            $table->string('twitter',25)->nullable();
            $table->string('instagram',25)->nullable();;
            $table->boolean('site_status')->default(1);
            $table->string('meta_tag')->nullable();
            $table->string('meta_desc')->nullable();
            $table->text('Instructions')->nullable();
            $table->float('tax')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
