<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    public function testCreateNewProduct()
    {

        $randomString = str_random(10);

        $this->visit('/product/create')
              ->type($randomString, 'product_name')
              ->press('Create')
              ->seePageIs('/product');
    }
}