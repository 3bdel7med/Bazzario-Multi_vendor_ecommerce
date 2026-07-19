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
        Schema::create("shops", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            // conect with user
            $table->unsignedBigInteger("user_id")->unique();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->string("slug")->unique();
            $table->text("description")->nullable();
            $table->string("logo")->nullable();
            $table->string("address")->nullable();
            $table->string("phone")->nullable();
            $table->decimal("rating", 10, 2)->default(0.00);
            $table->decimal("commission_rate", 10, 2)->default(10.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("shops");
    }
};
