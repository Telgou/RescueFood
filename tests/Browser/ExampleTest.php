<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testBasicExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->waitFor('@login-form') 
                ->type('@email', 'evan123@gmail.com') 
                ->type('password', 'evan123')
                ->press('Login')
                ->assertPathIs('/customer/dashboard'); 
        });
    }
}