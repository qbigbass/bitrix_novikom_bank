import { defineConfig } from 'astro/config';

// https://astro.build/config
export default defineConfig({
	outDir: './build',
	devToolbar: {
		enabled: false
	},
	compressHTML: false,
	vite: {
		build: {
			rollupOptions: {
				output: {
					entryFileNames: (chunkInfo) => {
						if (chunkInfo?.isEntry && chunkInfo.moduleIds[0].includes('/pages')) {
							const pageName = chunkInfo.moduleIds[0].match(/pages\/(.*)\.astro/gm);
							if (pageName && pageName[0]) {
								return 'js/'+pageName[0].split('/')[1].split('.')[0]+'.js';
							}
						}
						return 'js/[name].js'
					},
					chunkFileNames: 'js/chunk-[name].js',
					assetFileNames: (assetInfo) => {
						if (assetInfo.name.includes('.css')) {
							const chunkNumber = assetInfo.name.match(/\d+/);
							if (chunkNumber) {
								return 'css/common[extname]';
							} else {
								return 'css/[name][extname]';
							}
						}
						return '[name][extname]'
					},
				},
			},
			assetsInlineLimit: 0,
			cssCodeSplit: true
		}
	},
	build: {
		redirects: false,
		format: 'file',
		inlineStylesheets: 'never',
	}
});
