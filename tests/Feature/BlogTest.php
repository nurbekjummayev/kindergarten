<?php

namespace Tests\Feature;

use App\Enums\BlogCategory;
use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    public function test_blog_index_page_displays_successfully(): void
    {
        $response = $this->get(route('blog.index'));

        $response->assertStatus(200);
        $response->assertSee('Blog va Yangiliklar', false);
    }

    public function test_blog_index_displays_published_blogs(): void
    {
        $publishedBlog = Blog::factory()->published()->create();
        $unpublishedBlog = Blog::factory()->unpublished()->create();

        $response = $this->get(route('blog.index'));

        $response->assertStatus(200);
        $response->assertSee($publishedBlog->title);
        $response->assertDontSee($unpublishedBlog->title);
    }

    public function test_blog_index_can_filter_by_category(): void
    {
        $educationBlog = Blog::factory()->published()->create([
            'category' => BlogCategory::EDUCATION,
        ]);
        $newsBlog = Blog::factory()->published()->create([
            'category' => BlogCategory::NEWS,
        ]);

        $response = $this->get(route('blog.index', ['category' => BlogCategory::EDUCATION->value]));

        $response->assertStatus(200);
        $response->assertSee($educationBlog->title);
        $response->assertDontSee($newsBlog->title);
    }

    public function test_blog_index_can_search_by_title(): void
    {
        $blog1 = Blog::factory()->published()->create([
            'title' => 'Bolalar uchun foydali kitoblar',
        ]);
        $blog2 = Blog::factory()->published()->create([
            'title' => 'Maktabga tayyorlash usullari',
        ]);

        $response = $this->get(route('blog.index', ['search' => 'kitoblar']));

        $response->assertStatus(200);
        $response->assertSee($blog1->title);
        $response->assertDontSee($blog2->title);
    }

    public function test_blog_index_can_sort_by_popular(): void
    {
        $popularBlog = Blog::factory()->published()->create(['views' => 1000]);
        $lessPopularBlog = Blog::factory()->published()->create(['views' => 100]);

        $response = $this->get(route('blog.index', ['sort_by' => 'popular']));

        $response->assertStatus(200);
        $content = $response->getContent();
        $popularPos = strpos($content, $popularBlog->title);
        $lessPopularPos = strpos($content, $lessPopularBlog->title);
        $this->assertLessThan($lessPopularPos, $popularPos);
    }

    public function test_blog_show_page_displays_successfully(): void
    {
        $blog = Blog::factory()->published()->create();

        $response = $this->get(route('blog.show', $blog->slug));

        $response->assertStatus(200);
        $response->assertSee($blog->title);
        $response->assertSee($blog->excerpt);
        $response->assertSee($blog->author->name);
    }

    public function test_blog_show_increments_view_count(): void
    {
        $blog = Blog::factory()->published()->create(['views' => 10]);

        $this->get(route('blog.show', $blog->slug));

        $this->assertEquals(11, $blog->fresh()->views);
    }

    public function test_unpublished_blog_returns_404(): void
    {
        $blog = Blog::factory()->unpublished()->create();

        $response = $this->get(route('blog.show', $blog->slug));

        $response->assertStatus(404);
    }

    public function test_future_published_blog_returns_404(): void
    {
        $blog = Blog::factory()->create([
            'is_published' => true,
            'published_at' => now()->addDay(),
        ]);

        $response = $this->get(route('blog.show', $blog->slug));

        $response->assertStatus(404);
    }

    public function test_blog_show_displays_related_blogs(): void
    {
        $blog = Blog::factory()->published()->create([
            'category' => BlogCategory::EDUCATION,
        ]);

        $relatedBlog = Blog::factory()->published()->create([
            'category' => BlogCategory::EDUCATION,
        ]);

        $unrelatedBlog = Blog::factory()->published()->create([
            'category' => BlogCategory::NEWS,
        ]);

        $response = $this->get(route('blog.show', $blog->slug));

        $response->assertStatus(200);
        $response->assertSee($relatedBlog->title);
        $response->assertDontSee($unrelatedBlog->title);
    }

    public function test_landing_page_displays_latest_blogs(): void
    {
        $blog1 = Blog::factory()->published()->create([
            'published_at' => now()->subDays(1),
        ]);
        $blog2 = Blog::factory()->published()->create([
            'published_at' => now()->subDays(2),
        ]);
        $blog3 = Blog::factory()->published()->create([
            'published_at' => now()->subDays(3),
        ]);

        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee($blog1->title);
        $response->assertSee($blog2->title);
        $response->assertSee($blog3->title);
    }

    public function test_landing_page_has_blog_link_in_navbar(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee(route('blog.index'));
    }

    public function test_blog_index_pagination_works(): void
    {
        Blog::factory()->published()->count(15)->create();

        $response = $this->get(route('blog.index'));

        $response->assertStatus(200);
        $response->assertSee('page=2');
    }

    public function test_blog_index_shows_empty_state_when_no_results(): void
    {
        $response = $this->get(route('blog.index', ['search' => 'nonexistent']));

        $response->assertStatus(200);
        $response->assertSee('Hech narsa topilmadi', false);
    }

    public function test_blog_category_badge_displays_correctly(): void
    {
        $blog = Blog::factory()->published()->create([
            'category' => BlogCategory::EDUCATION,
        ]);

        $response = $this->get(route('blog.show', $blog->slug));

        $response->assertStatus(200);
        $response->assertSee('Tarbiya', false);
    }
}
