/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./css/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
          main: '#13172B',
          'orange-main': ' #d98600',
          'orange-main-dark': '#975d00',
      },
    },
  },

  plugins: [],
}
