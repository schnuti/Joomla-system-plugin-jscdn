<?php
/**
 * @package     oeJ! Javascript from CDN Plugin.
 *
 * @copyright   Copyright (C) 2014 Ove Eriksson.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

/**
 * oeJ! Javascript from CDN Plugin.
 *
 * @subpackage  System.Jscdn
 * @since       3.4
 */
class PlgSystemJscdn extends JPlugin
{
	/**
	 * Convert the site preloaded javascripts to be loaded from other urls like public CDNs.
	 *
	 * @return  void
	 */
	public function onBeforeRender()
	{
		$app = JFactory::getApplication();
		
		$document = JFactory::getDocument();
		
		if (( !(int)$this->params->get('backend',0)) || $document->getType() !== 'html' )
		{
			return;
		}
		
		//convert the json array from the repeatable field
		$registry = new JRegistry;
		$registry->loadString( $this->params->get('list_replacements','') );
		$list_replacements = $registry->toArray();
		
		$replacement = array();
		
		foreach ($list_replacements['prefix'] as $i => $val )
		{
			$replacement[] = array('prefix' => $val, 'old' => $list_replacements['old'][$i],
			'new' => $list_replacements['new'][$i] );
		}

		//prefix Joomla standard
		$prefix = JURI::root(true);

		// Replace the js links in the document.
		
		foreach ($replacement as $i => $vals )
		{
		    $keys = array_keys($document->_scripts);
			$prefixold = $vals['prefix']? $vals['prefix'] : $prefix;
	    	$index = array_search($prefixold . $vals['old'], $keys);

			if ($index !== false)
			{
 				$keys[$index] = $vals['new'];
				$document->_scripts = array_combine($keys, $document->_scripts);
			}
		}

		return true;
	}
}
