<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'quote' => 'Jordan redesigned the entire Airbnb date-picker from scratch in a single sprint. It has been running in production for three years without a single accessibility regression. That quality of work is genuinely rare.',
                'author' => 'Lena Okonkwo',
                'role' => 'Principal Engineer, Airbnb',
                'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=80&h=80&fit=crop&auto=format',
            ],
            [
                'quote' => 'The Prism design system cut our component build time by 60% and halved designer onboarding. Jordan shipped it across 8 teams with zero breaking changes and impeccable documentation. Extraordinary engineering judgment.',
                'author' => 'Chris Nwachukwu',
                'role' => 'VP of Engineering, Vercel',
                'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&auto=format',
            ],
            [
                'quote' => "Jordan's talk on token architecture at Config 2023 was the most actionable session at the conference. Within a week, three of our enterprise clients had restructured their entire design token pipeline using their methodology.",
                'author' => 'Akira Tanaka',
                'role' => 'Co-founder, Tokens Studio',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&h=80&fit=crop&auto=format',
            ],
        ];

        foreach ($rows as $i => $row) {
            Testimonial::create($row + ['sort_order' => $i]);
        }
    }
}
