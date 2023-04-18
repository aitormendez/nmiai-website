module.exports = {
  darkMode: ['class', '.is-style-dark'],
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  safelist: [
    'gap-0',
    'gap-1',
    'gap-2',
    'gap-3',
    'leading-tight',
    'md:mb-36',
    'text-footer',
    'leading-none',
    'leading-h2',
    'mb-28',
    'mb-40',
    'my-40',
    'mb-5',
    'mb-0',
    '!max-w-none',
    'py-24',
    'md:pr-12',
    'md:pl-12',
    'md:pr-10',
    'md:pl-10',
    'md:pr-9',
    'md:pl-9',
    'my-36',
    'md:my-0',
    'mb-56',
    'md:mb-40',
    'text-6xl',
    '2xl:text-7xl',
  ],
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
      screens: {
        xs: '300px',
      },
      lineHeight: {
        none: '1',
        h2: '1.05em',
      },
      fontSize: {
        '10xl': '11rem',
        '11xl': '15rem',
        footer: '7vw',
      },
      typography: ({theme}) => ({
        maincolors: {
          css: {
            '--tw-prose-headings': theme('colors.dark'),
          },
        },
        DEFAULT: {
          css: {
            color: theme('colors.dark'),
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
      }),
    },
  },
  plugins: [require('@tailwindcss/typography')],
};
