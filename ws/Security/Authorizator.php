<?php

namespace ws\Security;

use Nette\Security\Permission;

class Authorizator extends Permission
{
    public function __construct() {}

    public function setRule($toAdd, $type, $roles, $resources, $privileges, $assertion = NULL)
    {
        foreach ((array)$resources as $resource)
        {
            foreach ($privileges as $privilege)
            {
                if (!isset($this->privilegeForResource[$resource]))
                    $this->privilegeForResource[$resource] = [];
                $this->privilegeForResource[$resource][] = $privilege;
            }
        }

        return parent::setRule($toAdd, $type, $roles, $resources, $privileges, $assertion); // TODO: Change the autogenerated stub
    }

    public function getPrivilegesForResource($resource)
    {
        if (!isset($this->privilegeForResource[$resource]))
            return [];
        return array_unique($this->privilegeForResource[$resource]);

    }

    
    protected $privilegeForResource = array();
}