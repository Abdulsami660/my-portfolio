<script setup>
import { ref } from 'vue'
import api from '../lib/api'
import Tag from './Tag.vue'

const form = ref({ name: '', email: '', message: '' })
const sent = ref(false)
const sending = ref(false)
const error = ref('')

const CONTACT_ITEMS = [
  { label: 'Email', val: 'abdulsami660@gmail.com' },
  { label: 'Location', val: 'Lahore, Pakistan' },
  { label: 'Timezone', val: 'Asia/Karachi' },
]

async function handleSubmit() {
  error.value = ''
  sending.value = true
  try {
    await api.post('/contact', form.value)
    sent.value = true
    form.value = { name: '', email: '', message: '' }
    setTimeout(() => (sent.value = false), 4000)
  } catch (e) {
    error.value = 'Something went wrong. Please try again.'
    console.error(e)
  } finally {
    sending.value = false
  }
}
</script>

<template>
  <section id="contact" data-section="contact" class="bg-cream">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-28">
      <div class="grid lg:grid-cols-12 gap-16 items-start">
        <div class="lg:col-span-5">
          <Tag>07 — Contact</Tag>
          <h2 class="mt-4 leading-[0.95] tracking-tight mb-6 font-serif font-black text-ink" style="font-size: clamp(3rem,6vw,5rem)">
            Let's build
            <br />
            <em class="text-orange not-italic italic">something.</em>
          </h2>
          <p class="text-sm leading-7 mb-10 max-w-sm" style="color: rgba(28,26,23,0.6)">
            Open to Full stack and Ai Roles. Response within 24 hours, always.
          </p>

          <div class="flex flex-col gap-5">
            <div v-for="item in CONTACT_ITEMS" :key="item.label" class="flex items-center gap-4">
              <div class="w-9 h-9 flex items-center justify-center flex-shrink-0 bg-paper text-orange">●</div>
              <div>
                <div class="text-xs tracking-widest uppercase font-mono" style="color: rgba(28,26,23,0.4)">{{ item.label }}</div>
                <div class="text-sm font-medium mt-0.5 text-ink">{{ item.val }}</div>
              </div>
            </div>
          </div>
        </div>

        <div class="lg:col-span-7">
          <form @submit.prevent="handleSubmit" class="flex flex-col gap-5">
            <div class="grid sm:grid-cols-2 gap-5">
              <div>
                <label class="block text-xs tracking-widest uppercase mb-2 font-mono" style="color: rgba(28,26,23,0.45)">Name</label>
                <input
                  v-model="form.name"
                  type="text"
                  required
                  placeholder="Your name"
                  class="w-full bg-paper text-ink text-sm px-4 py-3 outline-none"
                  style="border: 1px solid rgba(28,26,23,0.12)"
                />
              </div>
              <div>
                <label class="block text-xs tracking-widest uppercase mb-2 font-mono" style="color: rgba(28,26,23,0.45)">Email</label>
                <input
                  v-model="form.email"
                  type="email"
                  required
                  placeholder="your@email.com"
                  class="w-full bg-paper text-ink text-sm px-4 py-3 outline-none"
                  style="border: 1px solid rgba(28,26,23,0.12)"
                />
              </div>
            </div>
            <div>
              <label class="block text-xs tracking-widest uppercase mb-2 font-mono" style="color: rgba(28,26,23,0.45)">Message</label>
              <textarea
                v-model="form.message"
                required
                rows="7"
                placeholder="Tell me about the opportunity or project…"
                class="w-full bg-paper text-ink text-sm px-4 py-3 outline-none resize-none"
                style="border: 1px solid rgba(28,26,23,0.12)"
              ></textarea>
            </div>
            <button
              type="submit"
              :disabled="sending"
              class="self-start flex items-center gap-2 px-8 py-4 text-sm font-semibold tracking-wide transition-opacity hover:opacity-80 bg-ink text-cream disabled:opacity-50"
            >
              {{ sent ? 'Sent ✓' : sending ? 'Sending…' : 'Send Message →' }}
            </button>
            <p v-if="error" class="text-xs text-orange">{{ error }}</p>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>
