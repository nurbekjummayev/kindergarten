<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FaqPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_faq_page_displays_successfully(): void
    {
        $response = $this->get(route('faq'));

        $response->assertStatus(200);
        $response->assertSee('Ko\'p so\'raladigan savollar', false);
    }

    public function test_faq_page_displays_category_headings(): void
    {
        $response = $this->get(route('faq'));

        $response->assertStatus(200);
        $response->assertSee('Bog\'cha tanlash', false);
        $response->assertSee('Ariza berish', false);
        $response->assertSee('To\'lovlar haqida', false);
    }

    public function test_faq_page_displays_questions(): void
    {
        $response = $this->get(route('faq'));

        $response->assertStatus(200);
        $response->assertSee('Qanday bog\'cha tanlash kerak?', false);
        $response->assertSee('Ariza qanday beriladi?', false);
        $response->assertSee('Platformadan foydalanish pullikmi?', false);
    }

    public function test_faq_page_displays_answers(): void
    {
        $response = $this->get(route('faq'));

        $response->assertStatus(200);
        $response->assertSee('Joylashuv:', false);
        $response->assertSee('Ro\'yxatdan o\'ting:', false);
        $response->assertSee('Yo\'q, platformamiz ota-onalar uchun mutlaqo bepul!', false);
    }

    public function test_faq_page_has_navigation_links(): void
    {
        $response = $this->get(route('faq'));

        $response->assertStatus(200);
        $response->assertSee('Bosh sahifa');
        $response->assertSee('FAQ');
    }

    public function test_faq_page_has_back_to_home_button(): void
    {
        $response = $this->get(route('faq'));

        $response->assertStatus(200);
        $response->assertSee('Bosh sahifaga qaytish');
    }
}
