// import { defineConfig } from 'vite';
// import vue from '@vitejs/plugin-vue';
import { resolve } from 'path';

// Plugins
// import sass from 'sass';
// import css from 'vite-plugin-css';

export default {
  root: resolve(__dirname, 'src'),
  build: {
    outDir: '../dist'
  },
  server: {
    port: 8080
  }
}

// import { defineConfig } from 'vite';
// import vue from '@vitejs/plugin-vue';
// import { resolve } from 'path';
//
// // Plugins
// import sass from 'sass';
// import css from 'vite-plugin-css';
//
// export default defineConfig({
//   plugins: [
//     vue(),
//     css({
//       preprocessorOptions: {
//         scss: {
//           additionalData: '@import "./src/assets/scss/main.scss";',
//           implementation: sass,
//         },
//       },
//     }),
//   ],
//   resolve: {
//     alias: {
//       '@': resolve(__dirname, './src'),
//     },
//   },
//   build: {
//     commonjsOptions: {
//       include: [/node_modules/],
//     },
//   },
// });
