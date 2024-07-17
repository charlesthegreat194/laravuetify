
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
        popins: ['"Poppins", sans-serif'],
        anton: ['"Anton SC", sans-serif'],
    },
    colors: {
        semiblack: ['#060606'],
        semired: ['#EF4444'],
    }
    },
  },
  plugins: [],
}

