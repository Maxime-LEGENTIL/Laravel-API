<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        // Liste des catégories de produits e-commerce
        $categories = [
            'Électronique', 'Mode Femme', 'Mode Homme', 'Maison & Jardin', 'Sports & Loisirs',
            'Beauté & Bien-être', 'Enfants & Bébés', 'Auto & Moto', 'Livres & Médias', 'Alimentation',
            'Gaming', 'Musique', 'Animalerie', 'Bricolage', 'Décoration', 'Voyages', 'High-Tech', 'Cuisine'
        ];

        // Liste des produits pour chaque catégorie
        $productsByCategory = [
            'Électronique' => [
                'Smartphone Android', 'Tablette 10 pouces', 'Casque Audio Bluetooth', 'Télévision LED 4K', 'Chargeur sans fil'
            ],
            'Mode Femme' => [
                'Robe en coton', 'Pantalon en jean', 'Blouse en soie', 'Veste en cuir', 'Sac à main en cuir'
            ],
            'Mode Homme' => [
                'T-shirt imprimé', 'Veste en laine', 'Jeans slim', 'Sweat à capuche', 'Chemise à carreaux'
            ],
            'Maison & Jardin' => [
                'Canapé en tissu', 'Lampe de table', 'Table basse en bois', 'Plante d\'intérieur', 'Coussin décoratif'
            ],
            'Sports & Loisirs' => [
                'Vélo de montagne', 'Planche de surf', 'Raquette de tennis', 'Sac de sport', 'Chaussures de randonnée'
            ],
            'Beauté & Bien-être' => [
                'Crème anti-âge', 'Rouge à lèvres mat', 'Parfum pour femme', 'Brosse lissante', 'Gel douche parfumé'
            ],
            'Enfants & Bébés' => [
                'Poussette légère', 'Chaise haute', 'Vêtements bébé', 'Tapis de jeu', 'Lit parapluie'
            ],
            'Auto & Moto' => [
                'Casque de moto', 'Housse de siège auto', 'Rétroviseur universel', 'Coffre de toit', 'Caméra de tableau de bord'
            ],
            'Livres & Médias' => [
                'Roman policier', 'Biographie inspirante', 'Livre de cuisine', 'Bande dessinée', 'Album photo'
            ],
            'Alimentation' => [
                'Pâtes italiennes', 'Huile d\'olive extra vierge', 'Chocolat au lait', 'Café en grains', 'Céréales bio'
            ],
            'Gaming' => [
                'Console de jeux', 'Manette sans fil', 'Jeu vidéo pour PS5', 'Casque gaming', 'Clavier RGB pour gamer'
            ],
            'Musique' => [
                'Guitare acoustique', 'Clavier numérique', 'Enceinte Bluetooth', 'Amplificateur de guitare', 'Microphone USB'
            ],
            'Animalerie' => [
                'Panier pour chien', 'Litière pour chat', 'Jouet pour perroquet', 'Cage pour hamster', 'Collier pour chat'
            ],
            'Bricolage' => [
                'Perceuse sans fil', 'Scie circulaire', 'Mètre ruban', 'Pince à dénuder', 'Visseuse électrique'
            ],
            'Décoration' => [
                'Tableau moderne', 'Coussin décoratif', 'Horloge murale', 'Vase en céramique', 'Lampadaire design'
            ],
            'Voyages' => [
                'Valise cabine', 'Sac à dos de randonnée', 'Masque de plongée', 'Cadenas de voyage', 'Kit de voyage'
            ],
            'High-Tech' => [
                'Smartwatch', 'Casque VR', 'Appareil photo numérique', 'Ordinateur portable', 'Clé USB 1 To'
            ],
            'Cuisine' => [
                'Blender haute performance', 'Robot de cuisine multifonction', 'Couteau de chef', 'Poêle en fonte', 'Grille-pain'
            ]
        ];

        // Sélectionner une catégorie aléatoire
        $category = $this->faker->randomElement($categories);
        // Sélectionner un produit aléatoire de la catégorie
        $productName = $this->faker->randomElement($productsByCategory[$category]);

        return [
            'name' => $productName,
            'slug' => Str::slug($productName), // Slug à partir du nom du produit
            'description' => $this->faker->paragraph(3), // Description générée aléatoirement
            'price' => $this->faker->randomFloat(2, 5, 500), // Prix aléatoire entre 5 et 500
            'stock' => $this->faker->numberBetween(0, 100), // Quantité en stock
            'sku' => strtoupper($this->faker->bothify('???-#####')), // SKU aléatoire
            //'category' => $category,  // Catégorie
        ];
    }
}
