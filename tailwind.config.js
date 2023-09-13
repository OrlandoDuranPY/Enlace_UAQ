const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    // mode: 'jit',
    // purge: [
    //     './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
    // ],
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/flowbite/**/*.js",
    './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
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
