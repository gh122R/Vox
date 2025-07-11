import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import naive, { NMessageProvider } from 'naive-ui';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        return createApp({
            render: () =>
                h(NMessageProvider, null, {
                    default: () => h(App, props),
                }),
        })
            .use(plugin)
            .use(ZiggyVue)
            .use(naive)
            .mount(el);
    },
    progress: {
        color: '#0077ff',
    },
});
