<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'year' => '2017',
                'degree' => 'B.S. Computer Science',
                'school' => 'University of Illinois Urbana-Champaign',
                'subtitle' => 'GPA 3.92 · Highest Distinction · HCI Specialization',
                'note' => 'Senior thesis: "Spatial UI Paradigms for Touch-First Interfaces." TA for CS 411 (Database Systems) for two years.',
            ],
            [
                'year' => '2022',
                'degree' => 'AWS Solutions Architect',
                'school' => 'Amazon Web Services — Professional',
                'subtitle' => 'Score 901 / 1000',
                'note' => 'Focused on serverless patterns, edge delivery networks, and infrastructure-as-code at scale. Renewed annually.',
            ],
        ];

        foreach ($rows as $i => $row) {
            Education::create($row + ['sort_order' => $i]);
        }
    }
}
