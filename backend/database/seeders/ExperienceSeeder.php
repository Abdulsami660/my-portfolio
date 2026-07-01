<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'role' => 'Staff Frontend Engineer',
                'company' => 'Vercel',
                'period' => '2022 — Present',
                'duration_label' => '3 YRS',
                'location' => 'San Francisco, CA',
                'description' => 'Lead the design system and component platform powering vercel.com, the dashboard, and docs. Own the Geist token layer, icon set, and 60+ primitives used across 8 product teams. Reduced UI build time by 55% through a new component scaffolding CLI.',
                'tech' => ['React', 'TypeScript', 'CSS Modules', 'Radix UI', 'Figma Tokens'],
            ],
            [
                'role' => 'Senior Frontend Engineer',
                'company' => 'Airbnb',
                'period' => '2019 — 2022',
                'duration_label' => '3 YRS',
                'location' => 'San Francisco, CA',
                'description' => "Core contributor to DLS — Airbnb's design language system used by 400+ engineers. Rebuilt the date picker and notification systems with zero WCAG regressions. Led the full codebase migration from Flow to TypeScript across 120K lines.",
                'tech' => ['React', 'TypeScript', 'Enzyme', 'Lerna', 'Storybook'],
            ],
            [
                'role' => 'Frontend Developer',
                'company' => 'Figma',
                'period' => '2017 — 2019',
                'duration_label' => '2 YRS',
                'location' => 'San Francisco, CA',
                'description' => 'Worked on the prototype player and presentation mode. Implemented scroll-triggered animation, responsive previews, and the smart-animate transition engine that shipped in Figma 4.0 to 4M users.',
                'tech' => ['TypeScript', 'WebGL', 'Canvas API', 'Rust (WASM)'],
            ],
        ];

        foreach ($rows as $i => $row) {
            Experience::create($row + ['sort_order' => $i]);
        }
    }
}
