<?php

namespace Tests;

use App\Hierarchy\Metropolitan\Metropolitan;
use PHPUnit\Framework\TestCase;
use App\Hierarchy\Metropolitan\Archbishop\Archbishop;
use App\Hierarchy\Patriarch;


class MetropolitanTest extends TestCase
{
    /** @test */
    public function test_add_Archbishop()
    {
        $patriarch = new Patriarch('Kiril');
        $metropolitan = new Metropolitan('Alex', $patriarch);

        $archbishopName = 'Arfey';
        $archbishop = new Archbishop($archbishopName, $metropolitan);

        $metropolitan->addArchbishop($archbishop);

        $this->assertSame(1, count($metropolitan->getArchbishops()));
    }

    /** @test */
    public function test_remove_archbishop()
    {
        $patriarch = new Patriarch('Kiril');
        $metropolitan = new Metropolitan('Alex', $patriarch);

        $archbishopName = 'Gosha';
        $archbishop = new Archbishop($archbishopName, $metropolitan);

        $metropolitan->addArchbishop($archbishop);

        $this->assertSame(1, count($metropolitan->getArchbishops()));

        $metropolitan->removeArchbishop($archbishopName);

        $this->assertSame(0, count($metropolitan->getArchbishops()));
    }

    /** @test */
    public function test_has_archbishop()
    {
        $patriarch = new Patriarch('Kirill');
        $metropolitan = new Metropolitan('Alexx', $patriarch);

        $archbishopName = 'Leonid';
        $archbishop = new Archbishop($archbishopName, $metropolitan);
        $metropolitan->addArchbishop($archbishop);

        $find = $metropolitan->hasArchbishop($archbishopName);

        $this->assertTrue($find, 'error');
    }

    /** @test */
    public function test_get_archbishop_key()
    {
        $patriarch = new Patriarch('Kiruha');
        $metropolitan = new Metropolitan('Alex', $patriarch);

        $archbishopName = 'Leonid';
        $archbishop = new Archbishop($archbishopName, $metropolitan);
        $metropolitan->addArchbishop($archbishop);
        $key = $metropolitan->getArchbishopKey($archbishopName);
        $this->assertSame(0, $key);


        $archbishopName = 'Kolya';
        $archbishop = new Archbishop($archbishopName, $metropolitan);
        $metropolitan->addArchbishop($archbishop);
        $key = $metropolitan->getArchbishopKey($archbishopName);
        $this->assertSame(1, $key);

        $archbishopName = 'Gosha';
        $archbishop = new Archbishop($archbishopName, $metropolitan);
        $metropolitan->addArchbishop($archbishop);
        $key = $metropolitan->getArchbishopKey($archbishopName);
        $this->assertSame(2, $key);
    }
}
