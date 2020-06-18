<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouterDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('router_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sapid',18)->unique();
            $table->string('hostname',18)->unique();
            $table->string('loopback',60)->unique();
            $table->string('mac_address',17)->unique();
            $table->string('type',10);
            $table->boolean('status')->default(True);
            $table->bigInteger('inet_aton');

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
        Schema::dropIfExists('router_info');
    }
}
