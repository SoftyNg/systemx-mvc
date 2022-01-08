<?php

namespace systemx\mvc\exception;




class NotFoundException extends \Exception {
	
	protected $message = 'Page not found';
	protected $code = 404;

}