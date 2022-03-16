<?php

namespace App\Tests;

use App\Entity\Recipe;
use App\Entity\Picture;
use App\Entity\Customer;
use App\Entity\Equipment;
use App\Entity\Tag;
use PHPUnit\Framework\TestCase;

class RecipeTest extends TestCase
{
    protected function setup(): void
    {
        parent::setup();
        $this->recipe = new Recipe();
    }

    public function test_getRecName()
    {
        $element  = "Hachis Parmentier";
        $response = $this->recipe->setRecName($element);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($element, $this->recipe->getRecName());
    }

    public function test_getRecSlug()
    {
        $element  = "hachis-parmentier";
        $response = $this->recipe->setRecSlug($element);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($element, $this->recipe->getRecSlug());
    }

    public function test_getRecSource()
    {
        $element  = "exemple.fr";
        $response = $this->recipe->setRecSource($element);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($element, $this->recipe->getRecSource());
    }

    public function test_getRecDescription()
    {
        $element  = "Ceci est la belle description du Hachis Parmentier";
        $response = $this->recipe->setRecDescription($element);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($element, $this->recipe->getRecDescription());
    }

    public function test_getRecPreparationTime()
    {
        $element  = new \DateTimeImmutable('20:00');
        $response = $this->recipe->setRecPreparationTime($element);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($element, $this->recipe->getRecPreparationTime());
    }

    public function test_getRecSleepTime()
    {
        $element  = new \DateTimeImmutable('20:00');
        $response = $this->recipe->setRecSleepTime($element);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($element, $this->recipe->getRecSleepTime());
    }

    public function test_getRecCookingTime()
    {
        $element  = new \DateTimeImmutable('20:00');
        $response = $this->recipe->setRecCookingTime($element);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($element, $this->recipe->getRecCookingTime());
    }

    public function test_getRecSavour()
    {
        $element  = 5;
        $response = $this->recipe->setRecSavour($element);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($element, $this->recipe->getRecSavour());
    }

    public function test_getRecDifficulty()
    {
        $element  = 5;
        $response = $this->recipe->setRecDifficulty($element);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($element, $this->recipe->getRecDifficulty());
    }

    public function test_getRecStatus()
    {
        $element  = 5;
        $response = $this->recipe->setRecStatus($element);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($element, $this->recipe->getRecStatus());
    }

    public function test_getFkCust()
    {
        $element  = new Customer();
        $response = $this->recipe->setFkCust($element);

        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($element, $this->recipe->getFkCust());
    }

    public function test_getFkRec()
    {
        $otherRecipe = new Recipe();

        $element = $otherRecipe->getRecId();
        $response = $this->recipe->setFkRec($element);
        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($element, $this->recipe->getFkRec());
    }

    public function test_addFkPic()
    {
        $element = new Picture();
        $response = $this->recipe->addFkPic($element);
        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($element, $this->recipe->getFkPic()[0]);
    }

    public function test_removeFkPic()
    {
        $element = new Picture();
        $response = $this->recipe->addFkPic($element);
        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($this->recipe, $this->recipe->removeFkPic($element));
    }

    public function test_addFkTag()
    {
        $element = new Tag();
        $response = $this->recipe->addFkTag($element);
        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($element, $this->recipe->getFkTag()[0]);
    }

    public function test_removeFkTag()
    {
        $element = new Tag();
        $response = $this->recipe->addFkTag($element);
        self::assertInstanceOf(Recipe::class, $response);
        self::assertEquals($this->recipe, $this->recipe->removeFkTag($element));
    }
}
