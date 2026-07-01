<script setup>
import { ref, onMounted, computed } from 'vue'
import api from '../lib/api'
import Tag from './Tag.vue'

const testimonials = ref([])
const idx = ref(0)

onMounted(async () => {
  try {
    const { data } = await api.get('/testimonials')
    testimonials.value = data
  } catch (e) {
    console.error('Failed to load testimonials', e)
  }
})

const current = computed(() => testimonials.value[idx.value])

function prev() {
  idx.value = (idx.value - 1 + testimonials.value.length) % testimonials.value.length
}
function next() {
  idx.value = (idx.value + 1) % testimonials.value.length
}
</script>

<template>
  <section id="testimonials" data-section="testimonials" style="background: #1A1814">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-28">
      <div class="flex items-center justify-between mb-16">
        <Tag>05 — Testimonials</Tag>
        <div class="flex items-center gap-2">
          <button
            v-for="(t, i) in testimonials"
            :key="i"
            @click="idx = i"
            class="transition-all duration-200 h-[3px]"
            :style="{ width: i === idx ? '24px' : '8px', background: i === idx ? '#E8390E' : 'rgba(240,234,224,0.2)' }"
          ></button>
        </div>
      </div>

      <div v-if="current" class="grid lg:grid-cols-12 gap-12 items-start">
        <div class="lg:col-span-8">
          <div :key="idx">
            <div class="text-4xl font-black leading-none mb-8 select-none font-serif text-orange" style="opacity: 0.3">"</div>
            <p
              class="text-xl leading-9 mb-10 italic font-serif"
              style="color: rgba(240,234,224,0.88); font-weight: 400; font-size: clamp(1.1rem,2.5vw,1.4rem)"
            >
              {{ current.quote }}
            </p>

            <div class="flex items-center gap-4">
              <img :src="current.avatar" :alt="current.author" class="w-12 h-12 rounded-full object-cover" style="border: 2px solid #E8390E44" />
              <div>
                <div class="text-sm font-semibold text-cream">{{ current.author }}</div>
                <div class="text-xs mt-0.5 font-mono" style="color: rgba(240,234,224,0.4)">{{ current.role }}</div>
              </div>
            </div>
          </div>
        </div>

        <div class="lg:col-span-4 flex flex-col gap-4">
          <div class="flex gap-3 mb-4">
            <button @click="prev" class="w-10 h-10 flex items-center justify-center border text-cream" style="border-color: rgba(240,234,224,0.15)">‹</button>
            <button @click="next" class="w-10 h-10 flex items-center justify-center border text-cream" style="border-color: rgba(240,234,224,0.15)">›</button>
          </div>

          <button
            v-for="(item, i) in testimonials"
            :key="i"
            @click="idx = i"
            class="text-left p-4 transition-all duration-200"
            :style="{
              background: i === idx ? 'rgba(232,57,14,0.1)' : 'rgba(255,255,255,0.03)',
              border: '1px solid ' + (i === idx ? '#E8390E40' : 'rgba(255,255,255,0.06)'),
            }"
          >
            <p class="text-xs leading-relaxed line-clamp-2" style="color: rgba(240,234,224,0.55)">{{ item.quote }}</p>
            <div class="mt-2 text-xs font-semibold font-mono" :style="{ color: i === idx ? '#E8390E' : 'rgba(240,234,224,0.3)' }">
              — {{ item.author }}
            </div>
          </button>
        </div>
      </div>
    </div>
  </section>
</template>
