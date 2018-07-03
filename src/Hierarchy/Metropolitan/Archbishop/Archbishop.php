<?php

namespace App\Hierarchy\Metropolitan\Archbishop;

use InvalidArgumentException;
use App\Hierarchy\Metropolitan\Metropolitan;
use App\Hierarchy\Patriarch;
use App\Hierarchy\Metropolitan\Archbishop\Bishop\Bishop;

class Archbishop
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $metropolitan;
    
    /** @var array */
    protected $bishops = [];
    
    public function __construct(string $name, Metropolitan $metropolitan)
    {
	    $this->name = $name;
        $this->metropolitan = $metropolitan;
    }

    public function setName($name)
    {
	    return $this->name = $name;
    }
    
    public function addBishop(Bishop $bishop): void
    {
	    $this->bishops[] = $bishop;
    }
    
    public function getName(): string
    {
	    return $this->name;
    }
    
    public function removeBishop(string $name): void
    {
	    $key = $this->getBishopKey($name);

	    unset($this->bishops[$key]);
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
        foreach ($this->bishops as $key => $archbishops) {
            if (strtoupper($archbishops->getBishopName()) == strtoupper($name)) {
                return $key;
            }
        }
        return false;
    }
    public function getBishops(): array
    {
	    return $this->bishops;
    }
}
