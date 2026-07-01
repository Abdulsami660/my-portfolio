<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'React & Next.js', 'category' => 'Frontend', 'percentage' => 97, 'description' => 'RSC, App Router, streaming, production architecture at scale'],
            ['name' => 'TypeScript', 'category' => 'Language', 'percentage' => 93, 'description' => 'Advanced generics, type inference, monorepo tooling, library authoring'],
            ['name' => 'Design Systems', 'category' => 'Systems', 'percentage' => 90, 'description' => 'Token architecture, multi-brand theming, Figma-to-code pipelines'],
            ['name' => 'Web Performance', 'category' => 'Infrastructure', 'percentage' => 85, 'description' => 'Core Web Vitals, bundle optimization, streaming, edge caching'],
            ['name' => 'Node.js & Go', 'category' => 'Backend', 'percentage' => 82, 'description' => 'REST & GraphQL APIs, CLI tooling, background workers'],
            ['name' => 'Cloud & DevOps', 'category' => 'Platform', 'percentage' => 78, 'description' => 'Vercel Edge, AWS Lambda, CI/CD, observability pipelines'],
        ];

        foreach ($skills as $i => $skill) {
            Skill::create($skill + ['sort_order' => $i]);
        }
    }
}
