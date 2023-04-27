<?php

namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SignUpTest extends TestCase
{
    use RefreshDatabase;

    //** @test */  
    public function displays_sign_up_form()
    {

        $response = $this->get(route('sign-up'));
        $response->assertStatus(200);

    }
}
