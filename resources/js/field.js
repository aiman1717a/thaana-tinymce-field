Nova.booting((Vue, router, store) => {
  Vue.component('index-thaana-tinymce-field', require('./components/IndexField'))
  Vue.component('detail-thaana-tinymce-field', require('./components/DetailField'))
  Vue.component('form-thaana-tinymce-field', require('./components/FormField'))
})
