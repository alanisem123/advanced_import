<?php namespace Vanderbilt\AdvancedImport\App\Models\Importers;

use Vanderbilt\AdvancedImport\AdvancedImport;
use Vanderbilt\AdvancedImport\App\Models\ImportSettings;
use Vanderbilt\AdvancedImport\App\Traits\CanLog;
use Vanderbilt\AdvancedImport\App\Traits\CanProcessCsvData;
use Vanderbilt\AdvancedImport\App\Traits\SubjectTrait;

abstract class AbstractImporter implements ImporterInterface
{
    use SubjectTrait;
    use CanLog;
    use CanProcessCsvData;
    
    /**
     * @var int
     */
    protected $project_id;
    
    /**
     *
     * @var int
     */
    protected $line;

    /**
     * @var ImportSettings
     */
    protected $settings;

    /**
     * @param int $project_id
     * @param ImportSettings $settings
     */
    public function __construct($project_id, $settings)
    {
        $this->project_id = $project_id;
        $this->settings = $settings;
        $module = AdvancedImport::getInstance();
        $this->attach($module, '*'); // attach the module as a subscriber
    }

}