<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import Nav from './components/Nav.vue'
import Hero from './components/Hero.vue'
import Skills from './components/Skills.vue'
import Experience from './components/Experience.vue'
import Projects from './components/Projects.vue'
import ProjectDetail from './components/ProjectDetail.vue'
import Education from './components/Education.vue'
import Testimonials from './components/Testimonials.vue'
import About from './components/About.vue'
import Contact from './components/Contact.vue'
import Footer from './components/Footer.vue'

const currentProject = ref(null)
const activeSection = ref('home')
const menuOpen = ref(false)
let observer = null

function selectProject(project) {
  currentProject.value = project
  window.scrollTo(0, 0)
}

function backToPortfolio() {
  currentProject.value = null
}

function setupObserver() {
  if (observer) observer.disconnect()
  const sections = document.querySelectorAll('[data-section]')
  observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          activeSection.value = entry.target.dataset.section || 'home'
        }
      })
    },
    { threshold: 0.3 }
  )
  sections.forEach((s) => observer.observe(s))
}

onMounted(() => {
  setupObserver()
})

onUnmounted(() => {
  if (observer) observer.disconnect()
})
</script>

<template>
  <ProjectDetail v-if="currentProject" :project="currentProject" @back="backToPortfolio" />
  <div v-else class="bg-cream">
    <Nav :active="activeSection" :open="menuOpen" @toggle="menuOpen = !menuOpen" @close="menuOpen = false" />
    <main>
      <Hero />
      <Skills />
      <Experience />
      <Projects @select="selectProject" />
      <Education />
      <Testimonials />
      <About />
      <Contact />
    </main>
    <Footer />
  </div>
</template>
