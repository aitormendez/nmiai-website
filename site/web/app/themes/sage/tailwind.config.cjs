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
    'mb-28',
    '!max-w-none',
    'max-w-6xl',
    'py-24',
    'md:pr-12',
    'md:pr-7',
    'md:pl-7',
    'md:pl-12',
    'md:pr-10',
    'md:pl-10',
    'md:pr-9',
    'md:pl-9',
    'my-36',
    'my-20',
    'md:my-0',
    'md:my-40',
    'mb-56',
    'md:mb-40',
    'mt-14',
    'md:mt-10',
    'text-6xl',
    '2xl:text-7con5xl',
    'mt-0',
    'mt-16',
    'md:-mt-6',
    'md:mt-0',
    'md:mt-60',
    'md:-pt-44',
    'md:text-3xl',
    'text-3xl',
    'md:gap-6',
    'gap-0',
    'order-0',
    'order-1',
    'order-2',
    'order-3',
    'order-4',
    'order-5',
    'order-6',
    'order-7',
    'order-8',
    'order-9',
    'order-10',
    'order-11',
    'order-12',
    'order-13',
    'order-14',
    'order-15',
    'order-16',
    'md:order-0',
    'md:order-1',
    'md:order-2',
    'md:order-3',
    'md:order-4',
    'md:order-5',
    'md:order-6',
    'md:order-7',
    'md:order-8',
    'md:order-9',
    'md:order-10',
    'md:order-11',
    'md:order-12',
    'md:order-13',
    'md:order-14',
    'md:order-15',
    'md:order-16',
    'md:w-full',
    'w-4/5',
    '-mx-6',
    'md:-mx-8',
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
      order: {
        13: '13',
        14: '14',
        15: '15',
        16: '16',
      },
      screens: {
        xs: '300px',
      },
      lineHeight: {
        none: '1',
        h2: '1.05em',
      },
      fontSize: {
        '7con5xl': '5rem',
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
