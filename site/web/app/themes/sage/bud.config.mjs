// @ts-check

/**
 * Build configuration
 *
 * @see {@link https://bud.js.org/guides/getting-started/configure}
 * @param {import('@roots/bud').Bud} app
 */
export default async (app) => {
  app
    /**
     * Application entrypoints
     */
    .entry({
      app: ['@scripts/app', '@styles/app'],
      editor: ['@scripts/editor', '@styles/editor'],
    })

    /**
     * Directory contents to be included in the compilation
     */
    .assets(['images'])

    /**
     * Matched files trigger a page reload when modified
     */
    .watch(['resources/views/**/*', 'app/**/*'])

    /**
     * Proxy origin (`WP_HOME`)
     */
    .proxy('https://nomanisanisland.test')

    /**
     * Development origin
     */
    .serve({
      host: '0.0.0.0',
      port: 3000,
      cert: app.path('/Users/aitor/Library/Application Support/mkcert/nomanisanisland.test+3.pem'),
      key: app.path('/Users/aitor/Library/Application Support/mkcert/nomanisanisland.test+3-key.pem'),
    })

    /**
     * URI of the `public` directory
     */
    .setPublicPath('/app/themes/sage/public/')

    .wpjson.settings({
      layout: {
        contentSize: '840px',
        wideSize: '1100px',
      },
      color: {
        custom: false,
        customGradient: false,
        defaultPalette: false,
        defaultGradients: false,
      },
      custom: {
        spacing: {},
        typography: {
          'font-size': {},
          'line-height': {},
        },
      },
      spacing: {
        padding: true,
        units: ['px', '%', 'em', 'rem', 'vw', 'vh'],
      },
      typography: {
        customFontSize: true,
        fluid: true,
      },
    })
    .useTailwindColors()
    .useTailwindFontFamily()
    .enable();

  app.wpjson.settings((theme) => theme.set('blocks.acf/section.spacing.padding', true));
};
