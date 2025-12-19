<?php

namespace App\Http\Controllers;

class SampelProdukController extends Controller
{
    public function index()
    {
        return view('frontend.sampel-produk');
    }

    public function paperSamples()
    {
        return view('frontend.sampel-kertas');
    }

    public function paperSampleDetail($slug)
    {
        $samples = [
            'glossy-paper' => [
                'title' => 'Glossy Paper',
                'subtitle' => 'High-gloss finish for vibrant colors',
                'description' => 'Our glossy paper provides a high-shine finish that enhances color vibrancy and creates sharp, professional-looking prints. Perfect for brochures, flyers, and marketing materials.',
                'specifications' => [
                    'Weight' => '150gsm - 300gsm',
                    'Finish' => 'High Gloss',
                    'Color' => 'White',
                    'Suitable for' => 'Flyers, Brochures, Marketing Materials'
                ],
                'features' => [
                    'Vibrant color reproduction',
                    'Sharp image quality',
                    'Professional appearance',
                    'Durable and long-lasting'
                ]
            ],
            'matte-paper' => [
                'title' => 'Matte Paper',
                'subtitle' => 'Soft, non-reflective finish',
                'description' => 'Matte paper offers a sophisticated, non-reflective surface that reduces glare and provides excellent readability. Ideal for documents, presentations, and professional materials.',
                'specifications' => [
                    'Weight' => '120gsm - 250gsm',
                    'Finish' => 'Matte',
                    'Color' => 'White',
                    'Suitable for' => 'Documents, Presentations, Catalogs'
                ],
                'features' => [
                    'No glare or reflection',
                    'Easy to write on',
                    'Professional look',
                    'Excellent readability'
                ]
            ],
            'textured-paper' => [
                'title' => 'Textured Paper',
                'subtitle' => 'Embossed texture for premium feel',
                'description' => 'Experience the luxury of textured paper with its distinctive embossed surface. This premium option adds a tactile dimension to your prints, perfect for high-end business cards and invitations.',
                'specifications' => [
                    'Weight' => '200gsm - 350gsm',
                    'Finish' => 'Textured/Embossed',
                    'Color' => 'White, Cream, Natural',
                    'Suitable for' => 'Business Cards, Invitations, Premium Materials'
                ],
                'features' => [
                    'Distinctive tactile feel',
                    'Premium appearance',
                    'Unique texture patterns',
                    'Memorable impression'
                ]
            ],
            'recycled-paper' => [
                'title' => 'Recycled Paper',
                'subtitle' => 'Eco-friendly sustainable choice',
                'description' => 'Our recycled paper is an environmentally conscious choice without compromising quality. Made from post-consumer waste, it offers a natural appearance perfect for eco-friendly brands.',
                'specifications' => [
                    'Weight' => '100gsm - 200gsm',
                    'Finish' => 'Natural/Uncoated',
                    'Color' => 'Natural White, Cream',
                    'Recycled Content' => '100%'
                ],
                'features' => [
                    'Environmentally friendly',
                    'Natural appearance',
                    'FSC certified',
                    'Sustainable choice'
                ]
            ],
            'premium-cardstock' => [
                'title' => 'Premium Cardstock',
                'subtitle' => 'Heavy-weight premium quality',
                'description' => 'Our premium cardstock offers exceptional thickness and durability. Perfect for business cards, greeting cards, and any project requiring substantial weight and professional quality.',
                'specifications' => [
                    'Weight' => '300gsm - 400gsm',
                    'Finish' => 'Various (Matte/Gloss)',
                    'Color' => 'White, Various Colors',
                    'Suitable for' => 'Business Cards, Greeting Cards, Tags'
                ],
                'features' => [
                    'Exceptional durability',
                    'Premium feel',
                    'Multiple finish options',
                    'Professional quality'
                ]
            ],
            'specialty-finishes' => [
                'title' => 'Specialty Finishes',
                'subtitle' => 'Spot UV, foil, and embossing',
                'description' => 'Elevate your prints with our specialty finishes. From spot UV coating to metallic foil stamping and elegant embossing, these techniques add visual interest and tactile appeal.',
                'specifications' => [
                    'Options' => 'Spot UV, Foil Stamping, Embossing',
                    'Base Paper' => 'Various weights available',
                    'Finishes' => 'Gold, Silver, Copper foils',
                    'Suitable for' => 'Premium Cards, Invitations, Certificates'
                ],
                'features' => [
                    'Multiple finish options',
                    'Metallic effects',
                    'Raised embossing',
                    'Luxury appearance'
                ]
            ]
        ];

        if (!isset($samples[$slug])) {
            abort(404);
        }

        $sample = $samples[$slug];
        return view('frontend.sampel-kertas-detail', compact('sample', 'slug'));
    }

    public function businessCardSample()
    {
        return view('frontend.business-card-sample');
    }

    public function colourChartSample()
    {
        return view('frontend.colour-chart-sample');
    }
}
