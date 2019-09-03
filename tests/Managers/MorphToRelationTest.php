<?php

namespace Amethyst\Tests\Managers;

use Amethyst\Fakers\MorphToRelationFaker;
use Amethyst\Managers\MorphToRelationManager;
use Amethyst\Tests\BaseTest;
use Railken\Lem\Support\Testing\TestableBaseTrait;

class MorphToRelationTest extends BaseTest
{
    use TestableBaseTrait;

    /**
     * Manager class.
     *
     * @var string
     */
    protected $manager = MorphToRelationManager::class;

    /**
     * Faker class.
     *
     * @var string
     */
    protected $faker = MorphToRelationFaker::class;
}
