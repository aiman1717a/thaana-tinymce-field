Nova.booting((Vue, router, store) => {
  Vue.component('index-dhivehi-tinymce', require('./components/IndexField'))
  Vue.component('detail-dhivehi-tinymce', require('./components/DetailField'))
  Vue.component('form-dhivehi-tinymce', require('./components/FormField'))
})
