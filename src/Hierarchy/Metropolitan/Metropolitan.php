<?php

namespace App\Hierarchy\Metropolitan;

use App\Hierarchy\Metropolitan\Archbishop\Archbishop;
use App\Hierarchy\Patriarch;
use InvalidArgumentException;

class Metropolitan
{
    /** @var string */
    protected $patriarch;

    /** @var string */
    protected $name;
    
    /** @var array */
    protected $archbishops = [];
    
    public function __construct(string $name, Patriarch $patriarch)
    {
	    $this->name = $name;
	    $this->patriarch = $patriarch;
    }

    public function setMetropolitanName($name)
    {
	    return $this->name = $name;
    }
    
    public function addArchbishop(Archbishop $name): void
    {
	    $this->archbishops[] = $name;
    }
    
    public function getMetropolitanName(): string
    {
	    return $this->name;
    }
    
    public function removeArchbishop(string $name): void
    {
	    $key = $this->getArchbishopKey($name);

	    unset($this->archbishops[$key]);
    }
    
    public function hasArchbishop(string $name): bool
    {
	    return $this->findArchbishop($name) !== false;
    }
    
    public function getArchbishopKey(string $name): int
    {
	    $key = $this->findArchbishop($name);
	    if ($key !== false) {
		    return $key;
	    }
	    throw new InvalidArgumentException ("Archbishop has name `${name}` does not exists");
    }
    public function findArchbishop(string $name): ?int
    {
        foreach ($this->archbishops as $key => $archbishop) {
            if (strtoupper($archbishop->getName()) == strtoupper($name)) {
                return $key;
            }
        }
        return false;
    }
    public function getArchbishops(): array
    {
	    return $this->archbishops;
    }
    
}
