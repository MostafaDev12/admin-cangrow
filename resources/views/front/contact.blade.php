  @extends('layouts.front')

  @section('title')

      {{ __('Contact') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop


  @section('content')
      @php
          $phones = explode(',', $gs->phones);
          $emails = explode(',', $gs->emails);
          $addresses = json_decode($gs->{'addresses_' . $sign});
          $randomPhone = Arr::random($phones);
      @endphp

      <section class="bg-gradient-to-r from-blue-50 to-teal-50 py-16">
          <div class="container mx-auto px-4 max-w-3xl">
              <!-- Icon -->
              <div class="text-primary text-center mb-6">
                  <i class="fas fa-calendar-check fa-3x"></i> <!-- Appointment icon -->
              </div>

              <!-- Heading -->
              <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">
                  {{ __('Book Your Next Appointment With Us Today') }}
              </h1>

              <!-- Text Content -->
              <div class="text-center mb-8">
                  <p class="text-gray-600 mb-4">
                      {{ __('A healthy, beautiful smile doesn’t happen by accident – it’s a team effort between you and our amazing dental team.') }}
                  </p>
                  <p class="text-gray-600">
                      {{ __('Whether you’re upgrading your smile to red-carpet ready perfection or just maintaining your chompers, it all starts here. Connect with our team and schedule your next appointment today – because life’s better with healthy teeth and a great smile.') }}
                  </p>
              </div>


          </div>
      </section>
      <!-- Container -->
      <section class="container mx-auto px-4 py-8">
          <!-- Two Columns -->
          <div class="flex flex-wrap">
              <!-- Left Column: Contact Info -->
              <div class="w-full md:w-1/2 p-4">
                  <h2 class="text-2xl font-bold mb-4">{{ __('Innova Dental') }}</h2>
                  <p class="text-gray-700 mb-4">
                      @foreach ($addresses as $address)
                          {{ $address }} <br>
                      @endforeach
                  </p>
                  <ul class="space-y-2">
                      @foreach ($phones as $phone)
                          <li class="flex items-center">
                              <i class="fas fa-phone-square mr-2"></i>
                              <a href="tel:{{ $phone }}" class="text-blue-600">{{ $phone }}</a>
                          </li>
                      @endforeach
                      @foreach ($emails as $email)
                          <li class="flex items-center">
                              <i class="fas fa-envelope mr-2"></i>
                              <a href="mailto:{{ $email }}" class="text-blue-600">{{ $email }}</a>
                          </li>
                      @endforeach
                  </ul>
              </div>

              <!-- Right Column: Gravity Form -->
              <div class="w-full md:w-1/2 p-4">
                  <div class="bg-gray-100 p-6 rounded shadow">


                      <form action="{{ route('front.contact.submit') }}" name="appointment" id="email-form"
                          aria-label="Contact form" data-status="init" method="POST" enctype="multipart/form-data"
                          autocomplete="off">
                          {{ csrf_field() }}
                          <div class="form-group w-100">
                              <div class="response w-100"></div>
                          </div>
                          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                              <!-- First Name -->
                              <div>
                                  <label for="input_7_1"
                                      class="block text-sm font-medium text-gray-700 mb-1">{{ __('First Name') }}
                                      <span class="text-red-500">*</span></label>
                                  <input name="name" id="input_7_1" type="text" required
                                      class="fname w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                              </div>

                              <!-- Last Name -->
                              <div>
                                  <label for="input_7_11"
                                      class="block text-sm font-medium text-gray-700 mb-1">{{ __('Last Name') }}
                                      <span class="text-red-500">*</span></label>
                                  <input name="lname" id="input_7_11" type="text" required
                                      class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                              </div>

                              <!-- Email -->
                              <div>
                                  <label for="input_7_9" class="block text-sm font-medium text-gray-700 mb-1">
                                      {{ __('Email') }}<span class="text-red-500">*</span></label>
                                  <input name="email" id="input_7_9" type="email" required
                                      class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                              </div>

                              <!-- Phone -->
                              <div>
                                  <label for="input_7_8"
                                      class="block text-sm font-medium text-gray-700 mb-1">{{ __('Phone') }} <span
                                          class="text-red-500">*</span></label>
                                  <input name="phone" id="input_7_8" type="tel" required
                                      class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                              </div>

                              <!-- Preferred Day -->
                              <div>
                                  <label for="input_7_13"
                                      class="block text-sm font-medium text-gray-700 mb-1">{{ __('Preferred Day') }} <span
                                          class="text-red-500">*</span></label>
                                  <select name="day" id="input_7_13" required
                                      class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                                      <option value="">{{ __('Select a day') }}</option>
                                      <option value="Monday">{{ __('Monday') }}</option>
                                      <option value="Tuesday">{{ __('Tuesday') }}</option>
                                      <option value="Wednesday">{{ __('Wednesday') }}</option>
                                      <option value="Thursday">{{ __('Thursday') }}</option>
                                      <option value="Friday">{{ __('Friday') }}</option>
                                  </select>
                              </div>

                              <!-- Preferred Time -->
                              <div>
                                  <label for="input_7_16"
                                      class="block text-sm font-medium text-gray-700 mb-1">{{ __('Preferred Time') }} <span
                                          class="text-red-500">*</span></label>
                                  <select name="time" id="input_7_16" required
                                      class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                                      <option value="">{{ __('Select a time') }}</option>
                                      <option value="Morning">{{ __('Morning') }}</option>
                                      <option value="Afternoon">{{ __('Afternoon') }}</option>
                                  </select>
                              </div>

                              <!-- Message -->
                              <div class="md:col-span-2">
                                  <label for="input_7_14"
                                      class="block text-sm font-medium text-gray-700 mb-1">{{ __('How can we help you?') }}
                                      <span class="text-red-500">*</span></label>
                                  <textarea name="text" id="input_7_14" rows="5" required
                                      class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                              </div>


                          </div>

                          <!-- Submit Button -->
                          <div class="mt-6">
                              <button type="submit"
                                  class="bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700 transition duration-300">
                                  {{ __('Request An Appointment') }}
                              </button>
                          </div>


                      </form>
                  </div>
              </div>
          </div>
      </section>

      <section class="container mx-auto px-4 py-8">
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-4">

              @foreach ($locations as $location)
                  <div class="space-y-2">
                      <h3 class="text-lg font-semibold text-gray-700 flex items-center gap-2">
                          <i class="fas fa-map-marker-alt text-primary"></i> {{ $location->{'title_' . $sign} }}
                      </h3>
                      <iframe src="{{ $location->map }}" width="100%" height="350" style="border:0;"
                          allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
              @endforeach

          </div>

      </section>
  @stop
