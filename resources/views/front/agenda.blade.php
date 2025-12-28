 

      @extends('layouts.front')

  @section('title')

     {{ __('الأجندة الشهرية') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop

  @section('css')
     <link rel="stylesheet" href="{{ asset('front/highline/') }}/css/articles.css">
  @stop
  @section('content')

    <section class="py-16 bg-white shadow-inner">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-primary mb-4"> {{ __('الأجندة الشهرية') }}  </h2>
            <p class="text-gray-600 text-lg"> {{ __('تابع أنشطة وفعاليات مؤسسة دار التوفيق خلال هذا الشهر') }}  </p>
        </div>
    </section>

    <section class="py-16 container mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-10">

        <!-- ✅ التقويم -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <button id="prev-month" class="text-gray-500 hover:text-primary">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
                <h3 id="month-title" class="text-xl font-semibold text-gray-800"> 2025 {{ __('نوفمبر') }}</h3>
                <button id="next-month" class="text-gray-500 hover:text-primary">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
            </div>
            <div class="grid grid-cols-7 text-center text-sm font-semibold text-gray-700 mb-2">
                <div> {{ __('أحد') }}</div>
                <div> {{ __('إثنين') }}</div>
                <div> {{ __('ثلاثاء') }}</div>
                <div> {{ __('أربعاء') }}</div>
                <div> {{ __('خميس') }}</div>
                <div> {{ __('جمعة') }}</div>
                <div> {{ __('سبت') }}</div>
            </div>
            <div id="calendar-grid" class="grid grid-cols-7 text-center gap-1"></div>
        </div>

        <!-- 📋 قائمة الفعاليات -->
        <div class="lg:col-span-2">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">      {{ __('فعاليات هذا الشهر') }}</h3>

            <!-- Loading Spinner -->
            <div id="loading-spinner" class="hidden text-center py-8">
                <div class="inline-block">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary"></div>
                    <p class="text-gray-600 mt-2">    {{ __('جارى تحميل الاحداث') }}...</p>
                </div>
            </div>

            <div class="space-y-5" id="events-list">
             @forelse ($events as $event)
                 @php
                      $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d', $event->date)->format('d F Y');
                 @endphp
                <div class="bg-white rounded-lg shadow p-5 border-r-4 border-primary">
                    <h4 class="text-lg font-semibold text-gray-800 mb-2">   {{ $event->{'title_' . $sign} }}  </h4>
                    <p class="text-sm text-gray-600 mb-1">📅 {{ __('التاريخ') }}:  {{ $formattedDate }}    </p>
                    <p class="text-sm text-gray-600 mb-2">📍 {{ __('المكان') }}:    {{ $event->{'location_' . $sign} }}</p>
                    <p class="text-gray-700 text-sm leading-relaxed"> {{ $event->{'details_' . $sign}  }}    </p>
                </div>

             @empty
                 <p class="text-center text-gray-500 py-8">    {{ __('لا توجد أحداث مجدولة في هذا التاريخ') }}</p>
             @endforelse
            
            </div>
        </div>
    </section>
 @stop
   @section('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="./assets/scripts/index.js"></script>

    <script>
        const grid = document.getElementById("calendar-grid");
        const monthTitle = document.getElementById("month-title");
        const eventsList = document.getElementById("events-list");
        const loadingSpinner = document.getElementById("loading-spinner");
        const now = new Date();
        let month = now.getMonth();
        let year = now.getFullYear();
        let selectedDate = null;

        const renderCalendar = () => {
            grid.innerHTML = "";
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const months = [
                "يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو",
                "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"
            ];

            monthTitle.textContent = `${months[month]} ${year}`;

            for (let i = 0; i < firstDay; i++) {
                const empty = document.createElement("div");
                grid.appendChild(empty);
            }

            for (let i = 1; i <= daysInMonth; i++) {
                const day = document.createElement("div");
                day.textContent = i;
                day.className =
                    "py-2 rounded-lg cursor-pointer hover:bg-primary hover:text-white transition";
                
                // إضافة class للتاريخ الحالي
                if (i === now.getDate() && month === now.getMonth() && year === now.getFullYear()) {
                    day.classList.add("bg-primary", "text-white", "font-semibold");
                }
                
                // إضافة حدث عند الضغط على التاريخ
                day.addEventListener('click', () => {
                    // إزالة التحديد السابق
                    document.querySelectorAll('#calendar-grid div').forEach(d => {
                        d.classList.remove('bg-primary', 'text-white', 'font-semibold', 'selected-date');
                    });
                    
                    // تحديد التاريخ الجديد
                    day.classList.add('bg-primary', 'text-white', 'font-semibold', 'selected-date');
                    
                    // حساب التاريخ بصيغة YYYY-MM-DD
                    const paddedDay = String(i).padStart(2, '0');
                    const paddedMonth = String(month + 1).padStart(2, '0');
                    selectedDate = `${year}-${paddedMonth}-${paddedDay}`;
                    
                    // جلب الأحداث
                    loadAgendaEvents(selectedDate);
                });
                
                grid.appendChild(day);
            }
        };

        const loadAgendaEvents = (date) => {
            // إظهار مؤشر التحميل
            loadingSpinner.classList.remove('hidden');
            eventsList.innerHTML = '';
            
            // جلب البيانات من الخادم
            fetch(`/agenda/events/${date}`)
                .then(response => response.json())
                .then(data => {
                    // إخفاء مؤشر التحميل
                    loadingSpinner.classList.add('hidden');
                    
                    if (data.success) {
                        eventsList.innerHTML = data.html;
                    } else {
                        eventsList.innerHTML = data.html;
                    }
                })
                .catch(error => {
                    loadingSpinner.classList.add('hidden');
                    console.error('Error:', error);
                    eventsList.innerHTML = '<p class="text-center text-red-500 py-8">حدث خطأ في تحميل الأحداث</p>';
                });
        };

        document.getElementById("prev-month").onclick = () => {
            month--;
            if (month < 0) { month = 11; year--; }
            renderCalendar();
        };
        
        document.getElementById("next-month").onclick = () => {
            month++;
            if (month > 11) { month = 0; year++; }
            renderCalendar();
        };

        renderCalendar();
    </script>
  @stop