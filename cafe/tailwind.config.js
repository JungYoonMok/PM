/** @type {import('tailwindcss').Config} */
module.exports = {
  // content: ["./*.{html, js, php}"],
  content: [
    "./application/Views/*.{html,php,js}",
    "./application/Views/Board/*.{html,php,js}",
    "./application/Views/layouts/*.{html,php,js}",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

