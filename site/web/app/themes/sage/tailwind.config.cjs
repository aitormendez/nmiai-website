module.exports = {
  darkMode: ['class', '.is-style-dark'],
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
      light: '#e3e3e3',
      white: '#ffffff',
      black: '#000000',
    },
    extend: {
      typography: {
        '3xl': {
          css: {
            fontSize: '2.25rem',
            h1: {
              fontSize: '4rem',
            },
          },
        },
      },
      screens: {
        xs: '300px',
      },
    },
  },
  plugins: [require('@tailwindcss/typography')],
};
