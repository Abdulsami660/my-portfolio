<script setup>
import { ref, onMounted, computed } from 'vue'
import api from '../lib/api'
import Tag from './Tag.vue'

const emit = defineEmits(['select'])
const projects = ref([])

onMounted(async () => {
  try {
    const { data } = await api.get('/projects')
    projects.value = data
  } catch (e) {
    console.error('Failed to load projects', e)
  }
})

const featured = computed(() => projects.value.find((p) => p.is_featured) || projects.value[0])
const rest = computed(() => projects.value.filter((p) => p !== featured.value))

function truncate(text, n) {
  if (!text) return ''
  return text.length > n ? text.slice(0, n) + '…' : text
}
</script>

<template>
  <section id="projects" data-section="projects" class="bg-offcream">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-28">
      <div class="flex items-end justify-between mb-16">
        <div>
          <Tag>03 — Projects</Tag>
          <h2 class="mt-4 leading-none tracking-tight font-serif font-black text-ink" style="font-size: clamp(2.5rem,5vw,4rem)">
            Selected Work
          </h2>
        </div>
        <span class="text-xs tracking-widest hidden sm:block mb-2 font-mono" style="color: rgba(28,26,23,0.35)">
          {{ projects.length }} PROJECTS
        </span>
      </div>

      <!-- Featured -->
      <div v-if="featured" class="group cursor-pointer mb-5" @click="emit('select', featured)">
        <div class="grid lg:grid-cols-12 overflow-hidden transition-all duration-300" style="border: 1px solid rgba(28,26,23,0.1)">
          <div class="lg:col-span-7 relative overflow-hidden" style="height: 380px">
            <img
              :src="featured.image"
              :alt="featured.title"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
              style="filter: saturate(0.85)"
            />
            <div
              class="absolute inset-0"
              style="background: linear-gradient(to right, transparent 60%, rgba(248,244,238,0.95) 100%)"
            ></div>
          </div>
          <div class="lg:col-span-5 p-8 flex flex-col justify-center bg-paper">
            <Tag>{{ featured.tagline }}</Tag>
            <h3 class="text-3xl font-bold mt-4 mb-3 font-serif text-ink">{{ featured.title }}</h3>
            <p class="text-sm leading-7 mb-6" style="color: rgba(28,26,23,0.6)">
              {{ truncate(featured.description, 160) }}
            </p>
            <div class="flex gap-6 mb-6">
              <div v-for="(v, k) in featured.stats" :key="k">
                <div class="font-black text-xl font-serif text-orange">{{ v }}</div>
                <div class="text-xs tracking-widest uppercase mt-0.5 font-mono" style="color: rgba(28,26,23,0.4)">{{ k }}</div>
              </div>
            </div>
            <div class="flex items-center gap-2 text-sm font-semibold text-ink">
              View Case Study <span class="text-orange">↗</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Grid of rest -->
      <div class="grid md:grid-cols-3 gap-5">
        <div
          v-for="project in rest"
          :key="project.id"
          class="group cursor-pointer overflow-hidden"
          style="border: 1px solid rgba(28,26,23,0.1)"
          @click="emit('select', project)"
        >
          <div class="relative overflow-hidden bg-paper" style="height: 200px">
            <img
              :src="project.image"
              :alt="project.title"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
              style="opacity: 0.65; filter: saturate(0.8)"
            />
          </div>
          <div class="p-5 bg-paper">
            <div class="flex items-start justify-between mb-2">
              <div>
                <h3 class="text-base font-bold font-serif text-ink">{{ project.title }}</h3>
                <p class="text-xs mt-0.5 font-mono text-orange">{{ project.tagline }}</p>
              </div>
              <span class="flex-shrink-0 mt-0.5" style="color: rgba(28,26,23,0.35)">↗</span>
            </div>
            <p class="text-xs leading-relaxed mt-3" style="color: rgba(28,26,23,0.55)">
              {{ truncate(project.description, 100) }}
            </p>
            <div class="flex gap-4 mt-4 pt-4" style="border-top: 1px solid rgba(28,26,23,0.08)">
              <div v-for="(v, k) in project.stats" :key="k">
                <div class="text-sm font-bold font-serif text-orange">{{ v }}</div>
                <div class="text-xs capitalize font-mono" style="color: rgba(28,26,23,0.4)">{{ k }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
