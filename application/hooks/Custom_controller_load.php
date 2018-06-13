<?php 
function load_custom_controllers()
{
	spl_autoload_register('include_custom_controllers');
}

function include_custom_controllers($class)
{
	if(strpos($class, 'CI_') !== 0)
	{
		if(is_readable(APPPATH . 'core/' . $class . '.php'))
		{
			require_once(APPPATH . 'core/' . $class . '.php');
		}
	}
}

?>