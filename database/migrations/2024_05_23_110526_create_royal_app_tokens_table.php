<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('royal_app_tokens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('token_id')->nullable();
            $table->text('token_key')->nullable();
            $table->text('refresh_token_key')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('refresh_expires_at')->nullable();
            $table->timestamp('last_active_date')->nullable();
            
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('royal_app_tokens');
    }
};
