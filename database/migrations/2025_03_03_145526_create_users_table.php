<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\User;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('email', 100);
            $table->string('password');
            $table->timestamps();
        });

        User::insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Alice',
                'last_name' => 'Johnson',
                'email' => 'alice.johnson@example.com',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
