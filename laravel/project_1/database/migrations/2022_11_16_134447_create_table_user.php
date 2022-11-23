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
        Schema::create('table_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('type', [0,  # * <- Standard user
                                  1]  # * <- Administrator
            );
            $table->string('username'       )->unique();
            $table->string('email'          );
            $table->string('password_hash'  );
            $table->string('url_profile_pic')->nullable();
            $table->string('profile_info'   )->nullable();
            $table->string('address'        )->nullable();
            $table->string('phone_number'   )->nullable();

            $table->index(['id', 'username']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_user');
    }
};
