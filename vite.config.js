import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { sync as globSync } from 'glob';

const jsFiles = globSync('resources/js/**/*.js');
const cssFiles = globSync('resources/sass/**/*.scss');

const adminStyleScssFiles = globSync('resources/admin/style/**/*.scss');

const adminJsFiles = globSync('resources/admin/js/**/*.js');

export default defineConfig({
  plugins: [
    laravel({
      input: [
        ...jsFiles,
        ...cssFiles,
        ...adminStyleScssFiles,
        ...adminJsFiles,
      ],
      refresh: true,
    }),
  ],
});
