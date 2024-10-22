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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['customer', 'admin', 'restaurant'])->default('customer');
            $table->string('foto', 300)->nullable();
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->unsignedBigInteger('association_id')->nullable(); 
            $table->rememberToken();
            $table->timestamps();

            // Définir la clé étrangère
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('set null');
            $table->foreign('association_id')->references('id')->on('associations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['restaurant_id']); // Add this line to drop restaurant_id foreign key
            $table->dropForeign(['association_id']); // Supprimer la contrainte de clé étrangère
            $table->dropColumn('association_id'); // Supprimer la colonne
        });

        Schema::dropIfExists('users');
    }
};