<?php

namespace App\Tests;

use App\Entity\Equipment;
use App\Entity\Technical;
use PHPUnit\Framework\TestCase;

class TechnicalTest extends TestCase
{
    protected function setup(): void
    {
        parent::setup();
        $this->technical = new Technical();
    }

    public function test_getTecName()
    {
        $element  = "Mélanger";
        $response = $this->technical->setTecName($element);

        self::assertInstanceOf(Technical::class, $response);
        self::assertEquals($element, $this->technical->getTecName());
    }

    public function test_getTecDescription()
    {
        $element  = "Ceci est une superbe description";
        $response = $this->technical->setTecDescription($element);

        self::assertInstanceOf(Technical::class, $response);
        self::assertEquals($element, $this->technical->getTecDescription());
    }

    public function test_getTecCookingDuration()
    {
        $element  = "30 min";
        $response = $this->technical->setTecCookingDuration($element);

        self::assertInstanceOf(Technical::class, $response);
        self::assertEquals($element, $this->technical->getTecCookingDuration());
    }

    public function test_getTecCookingHeat()
    {
        $element  = "10 min";
        $response = $this->technical->setTecCookingHeat($element);

        self::assertInstanceOf(Technical::class, $response);
        self::assertEquals($element, $this->technical->getTecCookingHeat());
    }

    public function test_getTecDifficulty()
    {
        $element  = 5;
        $response = $this->technical->setTecDifficulty($element);

        self::assertInstanceOf(Technical::class, $response);
        self::assertEquals($element, $this->technical->getTecDifficulty());
    }

    public function test_getTecIdParent()
    {
        $otherTechnical = new Technical();

        $element  = $otherTechnical->getTecId();
        $response = $this->technical->setTecIdParent($element);

        self::assertInstanceOf(Technical::class, $response);
        self::assertEquals($element, $this->technical->getTecIdParent());
    }

    public function test_getFkTec()
    {
        $otherTechnical = new Technical();

        $element  = $otherTechnical->getTecId();
        $response = $this->technical->setFkTec($element);

        self::assertInstanceOf(Technical::class, $response);
        self::assertEquals($element, $this->technical->getFkTec());
    }

    public function test_addFkEq()
    {
        $element = new Equipment();
        $response = $this->technical->addFkEq($element);
        self::assertInstanceOf(Technical::class, $response);
        self::assertEquals($element, $this->technical->getFkEq()[0]);
    }

    public function test_removeFkEq()
    {
        $element = new Equipment();
        $response = $this->technical->addFkEq($element);
        self::assertInstanceOf(Technical::class, $response);
        self::assertEquals($this->technical, $this->technical->removeFkEq($element));
    }
}
