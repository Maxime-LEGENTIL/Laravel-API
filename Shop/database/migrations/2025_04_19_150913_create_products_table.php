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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Custom columns
            $table->string('name');                       // nom du produit
            $table->text('description')->nullable();      // description longue
            $table->decimal('price', 10, 2);              // prix (ex: 99.99)
            $table->unsignedInteger('stock');             // stock disponible
            $table->string('slug');                       // slug du produit
            $table->string('sku')->nullable();            // code produit interne
            
            //$table->string('image')->nullable();          // chemin ou URL vers l’image
            //$table->foreignId('category_id')->constrained()->onDelete('cascade'); // lien vers une catégorie    
            // Custom columns

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
