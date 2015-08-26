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

class NewRelicService extends BaseApplicationComponent
{

	// Public Methods
	// =========================================================================

	/**
	 * Makes a more useful name for the transaction
	 */
	public function nameTransaction()
	{
		// Add the first and second segements
		$name = craft()->request->getSegment(1);
		if (craft()->request->getSegment(2))
		{
			$name .= "/" . craft()->request->getSegment(2);
		}

		// If it was a live preview request then prepend a label for that
		if (craft()->request->isLivePreview())
		{
			$name = "/LivePreview/{$name}";
		}
		// If it was a CP request then stick on the trigger segment
		elseif (craft()->request->isCpRequest())
		{
			$name = craft()->config->get('cpTrigger') . "/{$name}";
		}

		// Add the transaction through the PHP agenet API
		newrelic_name_transaction($name);
	}

}
