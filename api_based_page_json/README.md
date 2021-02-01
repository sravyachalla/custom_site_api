# API Based Page JSON

## Installation
Go to "Extend > Modules" and enable the module.

## Configuration
Go to "Configuration > System > Site Settings" and configure the site API key.
Now the page nodes can be shown as JSON at /page_json/<SITEAPIKEY>/<NID>
If the node is not a valid nid or not a page or site API key doesn't matches then, it returns 403 access denied exception.