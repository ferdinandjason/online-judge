<?php

namespace App\Service\Problem;

use Illuminate\Support\Facades\Facade;

class ProblemFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'ProblemServices';
	}
}