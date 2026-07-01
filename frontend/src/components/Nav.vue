<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const props = defineProps({
  active: { type: String, default: 'home' },
  open: { type: Boolean, default: false },
})
const emit = defineEmits(['toggle', 'close'])

const NAV_ITEMS = [
  { id: 'home', label: 'Home' },
  { id: 'skills', label: 'Skills' },
  { id: 'experience', label: 'Experience' },
  { id: 'projects', label: 'Projects' },
  { id: 'education', label: 'Education' },
  { id: 'testimonials', label: 'Testimonials' },
  { id: 'about', label: 'About' },
  { id: 'contact', label: 'Contact' },
]

const raised = ref(false)
function onScroll() {
  raised.value = window.scrollY > 32
}
onMounted(() => window.addEventListener('scroll', onScroll))
onUnmounted(() => window.removeEventListener('scroll', onScroll))

function scrollTo(id) {
  document.getElementById(id)?.scrollIntoView({ behavior: 'smooth' })
  emit('close')
}
</script>

<template>
  <nav
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
    :style="{
      background: raised ? 'rgba(240,234,224,0.97)' : 'transparent',
      backdropFilter: raised ? 'blur(12px)' : 'none',
      borderBottom: raised ? '1px solid rgba(28,26,23,0.1)' : 'none',
    }"
  >
    <div class="max-w-7xl mx-auto px-6 lg:px-10 h-16 flex items-center justify-between">
      <button @click="scrollTo('home')" class="text-sm font-bold tracking-widest uppercase font-mono text-ink">
        Abdul Sami
      </button>

      <div class="hidden lg:flex items-center gap-7">
        <button
          v-for="n in NAV_ITEMS"
          :key="n.id"
          @click="scrollTo(n.id)"
          class="text-xs tracking-widest uppercase font-mono transition-colors"
          :style="{ color: active === n.id ? '#E8390E' : 'rgba(28,26,23,0.5)' }"
        >
          {{ n.label }}
        </button>
      </div>

      <button @click="emit('toggle')" class="lg:hidden text-ink">
        <svg v-if="!open" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        <svg v-else width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>

    <div v-if="open" class="lg:hidden flex flex-col gap-4 px-6 py-6 border-t" style="background: rgba(240,234,224,0.99); border-color: rgba(28,26,23,0.1)">
      <button
        v-for="n in NAV_ITEMS"
        :key="n.id"
        @click="scrollTo(n.id)"
        class="text-left text-sm tracking-widest uppercase font-mono"
        :style="{ color: active === n.id ? '#E8390E' : 'rgba(28,26,23,0.5)' }"
      >
        {{ n.label }}
      </button>
    </div>
  </nav>
</template>
