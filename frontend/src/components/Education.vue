<script setup>
import { ref, onMounted } from 'vue'
import api from '../lib/api'
import Tag from './Tag.vue'
import Rule from './Rule.vue'

const education = ref([])

onMounted(async () => {
  try {
    const { data } = await api.get('/education')
    education.value = data
  } catch (e) {
    console.error('Failed to load education', e)
  }
})
</script>

<template>
  <section id="education" data-section="education" class="bg-cream">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-28">
      <Tag>04 — Education</Tag>
      <h2 class="mt-4 mb-16 leading-none tracking-tight font-serif font-black text-ink" style="font-size: clamp(2.5rem,5vw,4rem)">
        Academic Record
      </h2>

      <Rule />
      <div v-for="edu in education" :key="edu.id">
        <div class="py-10 grid grid-cols-12 gap-6">
          <div class="col-span-2 lg:col-span-1">
            <span class="text-4xl font-black leading-none font-serif" style="color: rgba(28,26,23,0.12)">{{ edu.year }}</span>
          </div>

          <div class="col-span-10 lg:col-span-11">
            <div class="grid lg:grid-cols-12 gap-4">
              <div class="lg:col-span-8">
                <h3 class="text-xl font-bold mb-0.5 font-serif text-ink">{{ edu.degree }}</h3>
                <p class="text-sm font-semibold mb-1 text-orange">{{ edu.school }}</p>
                <p class="text-xs mb-4 font-mono" style="color: rgba(28,26,23,0.4)">{{ edu.subtitle }}</p>
                <p class="text-sm leading-relaxed" style="color: rgba(28,26,23,0.6)">{{ edu.note }}</p>
              </div>
              <div class="lg:col-span-4 flex lg:justify-end items-start">
                <span class="text-7xl font-black leading-none select-none font-serif" style="color: rgba(28,26,23,0.05)">
                  {{ edu.year }}
                </span>
              </div>
            </div>
          </div>
        </div>
        <Rule />
      </div>
    </div>
  </section>
</template>
