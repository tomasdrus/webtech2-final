module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      gridTemplateColumns: {
        // Complex site-specific column configuration
       'question': '3rem auto',
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
