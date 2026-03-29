<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteImage;

class SiteImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            // General / Site-wide
            ['key' => 'preloader', 'path' => 'assets/images/loader.png.png', 'section' => 'general', 'label' => 'Preloader Image'],
            ['key' => 'footer_bg', 'path' => 'assets/images/backgrounds/footer-bg.png', 'section' => 'general', 'label' => 'Footer Background'],
            ['key' => 'section_title_shape', 'path' => 'assets/images/shapes/sec-title-s-1.png', 'section' => 'general', 'label' => 'Section Title Shape'],
            ['key' => 'slide_text_bg', 'path' => 'assets/images/backgrounds/slide-text-bg-1-1.jpg', 'section' => 'general', 'label' => 'Slide Text Background'],
            ['key' => 'contact_form_image', 'path' => 'assets/images/resources/contact-1-1.jpg', 'section' => 'general', 'label' => 'Contact Form Sidebar Image'],

            // About Section
            ['key' => 'about_image_1', 'path' => 'assets/images/about/about-1-1.jpg', 'section' => 'about', 'label' => 'About Image One'],
            ['key' => 'about_image_2', 'path' => 'assets/images/about/about-2-1.jpg', 'section' => 'about', 'label' => 'About Image Two'],
            ['key' => 'about_experience_logo', 'path' => 'assets/images/logo/Artboard 2.png', 'section' => 'about', 'label' => 'Experience Badge Logo'],
            ['key' => 'about_shape_1_1', 'path' => 'assets/images/shapes/about-shape-1-1.png', 'section' => 'about', 'label' => 'About Shape 1-1'],
            ['key' => 'about_shape_1_2', 'path' => 'assets/images/shapes/about-shape-1-2.png', 'section' => 'about', 'label' => 'About Shape 1-2'],
            ['key' => 'about_shape_1_3', 'path' => 'assets/images/shapes/about-shape-1-3.png', 'section' => 'about', 'label' => 'About Shape 1-3'],
            ['key' => 'about_shape_2_1', 'path' => 'assets/images/shapes/about-shape-2-1.png', 'section' => 'about', 'label' => 'About Shape 2-1'],
            ['key' => 'about_shape_2_2', 'path' => 'assets/images/shapes/about-shape-2-2.png', 'section' => 'about', 'label' => 'About Shape 2-2'],
            ['key' => 'about_shape_3_1', 'path' => 'assets/images/shapes/about-shape-3-1.png', 'section' => 'about', 'label' => 'Experience Section Background'],
            ['key' => 'counter_bg', 'path' => 'assets/images/backgrounds/testimonials-bg-2-1.jpg', 'section' => 'about', 'label' => 'Counter/Achievements Background'],

            // Contact Section
            ['key' => 'contact_bg', 'path' => 'assets/images/backgrounds/contact-bg.jpg', 'section' => 'contact', 'label' => 'Contact Info Background'],
            ['key' => 'contact_shape_1', 'path' => 'assets/images/shapes/contact-bg-1-1.png', 'section' => 'contact', 'label' => 'Contact Shape 1'],
            ['key' => 'contact_shape_2', 'path' => 'assets/images/shapes/contact-bg-1-2.png', 'section' => 'contact', 'label' => 'Business Hours Background'],

            // Products Section
            ['key' => 'products_bg', 'path' => 'assets/images/shapes/product-bg-2-1.png', 'section' => 'products', 'label' => 'Products Section Background'],

            // Careers Section
            ['key' => 'careers_bg', 'path' => 'assets/images/backgrounds/technologies-bg-1-1.jpg', 'section' => 'careers', 'label' => 'Work Culture Background'],
            ['key' => 'careers_shape_bg', 'path' => 'assets/images/shapes/technologies-shape-bg-1-1.png', 'section' => 'careers', 'label' => 'Careers Shape Background'],
            ['key' => 'careers_tech_image', 'path' => 'assets/images/resources/technologies-1-2.png', 'section' => 'careers', 'label' => 'Technologies Image'],
            ['key' => 'careers_job_image', 'path' => 'assets/images/products/product-1-3.png', 'section' => 'careers', 'label' => 'Job Placeholder Image'],

            // Farm to Fork Section
            ['key' => 'ftf_delivery_image_1', 'path' => 'assets/images/delivery/delivery-1-1.png', 'section' => 'farm_to_fork', 'label' => 'Delivery Image One'],
            ['key' => 'ftf_delivery_image_2', 'path' => 'assets/images/delivery/delivery-1-2.jpg', 'section' => 'farm_to_fork', 'label' => 'Delivery Image Two'],
            ['key' => 'ftf_delivery_bg', 'path' => 'assets/images/shapes/delivery-man-bg-1.png', 'section' => 'farm_to_fork', 'label' => 'Delivery Man Background'],
            ['key' => 'ftf_delivery_shape', 'path' => 'assets/images/delivery/delivery-shape-1-1.png', 'section' => 'farm_to_fork', 'label' => 'Delivery Shape'],
            ['key' => 'ftf_card_bg', 'path' => 'assets/images/shapes/why-choose-card-bg-2-1.png', 'section' => 'farm_to_fork', 'label' => 'Why Choose Card Background'],

            // Quality Section
            ['key' => 'quality_faq_bg', 'path' => 'assets/images/shapes/faq-bg-2-1.png', 'section' => 'quality', 'label' => 'FAQ Section Background'],

            // About Experience Background
            ['key' => 'about_experience_bg', 'path' => 'assets/images/shapes/about-experience-bg-2-1.png', 'section' => 'about', 'label' => 'About Experience Background'],

            // Product Details Page
            ['key' => 'product_page_header_bg', 'path' => 'assets/images/backgrounds/page-header-bg.jpg', 'section' => 'products', 'label' => 'Product Page Header Background'],
            ['key' => 'product_share_bg', 'path' => 'assets/images/backgrounds/slide-text-bg-1-1.jpg', 'section' => 'products', 'label' => 'Product Share Section Background'],
        ];

        foreach ($images as $image) {
            SiteImage::updateOrCreate(
                ['key' => $image['key']],
                $image
            );
        }
    }
}
