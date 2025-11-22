<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <title>{{ $seo['title'] }}</title>
    <meta name="description" content="{{ $seo['description'] }}">
    <meta name="keywords" content="{{ $seo['keywords'] }}">

    <meta property="og:title" content="{{ $seo['title'] }}">
    <meta property="og:description" content="{{ $seo['description'] }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $seo['image'] }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo['title'] }}">
    <meta name="twitter:description" content="{{ $seo['description'] }}">
    <meta name="twitter:image" content="{{ $seo['image'] }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="stylesheet" href="{{ asset('build/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/lightbox2/dist/css/lightbox.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/lightbox2/dist/js/lightbox-plus-jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/css/glide.theme.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/glide.min.js"></script>

    {{-- Organization JSON-LD --}}
    @if ($organization)
        @php
            $sameAsArray = $organization->same_as ? json_decode($organization->same_as) : [];
            $orgData = [
                '@context' => 'https://schema.org',
                '@type' => 'Organization',
                'name' => $organization->name,
                'url' => $organization->url,
                'logo' => $organization->logo ? asset('storage/' . $organization->logo) : null,
                'sameAs' => $sameAsArray,
                'contactPoint' => [],
            ];

            if ($organization->telephone || $organization->contact_type || $organization->area_served || $organization->language) {
                $orgData['contactPoint'][] = [
                    '@type' => 'ContactPoint',
                    'telephone' => $organization->telephone ?? '',
                    'contactType' => $organization->contact_type ?? '',
                    'areaServed' => $organization->area_served ?? '',
                    'availableLanguage' => $organization->language ?? '',
                ];
            }
        @endphp

        <script type="application/ld+json">
            {!! json_encode($orgData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
        </script>
    @endif

    {{-- Cards JSON-LD --}}
    @php
        $jsonLD = [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'itemListElement' => [],
        ];
        foreach ($cards as $index => $card) {
            $jsonLD['itemListElement'][] = [
                '@type' => 'WebSite',
                'position' => $index + 1,
                'name' => $card->title,
                'url' => $card->link,
                'description' => $card->description ?? $card->title,
            ];
        }
        $jsonLDString = json_encode($jsonLD, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    @endphp
    <script type="application/ld+json">{!! $jsonLDString !!}</script>

    {{-- FAQ JSON-LD --}}
    @if ($faqs->count())
        @php
            $faqData = [
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => [],
            ];
            foreach ($faqs as $faq) {
                $faqData['mainEntity'][] = [
                    '@type' => 'Question',
                    'name' => $faq->question,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $faq->answer,
                    ],
                ];
            }
        @endphp
        <script type="application/ld+json">
            {!! json_encode($faqData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
        </script>
    @endif

</head>
