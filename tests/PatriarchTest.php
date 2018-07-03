<?php

namespace Tests;

use App\Hierarchy\Patriarch;
use App\Hierarchy\Metropolitan;
use PHPUnit\Framework\TestCase;

class PatriarchTest extends TestCase
{
    public function test_add_metropalitan()
    {
	$patriarch = new Patriarch();
	
	$metropolitanName = 'Arfey';
	
	$metropolitan = new Metropolitan($metropolitanName);
	
	$patriarch->addMetropolitan($metropolitan);
	
	$this->assertSame(1, count($patriarch->getAllMetropolitans()));
    }
    /** @test */
    public function test_remove_metropalitan()
    {
	$patriarch = new Patriarch();
	
	$metropolitanName = 'Gosha';
	
	$metropolitan = new Metropolitan($metropolitanName);
	
	$patriarch->addMetropolitan($metropolitan);
	
	$this->assertSame(1, count($patriarch->getAllMetropolitans()));
	
	$patriarch->removeMetropolitan($metropolitanName);
	
	$this->assertSame(0, count($patriarch->getAllMetropolitans()));
    }
    /** @test */
    public function test_has_metropalitan()
    {
	    $patriarch = new Patriarch();
	    
	    $metropolitanName = 'Leonid';
	    
	    $metropolitan = new Metropolitan($metropolitanName);

	    $patriarch->addMetropolitan($metropolitan);
	    
	    $find = $patriarch->hasMetropolitan($metropolitanName);
	    
	    $this->assertTrue($find);
    }
    /** @test */
    public function test_get_metropalitan_key()
    {
	    $patriarch = new Patriarch();
	    
	    $metropolitanName = 'Kolya';
	    
	    $metropolitan = new Metropolitan($metropolitanName);

	    $patriarch->addMetropolitan($metropolitan);
	    
	    $key = count($patriarch->getAllMetropolitans());

	    $this->assertSame(1, $key);
	    
	    $metropolitanName = 'Jek';
	    
	    $metropolitan = new Metropolitan($metropolitanName);
	    
	    $patriarch->addMetropolitan($metropolitan);
	    
	    $key = count($patriarch->getAllMetropolitans());
	    
	    $this->assertSame(2, $key);
    }
}
