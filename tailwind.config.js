/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{php,html,js}"],
  theme: {
    extend: {
      colors: {
        inter_red: "#EC0F00"
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
