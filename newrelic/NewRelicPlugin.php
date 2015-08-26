<?php
namespace Craft;

/**
 * New Relic by Supercool
 *
 * @package   NewRelic
 * @author    Josh Angell
 * @copyright Copyright (c) 2015, Supercool Ltd
 * @link      http://plugins.supercooldesign.co.uk
 */

class NewRelicPlugin extends BasePlugin
{

	public function getName()
	{
		return Craft::t('New Relic');
	}

	public function getVersion()
	{
		return '1.0';
	}

	public function getDeveloper()
	{
		return 'Supercool';
	}

	public function getDeveloperUrl()
	{
		return 'http://plugins.supercooldesign.co.uk';
	}

	public function init()
	{
		if (extension_loaded('newrelic'))
		{
			craft()->newRelic->nameTransaction();
		}
	}

}
