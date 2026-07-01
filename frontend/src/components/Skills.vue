<script setup>
import { ref, onMounted } from 'vue'
import api from '../lib/api'
import Tag from './Tag.vue'
import Rule from './Rule.vue'

const skills = ref([])
const visible = ref(false)
const sectionRef = ref(null)

onMounted(async () => {
  try {
    const { data } = await api.get('/skills')
    skills.value = data
  } catch (e) {
    console.error('Failed to load skills', e)
  }

  const obs = new IntersectionObserver(
    ([entry]) => {
      if (entry.isIntersecting) visible.value = true
    },
    { threshold: 0.15 }
  )
  if (sectionRef.value) obs.observe(sectionRef.value)
})
</script>

<template>
  <section id="skills" data-section="skills" class="bg-offcream" ref="sectionRef">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-28">
      <div class="flex items-start justify-between mb-16">
        <div>
          <Tag>01 — Skills</Tag>
          <h2 class="mt-4 leading-none tracking-tight font-serif font-black text-ink" style="font-size: clamp(2.5rem,5vw,4rem)">
            What I Build With
          </h2>
        </div>
        <p class="hidden lg:block max-w-xs text-sm leading-relaxed text-right mt-auto" style="color: rgba(28,26,23,0.5)">
          Proficiency across the full product stack — from token pipelines to production observability.
        </p>
      </div>

      <div class="flex flex-col">
        <div v-for="(skill, i) in skills" :key="skill.id ?? skill.name">
          <div class="py-7 grid grid-cols-12 items-center gap-6">
            <div class="col-span-1 hidden md:block">
              <span class="text-xs font-medium font-mono" style="color: rgba(28,26,23,0.3)">0{{ i + 1 }}</span>
            </div>

            <div class="col-span-2 md:col-span-1">
              <span
                class="font-black leading-none font-serif text-orange transition-opacity duration-700"
                style="font-size: 2.5rem"
                :style="{ opacity: visible ? 1 : 0 }"
              >
                {{ skill.percentage }}
              </span>
            </div>

            <div class="col-span-8 md:col-span-4">
              <div class="text-lg font-semibold text-ink">{{ skill.name }}</div>
              <div class="text-xs tracking-widest uppercase mt-0.5 font-mono" style="color: rgba(28,26,23,0.4)">
                {{ skill.category }}
              </div>
            </div>

            <div class="col-span-12 md:col-span-4 lg:col-span-5">
              <div class="relative h-px" style="background: rgba(28,26,23,0.12)">
                <div
                  class="absolute left-0 top-0 h-px bg-ink transition-all duration-1000 ease-out"
                  :style="{ width: visible ? skill.percentage + '%' : '0%', transitionDelay: 0.2 + i * 0.07 + 's' }"
                ></div>
                <div
                  class="absolute top-1/2 -translate-y-1/2 w-2 h-2 rounded-full bg-orange transition-all duration-1000 ease-out"
                  :style="{ left: visible ? skill.percentage + '%' : '0%', transitionDelay: 0.2 + i * 0.07 + 's' }"
                ></div>
              </div>
              <p class="text-xs mt-3 leading-relaxed hidden lg:block" style="color: rgba(28,26,23,0.5)">
                {{ skill.description }}
              </p>
            </div>
          </div>
          <Rule v-if="i < skills.length - 1" subtle />
        </div>
      </div>
    </div>
  </section>
</template>
