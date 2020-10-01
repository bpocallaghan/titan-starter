<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VisitWebsitePagesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function visit_home()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSeeText(config('app.name'));
    }
}
