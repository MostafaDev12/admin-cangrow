
        <section class="bg-custom-orange">
            <div class="relative max-w-7xl mx-auto py-10  rounded-2xl overflow-hidden shadow-lg">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-20" style="
          background-image: url('{{ asset('front/dareltawfik/') }}/assets/imgs/banner/bg-lines-transparent.png');
          background-size: cover;
          background-position: center bottom;
          background-repeat: no-repeat;
        "></div>

                <!-- Text + Button -->
                <div
                    class="relative flex flex-col md:flex-row justify-between items-center  px-4 sm:px-6 lg:px-8 py-6 md:py-8">
                    <div class="mb-6 md:mb-0">
                        <h2 class="text-2xl md:text-3xl font-bold leading-tight text-white">
                               {{ __('شارك بصدقتك وزكاتك مع دار التوفيق') }}

                            <br class="hidden md:block" />
                            
                          {{ __('وفرح ملايين المستفيدين في كل محافظات مصر') }}
                        </h2>
                    </div>

                    <a href="{{ route('donate_campaigns.index', $sign) }}"
                        class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-white hover:text-custom-orange transition-all duration-300 ease-in-out flex items-center space-x-2 space-x-reverse">
                        <span>  {{ __('وسائل التبرع') }}</span>
                        <i class="fas fa-arrow-left text-sm"></i>
                    </a>
                </div>
            </div>
        </section>
