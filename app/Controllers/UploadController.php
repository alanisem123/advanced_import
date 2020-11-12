<?php namespace Vanderbilt\AdvancedImport\App\Controllers;

use Vanderbilt\AdvancedImport\App\Models\ChunkUploader;

class UploadController extends BaseController
{
    function __construct()
    {
        parent::__construct();
    }
    
    function upload()
    {
        try {
            $params = $_POST;
            $upload_dir = APP_PATH_TEMP.'advanced_import';
            $uploader = new ChunkUploader($upload_dir);
            $results = $uploader->upload($params);
            return $this->printJSON($results);
        } catch (\Exception $e) {
            $response = [
                'success'=>false,
                'message'=>$e->getMessage(),
            ];
            $this->printJSON($response, 400);
        }
    }

}