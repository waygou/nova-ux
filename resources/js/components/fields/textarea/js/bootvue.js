Nova.booting((Vue, router) => {
    Vue.component('index-nova-ux-field-textarea', require('../vue/IndexField'));
    Vue.component('detail-nova-ux-field-textarea', require('../vue/DetailField'));
    Vue.component('form-nova-ux-field-textarea', require('../vue/FormField'));
})
