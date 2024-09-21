import { defineConfig } from 'vite';
import tailwindcss from 'tailwindcss';
import autoprefixer from 'autoprefixer';

export default defineConfig({
  build: {
    rollupOptions: {
      input: {
        main: './src/main.js', // Entry point for JavaScript
        style: './src/tailwind.css', // Entry point for Tailwind CSS
      },
      output: {
        entryFileNames: '[name].js', // Output JavaScript files with their original names
        assetFileNames: '[name].[ext]', // Output CSS files with their original names
      },
    },
    outDir: './assets', // Directory where bundled files will be output
    emptyOutDir: true, // Clear the output directory before each build
    assetsDir: '', // Place JS and CSS files directly in ./assets
  },
  css: {
    postcss: {
      plugins: [tailwindcss, autoprefixer], // Use Tailwind and Autoprefixer in PostCSS
    },
  },
});
