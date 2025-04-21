<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition(): array
    {
        // Liste de marques françaises pour e-commerce
        $marquesFrancaises = [
            'Décathlon', 'Sephora', 'Galeries Lafayette', 'Fnac', 'Darty', 'La Redoute', 
            'Monoprix', 'Boulanger', 'Leclerc', 'Carrefour', 'Auchan', 'Leroy Merlin',
            'Maisons du Monde', 'Intersport', 'Cultura', 'Nature & Découvertes', 'Printemps', 
            'Camaïeu', 'Kiabi', 'Jules', 'Celio', 'Lacoste', 'Sandro', 'Maje', 'Etam',
            'Promod', 'Pimkie', 'Eram', 'André', 'Minelli', 'Prada', 'Louis Vuitton', 
            'Hermès', 'Chanel', 'Dior', 'Yves Saint Laurent', 'Lancôme', 'L\'Oréal',
            'Guerlain', 'Vichy', 'La Roche-Posay', 'Bioderma', 'Nuxe', 'Avène', 'Klorane',
            'Le Coq Sportif', 'Aigle', 'Petit Bateau', 'Longchamp', 'Lancel', 'Repetto',
            'Agnès b.', 'A.P.C.', 'Balmain', 'Balenciaga', 'Celine', 'Eden Park',
            'Le Slip Français', 'Armor Lux', 'Saint James', 'Eminence', 'Le Chat', 'Jacadi',
            'Tartine et Chocolat', 'Bonpoint', 'Oxybul', 'Cyrillus', 'Catimini', 'Verbaudet',
            'Maison Kitsuné', 'The Kooples', 'Zadig & Voltaire', 'Claudie Pierlot', 'Ba&sh',
            'Comptoir des Cotonniers', 'Kaporal', 'Serge Blanco', 'Eden Park', 'Gémo',
            'Eram', 'Bocage', 'San Marina', 'L\'Occitane', 'Nocibé', 'Marionnaud',
            'Kenzo', 'Givenchy', 'Sessùn', 'American Vintage', 'Faguo', 'Pimkie',
            'Bizzbee', 'Caroll', 'NAF NAF', 'Morgan', 'Cop.Copine', 'Texto', 'Sabon',
            'Montagut', 'Lolë', 'Berluti', 'Boucheron', 'Cartier', 'Christofle', 'Damart'
        ];
        
        $name = $this->faker->unique()->randomElement($marquesFrancaises);
        
        // Descriptions e-commerce en français
        $descriptions = [
            "Fondée en France, {$name} représente l'excellence du savoir-faire français depuis plusieurs décennies. Notre marque s'engage à offrir des produits de qualité supérieure tout en respectant des valeurs durables et éthiques.",
            "{$name} est une marque française inspirée par l'art de vivre à la française. Nos collections allient élégance intemporelle et innovation pour répondre aux attentes des consommateurs les plus exigeants.",
            "Depuis sa création, {$name} incarne l'élégance parisienne et le raffinement à la française. Chaque produit est conçu avec passion et minutie pour vous offrir une expérience unique.",
            "Créée en France, {$name} est reconnue pour son style authentique et son engagement envers la qualité. Notre objectif est de proposer des produits durables qui traversent les tendances et les saisons.",
            "{$name} met en avant l'artisanat français et propose des collections où tradition et modernité se rencontrent pour créer des pièces uniques et désirables.",
            "Née au cœur de la France, {$name} cultive l'art du détail et l'amour des belles matières. Notre philosophie repose sur l'authenticité et la recherche permanente d'excellence.",
            "{$name}, fleuron de l'industrie française, propose des produits alliant esthétique contemporaine et fonctionnalité. Chaque création est pensée pour s'intégrer parfaitement dans votre quotidien.",
            "Avec plus de 20 ans d'expertise, {$name} est devenue une référence incontournable dans son domaine. Notre passion pour l'innovation nous pousse à réinventer constamment nos collections.",
            "{$name} s'inspire de l'esprit français alliant décontraction et sophistication. Nos créations sont conçues pour ceux qui recherchent l'équilibre parfait entre style et confort.",
            "Ambassadrice du style français, {$name} combine héritage et créativité pour proposer des produits qui traversent les générations tout en restant résolument contemporains."
        ];
        
        // Domaines français populaires
        $domaines = ['fr', 'com', 'shop', 'paris', 'store'];
        
        // Construction d'un nom de domaine plausible
        $nomDomaine = Str::slug($name);
        $extension = $this->faker->randomElement($domaines);
        $siteWeb = "https://www.{$nomDomaine}.{$extension}";
        
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->randomElement($descriptions),
            'logo_path' => 'images/brands/' . Str::slug($name) . '.png',
            'website_url' => $siteWeb,
            'is_active' => $this->faker->boolean(90),
        ];
    }
}