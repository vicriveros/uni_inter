/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["index.html", "./node_modules/flowbite/**/*.js"],
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
