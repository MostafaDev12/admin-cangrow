<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\FormField;
use App\Models\Lead;
use App\Models\MapSetting;
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
