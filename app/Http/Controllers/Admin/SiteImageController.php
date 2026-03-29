<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteImage;
use Illuminate\Http\Request;

class SiteImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        $images = SiteImage::getAllGrouped();
        $sectionLabels = [
            'general' => 'General / Site-wide',
            'about' => 'About Page',
            'contact' => 'Contact Page',
            'products' => 'Products Page',
            'careers' => 'Careers Page',
            'farm_to_fork' => 'Farm to Fork Page',
            'quality' => 'Quality Page',
        ];
        return view('admin.site_images.index', compact('images', 'sectionLabels'));
    }

    public function update(Request $request)
    {
        $images = SiteImage::all();

        foreach ($images as $image) {
            if ($file = $request->file('image_' . $image->id)) {
                // Delete old custom image if it was uploaded (not default)
                if ($image->path && str_starts_with($image->path, 'assets/images/site_images/')) {
                    $oldPath = public_path('front/mtc/' . $image->path);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                $name = time() . '_' . $image->key . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('front/mtc/assets/images/site_images/'), $name);
                $image->path = 'assets/images/site_images/' . $name;
                $image->save();
            }
        }

        return redirect()->route('admin-site_images-index')
            ->with('success', 'Images updated successfully');
    }

    public function reset($id)
    {
        $image = SiteImage::findOrFail($id);

        // Delete uploaded file if custom
        if (str_starts_with($image->path, 'assets/images/site_images/')) {
            $oldPath = public_path('front/mtc/' . $image->path);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        // Reset to default from seeder
        $defaults = $this->getDefaults();
        if (isset($defaults[$image->key])) {
            $image->path = $defaults[$image->key];
            $image->save();
        }

        return redirect()->route('admin-site_images-index')
            ->with('success', 'Image reset to default');
    }

    private function getDefaults()
    {
        return [
            'preloader' => 'assets/images/loader.png.png',
            'footer_bg' => 'assets/images/backgrounds/footer-bg.png',
            'section_title_shape' => 'assets/images/shapes/sec-title-s-1.png',
            'slide_text_bg' => 'assets/images/backgrounds/slide-text-bg-1-1.jpg',
            'contact_form_image' => 'assets/images/resources/contact-1-1.jpg',
            'about_image_1' => 'assets/images/about/about-1-1.jpg',
            'about_image_2' => 'assets/images/about/about-2-1.jpg',
            'about_experience_logo' => 'assets/images/logo/Artboard 2.png',
            'about_shape_1_1' => 'assets/images/shapes/about-shape-1-1.png',
            'about_shape_1_2' => 'assets/images/shapes/about-shape-1-2.png',
            'about_shape_1_3' => 'assets/images/shapes/about-shape-1-3.png',
            'about_shape_2_1' => 'assets/images/shapes/about-shape-2-1.png',
            'about_shape_2_2' => 'assets/images/shapes/about-shape-2-2.png',
            'about_shape_3_1' => 'assets/images/shapes/about-shape-3-1.png',
            'counter_bg' => 'assets/images/backgrounds/testimonials-bg-2-1.jpg',
            'contact_bg' => 'assets/images/backgrounds/contact-bg.jpg',
            'contact_shape_1' => 'assets/images/shapes/contact-bg-1-1.png',
            'contact_shape_2' => 'assets/images/shapes/contact-bg-1-2.png',
            'products_bg' => 'assets/images/shapes/product-bg-2-1.png',
            'careers_bg' => 'assets/images/backgrounds/technologies-bg-1-1.jpg',
            'careers_shape_bg' => 'assets/images/shapes/technologies-shape-bg-1-1.png',
            'careers_tech_image' => 'assets/images/resources/technologies-1-2.png',
            'careers_job_image' => 'assets/images/products/product-1-3.png',
            'ftf_delivery_image_1' => 'assets/images/delivery/delivery-1-1.png',
            'ftf_delivery_image_2' => 'assets/images/delivery/delivery-1-2.jpg',
            'ftf_delivery_bg' => 'assets/images/shapes/delivery-man-bg-1.png',
            'ftf_delivery_shape' => 'assets/images/delivery/delivery-shape-1-1.png',
            'ftf_card_bg' => 'assets/images/shapes/why-choose-card-bg-2-1.png',
            'quality_faq_bg' => 'assets/images/shapes/faq-bg-2-1.png',
            'about_experience_bg' => 'assets/images/shapes/about-experience-bg-2-1.png',
            'product_page_header_bg' => 'assets/images/backgrounds/page-header-bg.jpg',
            'product_share_bg' => 'assets/images/backgrounds/slide-text-bg-1-1.jpg',
        ];
    }
}
