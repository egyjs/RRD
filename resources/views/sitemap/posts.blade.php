<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
    @foreach($posts as $post)
        <url>
            <loc>{{ route('blog.post', $post->slug) }}</loc>
            <lastmod>{{ $post->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <image:image>
                <image:loc>{{ $post->thumbnail }}</image:loc>
            </image:image>
            <changefreq>hourly</changefreq>
            <news:news>
                <news:publication>
                    <news:name>{{ $post->writer->fullname }} @ Casco Code</news:name>
                    <news:language>en</news:language>
                </news:publication>
                <news:publication_date>{{ $post->created_at->tz('UTC')->toAtomString() }}</news:publication_date>
                <news:title>{{ $post->title }}</news:title>
                <news:keywords>{{ implode(', ',$post->tagNames()) }}</news:keywords>
            </news:news>
        </url>
    @endforeach
</urlset>