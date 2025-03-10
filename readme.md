# Places Plugin

A plugin for the WordPress content management system, to work with and display a 'places' custom post type.

This is mostly a sandbox plugin to learn more about Gutenberg Blocks.

[places-plugin-walkthrough.webm](https://github.com/user-attachments/assets/2fd72fa7-5154-4572-8ae0-b3ff5aa08ef8)


## Development

This plugin requires [Advanced Custom Fields (ACF)](https://www.advancedcustomfields.com/) as well as a [Google Maps API key](https://developers.google.com/maps/documentation/javascript/get-api-key).

Install ACF by downloading and activating it on the site. The Google Maps API key can be added to the site via an environment variable that WordPress can access, or by copying the `.env-example` file to `.env` and updating with the appropriate value:

```
; Copy to .env and use an applicable key for dev
GOOGLE_MAPS_API_KEY=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```

To compile the block assets, install `npm` dependencies and run the `start` script:

```shell
npm install
npm run start
```

## Release

To create a zip archive for this plugin, build the block assets and generate the script using npm scripts:

```shell
npm run build
npm run plugin-zip
```
