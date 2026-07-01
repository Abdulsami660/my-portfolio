<script setup>
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

const NAV_COL_1 = NAV_ITEMS.slice(0, 4)
const NAV_COL_2 = NAV_ITEMS.slice(4)

const SOCIALS = [
  { label: 'GitHub', href: 'https://github.com/abdul-sami-code' },
  { label: 'LinkedIn', href: 'https://linkedin.com/in/abdul-sami-code' },
  { label: 'Email', href: 'mailto:abdulsami660@gmail.com' },
]

function scrollTo(id) {
  document.getElementById(id)?.scrollIntoView({ behavior: 'smooth' })
}
</script>

<template>
  <footer style="background: #1A1814">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 pt-16 pb-10">
      <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-14">
        <div>
          <div class="text-base font-bold mb-3 font-mono text-cream">Abdul Sami</div>
          <p class="text-xs leading-relaxed" style="color: rgba(240,234,224,0.38)">
            Full stack software Engineer. Design systems, component architecture, and the infrastructure that makes great UI possible.
          </p>
        </div>

        <div>
          <div class="text-xs tracking-widest uppercase mb-4 font-mono" style="color: rgba(240,234,224,0.3)">Navigate</div>
          <div class="flex flex-col gap-2.5">
            <button
              v-for="link in NAV_COL_1"
              :key="link.id"
              @click="scrollTo(link.id)"
              class="text-left text-xs transition-colors hover:text-orange-400"
              style="color: rgba(240,234,224,0.45)"
            >
              {{ link.label }}
            </button>
          </div>
        </div>

        <div>
          <div class="text-xs tracking-widest uppercase mb-4 font-mono" style="color: rgba(240,234,224,0.3)">More</div>
          <div class="flex flex-col gap-2.5">
            <button
              v-for="link in NAV_COL_2"
              :key="link.id"
              @click="scrollTo(link.id)"
              class="text-left text-xs transition-colors hover:text-orange-400"
              style="color: rgba(240,234,224,0.45)"
            >
              {{ link.label }}
            </button>
          </div>
        </div>

        <div>
          <div class="text-xs tracking-widest uppercase mb-4 font-mono" style="color: rgba(240,234,224,0.3)">Connect</div>
          <div class="flex flex-col gap-2.5">
            <a
              v-for="s in SOCIALS"
              :key="s.label"
              :href="s.href"
              target="_blank"
              rel="noopener noreferrer"
              class="flex items-center gap-2 text-xs transition-colors hover:text-orange-400"
              style="color: rgba(240,234,224,0.45)"
            >
              {{ s.label }}
            </a>
          </div>
        </div>
      </div>

      <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-8" style="border-top: 1px solid rgba(255,255,255,0.05)">
        <span class="text-xs font-mono" style="color: rgba(240,234,224,0.22)">
          © {{new Date().getFullYear()}} Abdul Sami. Built with Vue + Laravel.
        </span>
        <div class="flex items-center gap-2">
          <span class="w-2 h-2 rounded-full bg-orange" style="box-shadow: 0 0 6px #E8390E"></span>
          <span class="text-xs font-mono" style="color: rgba(240,234,224,0.22)">Open to work</span>
        </div>
      </div>
    </div>
  </footer>
</template>
