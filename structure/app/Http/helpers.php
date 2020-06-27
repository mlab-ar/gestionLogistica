<?php

	function setActiveRoute($name)
	{
		return request()->routeIs($name) ? 'menu-open' : '';
	}

	function setActiveRouteHome($name)
	{
		return request()->routeIs($name) ? 'active' : '';
	}
