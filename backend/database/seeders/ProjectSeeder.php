<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'slug' => 'prism',
                'title' => 'Prism',
                'tagline' => 'Open-Source Design System Toolkit',
                'description' => 'A comprehensive toolkit for building, documenting, and distributing design systems. Ships a CLI for Figma token extraction, a Vite plugin for live reload, and 60+ accessible primitives built on Radix UI. Adopted by 200+ teams and receiving 4,800 weekly npm installs.',
                'long_description' => 'Prism started as an internal Vercel project to unify the component library across the dashboard and marketing site. After open-sourcing in early 2023, it grew rapidly due to its opinionated but escapable token architecture. The CLI generates typed token files from Figma Variables, eliminating the manual copy-paste that plagues design-development handoff. The component layer is built on Radix UI primitives, ensuring accessibility is structural rather than bolted on.',
                'image' => 'https://images.unsplash.com/photo-1558655146-d09347e92766?w=1000&h=620&fit=crop&auto=format',
                'github_url' => 'https://github.com',
                'live_url' => 'https://example.com',
                'tech' => ['React', 'TypeScript', 'Radix UI', 'Figma API', 'Vite', 'Storybook'],
                'stats' => ['stars' => '6.2K', 'installs' => '4.8K/wk', 'components' => '60+'],
                'is_featured' => true,
            ],
            [
                'slug' => 'carta',
                'title' => 'Carta',
                'tagline' => 'Portfolio Builder for Creatives',
                'description' => 'A no-code portfolio builder for designers and developers. Block-based editor, custom domains, and auto-generated OG images. Over 12,000 active sites hosted, with a 99.99% uptime SLA.',
                'long_description' => 'Carta was born from frustration with the existing portfolio tools — either too opinionated or too complex to customize. The block editor allows truly freeform layout while abstracting away the CSS complexity. Under the hood it compiles block trees to Next.js pages and deploys to Vercel Edge, giving every site sub-100ms TTFB globally.',
                'image' => 'https://images.unsplash.com/photo-1611532736597-de2d4265fba3?w=800&h=500&fit=crop&auto=format',
                'github_url' => 'https://github.com',
                'live_url' => 'https://example.com',
                'tech' => ['Next.js', 'tRPC', 'Prisma', 'PlanetScale', 'Cloudflare'],
                'stats' => ['sites' => '12K+', 'uptime' => '99.99%', 'users' => '18K'],
                'is_featured' => false,
            ],
            [
                'slug' => 'motif',
                'title' => 'Motif',
                'tagline' => 'Declarative Animation Library',
                'description' => 'A React animation library that compiles declarative descriptors to the Web Animations API. Zero runtime overhead, fully tree-shakeable, 20KB gzipped.',
                'long_description' => 'Motif takes a compiler-first approach to animations. Instead of a runtime that interprets animation configs, Motif pre-compiles your declarative animation objects into optimized WAAPI calls at build time. The result is animations that are indistinguishable from hand-written native code in DevTools — no wrapper divs, no style overrides, no runtime costs.',
                'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=800&h=500&fit=crop&auto=format',
                'github_url' => 'https://github.com',
                'live_url' => 'https://example.com',
                'tech' => ['TypeScript', 'Web Animations API', 'Rollup', 'Vitest'],
                'stats' => ['size' => '20KB', 'stars' => '2.1K', 'downloads' => '9K/wk'],
                'is_featured' => false,
            ],
            [
                'slug' => 'relay',
                'title' => 'Relay',
                'tagline' => 'Atomic State Management',
                'description' => 'A lightweight atomic state library for React with time-travel debugging, devtools extension, and first-class Next.js server component support.',
                'long_description' => 'Relay draws on the best ideas from Recoil and Jotai while adding first-class support for React Server Components. The key insight is that atoms can be serialized to/from the server, enabling seamless hydration without client-side waterfalls. The devtools extension provides time-travel debugging across atom state, making complex state bugs reproducible and reversible.',
                'image' => 'https://images.unsplash.com/photo-1640552435388-a54879e72b28?w=800&h=500&fit=crop&auto=format',
                'github_url' => 'https://github.com',
                'live_url' => 'https://example.com',
                'tech' => ['React', 'TypeScript', 'Immer', 'Chrome DevTools Protocol'],
                'stats' => ['downloads' => '6K/wk', 'stars' => '3.4K', 'size' => '8KB'],
                'is_featured' => false,
            ],
        ];

        foreach ($rows as $i => $row) {
            Project::create($row + ['sort_order' => $i]);
        }
    }
}
