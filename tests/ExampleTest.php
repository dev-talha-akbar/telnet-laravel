<?php

namespace DevTalhaAkbar\TelnetLaravel\Tests;

use Orchestra\Testbench\TestCase;
use DevTalhaAkbar\TelnetLaravel\TelnetLaravelServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [TelnetLaravelServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
