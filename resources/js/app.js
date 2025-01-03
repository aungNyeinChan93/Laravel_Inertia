import { createApp, h } from 'vue'
import { createInertiaApp, Head } from '@inertiajs/vue3'
import Layout from './Pages/Components/Layout.vue'

createInertiaApp({
    title:(title)=>`${title} -My App`,
    resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    const page = pages[`./Pages/${name}.vue`]
    if (page) {
      page.default.layout = page.default.layout || Layout;
    }
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
    //   .component("layout",Layout)
      .component("Head",Head)
      .mount(el)
  },
  
})

