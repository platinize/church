<?php

namespace App\Hierarchy;

class Bishop
{
    /** @var string */
    protected $name;
    
    /** @var string */
    protected $region;
    
    /** @var string */
    protected $birthsday;
    
    public function __construct(array $data)
    {
	$this->setBishopName($data['name']);
	$this->setRegion($data['region']);
	$this->setBirthday($data['birthday']);
    }

    protected function setBishopName(string $name): string
    {
	return $this->name = $name;
    }
    
    protected function setBishopRegion(string $region): string
    {
	return $this->region = $region;
    }
    
    protected function setBishopBirthday(string $birthday): string
    {
	return $this->birthday = $birthday;
    }
    
    protected function getBishopName()
    {
	return $this->name;
    }
    
    protected function getBishopRegion()
    {
	return $this->region;
    }
    
    protected function getBishopBirthday()
    {
	return $this->birthday;
    }
    
}
