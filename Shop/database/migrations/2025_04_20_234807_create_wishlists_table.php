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
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();


            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name')->default('Default');
            $table->boolean('is_public')->default(false);


            $table->timestamps();
        });

        Schema::create('wishlist_items', function (Blueprint $table) {
            $table->id();


            $table->foreignId('wishlist_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->text('notes')->nullable();

            
            $table->timestamps();
            
            // Un produit ne peut apparaître qu'une seule fois dans une liste de souhaits
            $table->unique(['wishlist_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
