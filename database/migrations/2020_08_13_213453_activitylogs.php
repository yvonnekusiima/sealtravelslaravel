<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Activitylogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administratoractivitylog', function (Blueprint $table)
        {
            $table->string('AdministratorId');
            $table->string('DateTimestamp');
            $table->string('Action');
            $table->string('IPAddress');
            $table->string('HostName');
        });

        Schema::create('useractivitylog', function (Blueprint $table)
        {
            $table->string('Username');
            $table->string('DateTimestamp');
            $table->string('Action');
            $table->string('IPAddress');
            $table->string('HostName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administratoractivitylog');
        Schema::dropIfExists('useractivitylog');
    }
}
