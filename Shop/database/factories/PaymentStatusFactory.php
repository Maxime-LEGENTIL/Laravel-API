<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentStatusFactory extends Factory
{
    public function definition(): array
    {
        // États de paiement enrichis pour un gros site e-commerce
        $statuses = [
            'En attente' => 'Le paiement a été initié mais n\'est pas encore confirmé.',
            'En cours de traitement' => 'Le paiement est en cours de validation par le système de paiement.',
            'Payé' => 'Le paiement a été complété avec succès.',
            'Paiement partiel' => 'Une partie du montant a été réglée.',
            'Autorisé' => 'Le paiement a été autorisé mais pas encore capturé.',
            'Capturé' => 'Les fonds ont été capturés suite à l’autorisation.',
            'En attente de confirmation' => 'Le vendeur doit confirmer la réception du paiement.',
            'En cours de vérification' => 'Le paiement est vérifié pour éviter les fraudes.',
            'Échoué' => 'Le paiement a échoué, l’utilisateur doit réessayer.',
            'Annulé' => 'Le paiement a été annulé avant d’être finalisé.',
            'Remboursé' => 'Le montant total a été remboursé à l’acheteur.',
            'Partiellement remboursé' => 'Une partie du paiement a été remboursée.',
            'Remboursement en attente' => 'Le remboursement a été initié mais pas encore traité.',
            'Chargeback en cours' => 'L’acheteur a contesté la transaction auprès de sa banque.',
            'Chargeback confirmé' => 'Le chargeback a été confirmé et les fonds retirés.',
            'En litige' => 'Un litige est ouvert entre le vendeur et l’acheteur.',
            'Résolu' => 'Le litige a été résolu.',
            'Bloqué' => 'Le paiement est temporairement bloqué pour suspicion de fraude.',
            'En attente de paiement' => 'L’acheteur n’a pas encore effectué le paiement.',
            'Paiement expiré' => 'Le délai de paiement est dépassé.',
            'Rejeté par la banque' => 'La banque a refusé le paiement.',
            'Paiement en espèces à la livraison' => 'Le paiement sera effectué en espèces à la réception.',
            'Paiement par chèque' => 'Le paiement par chèque est en attente de réception.',
            'Paiement en plusieurs fois' => 'Le paiement est effectué en plusieurs mensualités.',
        ];

        // Choisir un statut et sa description
        $status = $this->faker->unique()->randomElement(array_keys($statuses));
        $description = $statuses[$status];

        return [
            'name' => $status,
            'description' => $description,
        ];
    }
}
