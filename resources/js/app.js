import { createApp, h } from 'vue'
import { createInertiaApp, Head } from '@inertiajs/vue3'
import Layout from './Pages/Components/Layout.vue'

createInertiaApp({
    title:(title)=>`${title} -My App`,
    resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    const page = pages[`./Pages/${name}.vue`]
    if (page.default.layout === undefined) {
      page.default.layout = Layout;
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
    progress: {
      // The delay after which the progress bar will appear, in milliseconds...
      delay: 0,

      // The color of the progress bar...
      color: 'red',

      // Whether to include the default NProgress styles...
      includeCSS: true,

      // Whether the NProgress spinner will be shown...
      showSpinner: true,
    },
    // ...

})

