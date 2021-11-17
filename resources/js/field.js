Nova.booting((Vue, router, store) => {
  Vue.component('index-cloudinary-field', require('./components/IndexField'))
  Vue.component('detail-cloudinary-field', require('./components/DetailField'))
  Vue.component('form-cloudinary-field', require('./components/FormField'))
})
