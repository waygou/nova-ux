<template>
    <div v-if="field.asHtml" v-html="field.value"></div>
    <span
        v-else
        class="whitespace-no-wrap"
    >
        <a
            :href="target"
            class="cursor-pointer dim no-underline text-primary inline-flex items-center"
            target="_blank">
            View Map
        </a>
    </span>
</template>

<script>
export default {
    props: ['resourceName', 'field'],

    data() {
        return {
            target: ''
        }
    },

    mounted() {
        this.target = "https://www.google.com/maps/search/?api=1&query=" + this.field.value + "&zoom=18"
    }
}
</script>
