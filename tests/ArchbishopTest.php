<?php

namespace Tests;

use App\Hierarchy\Metropolitan\Archbishop\Archbishop;
use App\Hierarchy\Metropolitan\Metropolitan;
use PHPUnit\Framework\TestCase;
use App\Hierarchy\Patriarch;
use App\Hierarchy\Metropolitan\Archbishop\Bishop\Bishop;

class ArchbishopTest extends TestCase
{
    /** @test */
    public function test_add_bishop()
    {
        $patriarch = new Patriarch('Kiril');
        $metropolitan = new Metropolitan('Alex', $patriarch);

        $archbishopName = 'Arfey';
        $archbishop = new Archbishop($archbishopName, $metropolitan);

        $bishop = new Bishop([
            'name' =>'Vasya',
            'region'=>'Moscow',
            'birthday'=>'1950-01-01',
            'archibishop'=>$archbishop
        ]);
        $archbishop->addBishop($bishop);
        $this->assertSame(1, count($archbishop->getBishops()));
    }

    /** @test */
    public function test_remove_bishop()
    {
        $patriarch = new Patriarch('Kiril');
        $metropolitan = new Metropolitan('Alex', $patriarch);

        $archbishopName = 'Kostya';
        $archbishop = new Archbishop($archbishopName, $metropolitan);

        $bishop = new Bishop([
            'name' =>'Alex',
            'region'=>'Moscow',
            'birthday'=>'1950-01-01',
            'archibishop'=>$archbishop
        ]);
        $archbishop->addBishop($bishop);

        $this->assertSame(1, count($archbishop->getBishops()));

        $archbishop->removeBishop($bishop->getBishopName());

        $this->assertSame(0, count($archbishop->getBishops()));
    }

    /** @test */
    public function test_has_bishop()
    {
        $patriarch = new Patriarch('Kirill');
        $metropolitan = new Metropolitan('Alexx', $patriarch);

        $archbishopName = 'Leonid';
        $archbishop = new Archbishop($archbishopName, $metropolitan);

        $bishop = new Bishop([
            'name' =>'Alex',
            'region'=>'Moscow',
            'birthday'=>'1950-01-01',
            'archibishop'=>$archbishop
        ]);
        $archbishop->addBishop($bishop);

        $find = $archbishop->hasBishop($bishop->getBishopName());

        $this->assertTrue($find, 'error');
    }

    /** @test */
    public function test_get_bishopKey()
    {
        $patriarch = new Patriarch('Kiruha');
        $metropolitan = new Metropolitan('Alex', $patriarch);

        $archbishopName = 'Leonid';
        $archbishop = new Archbishop($archbishopName, $metropolitan);

        $bishop = new Bishop([
            'name' =>'Alex',
            'region'=>'Moscow',
            'birthday'=>'1950-01-01',
            'archibishop'=>$archbishop
        ]);
        $archbishop->addBishop($bishop);

        $key = $archbishop->getBishopKey($bishop->getBishopName());
        $this->assertSame(0, $key);

        $bishop = new Bishop([
            'name' =>'Kostya',
            'region'=>'Moscow',
            'birthday'=>'1950-01-01',
            'archibishop'=>$archbishop
        ]);
        $archbishop->addBishop($bishop);

        $key = $archbishop->getBishopKey($bishop->getBishopName());
        $this->assertSame(1, $key);

        $bishop = new Bishop([
            'name' =>'David',
            'region'=>'Tveri',
            'birthday'=>'1950-01-01',
            'archibishop'=>$archbishop
        ]);
        $archbishop->addBishop($bishop);

        $key = $archbishop->getBishopKey($bishop->getBishopName());
        $this->assertSame(2, $key);

    }

    /** @test */
    public function test_find_bishop()
    {
        $patriarch = new Patriarch('Kirill');
        $metropolitan = new Metropolitan('Alexx', $patriarch);

        $archbishopName = 'Leonid';
        $archbishop = new Archbishop($archbishopName, $metropolitan);

        $bishop = new Bishop([
            'name' =>'Alex',
            'region'=>'Moscow',
            'birthday'=>'1950-01-01',
            'archibishop'=>$archbishop
        ]);
        $archbishop->addBishop($bishop);

        $find = $archbishop->findBishop($bishop->getBishopName());

        $this->assertSame(0, $find);
    }
}
