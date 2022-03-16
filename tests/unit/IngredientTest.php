<?php

namespace App\Tests;

use App\Entity\Unit;
use App\Entity\Categorie;
use App\Entity\Ingredient;
use App\Entity\Picture;
use App\Entity\Season;
use PHPUnit\Framework\TestCase;

class IngredientTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->ingredient = new Ingredient();
    }

    public function testIngredientName(): void
    {
        $value = 'Tomate';
        $response = $this->ingredient->setIngName($value);
        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($value, $this->ingredient->getIngName());
    }

    public function testIngredientActive()
    {
        $value = true;
        $response = $this->ingredient->setIngIsActive($value);
        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($value, $this->ingredient->getIngIsActive());
    }

    public function testIngredientAllergenic()
    {
        $value = true;
        $response = $this->ingredient->setIngIsAllergenic($value);
        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($value, $this->ingredient->getIngIsAllergenic());
    }

    public function testIngredientDateAdd()
    {
        $value = new \DateTime();
        $response = $this->ingredient->setIngDateAdd($value);
        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($value, $this->ingredient->getIngDateAdd());
    }

    public function testIngredientDateUpd()
    {
        $value = new \DateTime();
        $response = $this->ingredient->setIngDateUpd($value);
        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($value, $this->ingredient->getIngDateUpd());
    }

    public function testIngredientCategory()
    {
        $value = new Categorie();
        $response = $this->ingredient->setFkCat($value);
        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($value, $this->ingredient->getFkCat());
    }

    public function testIngredientUnit()
    {
        $value = new Unit();
        $response = $this->ingredient->setFkUnit($value);
        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($value, $this->ingredient->getFkUnit());
    }

    public function testIngredientPic()
    {
        $value = new Picture;
        $response = $this->ingredient->setFkPic($value);
        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($value, $this->ingredient->getFkPic());
    }

    public function testIngredientAddSeason()
    {
        $value = new Season;
        $response = $this->ingredient->addFkSeason($value);
        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($value, $this->ingredient->getFkSeason()[0]);
    }

    public function testIngredientRemoveSeason()
    {
        $value = new Season;
        $response = $this->ingredient->addFkSeason($value);
        self::assertInstanceOf(Ingredient::class, $response);
        self::assertEquals($this->ingredient, $this->ingredient->removeFkSeason($value));
    }
}
