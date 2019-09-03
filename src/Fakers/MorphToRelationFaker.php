<?php

namespace Amethyst\Fakers;

use Faker\Factory;
use Railken\Bag;
use Railken\Lem\Faker;

class MorphToRelationFaker extends Faker
{
    /**
     * @return \Railken\Bag
     */
    public function parameters()
    {
        $faker = Factory::create();

        $bag = new Bag();
        $bag->set('name', 'foos');
        $bag->set('entity', 'foo');
        $bag->set('attribute', 'fooable');
        $bag->set('target', 'foo');

        return $bag;
    }
}
