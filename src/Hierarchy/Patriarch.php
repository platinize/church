<?php

namespace App\Hierarchy;

use App\Hierarchy\Metropolitan\Metropolitan;
use InvalidArgumentException;

class Patriarch
{
    /** @var string */
    protected $patriarch;
    
    /** @var array */
    protected $metropolitans = [];
    
    public function isPatriarchName(string $name)
    {
        return mb_strtoupper($this->patriarch) == mb_strtoupper($name);
    }

    public function setPatriarchName(string $name)
    {
        return $this->patriarch = $name;
    }
    
    public function getPatriarch()
    {
        return $this->patriarch;
    }
    
    public function addMetropolitan(Metropolitan $name) 
    {
	    return $this->metropolitans[] = $name;
    }
    
    public function getAllMetropolitans(): array
    {
	    return $this->metropolitans;
    }
    
    public function hasMetropolitan(string $name): bool
    {
	    return $this->findMetropolitan($name) !== false;
    }
    
    public function removeMetropolitan(string $name): void
    {
        $key = $this->getMetropolitanKey($name);

        unset($this->metropolitans[$key]);
    }
    
    public function getMetropolitanKey(string $name): int
    {
        $key = $this->findMetropolitan($name);

        if ($key !== false) {
            return $key;
        }

        throw new InvalidArgumentException ("Metropolitan has name `${name}` does not exists");
    }
    
    public function findMetropolitan(string $name): ?int
    {
        foreach ($this->metropolitans as $key => $metropolitan) {
            if (strtoupper($metropolitan->getMetropolitanName()) == strtoupper($name)) {
                return $key;
            }
        }
	    return false;
    }
    
}
