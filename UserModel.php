<?php

namespace systemx\systemx;
/**
 * 
 */
 use systemx\systemx\db\DbModel;
 
abstract class UserModel extends DbModel
{
   abstract public function getDisplayName():string;
}