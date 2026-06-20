<?php

namespace Tests\Unit;

use App\Support\EmbedUrl;
use PHPUnit\Framework\TestCase;

class EmbedUrlTest extends TestCase
{
    /** @test */
    public function it_extracts_youtube_id_from_all_forms()
    {
        $this->assertSame('dQw4w9WgXcQ', EmbedUrl::youtubeId('https://www.youtube.com/watch?v=dQw4w9WgXcQ'));
        $this->assertSame('dQw4w9WgXcQ', EmbedUrl::youtubeId('https://youtu.be/dQw4w9WgXcQ'));
        $this->assertSame('dQw4w9WgXcQ', EmbedUrl::youtubeId('https://www.youtube.com/embed/dQw4w9WgXcQ'));
        $this->assertSame('dQw4w9WgXcQ', EmbedUrl::youtubeId('https://www.youtube.com/shorts/dQw4w9WgXcQ'));
        $this->assertSame('dQw4w9WgXcQ', EmbedUrl::youtubeId('dQw4w9WgXcQ'));
        $this->assertSame('', EmbedUrl::youtubeId(''));
        $this->assertSame('', EmbedUrl::youtubeId('not a url !!'));
    }

    /** @test */
    public function it_builds_embeddable_youtube_url()
    {
        $this->assertSame('https://www.youtube.com/embed/dQw4w9WgXcQ', EmbedUrl::youtubeEmbed('https://youtu.be/dQw4w9WgXcQ'));
        $this->assertSame('', EmbedUrl::youtubeEmbed('https://vimeo.com/123'));
    }

    /** @test */
    public function it_validates_youtube_urls()
    {
        $this->assertTrue(EmbedUrl::isValidYoutube('https://youtu.be/dQw4w9WgXcQ'));
        $this->assertFalse(EmbedUrl::isValidYoutube('https://example.com/video'));
    }

    /** @test */
    public function it_validates_google_maps_urls()
    {
        $this->assertTrue(EmbedUrl::isGoogleMaps('https://www.google.com/maps?q=cairo&output=embed'));
        $this->assertTrue(EmbedUrl::isGoogleMaps('https://maps.app.goo.gl/anJeL6VXLuoB61WK7'));
        $this->assertTrue(EmbedUrl::isGoogleMaps('https://google.com.eg/maps/place/x'));
        $this->assertFalse(EmbedUrl::isGoogleMaps('https://maps.example.com/embed'));
        $this->assertFalse(EmbedUrl::isGoogleMaps('https://bing.com/maps'));
        $this->assertFalse(EmbedUrl::isGoogleMaps(''));
    }
}
