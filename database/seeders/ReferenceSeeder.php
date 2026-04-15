<?php

namespace Database\Seeders;

use App\Models\Reference;
use Illuminate\Database\Seeder;

class ReferenceSeeder extends Seeder
{
    public function run(): void
    {
        $references = [
            [
                'title'       => 'Centre logistique de stockage et distribution',
                'description' => 'Conception structurelle d\'un centre logistique de grande envergure. Structure mixte béton-métal avec planchers collaborants, poteaux et portiques métalliques. Dimensionnement des fondations et des dallages industriels.',
                'category'    => 'Industriel',
                'location'    => 'Île-de-France',
                'year'        => 2022,
                'is_featured' => true,
                'is_active'   => true,
                'order'       => 1,
            ],
            [
                'title'       => 'Immeuble de bureaux R+8 en béton armé',
                'description' => 'Études structure complètes d\'un immeuble de bureaux de 8 étages. Conception en béton armé avec voiles porteurs et noyau central. Plans de coffrage, d\'armatures et notes de calcul selon les Eurocodes.',
                'category'    => 'Tertiaire',
                'location'    => 'Paris',
                'year'        => 2021,
                'is_featured' => true,
                'is_active'   => true,
                'order'       => 2,
            ],
            [
                'title'       => 'Tour tertiaire',
                'description' => 'Conception et études d\'exécution d\'une tour de bureaux. Analyse dynamique et sismique, dimensionnement des éléments porteurs verticaux et horizontaux, vérification de la stabilité sous charges horizontales (vent et séisme).',
                'category'    => 'Tertiaire',
                'location'    => 'Île-de-France',
                'year'        => 2023,
                'is_featured' => false,
                'is_active'   => true,
                'order'       => 3,
            ],
            [
                'title'       => 'Viaduc routier en béton précontraint',
                'description' => 'Conception et suivi des études d\'un viaduc routier à travées continues en béton précontraint. Calculs des pertes de précontrainte, vérification ELU/ELS, plans de câblage et notes de calcul.',
                'category'    => 'Génie Civil',
                'location'    => 'France',
                'year'        => 2020,
                'is_featured' => true,
                'is_active'   => true,
                'order'       => 4,
            ],
            [
                'title'       => 'Silos métalliques et charpente',
                'description' => 'Dimensionnement de silos de stockage agricole en structure métallique. Calcul des pressions de remplissage selon l\'Eurocode 1, conception de la charpente de couverture et des passerelles d\'accès.',
                'category'    => 'Industriel',
                'location'    => 'France',
                'year'        => 2021,
                'is_featured' => false,
                'is_active'   => true,
                'order'       => 5,
            ],
            [
                'title'       => 'Résidence collective R+8 avec parking en sous-sol',
                'description' => 'Études structure d\'une résidence collective de 8 étages avec deux niveaux de parking souterrain. Conception du radier général, des voiles de sous-sol et de la structure hors sol en béton armé. Gestion des interfaces avec les corps d\'état architecturaux.',
                'category'    => 'Résidentiel',
                'location'    => 'Île-de-France',
                'year'        => 2022,
                'is_featured' => true,
                'is_active'   => true,
                'order'       => 6,
            ],
            [
                'title'       => 'Tour de bureaux de grande hauteur',
                'description' => 'Mission complète de maîtrise d\'œuvre structure pour une tour de grande hauteur. Modélisation 3D aux éléments finis, analyses modales, vérification des déformations et des efforts dans les éléments structuraux.',
                'category'    => 'Tertiaire',
                'location'    => 'Paris',
                'year'        => 2023,
                'is_featured' => false,
                'is_active'   => true,
                'order'       => 7,
            ],
            [
                'title'       => 'Complexe immobilier mixte',
                'description' => 'Conception structure d\'un complexe immobilier à programme mixte : logements, commerces en rez-de-chaussée et bureaux. Coordination des interfaces entre les différentes entités, gestion des joints de dilatation et des discontinuités structurelles.',
                'category'    => 'Mixte',
                'location'    => 'Île-de-France',
                'year'        => 2022,
                'is_featured' => false,
                'is_active'   => true,
                'order'       => 8,
            ],
            [
                'title'       => 'Bâtiment industriel',
                'description' => 'Conception d\'un bâtiment industriel en charpente métallique. Portiques à traverses et poteaux avec couverture bac acier, calcul des contreventements et des fondations sur pieux.',
                'category'    => 'Industriel',
                'location'    => 'France',
                'year'        => 2020,
                'is_featured' => false,
                'is_active'   => true,
                'order'       => 9,
            ],
            [
                'title'       => 'Logements haut de gamme',
                'description' => 'Études et suivi de travaux pour un programme de logements haut de gamme. Dalles champignon, façades préfabriquées, terrasses accessibles avec étanchéité intégrée. Assistance technique pendant toute la phase chantier.',
                'category'    => 'Résidentiel',
                'location'    => 'Paris',
                'year'        => 2023,
                'is_featured' => false,
                'is_active'   => true,
                'order'       => 10,
            ],
        ];

        foreach ($references as $reference) {
            Reference::create($reference);
        }
    }
}
