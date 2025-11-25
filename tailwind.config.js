/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'primary': '#2563eb',      // Bleu professionnel
        'secondary': '#1e40af',    // Bleu foncé
        'accent': '#f59e0b',       // Or/ambre pour les accents
        'light': '#f8fafc',        // Bleu très clair
        'dark': '#0f172a',         // Bleu nuit
        'success': '#10b981',      // Vert
        'warning': '#f59e0b',      // Orange
        'danger': '#ef4444',       // Rouge
        'info': '#3b82f6',         // Bleu clair
      },
      fontFamily: {
        'sans': ['Nunito', 'sans-serif'],
      },
      spacing: {
        '128': '32rem',
        '144': '36rem',
      },
      borderRadius: {
        '4xl': '2rem',
      }
    },
  },
  plugins: [],
}