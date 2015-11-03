<?php
namespace Darya\Smarty;

use Darya\Smarty\Resource;
use Darya\View\Resolver;

/**
 * View resolver extension for Smarty.
 * 
 * It registers itself as a custom Smarty resource for any created templates so
 * that they can easily include other templates from anywhere in the system.
 * 
 * @author Chris Andrew <chris@hexus.io>
 */
class ViewResolver extends Resolver {
	
	/**
	 * @var array Template file extensions to consider
	 */
	protected $extensions = array('.tpl');
	
	public function create($path = null, $vars = array()) {
		$engine = parent::create($path, $vars);
		
		$engine->smarty()->registerResource('darya', new Resource($this));
		$engine->smarty()->default_resource_type = 'darya';
		
		return $engine;
	}
	
}
