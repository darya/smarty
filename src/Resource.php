<?php
namespace Darya\Smarty;

use Darya\View\Resolver as Resolver;
use Smarty_Resource_Custom;

/**
 * Darya's custom smarty templating resource for loading view templates.
 * 
 * @author Chris Andrew <chris@hexus.io>
 */
class Resource extends Smarty_Resource_Custom {
	
	/**
	 * @var \Darya\View\Resolver
	 */
	protected $resolver;
	
	public function __construct(Resolver $resolver) {
		$this->resolver = $resolver;
	}
	
	/**
	 * Fetch the given template using the resource's view resolver.
	 * 
	 * @param string $name
	 * @param string $source
	 * @param int    $mtime
	 */
	public function fetch($name, &$source, &$mtime) {
		if ($path = $this->resolver->resolve($name)) {
			$source = file_get_contents($path);
			$mtime = filemtime($path);
		}
	}
	
}
