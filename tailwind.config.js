module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {
      opacity: ['disabled'],
      cursor: ['disabled'],
      screens: {
        'print': {'raw': 'print'}
      }
    }
  },
  variants: {},
  plugins: [
    // require('@tailwindcss/forms'),
  ]
}
