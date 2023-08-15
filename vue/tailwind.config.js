/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
    "./src/**/*.blade.php",
    "./src/**/*.vue",
    './resources/**/*.blade.php',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

