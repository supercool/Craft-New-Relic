# New Relic for Craft

This plugin will name your transactions in New Relic based on the url segments.

It does three things:

1. Names the transaction from the first and second segment by default
2. Prepends ‘LivePreview’ if the transaction has come from a Live Preview request
3. Prepends the `cpTrigger` config value if it is a cp request

# Installation

1.  Copy the `newrelic/` folder to your `craft/plugins/` folder.
2.  Go to Settings > Plugins from your Craft control panel and install the New Relic plugin.
