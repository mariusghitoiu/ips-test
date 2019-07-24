<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleReminderAssignerTest extends TestCase
{
    public function testSuccessAssign()
    {
        $response = $this->json('POST', '/api/module_reminder_assigner',
            ['contact_email' => '5d35a431b9ed1@test.com']);

        $response->assertStatus(200)
            ->assertJson(['success' => true])
            ->assertJsonStructure(['success', 'message']);
    }

    public function testInvalidEmailInRequest()
    {
        $response = $this->json('POST', '/api/module_reminder_assigner',
            ['contact_email' => '5d35a431b9ed1@']
        );
        $response
            ->assertStatus(200)
            ->assertJson(['success' => false])
            ->assertJsonStructure(['success', 'message']);
    }
}
