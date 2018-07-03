<?php

namespace App\Hierarchy;

use App\Hierarchy\Archbishop;

class Metropolitan
{   
    /** @var string */
    protected $name;
    
    /** @var array */
    protected $archbishops = [];
    
    public function __construct(string $name) 
    {
	$this->name = $name;
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

	    unset($this->archbishops[$index]);
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
    public function findArchbishop(string $name)
    {
	    return array_search($name, $this->archbishops);
    }
    public function getArchbishops(): array
    {
	    return $this->archbishops;
    }
    
}
