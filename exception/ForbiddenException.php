<?php

namespace systemx\systemx\exception;




class ForbiddenException extends \Exception {
	protected $message = 'You don\'t have permission to access this page';
	protected $code = 483;

}