/** @type {import('tailwindcss').Config} */
export default {
  content: ['./index.html', './src/**/*.{vue,js}'],
  theme: {
    extend: {
      colors: {
        ink: '#1C1A17',
        cream: '#F0EAE0',
        orange: '#E8390E',
        paper: '#E8E2D8',
        darkbg: '#1A1814',
        offcream: '#F8F4EE',
      },
      fontFamily: {
        serif: ['Fraunces', 'Georgia', 'serif'],
        sans: ['Outfit', 'sans-serif'],
        mono: ['"DM Mono"', 'monospace'],
      },
    },
  },
  plugins: [],
}
