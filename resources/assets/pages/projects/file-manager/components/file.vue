<template>
    <div class="item position-relative">
        <div class="img-thumbnail">
            <div class="content">
                <picture>
                    <source :srcset="pic.webp" type="image/webp">
                    <source :srcset="pic.jpg" type="image/jpeg">
                    <img :src="pic.jpg" alt="" />
                </picture>
            </div>
            <div class="controls position-absolute bg-light pl-1">
                <span v-html="size"></span>
                <button type="button" class="btn btn-link btn-sm text-danger" v-on:click="remove()"><i
                    class="fa fa-trash"></i></button>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .item {
        width: 200px;
        display: inline-block;
        margin: 5px;
    }

    .content img {
        width: 100%;
    }

    .controls {
        right: 0;
        bottom: 0;
        margin-right: 5px;
        margin-bottom: 5px;
        text-align: center;
    }
</style>

<script>
    export default {
        props: ['project_id', 'file'],
        data: function () {
            return {
                id: this.file.id,
                pic: {
                    webp: this.file.pic.webp,
                    jpg: this.file.pic.jpg
                },
                size: this.file.size,
            }
        },
        methods: {
            remove() {
                this.$emit('file-deleting');

                Promise.all([
                    import('~modules/axios').then((a) => {
                        return a.default
                    })
                ]).then(([axios]) => {
                    axios.post('/web-api/images/' + this.id, {
                        _method: 'DELETE'
                    })
                        .then(() => {
                            this.$emit('file-deleted')
                        })
                });
            }
        }
    }
</script>
