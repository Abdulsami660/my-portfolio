<script setup>
import { ref, onMounted } from 'vue'
import api from '../lib/api'
import Tag from './Tag.vue'
import Rule from './Rule.vue'

const experience = ref([])
const open = ref(null)

onMounted(async () => {
  try {
    const { data } = await api.get('/experience')
    experience.value = data
    if (data.length) open.value = data[0].id
  } catch (e) {
    console.error('Failed to load experience', e)
  }
})

function toggle(id) {
  open.value = open.value === id ? null : id
}
</script>

<template>
  <section id="experience" data-section="experience" class="bg-cream">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-28">
      <Tag>02 — Experience</Tag>
      <h2 class="mt-4 mb-16 leading-none tracking-tight font-serif font-black text-ink" style="font-size: clamp(2.5rem,5vw,4rem)">
        Where I've Worked
      </h2>

      <Rule />
      <div v-for="exp in experience" :key="exp.id">
        <button class="w-full text-left py-8 group" @click="toggle(exp.id)">
          <div class="grid grid-cols-12 items-start gap-4">
            <div class="col-span-10 lg:col-span-8">
              <div class="flex items-baseline gap-4 flex-wrap">
                <h3 class="text-2xl font-bold font-serif text-ink">{{ exp.role }}</h3>
                <span class="text-lg font-semibold font-serif text-orange">@ {{ exp.company }}</span>
              </div>
              <div class="flex items-center gap-3 mt-2">
                <span class="text-xs tracking-widest font-mono" style="color: rgba(28,26,23,0.45)">{{ exp.period }}</span>
                <span style="color: rgba(28,26,23,0.2)">·</span>
                <span class="text-xs font-mono" style="color: rgba(28,26,23,0.45)">{{ exp.location }}</span>
              </div>
            </div>
            <div class="col-span-2 lg:col-span-4 flex justify-end items-start pt-1">
              <span class="text-xs tracking-widest hidden lg:block font-mono" style="color: rgba(28,26,23,0.3)">
                {{ exp.duration_label }}
              </span>
              <span
                class="ml-6 text-xs font-medium transition-transform duration-200 font-mono text-orange block"
                :style="{ transform: open === exp.id ? 'rotate(90deg)' : 'rotate(0deg)' }"
              >
                ▶
              </span>
            </div>
          </div>

          <div v-if="open === exp.id" class="mt-6 grid lg:grid-cols-12 gap-6">
            <p class="lg:col-span-7 text-sm leading-7" style="color: rgba(28,26,23,0.65)">
              {{ exp.description }}
            </p>
            <div class="lg:col-span-5 flex flex-wrap gap-2 content-start lg:justify-end">
              <span
                v-for="t in exp.tech"
                :key="t"
                class="px-3 py-1.5 text-xs font-mono bg-paper text-ink"
                style="border: 1px solid rgba(28,26,23,0.12)"
              >
                {{ t }}
              </span>
            </div>
          </div>
        </button>
        <Rule />
      </div>
    </div>
  </section>
</template>
