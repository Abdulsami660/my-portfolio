<script setup>
import { onMounted } from 'vue'
import Tag from './Tag.vue'

const props = defineProps({ project: { type: Object, required: true } })
const emit = defineEmits(['back'])

onMounted(() => window.scrollTo(0, 0))
</script>

<template>
  <div class="min-h-screen bg-cream text-ink">
    <div
      class="sticky top-0 z-50 h-16 flex items-center justify-between px-6 lg:px-10 border-b"
      style="background: rgba(240,234,224,0.97); border-color: rgba(28,26,23,0.1); backdrop-filter: blur(10px)"
    >
      <button
        @click="emit('back')"
        class="flex items-center gap-2 text-xs tracking-widest uppercase font-mono transition-opacity hover:opacity-60"
        style="color: rgba(28,26,23,0.55)"
      >
        ← Back to Portfolio
      </button>
      <span class="text-xs tracking-widest font-medium font-mono text-orange">{{ project.title }}</span>
    </div>

    <div class="max-w-5xl mx-auto px-6 lg:px-10 py-16">
      <div class="mb-10">
        <Tag>{{ project.tagline }}</Tag>
        <h1 class="mt-4 leading-tight font-serif font-black text-ink" style="font-size: clamp(3rem,7vw,5.5rem)">
          {{ project.title }}
        </h1>
      </div>

      <div class="relative overflow-hidden mb-12 bg-paper" style="height: 420px">
        <img :src="project.image" :alt="project.title" class="w-full h-full object-cover" style="filter: saturate(0.85)" />
        <div class="absolute bottom-0 left-0 right-0 h-24" style="background: linear-gradient(to top, #F0EAE0, transparent)"></div>
      </div>

      <div class="grid grid-cols-3 mb-14" style="border: 1px solid rgba(28,26,23,0.1)">
        <div
          v-for="(v, k, i) in project.stats"
          :key="k"
          class="p-6 text-center bg-paper"
          :style="{ borderRight: i < Object.keys(project.stats).length - 1 ? '1px solid rgba(28,26,23,0.1)' : 'none' }"
        >
          <div class="text-3xl font-black font-serif text-orange">{{ v }}</div>
          <div class="text-xs tracking-widest uppercase mt-1 capitalize font-mono" style="color: rgba(28,26,23,0.45)">{{ k }}</div>
        </div>
      </div>

      <div class="grid md:grid-cols-3 gap-10 mb-12">
        <div class="md:col-span-2">
          <h2 class="text-2xl font-bold mb-4 font-serif text-ink">Overview</h2>
          <p class="text-sm leading-7 mb-4" style="color: rgba(28,26,23,0.65)">{{ project.description }}</p>
          <p class="text-sm leading-7" style="color: rgba(28,26,23,0.65)">{{ project.long_description }}</p>
        </div>
        <div>
          <h3 class="text-xs tracking-widest uppercase mb-4 font-mono" style="color: rgba(28,26,23,0.4)">Tech Stack</h3>
          <div class="flex flex-col gap-2">
            <div
              v-for="t in project.tech"
              :key="t"
              class="flex items-center gap-3 px-3 py-2.5 text-sm bg-paper text-ink"
              style="border: 1px solid rgba(28,26,23,0.1)"
            >
              <span class="text-orange" style="font-size: 8px">◆</span> {{ t }}
            </div>
          </div>
        </div>
      </div>

      <div class="flex gap-4">
        <a
          :href="project.live_url"
          target="_blank"
          rel="noopener noreferrer"
          class="flex items-center gap-2 px-6 py-3 text-sm font-semibold transition-opacity hover:opacity-80 bg-ink text-cream"
        >
          Live Demo
        </a>
        <a
          :href="project.github_url"
          target="_blank"
          rel="noopener noreferrer"
          class="flex items-center gap-2 px-6 py-3 text-sm font-semibold border text-ink"
          style="border-color: rgba(28,26,23,0.2)"
        >
          Source Code
        </a>
      </div>
    </div>
  </div>
</template>
