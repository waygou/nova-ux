Nova.booting((Vue, router) => {
    Vue.component('index-nova-ux-field-belongs-to', require('../vue/IndexField'));
    Vue.component('detail-nova-ux-field-belongs-to', require('../vue/DetailField'));
    Vue.component('form-nova-ux-field-belongs-to', require('../vue/FormField'));
})
