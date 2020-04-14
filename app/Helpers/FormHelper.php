<?php

if (!function_exists('dataTableJs')) {
    /**
     * @param stdClass $table
     * @return string
     * @throws Exception
     */
    function dataTableJs(stdClass $table)
    {
        return '<script type="text/javascript">window.application.dataTable = '.$table->config.'</script><script type="text/javascript" src="'.mix('/js/components/datatables.js','assets').'"></script>';
    }
}

if (!function_exists('dataTable')){
    function dataTable(stdClass $table)
    {
        return $table->html;
    }
}
