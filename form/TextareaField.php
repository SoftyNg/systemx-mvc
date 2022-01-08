<?php

namespace app\core\form;
/**
 * 
 */
use app\core\Model;
use app\core\form\BaseField;
class TextareaField extends BaseField
{	
    public Model $model;
	public String $attribute;
	public String $type;
	
	public const TYPE_TEXT = 'text';
	public const TYPE_PASSWORD = 'password';
	public const TYPE_EMAIL = 'email';
	
	  // public function  __construct(Model $model, String $attribute){
		  // $this->type = self::TYPE_TEXT;
		  // parent::__construct($model, $attribute);
	  // }
	  

	  // public function passwordField(){
		  // $this->type = self::TYPE_PASSWORD;
		  // return $this;
		  
	  // }
     
	  public function renderInput(): string{
	    return sprintf('<textarea name="%s"  class="form-control%s">%s</textarea>',
		  $this->attribute,
		  $this->model->{$this->attribute},
		  $this->model->hasError($this->attribute)? 'is-invalid':'',
		  );
		 
     }
}