module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      gridTemplateColumns: {
       'question': '3rem auto',
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
