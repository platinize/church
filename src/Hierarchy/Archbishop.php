<?php

namespace App\Hierarchy;

class Archbishop
{
    /** @var string */
    protected $name;
    
    /** @var array */
    protected $bishops = [];
    
    public function __construct(string $name) 
    {
	$this->name = $name;
    }

    public function setName($name)
    {
	return $this->name = $name;
    }
    
    public function addBishop(Bishop $name): void
    {
	return $this->setArchbishopName($name);
    }
    
    public function getName(): string
    {
	return $this->name;
    }
    
    public function removeBishop(string $name): void
    {
	    $key = $this->getBishopKey($name);

	    unset($this->Bishops[$index]);
    }
    
    public function hasBishop(string $name): bool
    {
	    return $this->findBishop($name) !== false;
    }
    
    public function getBishopKey(string $name): int
    {
	$key = $this->findBishop($name);
	if ($key !== false) {
	    return $key;
	}
	throw new InvalidArgumentException ("Bishop has name `${name}` does not exists");
    }
    public function findBishop(string $name)
    {
	return array_search($name, $this->bishops);
    }
    public function getArchbishops(): array
    {
	    return $this->archbishops;
    }
}
