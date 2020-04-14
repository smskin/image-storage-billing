import "datatables.net-bs4/css/dataTables.bootstrap4.css";

Promise.all([
    import('jquery').then((a) => {return a.default}),
    import('datatables.net-bs4' /* webpackChunkName: "jq-datatables" */),
]).then(([jQuery]) => {
    (function ($) {
        window.LaravelDataTables = window.LaravelDataTables || {};
        window.LaravelDataTables["dataTableBuilder"] = $("#dataTableBuilder").DataTable( window.application.dataTable);
    })(jQuery);
});


