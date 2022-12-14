module.exports = {
  darkMode: ['class', '.is-style-dark'],
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  safelist: ['gap-0', 'gap-1', 'gap-2', 'gap-3', 'leading-tight'],
  theme: {
    fontFamily: {
      rigid: ['rigid-square', 'sans-serif'],
      sans: ['rigid-square', 'sans-serif'],
      serif: ['linotype-sabon', 'serif'],
    },
    colors: {
      dark: '#1c1c1c',
      midup: '#565656',
      middle: '#969393',
      light: '#e3e3e3',
      white: '#ffffff',
      black: '#000000',
    },
    extend: {
      fontSize: {
        '10xl': '11rem',
        '11xl': '15rem',
      },
      typography: {
        DEFAULT: {
          color: '#2f2f2f',
          css: {
            lineHeight: '1.4',
          },
        },
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
