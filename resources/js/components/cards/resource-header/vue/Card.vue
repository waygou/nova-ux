<template>
    <card class="flex flex-col items-start justify-start">
        <div class="px-3 py-3">
            <div class="flex">
              <div class="flex-none w-24 pr-3"><svg class="h-16 w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="var(--sidebar-icon)" :d="d"/></svg></div>
              <div class="flex-none self-center">
                <h1 class="text-primary dim uppercase">{{card.header}}</h1>
                <p class="py-1">{{card.content_line_1}}</p>
                <p class="py-1">{{card.content_line_2}}</p>
                <p class="py-1">{{card.content_line_3}}</p>
                <a class="text-primary cursor-pointer" target="_blank" :href="link_url">{{card.link_text}}</a>
              </div>
            </div>
        </div>
    </card>
</template>

<script>
export default {
    props: ['card'],

    computed: {
        d() {
            return this.card.svg;
        },

        link_url() {
            return this.card.link_url;
        }
    }
}
</script>
