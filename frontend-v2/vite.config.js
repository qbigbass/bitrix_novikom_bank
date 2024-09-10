import { defineConfig } from 'vite';
import { resolve } from 'path'

export default defineConfig({
  root: resolve(__dirname, 'src'),
  build: {
    outDir: '../dist',
    rollupOptions: {
      input: {
        main: resolve(__dirname, 'src', 'index.html'),
        ui: resolve(__dirname, 'src', 'ui.html'),
      }
    }
  },
  server: {
    port: 8080
  }
})
