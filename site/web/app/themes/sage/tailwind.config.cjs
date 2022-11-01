module.exports = {
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    fontFamily: {
      rigid: ['rigid-square', 'sans-serif'],
      sans: ['rigid-square', 'sans-serif'],
      serif: ['linotype-sabon', 'serif'],
    },
    colors: {
      dark: '#2f2f2f',
      middle: '#969393',
      white: '#ffffff',
      black: '#000000',
    },
    extend: {
      screens: {
        xs: '300px',
      },
    },
  },
  plugins: [],
};
