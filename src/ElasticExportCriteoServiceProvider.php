<?php

namespace ElasticExportCriteo;

use Plenty\Modules\DataExchange\Services\ExportPresetContainer;
use Plenty\Plugin\ServiceProvider;

/**
 * Class ElasticExportCriteoServiceProvider
 * @package ElasticExportCriteo
 */
class ElasticExportCriteoServiceProvider extends ServiceProvider
{
    /**
     * Function definition for registering the service provider.
     */
    public function register()
    {
        //
    }

	/**
	 * @param ExportPresetContainer $exportPresetContainer
	 */
	public function boot(ExportPresetContainer $exportPresetContainer)
	{
		//Adds the export format to the export container.
		$exportPresetContainer->add(
			'Criteo-Plugin',
			'ElasticExportCriteo\ResultField\Criteo',
			'ElasticExportCriteo\Generator\Criteo',
			'',
			true,
			true
		);
	}

}