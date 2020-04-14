<template>
    <nav>
        <ul class="pagination">
            <li class="page-item">
                <button type="button" class="page-link" v-if="p !== 1" @click="p--"> Previous </button>
            </li>
            <li v-for="pageNumber in pages.slice(p-1, p+5)" class="page-item" v-bind:class="{'active': p === pageNumber}">
                <button type="button" class="page-link" @click="p = pageNumber"> {{pageNumber}} </button>
            </li>
            <li class="page-item">
                <button type="button" @click="p++" v-if="p < count" class="page-link"> Next </button>
            </li>
        </ul>
    </nav>
</template>

<style scoped>

</style>

<script>
    export default {
        props: [
            'count',
            'value'
        ],
        watch: {
            p: function(value){
                this.$emit('change-page',value)
            },
            value: function(value){
                this.p = value;
            }
        },
        computed: {
            pages: function(){
                const pages = [];
                for (let i = 1; i<=this.count; i++){
                    pages.push(i);
                }
                return pages;
            }
        },
        data: function(){
            return {
                p: this.value
            }
        }
    }
</script>
