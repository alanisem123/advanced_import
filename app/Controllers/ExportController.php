<?php namespace Vanderbilt\AdvancedImport\App\Controllers;

use Project;
use Vanderbilt\AdvancedImport\AdvancedImport;
use Vanderbilt\AdvancedImport\App\Models\Export;

class ExportController extends BaseController
{
    function __construct()
    {
        parent::__construct();
    }
    
    function export()
    {
        try {
            //code...
            $project_id = $_GET['pid'];
            $event_id = $_GET['event_id'];
            $form_name = $_GET['form_name'];
            $settings = [
                'delimiter' => $_GET['field_delimiter'],
                'enclosure' => $_GET['text_qualifier'],
                'primary_key' => $_GET['primary_key'],
            ];

            $model = new Export();
            $project = new Project($project_id);
            return $model->exportCSV($project, $event_id, $form_name, $settings);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}