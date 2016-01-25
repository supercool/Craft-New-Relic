<?php

namespace Craft;

use Twig_Extension;

class NewRelicTwigExtension extends \Twig_Extension
{

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'newrelic';
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction(
                'newrelic_get_browser_timing_header',
                array($this, 'newrelic_get_browser_timing_header'),
                array('is_safe' => array('html'))
            ),
            new \Twig_SimpleFunction(
                'newrelic_get_browser_timing_footer',
                array($this, 'newrelic_get_browser_timing_footer'),
                array('is_safe' => array('html'))
            ),
        );
    }

    /**
     * Get New Relic timing header
     *
     * @return string
     */
    public function newrelic_get_browser_timing_header() {
        if (extension_loaded('newrelic')) {
            return newrelic_get_browser_timing_header();
        } else {
            return null;
        }
    }

    /**
     * Get New Relic timing footer
     *
     * @return string
     */
    public function newrelic_get_browser_timing_footer() {
        if (extension_loaded('newrelic')) {
            return newrelic_get_browser_timing_footer();
        } else {
            return null;
        }
    }

}