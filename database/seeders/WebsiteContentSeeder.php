<?php

namespace Database\Seeders;

use App\Models\BeforeAfter;
use App\Models\Blog;
use App\Models\Doctor;
use App\Models\Form;
use App\Models\FormField;
use App\Models\Lead;
use App\Models\MapSetting;
use App\Models\MedicalTourismBlock;
use App\Models\MedicalTourismSetting;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class WebsiteContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedForms();
        $this->seedServiceForms();
        $this->seedMaps();
        $this->seedTestimonials();
        $this->importContactsAsLeads();
        $this->seedDoctors();
        $this->seedMedicalTourism();
    }

    protected function seedDoctors(): void
    {
        // The About page team section is rendered from this table.
        // "featured" marks the doctor shown in the large highlighted card.
        $roster = [
            [
                'name_ar'       => 'دكتور محمد حجاب',
                'name_en'       => 'Dr. Mohamed Hegab',
                'title_ar'      => 'استشاري طب وجراحة الفم والأسنان',
                'title_en'      => 'Consultant of Oral & Maxillofacial Surgery',
                'bio_ar'        => 'متخصص في تجميل الأسنان وزراعة الأسنان وتصميم الابتسامة.',
                'bio_en'        => 'Specialized in cosmetic dentistry, dental implants and smile design.',
                'photo'         => 'D-mohamed-h.webp',
                'featured'      => 1,
                'display_order' => 0,
            ],
            [
                'name_ar'       => 'دكتور علي وهبة',
                'name_en'       => 'Dr. Ali Wahba',
                'title_ar'      => 'مدرس جراحات اللثه وزراعه الأسنان',
                'title_en'      => 'Lecturer of Periodontology & Dental Implantology',
                'bio_ar'        => 'متخصص في جراحات اللثة وزراعة الأسنان باستخدام أحدث التقنيات.',
                'bio_en'        => 'Specialized in gum surgery and dental implants using the latest techniques.',
                'photo'         => 'D-ali.webp',
                'featured'      => 0,
                'display_order' => 1,
            ],
            [
                'name_ar'       => 'دكتور محمد زايد',
                'name_en'       => 'Dr. Mohamed Zayed',
                'title_ar'      => 'استاذ طب اسنان وأطفال جامعه عين شمس',
                'title_en'      => 'Professor of Pediatric Dentistry, Ain Shams University',
                'bio_ar'        => 'متخصص في طب أسنان الأطفال وتقديم الرعاية المناسبة لمختلف الأعمار.',
                'bio_en'        => 'Specialized in pediatric dentistry and age-appropriate dental care.',
                'photo'         => 'D-mohmed-z.webp',
                'featured'      => 0,
                'display_order' => 2,
            ],
            [
                'name_ar'       => 'دكتورة ولاء جاد',
                'name_en'       => 'Dr. Walaa Gad',
                'title_ar'      => 'اخصائي ودكتوراه تقويم الاسنان جامعه القاهره',
                'title_en'      => 'Orthodontics Specialist, PhD - Cairo University',
                'bio_ar'        => 'متخصصة في تقويم الأسنان وتحسين انتظام الأسنان والابتسامة.',
                'bio_en'        => 'Specialized in orthodontics and improving teeth alignment and smiles.',
                'photo'         => 'D-walaa-gad.webp',
                'featured'      => 0,
                'display_order' => 3,
            ],
            [
                'name_ar'       => 'دكتورة خلود',
                'name_en'       => 'Dr. Kholoud',
                'title_ar'      => 'أخصائية طب الأسنان',
                'title_en'      => 'Dentistry Specialist',
                'bio_ar'        => 'تقديم خطط علاج متكاملة ومناسبة لكل حالة باهتمام واحترافية.',
                'bio_en'        => 'Provides complete treatment plans tailored to each case with care and professionalism.',
                'photo'         => 'D-Kholoud.webp',
                'featured'      => 0,
                'display_order' => 4,
            ],
            [
                'name_ar'       => 'دكتور أحمد عصمت',
                'name_en'       => 'Dr. Ahmed Esmat',
                'title_ar'      => 'أخصائي علاج الجذور',
                'title_en'      => 'Endodontics Specialist',
                'bio_ar'        => 'متخصص في علاج جذور الأسنان والحفاظ على الأسنان بأحدث التقنيات.',
                'bio_en'        => 'Specialized in root canal treatment and tooth preservation with the latest techniques.',
                'photo'         => 'D-ahmed-a.webp',
                'featured'      => 0,
                'display_order' => 5,
            ],
            [
                'name_ar'       => 'دكتور أحمد ممدوح',
                'name_en'       => 'Dr. Ahmed Mamdouh',
                'title_ar'      => 'أخصائي تركيبات الأسنان',
                'title_en'      => 'Prosthodontics Specialist',
                'bio_ar'        => 'متخصص في تركيبات الأسنان الثابتة والمتحركة واستعادة جمال الابتسامة.',
                'bio_en'        => 'Specialized in fixed and removable prosthetics and restoring beautiful smiles.',
                'photo'         => 'D-ahmed-m.webp',
                'featured'      => 0,
                'display_order' => 6,
            ],
        ];

        $hasFeatured = Schema::hasColumn('doctors', 'featured');
        $first = null;

        foreach ($roster as $row) {
            if (! $hasFeatured) {
                unset($row['featured']);
            }

            $doctor = Doctor::firstOrCreate(
                ['name_ar' => $row['name_ar']],
                $row + ['active' => 1]
            );

            // Fill only what is still missing so dashboard edits are never overwritten.
            $missing = [];
            foreach (['name_en', 'title_ar', 'title_en', 'bio_ar', 'bio_en', 'photo'] as $field) {
                if (empty($doctor->{$field}) && ! empty($row[$field])) {
                    $missing[$field] = $row[$field];
                }
            }
            if ($missing) {
                $doctor->update($missing);
            }

            $first = $first ?: $doctor;
        }

        // If nobody is featured yet, promote the default team lead(s) so the
        // About page keeps its highlighted card. Existing choices are kept.
        if ($hasFeatured && Doctor::where('featured', 1)->count() === 0) {
            $featuredNames = array_column(
                array_filter($roster, fn ($row) => ! empty($row['featured'])),
                'name_ar'
            );

            Doctor::whereIn('name_ar', $featuredNames)->update(['featured' => 1]);
        }

        // Backfill existing articles that have no assigned author.
        if ($first && Schema::hasColumn('blogs', 'doctor_id')) {
            Blog::whereNull('doctor_id')->update(['doctor_id' => $first->id]);
        }
    }

    protected function seedMedicalTourism(): void
    {
        $mt = MedicalTourismSetting::current();
        if (! $mt->hero_heading_ar) {
            $mt->update([
                'enabled'                 => 1,
                'hero_badge_ar'           => 'السياحة العلاجية للأسنان في مصر',
                'hero_heading_ar'         => 'السياحة العلاجية',
                'hero_highlight_ar'       => 'للأسنان في مصر',
                'hero_description_ar'     => 'ابتسامتك المثالية تبدأ الآن مع خطة علاج متكاملة تشمل العلاج، الراحة، والمتابعة داخل مصر.',
                'treatments_heading_ar'   => 'علاجات الأسنان في زيارات قصيرة',
                'treatments_subheading_ar'=> 'حلول علاجية وتجميلية متقدمة خلال فترة مناسبة لرحلتك',
                'benefits_heading_ar'     => 'لماذا تختار مصر وتوث جارد',
                'journey_heading_ar'      => 'رحلة علاجك خطوة بخطوة',
                'journey_description_ar'  => 'خطوات واضحة من إرسال حالتك وحتى المتابعة بعد العلاج.',
                'support_heading_ar'      => 'دعم المرضى الدوليين',
                'beforeafter_heading_ar'  => 'نتائج قبل وبعد',
                'testimonials_heading_ar' => 'تجارب مرضانا',
                'faq_heading_ar'          => 'الأسئلة الشائعة',
                'final_cta_heading_ar'    => 'ابدأ رحلتك نحو ابتسامة جديدة',
                'final_cta_description_ar'=> 'تواصل معنا الآن واحصل على استشارتك المجانية وخطة علاجية مخصصة لك',
                'final_cta_button_ar'     => 'احجز استشارتك الان',
                'meta_title_ar'           => 'السياحة العلاجية للأسنان في مصر | توث جارد',
                'meta_description_ar'     => 'خطط علاج أسنان متكاملة للمرضى الدوليين في مصر مع توث جارد: جودة عالمية، أسعار مناسبة، وتنسيق كامل لرحلتك العلاجية.',
            ]);
        }

        $this->seedBlocks('benefit', [
            ['icon' => '🛡️', 'title_ar' => 'جودة عالية', 'description_ar' => 'رعاية طبية بمعايير عالمية'],
            ['icon' => '💰', 'title_ar' => 'أسعار أقل', 'description_ar' => 'توفير يصل إلى 70%'],
            ['icon' => '📅', 'title_ar' => 'تنسيق رحلة علاجية', 'description_ar' => 'تنظيم كامل لمواعيدك'],
            ['icon' => '👨‍⚕️', 'title_ar' => 'رعاية شخصية', 'description_ar' => 'فريق طبي وخطة علاج مخصصة'],
            ['icon' => '🏨', 'title_ar' => 'إقامة مريحة', 'description_ar' => 'خيارات إقامة مناسبة'],
            ['icon' => '✈️', 'title_ar' => 'تنقلات سهلة', 'description_ar' => 'مساعدة في التنقل والوصول'],
        ]);

        $this->seedBlocks('journey', [
            ['icon' => 'fa-solid fa-x-ray', 'title_ar' => 'أرسل حالتك وأشعتك', 'description_ar' => 'شارك صور الأشعة والتقارير لتقييم حالتك.'],
            ['icon' => 'fa-solid fa-file-medical', 'title_ar' => 'استلم خطة علاج مبدئية', 'description_ar' => 'نرسل لك خطة علاج وتكلفة تقديرية قبل السفر.'],
            ['icon' => 'fa-solid fa-plane', 'title_ar' => 'أكد السفر والموعد', 'description_ar' => 'نساعدك في تنظيم موعدك وترتيبات الرحلة.'],
            ['icon' => 'fa-solid fa-tooth', 'title_ar' => 'العلاج داخل العيادة', 'description_ar' => 'تنفيذ خطة العلاج بأحدث التقنيات.'],
            ['icon' => 'fa-solid fa-heart-pulse', 'title_ar' => 'متابعة بعد العلاج', 'description_ar' => 'متابعة حالتك بعد عودتك إلى بلدك.'],
        ]);

        $this->seedBlocks('support', [
            ['icon' => 'fa-solid fa-calendar-check', 'title_ar' => 'تنسيق المواعيد', 'description_ar' => 'تنظيم كامل لمواعيد العلاج بدون انتظار.'],
            ['icon' => 'fa-solid fa-file-medical', 'title_ar' => 'خطة علاج قبل السفر', 'description_ar' => 'خطة علاج مبدئية وتكلفة قبل الحجز.'],
            ['icon' => 'fa-solid fa-headset', 'title_ar' => 'دعم ومتابعة', 'description_ar' => 'إرشادات للإقامة والتنقل ومتابعة بعد العلاج.'],
        ]);

        $this->seedBlocks('faq', [
            ['title_ar' => 'كيف أحصل على خطة علاج قبل السفر؟', 'description_ar' => 'أرسل لنا صور الأشعة والتقارير وسنرسل لك خطة علاج مبدئية وتكلفة تقديرية.'],
            ['title_ar' => 'كم يجب أن أبقى في مصر؟', 'description_ar' => 'تعتمد المدة على نوع العلاج، ونحددها لك ضمن الخطة المبدئية.'],
            ['title_ar' => 'ما المستندات أو الأشعة المطلوبة؟', 'description_ar' => 'صور أشعة بانوراما حديثة وأي تقارير طبية سابقة متاحة.'],
            ['title_ar' => 'هل يمكن إنهاء العلاج في زيارة واحدة؟', 'description_ar' => 'بعض الحالات تكتمل في زيارة واحدة، وأخرى تحتاج أكثر، ويوضح ذلك في خطتك.'],
            ['title_ar' => 'كيف أحجز موعدي؟', 'description_ar' => 'املأ نموذج الحجز في الصفحة أو تواصل معنا عبر واتساب.'],
        ]);

        // Default the page to feature current content (skip if admin already chose).
        if (Service::where('mt_featured', 1)->doesntExist()) {
            Service::query()->update(['mt_featured' => 1]);
        }
        if (Testimonial::where('mt_featured', 1)->doesntExist()) {
            Testimonial::where('active', 1)->update(['mt_featured' => 1]);
        }
        if (BeforeAfter::where('mt_featured', 1)->doesntExist()) {
            BeforeAfter::where('active', 1)->update(['mt_featured' => 1]);
        }
    }

    protected function seedBlocks(string $type, array $items): void
    {
        if (MedicalTourismBlock::where('type', $type)->exists()) {
            return;
        }
        foreach ($items as $order => $item) {
            MedicalTourismBlock::create(array_merge([
                'type'          => $type,
                'active'        => 1,
                'display_order' => $order,
            ], $item));
        }
    }

    /**
     * Create or update a form by key and seed default fields only when it
     * has none yet (never overwrites admin customisations).
     */
    protected function upsertForm(string $key, array $attributes, array $fields): Form
    {
        $form = Form::updateOrCreate(['key' => $key], $attributes);

        if ($form->fields()->count() === 0) {
            foreach ($fields as $order => $field) {
                $form->fields()->create(array_merge([
                    'display_order' => $order,
                    'visible'       => 1,
                    'required'      => 0,
                    'type'          => 'text',
                ], $field));
            }
        }

        return $form;
    }

    protected function seedForms(): void
    {
        // Contact page form
        $this->upsertForm('contact_page', [
            'name'              => 'Contact Page Form',
            'enabled'           => 1,
            'source_identifier' => 'contact_page',
            'heading_ar'        => 'تواصل معنا عن طريق الرسائل',
            'heading_en'        => 'Contact us by message',
            'description_ar'    => 'إذا كان لديك سؤال، املأ هذا النموذج وسنعاود التواصل معك.',
            'description_en'    => 'If you have a question, fill this form and we will get back to you.',
            'button_text_ar'    => 'إرسال',
            'button_text_en'    => 'Send',
            'success_message_ar' => 'تم إرسال رسالتك بنجاح.',
            'success_message_en' => 'Your message has been sent successfully.',
        ], [
            ['name' => 'name', 'type' => 'text', 'required' => 1, 'label_ar' => 'الاسم', 'label_en' => 'Name', 'placeholder_ar' => 'الاسم', 'placeholder_en' => 'Name'],
            ['name' => 'email', 'type' => 'email', 'required' => 1, 'label_ar' => 'البريد الإلكتروني', 'label_en' => 'Email', 'placeholder_ar' => 'البريد الإلكتروني', 'placeholder_en' => 'Email'],
            ['name' => 'phone', 'type' => 'tel', 'required' => 0, 'label_ar' => 'رقم الهاتف', 'label_en' => 'Phone', 'placeholder_ar' => 'رقم الهاتف', 'placeholder_en' => 'Phone'],
            ['name' => 'message', 'type' => 'textarea', 'required' => 1, 'label_ar' => 'الرسالة', 'label_en' => 'Message', 'placeholder_ar' => 'الرسالة', 'placeholder_en' => 'Message'],
        ]);

        // Medical tourism form
        $this->upsertForm('medical_tourism', [
            'name'              => 'Medical Tourism Form',
            'enabled'           => 1,
            'source_identifier' => 'medical_tourism',
            'heading_ar'        => 'احجز استشارتك الآن',
            'heading_en'        => 'Book your consultation now',
            'description_ar'    => 'املأ البيانات وسيتم التواصل معك في أقرب وقت.',
            'description_en'    => 'Fill in your details and we will contact you shortly.',
            'button_text_ar'    => 'إرسال الطلب',
            'button_text_en'    => 'Send request',
            'success_message_ar' => 'تم استلام طلبك بنجاح.',
            'success_message_en' => 'Your request has been received successfully.',
        ], [
            ['name' => 'name', 'type' => 'text', 'required' => 1, 'label_ar' => 'الاسم بالكامل', 'label_en' => 'Full name', 'placeholder_ar' => 'الاسم بالكامل', 'placeholder_en' => 'Full name'],
            ['name' => 'phone', 'type' => 'tel', 'required' => 1, 'label_ar' => 'الهاتف / واتساب', 'label_en' => 'Phone / WhatsApp', 'placeholder_ar' => 'الهاتف / واتساب', 'placeholder_en' => 'Phone / WhatsApp'],
            ['name' => 'email', 'type' => 'email', 'required' => 0, 'label_ar' => 'البريد الإلكتروني', 'label_en' => 'Email', 'placeholder_ar' => 'البريد الإلكتروني', 'placeholder_en' => 'Email'],
            ['name' => 'country', 'type' => 'text', 'required' => 0, 'label_ar' => 'الدولة', 'label_en' => 'Country', 'placeholder_ar' => 'الدولة', 'placeholder_en' => 'Country'],
            ['name' => 'treatment', 'type' => 'text', 'required' => 0, 'label_ar' => 'العلاج المطلوب', 'label_en' => 'Preferred treatment', 'placeholder_ar' => 'العلاج المطلوب', 'placeholder_en' => 'Preferred treatment'],
            ['name' => 'preferred_date', 'type' => 'date', 'required' => 0, 'label_ar' => 'تاريخ الزيارة المفضل', 'label_en' => 'Preferred visit date'],
            ['name' => 'message', 'type' => 'textarea', 'required' => 0, 'label_ar' => 'رسالتك', 'label_en' => 'Message', 'placeholder_ar' => 'اكتب رسالتك هنا', 'placeholder_en' => 'Write your message'],
        ]);

        // Homepage form (mirrors the booking form)
        $this->upsertForm('homepage', [
            'name'              => 'Homepage Form',
            'enabled'           => 1,
            'source_identifier' => 'homepage',
            'heading_ar'        => 'احجز استشارتك الآن',
            'heading_en'        => 'Book your consultation now',
            'description_ar'    => 'املأ البيانات وسيتم التواصل معك في أقرب وقت.',
            'description_en'    => 'Fill in your details and we will contact you shortly.',
            'button_text_ar'    => 'إرسال الطلب',
            'button_text_en'    => 'Send request',
            'success_message_ar' => 'تم استلام طلبك بنجاح.',
            'success_message_en' => 'Your request has been received successfully.',
        ], $this->defaultServiceFields());
    }

    protected function defaultServiceFields(): array
    {
        return [
            ['name' => 'name', 'type' => 'text', 'required' => 1, 'label_ar' => 'الاسم', 'label_en' => 'Name', 'placeholder_ar' => 'اكتب اسمك', 'placeholder_en' => 'Your name'],
            ['name' => 'phone', 'type' => 'tel', 'required' => 1, 'label_ar' => 'رقم الهاتف', 'label_en' => 'Phone', 'placeholder_ar' => 'رقم الهاتف', 'placeholder_en' => 'Phone'],
            ['name' => 'city', 'type' => 'text', 'required' => 0, 'label_ar' => 'المدينة', 'label_en' => 'City', 'placeholder_ar' => 'اكتب المدينة', 'placeholder_en' => 'City'],
            ['name' => 'email', 'type' => 'email', 'required' => 0, 'label_ar' => 'البريد الإلكتروني', 'label_en' => 'Email', 'placeholder_ar' => 'البريد الإلكتروني', 'placeholder_en' => 'Email'],
            ['name' => 'message', 'type' => 'textarea', 'required' => 0, 'label_ar' => 'رسالتك', 'label_en' => 'Message', 'placeholder_ar' => 'اكتب رسالتك هنا', 'placeholder_en' => 'Write your message'],
        ];
    }

    protected function seedServiceForms(): void
    {
        foreach (Service::all() as $service) {
            $slug = $service->slug_ar ?: $service->slug_en ?: $service->id;
            $key  = 'service_' . $slug;

            $this->upsertForm($key, [
                'name'              => 'Service Form: ' . ($service->title_ar ?: $service->title_en ?: $service->id),
                'service_id'        => $service->id,
                'enabled'           => 1,
                'source_identifier' => $key,
                'heading_ar'        => 'احجز استشارتك الآن',
                'heading_en'        => 'Book your consultation now',
                'description_ar'    => 'املأ البيانات وسيتم التواصل معك في أقرب وقت.',
                'description_en'    => 'Fill in your details and we will contact you shortly.',
                'button_text_ar'    => 'إرسال الطلب',
                'button_text_en'    => 'Send request',
                'success_message_ar' => 'تم استلام طلبك بنجاح.',
                'success_message_en' => 'Your request has been received successfully.',
            ], $this->defaultServiceFields());
        }
    }

    protected function seedMaps(): void
    {
        $address = '17 Makram Ebaid St. Nasr City, Cairo, Egypt';
        $embed   = 'https://www.google.com/maps?q=' . rawurlencode($address) . '&output=embed';
        $direct  = 'https://maps.app.goo.gl/anJeL6VXLuoB61WK7?g_st=ac';

        foreach (['contact_page', 'homepage'] as $key) {
            MapSetting::updateOrCreate(['page_key' => $key], [
                'enabled'        => 1,
                'embed_url'      => $embed,
                'clinic_name'    => 'Tooth Guard Clinics',
                'address_ar'     => $address,
                'address_en'     => $address,
                'map_title'      => 'موقع Tooth Guard Clinics على الخريطة',
                'direct_link'    => $direct,
                'button_text_ar' => 'فتح الموقع على خرائط جوجل',
                'button_text_en' => 'Open on Google Maps',
            ]);
        }
    }

    protected function seedTestimonials(): void
    {
        if (Testimonial::count() > 0) {
            return;
        }

        $patients = [
            ['name' => 'hazem khaled', 'review' => 'افضل عيادة اسنان فى مدينة نصر تقريبا متخصصين فى كل ما يخص الاسنان من تقويم اسنان زراعة اسنان.'],
            ['name' => 'Sama Emad', 'review' => 'تجربه ممتازه ودكاتره ممتازين واكتر حاجه مريحه بنسبالي هيا التعقيم والمواعيد ودي اكتر حاجه بيهتمو بيه حقيقي علي غير مراكز تانيه كتير شكرا توث جارد علي تجربتي معاكو 🌸'],
            ['name' => 'Mohamed Abdelkader', 'review' => 'من افضل الاماكن والتعامل ويقدم افضل خدمة وخامة محترمة جدااا جداا.'],
            ['name' => 'Nour', 'review' => 'أفضل تجربة لي، احترافية عالية. أنصح بها بشدة.'],
            ['name' => 'Ahmed Fouad', 'review' => 'عيادة ممتازة مع أطباء ممتازين.'],
            ['name' => 'Ahmed Ghaly', 'review' => 'تجربة رائعة.'],
            ['name' => 'Wafaa Hegab', 'review' => 'أفضل الأطباء وأفضل عيادة.'],
            ['name' => 'Ziad Muhammad', 'review' => 'عيادة أسنان تحفة في كل حاجة حرفيا نضافة جوده معاملة احترافيه بجد شكرا ليكم ❤️.'],
            ['name' => 'Mohamed Hegab', 'review' => 'عيادة أسنان رائعة حقًا.'],
        ];

        foreach ($patients as $i => $p) {
            Testimonial::create([
                'name'          => $p['name'],
                'review_ar'     => $p['review'],
                'rating'        => 5,
                'location'      => 'مصر',
                'active'        => 1,
                'display_order' => $i,
            ]);
        }
    }

    /**
     * Copy any existing rows from the legacy contacts table into leads,
     * once, without touching or deleting the original data.
     */
    protected function importContactsAsLeads(): void
    {
        if (! Schema::hasTable('contacts')) {
            return;
        }

        // Already imported? skip.
        if (Lead::where('source_page', 'contacts_import')->exists()) {
            return;
        }

        $contacts = DB::table('contacts')->get();
        foreach ($contacts as $c) {
            Lead::create([
                'form_key'    => 'contact_page',
                'source_page' => 'contacts_import',
                'name'        => $c->name ?? null,
                'phone'       => $c->phone ?? null,
                'email'       => $c->email ?? null,
                'subject'     => $c->subject ?? null,
                'message'     => $c->message ?? null,
                'status'      => 'new',
                'created_at'  => $c->created_at ?? now(),
                'updated_at'  => $c->updated_at ?? now(),
            ]);
        }
    }
}
