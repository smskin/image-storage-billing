import FileComponent from './components/file';
import PaginationComponent from './components/pagination';
import UploadComponent from './components/upload';
import StatusComponent from './components/status';

Promise.all([
    import('~modules/vue' /* webpackChunkName: "vue-module" */).then((a) => {return a.default}),
    import('~modules/axios' /* webpackChunkName: "axios-module" */).then((a) => {return a.default})
]).then(([Vue,axios]) => {
    new Vue({
        el: '#file-manager',
        data: {
            project_id: window.application.pageData.projectId,
            pages: 1,
            page: 1,
            files: [],
            message: {
                shown: false,
                text: ''
            }
        },
        components: {
            UploadComponent,
            FileComponent,
            PaginationComponent,
            StatusComponent
        },
        methods: {
            loadData() {
                this.showMessage('Загружаем список файлов...');
                axios.get('/web-api/projects/'+this.project_id+'/images?page=' + this.page).then((response) => {
                    this.pages = response.data.pages;
                    this.files = [];
                    this.$nextTick(() => {
                        this.files = response.data.files;
                    });
                    this.hideMessage();
                })
            },
            showMessage(message){
                this.message.shown = true;
                this.message.text = message;
            },
            hideMessage(){
                this.message.shown = false;
            },
            onFileUploading(){
                this.showMessage('Загружаем файл...')
            },
            onFileUploaded() {
                this.page = 1;
                this.loadData();
            },
            onFileDeleting(){
                this.showMessage('Удаляем файл...')
            },
            onFileDeleted() {
                this.loadData();
            },
            onChangePage(page){
                this.page = page;
                this.loadData();
            }
        },
        created: function () {
            this.loadData();
        }
    });
});
