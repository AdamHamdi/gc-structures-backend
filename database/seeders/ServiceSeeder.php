<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title'       => 'Génie Civil',
                'description' => 'Conception et suivi de projets d\'infrastructure urbaine et de génie civil. Nous intervenons sur des ouvrages d\'art, des fondations spéciales, des terrassements et des infrastructures routières. Notre expertise couvre l\'ensemble du cycle de vie du projet, de la faisabilité à la réception des travaux.',
                'icon'        => 'hard-hat',
                'order'       => 1,
                'is_active'   => true,
            ],
            [
                'title'       => 'Structures',
                'description' => 'Études et conception de structures en béton armé, charpentes métalliques et structures bois. Nous réalisons les calculs de dimensionnement, les plans de coffrage et d\'armatures, ainsi que les plans d\'exécution pour tous types de bâtiments : logements, bureaux, bâtiments industriels et ouvrages de grande hauteur.',
                'icon'        => 'building',
                'order'       => 2,
                'is_active'   => true,
            ],
            [
                'title'       => 'Études & Assistance',
                'description' => 'Assistance à maîtrise d\'ouvrage (AMOA), études de faisabilité et pré-dimensionnement pour anticiper les meilleures solutions techniques. Nous accompagnons nos clients dès les phases amont du projet jusqu\'à la constitution des dossiers de consultation des entreprises (DCE) et le suivi de chantier.',
                'icon'        => 'clipboard',
                'order'       => 3,
                'is_active'   => true,
            ],
            [
                'title'       => 'Conseil & Réglementation',
                'description' => 'Conseil en matière réglementaire et normative : Eurocodes, DTU, règles parasismiques. Nous réalisons des études sismiques et dynamiques, des audits structurels et des expertises techniques. Notre équipe vous accompagne dans la mise en conformité de vos ouvrages et vous conseille sur les solutions les plus adaptées à votre projet.',
                'icon'        => 'shield-check',
                'order'       => 4,
                'is_active'   => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
