<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DOMDocument;
use DOMXPath;


class Blog extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ='blogs';
    
     protected $appends = ['photo','photo_url'];


    public function getPhotoAttribute()
    {
        return url('/') . '/assets/images/blogs/' . $this->attributes['photo'];
    }
    public function getPhotoUrlAttribute()
    {
        return url('/') . '/assets/images/blogs/' . $this->attributes['photo'];
    }
    protected $fillable = [
        
        'photo',
        'title_ar',
        'title_en',
        'title_fr',
        'details_ar',
        'details_en',
        'details_fr',
       'meta_title_ar',
        'meta_title_en',
        'meta_title_fr',
        'meta_details_ar',
        'meta_details_en',
        'meta_details_fr',
        
        'short_details_ar',
        'short_details_en',
        'short_details_fr',
        'blog_date',
        
        'slug_ar',
        'slug_en',
        'slug_fr',
        'tags',
        'category_id',
      
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class,'category_id');
    }
 
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    
public function getDetailsMergedArAttribute()
{
    $content = $this->details_ar;

    if (empty($content)) {
        return '';
    }

    // إعداد DOMDocument
    $dom = new DOMDocument();
    
    // هذا السطر ضروري جداً لدعم اللغة العربية (UTF-8) بشكل صحيح
    // libxml_use_internal_errors(true) لتجاهل أخطاء HTML البسيطة
    libxml_use_internal_errors(true);
    $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();

    // جلب جميع وسوم span
    $spans = $dom->getElementsByTagName('span');

    // تحويل القائمة إلى مصفوفة لتجنب مشاكل التعديل أثناء الدوران (Live NodeList)
    $spansArray = [];
    foreach ($spans as $span) {
        $spansArray[] = $span;
    }

    foreach ($spansArray as $span) {
        $parent = $span->parentNode;
        
        // جلب ستايل الـ span
        $spanStyle = $span->getAttribute('style');

        // إذا كان هناك ستايل، انقله للأب
        if (!empty($spanStyle) && $parent) {
            $parentStyle = $parent->getAttribute('style');
            
            // دمج الستايل القديم للأب مع الجديد (مع إضافة ; للفصل)
            $newStyle = $parentStyle . (!empty($parentStyle) ? ';' : '') . $spanStyle;
            
            $parent->setAttribute('style', $newStyle);
        }

        // نقل المحتوى النصي (أو العناصر الداخلية) من الـ span إلى الأب مباشرة
        while ($span->hasChildNodes()) {
            $parent->insertBefore($span->firstChild, $span);
        }

        // حذف وسم الـ span الفارغ الآن
        $parent->removeChild($span);
    }

    // إرجاع HTML الناتج
    return $dom->saveHTML();
}
    
public function getDetailsMergedEnAttribute()
{
    $content = $this->details_en;

    if (empty($content)) {
        return '';
    }

    // إعداد DOMDocument
    $dom = new DOMDocument();
    
    // هذا السطر ضروري جداً لدعم اللغة العربية (UTF-8) بشكل صحيح
    // libxml_use_internal_errors(true) لتجاهل أخطاء HTML البسيطة
    libxml_use_internal_errors(true);
    $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();

    // جلب جميع وسوم span
    $spans = $dom->getElementsByTagName('span');

    // تحويل القائمة إلى مصفوفة لتجنب مشاكل التعديل أثناء الدوران (Live NodeList)
    $spansArray = [];
    foreach ($spans as $span) {
        $spansArray[] = $span;
    }

    foreach ($spansArray as $span) {
        $parent = $span->parentNode;
        
        // جلب ستايل الـ span
        $spanStyle = $span->getAttribute('style');

        // إذا كان هناك ستايل، انقله للأب
        if (!empty($spanStyle) && $parent) {
            $parentStyle = $parent->getAttribute('style');
            
            // دمج الستايل القديم للأب مع الجديد (مع إضافة ; للفصل)
            $newStyle = $parentStyle . (!empty($parentStyle) ? ';' : '') . $spanStyle;
            
            $parent->setAttribute('style', $newStyle);
        }

        // نقل المحتوى النصي (أو العناصر الداخلية) من الـ span إلى الأب مباشرة
        while ($span->hasChildNodes()) {
            $parent->insertBefore($span->firstChild, $span);
        }

        // حذف وسم الـ span الفارغ الآن
        $parent->removeChild($span);
    }

    // إرجاع HTML الناتج
    return $dom->saveHTML();
}
    
     
}
