<script setup>
import { computed } from 'vue'

const quarterDate = computed(() => {
  const date = new Date();

  const year = date.getFullYear();
  const month = date.getMonth(); // 0 = January, 11 = December

  const quarter = `Q${Math.floor(month / 3) + 1}`;

  return `${quarter} ${year}`;
})

const MARQUEE_ITEMS = [
  'PHP', 'LARAVEL', 'VUE.JS', 'REACT.JS',
  'MYSQL', 'Node.js', 'EXPRESS.JS', 'API',
  'AI', 'RAG', 'CONVERSATIONAL AI', 'LLM',
  'OLLAMA', 'OPEN AI', 'CURSOR', 'CLAUDE CODE',
  'MONGO DB', 'POSTGRES', 'AI AGENTS'
]
const DOUBLE_MARQUEE = [...MARQUEE_ITEMS, ...MARQUEE_ITEMS]

const STATS = [
  { val: '5+', label: 'Years Experience' },
  { val: '$20M+', label: 'Product Acquisition Value' },
  { val: 'Full Stack', label: 'Laravel • Vue • React • MERN' },
  { val: 'AI', label: 'LLMs, RAG & Agents' },
]

function scrollTo(id) {
  document.getElementById(id)?.scrollIntoView({ behavior: 'smooth' })
}
</script>

<template>
  <section id="home" data-section="home" class="relative min-h-screen flex flex-col bg-cream">
    <div class="flex-1 max-w-7xl mx-auto w-full px-6 lg:px-10 pt-28 pb-16 flex flex-col justify-center">
      <div class="grid lg:grid-cols-12 gap-12 items-center">
        <!-- Left -->
        <div class="lg:col-span-7 flex flex-col">
          <div class="flex items-center gap-3 mb-6">
            <span class="w-2.5 h-2.5 rounded-full bg-orange" style="box-shadow: 0 0 0 4px #e8390e22"></span>
            <span class="text-xs tracking-widest uppercase font-mono" style="color: rgba(28,26,23,0.5)">
              Open to new roles — {{ quarterDate }}
            </span>
          </div>

          <h1
            class="leading-[0.9] tracking-tight mb-6 font-serif font-black text-ink"
            style="font-size: clamp(3.2rem, 10vw, 8.5rem)"
          >
            Software
            <br />
            <em class="text-orange not-italic italic">Engineer</em><span style="color: rgba(28,26,23,0.2)">.</span>
          </h1>

          <div class="w-16 h-1 mb-6 bg-orange"></div>

          <p class="text-base leading-7 max-w-xl mb-10" style="color: rgba(28,26,23,0.65)">
            Abdul sami — Full Stack & AI Engineer with years of experience building scalable applications using Laravel, PHP, Vue.js, React, MERN, and modern AI technologies including RAG and AI agents.
            Contributed to the modernization of an enterprise SaaS platform that led to a $20M acquisition, and now focus on delivering high-performance software and AI solutions that solve real business problems.
          </p>

          <div class="flex flex-wrap gap-4 mb-14">
            <button
              @click="scrollTo('projects')"
              class="flex items-center gap-2 px-7 py-3.5 text-sm font-semibold tracking-wide transition-opacity hover:opacity-80 bg-ink text-cream"
            >
              View Work →
            </button>
            <button
              @click="scrollTo('contact')"
              class="flex items-center gap-2 px-7 py-3.5 text-sm font-semibold tracking-wide border text-ink"
              style="border-color: rgba(28,26,23,0.3)"
            >
              Get In Touch
            </button>
          </div>

          <div class="flex flex-wrap gap-x-10 gap-y-4">
            <div v-for="s in STATS" :key="s.label">
              <div class="text-3xl font-black leading-none font-serif text-orange">{{ s.val }}</div>
              <div class="text-xs tracking-widest uppercase mt-1 font-mono" style="color: rgba(28,26,23,0.45)">
                {{ s.label }}
              </div>
            </div>
          </div>
        </div>

        <!-- Right — portrait -->
        <div class="lg:col-span-5 hidden lg:flex justify-end">
          <div class="relative">
            <div class="absolute -top-4 -right-4 w-full h-full bg-orange" style="opacity: 0.12"></div>
            <div class="absolute -top-4 -right-4 w-full h-12 bg-orange"></div>
            <div class="relative overflow-hidden" style="width: 380px; height: 480px">
              <img
                src="/abdul-sami.png"
                alt="Abdul sami"
                class="w-full h-full object-cover"
              />
              <div class="absolute bottom-0 left-0 right-0 px-5 py-3 flex items-center justify-between bg-ink">
                <span class="text-xs tracking-widest font-mono" style="color: rgba(240,234,224,0.5)">
                  Lahore, Pakistan
                </span>
                <span class="text-xs font-bold font-mono text-orange">@Syanex</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Marquee strip -->
    <div class="border-t border-b overflow-hidden py-3" style="border-color: rgba(28,26,23,0.1)">
      <div class="flex gap-10 whitespace-nowrap animate-marquee">
        <span
          v-for="(item, i) in DOUBLE_MARQUEE"
          :key="i"
          class="text-xs tracking-widest uppercase font-mono"
          style="color: rgba(28,26,23,0.35)"
        >
          {{ item }} <span class="text-orange ml-4">◆</span>
        </span>
      </div>
    </div>
  </section>
</template>
