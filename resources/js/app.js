import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { InertiaProgress } from '@inertiajs/progress'

import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'   // 引入样式

createInertiaApp({
    id: 'inertia-app', // 显式指定挂载点的 ID
    resolve: (name) => {
        const segments = name.includes('::') ? name.split('::') : [null, name];
        const module = segments[0];
        const page = segments[1];

        if (module) {
            // 从模块加载组件
            return resolvePageComponent(`../../modules/${module}/resources/js/pages/${page}.vue`,
                import.meta.glob('../../modules/*/resources/js/pages/**/*.vue'));
        }

        // 从主应用加载
        return resolvePageComponent(`./pages/${page}.vue`,
            import.meta.glob('./pages/**/*.vue'));
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ElementPlus) // 使用 Element Plus
            .mount(el);
    },
});

// 启动 Inertia 的进度条
InertiaProgress.init({
    delay: 250, // 延迟显示进度条（单位 ms）
    color: '#29d', // 进度条颜色
    includeCSS: true, // 自动引入样式
    showSpinner: false, // 是否显示右边的小圈圈
})
