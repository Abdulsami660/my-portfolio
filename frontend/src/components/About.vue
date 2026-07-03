<script setup>
import Tag from './Tag.vue'

const STATS = [
  { val: '5+', label: 'Years Experience' },
  { val: '$20M+', label: 'Product Acquisition Value' },
  { val: 'Full Stack', label: 'Laravel • Vue • React • MERN' },
  { val: 'AI', label: 'LLMs, RAG & Agents' },
]

const SOCIALS = [
  { label: 'GitHub', href: 'https://github.com/abdul-sami-code' },
  { label: 'LinkedIn', href: 'https://linkedin.com/in/abdul-sami-code' },
  { label: 'Resume PDF', href: './Abdul-Sami-Cv.pdf' },
]
</script>

<template>
  <section id="about" data-section="about" class="bg-offcream">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-28">
      <Tag>06 — About</Tag>
      <h2 class="mt-4 mb-16 leading-none tracking-tight font-serif font-black text-ink"
        style="font-size: clamp(2.5rem,5vw,4rem)">
        The Person
      </h2>

      <div class="grid lg:grid-cols-12 gap-12 items-start">
        <div class="lg:col-span-4">
          <div class="relative">
            <div class="absolute -bottom-3 -left-3 w-full h-full bg-orange" style="opacity: 0.15"></div>
            <div class="absolute -bottom-3 -left-3 w-full h-10 bg-orange"></div>
            <div class="relative overflow-hidden" style="height: 500px">
              <img src="/abdul-sami.png"
                alt="Jordan Reeves portrait" class="w-full h-full object-cover" style="filter: saturate(0.8)" />
            </div>
          </div>
        </div>

        <div class="lg:col-span-8">
          <div class="space-y-4 text-base leading-7 mb-10" style="color: rgba(28,26,23,0.68)">
            <p>
              Experienced Full Stack & AI Engineer with years of expertise designing scalable system architectures and
              intelligent, high-performance web applications. Combining a strong foundation in modern web stacks (React,
              Vue.js, Laravel/PHP, and Node.js) with advanced AI engineering, I specialize in bridging the gap between
              robust backend infrastructure and cutting-edge artificial intelligence. My background is deeply rooted in
              system modernization and microservices architecture, focusing on creating clean, modular codebases and
              optimizing multi-tier architectures for global teams.
            </p>
            <p>
              <strong>Key Achievements:</strong> 

              $20M Acquisition: part of the architectural overhaul of an enterprise SaaS platform, migrating legacy code
              to a modern stack that directly facilitated its high-value acquisition by a US firm.

              AI Agent Innovation:

              Designed and launched an advanced AI agent feature with a conversational interface, automating complex,
              text-based resource allocation workflows.

              Production RAG Pipelines:

              Successfully architected autonomous AI systems, integrating vector databases and Retrieval-Augmented
              Generation (RAG) into modern React and distributed backends.

              If you are looking for enthusiastic resource related to building full stack softwares and Ai solutions I
              am here to help.

              Let's connect
            </p>

          </div>

          <div class="grid grid-cols-2 md:grid-cols-4 gap-px mb-10" style="background: rgba(28,26,23,0.08)">
            <div v-for="s in STATS" :key="s.label" class="p-5 bg-offcream">
              <div class="text-2xl font-black leading-none font-serif text-orange">{{ s.val }}</div>
              <div class="text-xs tracking-widest uppercase mt-1 font-mono" style="color: rgba(28,26,23,0.4)">
                {{ s.label }}</div>
            </div>
          </div>

          <div class="flex flex-wrap gap-3">
            <a v-for="s in SOCIALS" :key="s.label" :href="s.href" target="_blank" rel="noopener noreferrer"
              class="flex items-center gap-2 px-4 py-2.5 text-xs font-medium tracking-widest uppercase border font-mono"
              style="color: rgba(28,26,23,0.55); border-color: rgba(28,26,23,0.15)">
              {{ s.label }}
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
