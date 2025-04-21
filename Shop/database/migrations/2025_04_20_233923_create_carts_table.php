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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('session_id')->nullable();
            $table->string('coupon_code')->nullable();
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('tax', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);
            $table->timestamp('abandoned_at')->nullable();
            $table->boolean('is_guest')->default(false);
            $table->timestamps();
            
            // Chaque utilisateur ne peut avoir qu'un seul panier actif
            $table->index(['user_id', 'session_id']);
        });
        
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity')->default(1);
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->json('attributes')->nullable();
            $table->timestamps();
            
            // Un produit peut apparaître plusieurs fois dans un panier avec des attributs différents
            $table->unique(['cart_id', 'product_id', 'attributes'], 'cart_product_attributes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_details');
        Schema::dropIfExists('carts');
    }
};