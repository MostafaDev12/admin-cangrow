  @extends('layouts.front')

@section('title')
   
{{ __('معلومات عنا') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

    <!-- Hero Banner -->
    <section class="bg-gradient-to-r from-blue-500 to-green-600 text-white py-16 px-4 md:px-16">
        <div class="text-center px-4">
            <h1 class="sm:text-5xl text-2xl font-bold mb-4">   {{ __('معلومات عنا') }}  </h1>
        </div>
    </section>

    <!-- About Tooth Guard -->
    <section class="sm:py-10 py-5 flex flex-col items-center justify-center text-center">
        <h2 class="sm:text-5xl text-2xl text-blue-700 font-bold mb-2">  {{ __('معلومات عن TOOTH GUARD') }}</h2>
        <p class="sm:text-2xl text-lg text-green-500 font-bold mb-4">   {{ __('شركائك في صحة الأسنان') }}    </p>
        <p class="w-11/12 sm:w-3/4 text-gray-500 text-sm sm:text-base">
        

            {{ __('في عيادات Tooth Guard، نؤمن بأن العناية بالأسنان يجب أن تكون تجربة شخصية ومتميزة. يضم فريقنا نخبة من الخبراء البارزين وقادة المجال، بما في ذلك أعضاء هيئة التدريس من أرقى الجامعات المصرية. نحن ملتزمون بالابتكار المستمر في طب الأسنان، لضمان تقديم أعلى مستوى من الرعاية لابتسامتك.') }}
        </p>
    </section>

    <!-- Team Section -->
    <section class="sm:py-10 py-5 flex flex-col items-center justify-center text-center">
        <h2 class="sm:text-5xl text-2xl text-blue-700 font-bold mb-2">{{ __('فريقنا') }}</h2>
        <p class="sm:text-2xl text-lg text-green-500 font-bold mb-4">   {{ $ps->{'our_team_title_' . $sign}  ?? ''}} </p>
        <p class="w-11/12 sm:w-3/4 text-gray-500 text-sm sm:text-base">
        
          {!! $ps->{'our_team_details_' . $sign}  ?? ''!!}
        
        </p>
    </section>

    <!-- Doctor Profile -->
    <section class="bg-green-500 sm:py-16 py-10">
        <div class="container mx-auto sm:px-32 px-6">
            <div class="bg-white rounded-lg flex flex-col md:flex-row shadow-lg">
                <div class="md:w-1/2">
                    <img src="{{ $ps->about_photo }}" alt="Dr. Mohamed Hegab"
                        class="object-cover w-full h-64 md:h-full rounded-t-lg md:rounded-t-none md:rounded-r-lg">
                </div>
                <div class="md:w-1/2 p-6 flex flex-col justify-center">
                    <h2 class="text-2xl sm:text-3xl font-bold text-blue-700 mb-4"> {{ $ps->{'about_title_' . $sign}  ?? ''}}    </h2>
                    <p class="text-gray-600 text-sm sm:text-base">
                         {!! $ps->{'about_details_' . $sign}  ?? ''!!}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Features -->
    <section class="bg-gradient-to-r from-blue-600 to-green-400 py-12">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-white px-6">
           
            @foreach ($models as $model)
            <div class="flex flex-col items-center md:items-start text-center md:text-right">
                <h3 class="text-xl sm:text-2xl font-bold mb-2"> {{ $model->{'title_' . $sign} }}     </h3>
                <p class="text-sm sm:text-base">  {{ $model->{'details_' . $sign}  ?? ''}}</p>
            </div>
             @endforeach
             
        </div>
    </section>

    <!-- Before and After Slider -->
    <section class="py-10 sm:py-20 bg-blue-100 px-5 lg:px-28">
        <div class="text-center">
            <h3 class="text-xl sm:text-4xl font-bold text-blue-800 mb-4"> {{ __('التحولات في طب الأسنان') }} </h3>
            <p class="text-blue-800 sm:text-lg lg:w-3/4 mx-auto mb-8">
 
                {{ __('شاهد النتائج المذهلة التي حققها فريقنا الماهر في عيادات توث جارد. يعرض معرضنا قبل وبعد القوة التحويلية لعلاجات الأسنان لدينا، من التحسينات التجميلية إلى الحلول الترميمية.') }}
            </p>
        </div>
        <div class="w-full relative py-10">
            <div class="relative w-full max-w-[700px] aspect-[70/45] mx-auto overflow-hidden select-none">
                <img class="w-full h-full object-cover" alt="Before" draggable="false"
                    src="{{ $ps->before_photo }}">
                <div class="absolute top-0 left-0 right-0 w-full max-w-[700px] aspect-[70/45] mx-auto overflow-hidden select-none"
                    style="clip-path: inset(0 50% 0 0);">
                    <img class="w-full h-full object-cover" draggable="false" alt="After"
                        src="{{ $ps->after_photo }}">
                </div>
                <div id="slider" class="absolute top-0 bottom-0 w-1 bg-white cursor-ew-resize"
                    style="left: calc(50% - 1px);">
                    <div class="bg-white absolute rounded-full h-3 w-3 -left-1 top-[calc(50%-6px)]"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Call-to-Action -->
 
  @include('includes.book')


     

@stop


  @section( 'js')
    <script>
        // Before and After Slider Functionality
        const slider = document.getElementById('slider');
        const afterImage = slider.parentElement;
        let isDragging = false;

        slider.addEventListener('mousedown', (e) => {
            isDragging = true;
            document.body.style.userSelect = 'none';
        });

        document.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            const container = afterImage.parentElement;
            const rect = container.getBoundingClientRect();
            let newX = e.clientX - rect.left;
            if (newX < 0) newX = 0;
            if (newX > rect.width) newX = rect.width;
            afterImage.style.clipPath = `inset(0 ${rect.width - newX}px 0 0)`;
            slider.style.left = `${newX - 1}px`;
        });

        document.addEventListener('mouseup', () => {
            isDragging = false;
            document.body.style.userSelect = '';
        });

        // Touch Support for Mobile
        slider.addEventListener('touchstart', (e) => {
            isDragging = true;
            document.body.style.userSelect = 'none';
        });

        document.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            const container = afterImage.parentElement;
            const rect = container.getBoundingClientRect();
            let newX = e.touches[0].clientX - rect.left;
            if (newX < 0) newX = 0;
            if (newX > rect.width) newX = rect.width;
            afterImage.style.clipPath = `inset(0 ${rect.width - newX}px 0 0)`;
            slider.style.left = `${newX - 1}px`;
        });

        document.addEventListener('touchend', () => {
            isDragging = false;
            document.body.style.userSelect = '';
        });
    </script>
    <!-- Footer -->
     

@stop

