<?php

namespace DevTalhaAkbar\TelnetLaravel\Tests;

use Orchestra\Testbench\TestCase;
use DevTalhaAkbar\TelnetLaravel\TelnetLaravelServiceProvider;

class EchoTest extends TestCase
{

    protected $telnet;

    public function setUp(): void {

        parent::setUp();

        $this->telnet = $this->app->make('DevTalhaAkbar\TelnetLaravel\Telnet');
    }

    protected function getPackageProviders($app)
    {
        return [TelnetLaravelServiceProvider::class];
    }
    
    /** @test */
    public function can_echo_data()
    {
        $test_string = 'Echo...';
    	$res = $this->telnet->execute($test_string, '$');

        $this->assertEquals($res->getResponseText(), $test_string);
    }
}
