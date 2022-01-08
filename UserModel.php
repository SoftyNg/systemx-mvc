<?php

namespace systemx\mvc;
/**
 * 
 */
 use systemx\mvc\db\DbModel;
 
abstract class UserModel extends DbModel
{
   abstract public function getDisplayName():string;
}