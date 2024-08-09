import daisyui from 'daisyui';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/admin/*.blade.php',
    './resources/admin/*.js',
  ],
  theme: {
    extend: {},
  },
  plugins: [
    daisyui,
  ],
};

