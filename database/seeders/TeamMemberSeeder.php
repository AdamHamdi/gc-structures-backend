<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name'      => 'Gérant GC Structures',
                'role'      => 'Ingénieur Structure & Gérant',
                'bio'       => 'Ingénieur diplômé spécialisé en calcul de structures et génie civil. Fort d\'une expérience significative dans la conception d\'ouvrages en béton armé, charpentes métalliques et structures bois, il dirige le bureau d\'études avec rigueur et expertise.',
                'email'     => 'contact@gc-structures.fr',
                'linkedin'  => null,
                'order'     => 1,
                'is_active' => true,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::create($member);
        }
    }
}
