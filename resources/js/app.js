import './bootstrap';

import Alpine from 'alpinejs';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from ''

import MobilePayments from "./Components/payments/MobilePayments.vue";

Vue.component("mobile-component", MobilePayments);

window.Alpine = Alpine;

Alpine.start();

createInertiaApp({
    resolve: name => resolvePageComponent(`.Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({el, App, props, plugin}){
        createApp({ render: () => h(App,props)})
        .use(plugin)
        .mount(el)
    }
})