<template>
<div class="flex border-b border-40"><div class="w-1/4 py-4"><h4 class="font-normal text-80">
                Map
            </h4></div> <div class="w-3/4 py-4">

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


            </div></div>
</template>

<script>
export default {
    props: ['resourceId', 'resource', 'resourceName', 'field'],

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
