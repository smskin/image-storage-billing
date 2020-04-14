<template>
    <label class="btn btn-primary">
        <i class="fa fa-plus"></i> Загрузить файл
        <input type="file" hidden v-on:change="onFileChange">
    </label>
</template>

<style>

</style>

<script>
    export default {
        props: ['project_id'],
        methods: {
            onFileChange(e) {
                const files = e.target.files;
                if (!files.length) {
                    return false;
                }
                this.$emit('file-uploading');
                this.submitFile(files[0]);
            },
            prepareData(file) {
                const formData = new FormData;
                formData.append('file', file);
                return formData;
            },
            submitFile(file) {
                Promise.all([
                    import('~modules/axios').then((a) => {
                        return a.default
                    })
                ]).then(([axios]) => {
                    axios.post('/web-api/projects/' + this.project_id + '/images',
                        this.prepareData(file),
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }
                    ).then(() => {
                        this.$emit('file-uploaded');
                    });
                });
            }
        }
    }
</script>
