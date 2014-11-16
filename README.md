Joomla system plugin jscdn
==========================

This plugin for Joomla replaces the preloaded javascript urls with defined alternatives like CDNs. Do not worry, it is fast and do not add any javascript that is not already preloaded. The loading order is preserved. You can also change to other (local) versions but be sure they are compatible with your template and your extensions.
 
Example :

replace
- /media/jui/js/jquery.min.js

with
- //code.jquery.com/jquery-1.11.0.min.js

Some examples are added by default. When activating the plugin you have to click on the Javascript replacements Select button, save the popup and save the plugin, otherwise you'll get some error messages. Is on the todo list if a solution is found.

The Prefix is added to the old source path and defaults to the Joomla JURI::root(true)variable. Do not add anything there if you use Joomla standard paths.

There is an option to load the scripts for your backend in the same way.  

Be aware
- that you might have to maintain the version to load if the requirements change.
- test that you added valid paths for the new sources. There are no automatic checks.

