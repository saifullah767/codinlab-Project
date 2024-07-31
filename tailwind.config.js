/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/app/**/*.{vue,js}",
    "./resources/views/**/*.blade.php",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@headlessui/vue'), 
    require('@tailwindcss/forms')
  ],
}

