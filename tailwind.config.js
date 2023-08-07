const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      // Fuente
      fontFamily: {
        sans: ['Quicksand', ...defaultTheme.fontFamily.sans],
      },
      // Colores
      colors: {
        'rojo': '#ED5660',
        'verde': '#7AD8DB',
        'verde-oscuro': '#00BFC3',
        'gris': '#E8E8E8',
        'azul': '#45547E',
        'negro': '#1D2436',
        'gris-ph' : '#F3F2F2',
        'gris-texto': '#C7CBD5',
        'gris-tarjeta': '#FAFAFA'
      }
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require('tailwind-scrollbar'),
  ]
}