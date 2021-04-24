<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('picture')->nullable();
            $table->string('mobile_1')->nullable();
            $table->string('mobile_2')->nullable();
            $table->string('nic')->nullable();
            $table->string('rvsa_id')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->nullable();
            $table->longText('address')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->foreignId('rvsa_unit_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('members');
    }
}
