import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import vue from '@vitejs/plugin-vue'; // 添加 Vue 支持


export default defineConfig({
	plugins: [
		laravel({
			input: [
				'resources/assets/style/style.less',
				'resources/assets/style/app.css',
				'resources/js/app.js'
			],
			refresh: [
				'modules/**/src/request/**/*.php',
				'modules/**/resources/views/**/*.blade.php',
				'modules/**/resources/js/**/*.vue',
				'resources/views/**/*.blade.php',
				'resources/js/**/*.vue',
				'resources/assets/style/**/*.less',
				'resources/assets/style/**/*.css',
			],
			buildDirectory: 'build',
		}),
		vue()
	],
	server: {
		host: 'localhost',
		cors: true,
	},
	css: {
		preprocessorOptions: {
			less: { javascriptEnabled: true },
		},
	},
	resolve: {
		alias: {
			'@': path.resolve(__dirname, 'resources/js'),
			'@modules': path.resolve(__dirname, 'modules')
		},
	},
	build: {
		manifest: 'manifest.json',
		rollupOptions: {
			input: [
				'resources/assets/style/style.less',
				'resources/assets/style/app.css',
				'resources/js/app.js'
			],
		},
		assetsDir: '',
	},
});
