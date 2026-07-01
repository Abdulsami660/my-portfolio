<script setup>
defineProps({ subtle: { type: Boolean, default: false } })
</script>

<template>
  <hr
    class="border-0 m-0"
    :style="{ borderTop: subtle ? '1px solid rgba(28,26,23,0.07)' : '1px solid rgba(28,26,23,0.14)' }"
  />
</template>
