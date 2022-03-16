<?php

namespace App\Tests;

use App\Entity\Unit;
use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
    protected function setup(): void
    {
        parent::setup();
        $this->unit = new Unit();
    }

    public function test_getUnitName()
    {
        $element  = "litres";
        $response = $this->unit->setUnitName($element);

        self::assertInstanceOf(Unit::class, $response);
        self::assertEquals($element, $this->unit->getUnitName());
    }

    public function test_getUnitNotation()
    {
        $element  = "l";
        $response = $this->unit->setUnitNotation($element);

        self::assertInstanceOf(Unit::class, $response);
        self::assertEquals($element, $this->unit->getUnitNotation());
    }
}
