<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('authorized_systems', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignIdFor(User::class, 'administrator_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('token');
            $table->string('ip_address')->nullable();
            $table->boolean('active')->default('true');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('authorized_systems');
    }
};
