<template>
    <div class="flex border-b border-40 justify-start items-center">
        <div class="flex-initial py-4">
            <h4 class="font-normal text-80">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="h-4 w-4 sidebar-icon" preserveAspectRatio><path fill="var(--sidebar-icon)" :d="field.svg"></path></svg>
            </h4>
        </div>
        <div class="flex-no-shrink text-primary text-xl font-semibold">{{ field.name }}</div>
    </div>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>
