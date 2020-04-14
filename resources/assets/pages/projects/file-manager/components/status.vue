<template>
    <div v-if="shown" class="alert alert-success alert-block" v-html="text"></div>
</template>

<style>

</style>

<script>
    export default {
        props: ['shown','text']
    }
</script>
