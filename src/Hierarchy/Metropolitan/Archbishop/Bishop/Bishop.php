<?php

namespace App\Hierarchy\Metropolitan\Archbishop\Bishop;

use InvalidArgumentException;
use App\Hierarchy\Metropolitan\Archbishop\Archbishop;

class Bishop
{
    /** @var string */
    protected $name;
    
    /** @var string */
    protected $region;
    
    /** @var string */
    protected $birthsday;

    /** @var string */
    protected $archibishop;
    
    public function __construct(array $data)
    {
        $this->setBishopName($data['name']);
        $this->setRegion($data['region']);
        $this->setBirthday($data['birthday']);
        $this->setArchibishop($data['archibishop']);
    }

    public function setBishopName(string $name): string
    {
	    return $this->name = $name;
    }

    public function setRegion(string $region): string
    {
	    return $this->region = $region;
    }

    public function setBirthday(string $birthday): string
    {
	    return $this->birthday = $birthday;
    }

    public function setArchibishop(Archbishop $archibishop): Archbishop
    {
        return $this->archibishop = $archibishop;
    }
    
    public function getBishopName()
    {
	    return $this->name;
    }

    public function getBishopRegion()
    {
	    return $this->region;
    }

    public function getBishopBirthday()
    {
	    return $this->birthday;
    }
    
}
