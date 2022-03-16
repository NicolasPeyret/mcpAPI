<?php

namespace App\Tests;

use App\Entity\Season;
use PHPUnit\Framework\TestCase;

class SeasonTest extends TestCase
{
    protected function setup(): void
    {
        parent::setup();
        $this->season = new Season();
    }

    public function test_getSeasonName()
    {
        $element  = "litres";
        $response = $this->season->setSeasonName($element);

        self::assertInstanceOf(Season::class, $response);
        self::assertEquals($element, $this->season->getSeasonName());
    }

    public function test_getSeasonStartDate()
    {
        $element = new \DateTimeImmutable();
        $response = $this->season->setSeasonStartDate($element);

        self::assertInstanceOf(Season::class, $response);
        self::assertEquals($element, $this->season->getSeasonStartDate());
    }

    public function test_getSeasonEndDate()
    {
        $element = new \DateTimeImmutable();
        $response = $this->season->setSeasonEndDate($element);

        self::assertInstanceOf(Season::class, $response);
        self::assertEquals($element, $this->season->getSeasonEndDate());
    }
}
