@extends('layouts.master')
@section('title')
    @lang('translation.analytics')
@endsection
@section('css')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Dashboards
        @endslot
        @slot('title')
        {{ __("translation.add_about_visions") }}
        @endslot
    @endcomponent


    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">



            </div>
            <div class="card-body">
                <form id="geniusform" action="{{ route('admin-about_visions-create') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('includes.admin.form-both')



                    <div class="row">


                        <div class="col-xxl-12">

                            <div class="card">
                                <div class="card-body">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-justified mb-3" role="tablist">
                                        @if($gs->lang_arabic == 1)
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#base-justified-home"
                                                role="tab" aria-selected="false">
                                                <img style="width: 35px;" src="{{ asset('assets/images/ar.jpg') }}">
                                                {{ __('translation.arabic') }}
                                            </a>
                                        </li>
                                        @endif
                                        @if($gs->lang_english == 1)
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#base-justified-product"
                                                role="tab" aria-selected="false">
                                                <img style="width: 35px;" src="{{ asset('assets/images/en.png') }}">
                                                {{ __('translation.english') }}
                                            </a>
                                        </li>
                                        @endif
                                        @if($gs->lang_france == 1)
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#base-justified-messages"
                                                role="tab" aria-selected="false">
                                                <img style="width: 35px;" src="{{ asset('assets/images/fr.png') }}">
                                                {{ __('translation.france') }}
                                            </a>
                                        </li>
                                        @endif

                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content  text-muted">
                                        <div class="tab-pane {{$gs->lang_arabic == 1 ? 'active' : '' }}" id="base-justified-home" role="tabpanel">
                                            <h6 style="text-align: center;">   {{ __('translation.arabic') }}</h6>
                                            
                                      
                                              <div class="mb-3">
                                                  <label for="title_ar" class="form-label">{{ __('translation.title') }}</label>
                                                  <input type="text" class="form-control" name="title_ar" id="title_ar" placeholder="{{ __('translation.title') }}">
                                              </div>
                                               
                                              {{----}} <div class="mb-3">
                                                  <label for="details_ar" class="form-label">{{ __('translation.details') }}</label>
                                                  <textarea class="form-control" name="details_ar"  id="details_ar" rows="3" placeholder="{{ __('translation.details') }}"></textarea>
                                              </div> 
                                              
                                        </div>
                                        <div class="tab-pane {{$gs->lang_arabic == 0 ? 'active' : '' }}" id="base-justified-product" role="tabpanel">
                                            <h6 style="text-align: center;"> {{ __('translation.english') }}</h6>
                                           
                                            <div class="mb-3">
                                              <label for="title_en" class="form-label">{{ __('translation.title') }}</label>
                                              <input type="text" class="form-control" name="title_en" id="title_en" placeholder="{{ __('translation.title') }}">
                                          </div>
                                           
                                          {{-- --}}<div class="mb-3">
                                              <label for="details_en" class="form-label">{{ __('translation.details') }}</label>
                                              <textarea class="form-control" name="details_en"  id="details_en" rows="3" placeholder="{{ __('translation.details') }}"></textarea>
                                          </div> 
                                          
                                        </div>
                                        <div class="tab-pane" id="base-justified-messages" role="tabpanel">
                                            <h6 style="text-align: center;">{{ __('translation.france') }}</h6>
                                           

                                            <div class="mb-3">
                                              <label for="title_fr" class="form-label">{{ __('translation.title') }}</label>
                                              <input type="text" class="form-control" name="title_fr" id="title_fr" placeholder="{{ __('translation.title') }}">
                                          </div>
                                           
                                          <div class="mb-3">
                                              <label for="details_fr" class="form-label">{{ __('translation.details') }}</label>
                                              <textarea class="form-control" name="details_fr"  id="details_fr" rows="3" placeholder="{{ __('translation.details') }}"></textarea>
                                          </div>
                                        </div>

                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div>
                    </div>
  
@php
$icons = [

    // ===== PRIMARY (First) =====
    'fas fa-bolt' => '⚡ Bolt / Energy',
    'fas fa-headset' => '🎧 Headset / Support',
    'fas fa-leaf' => '🍃 Leaf / Eco', // ===== ENERGY & POWER =====
    'fas fa-burn' => '🔥 Fire',
    'fas fa-solar-panel' => '☀️ Solar Panel',
    'fas fa-charging-station' => '🔌 Charging Station',
    'fas fa-battery-full' => '🔋 Battery Full',
    'fas fa-battery-half' => '🔋 Battery Half',
    'fas fa-battery-quarter' => '🔋 Battery Low',
    'fas fa-plug' => '🔌 Plug',
    'fas fa-lightbulb' => '💡 Lightbulb',
    'fas fa-gas-pump' => '⛽ Gas',
    'fas fa-industry' => '🏭 Industry',

    // ===== SUPPORT & COMMUNICATION =====
    'fas fa-headphones' => '🎧 Headphones',
    'fas fa-phone' => '📞 Phone',
    'fas fa-phone-alt' => '📞 Phone Alt',
    'fas fa-life-ring' => '🛟 Help',
    'fas fa-hands-helping' => '🤝 Helping Hands',
    'fas fa-user-headset' => '👨‍💻 User Support',
    'fas fa-comment' => '💬 Comment',
    'fas fa-comment-alt' => '💬 Chat',
    'fas fa-comments' => '💬💬 Comments',
    'fas fa-envelope' => '✉️ Email',
    'fas fa-paper-plane' => '📨 Send',
    'fas fa-inbox' => '📥 Inbox',

    // ===== NATURE & ECO =====
    'fas fa-seedling' => '🌱 Seedling',
    'fas fa-tree' => '🌳 Tree',
    'fas fa-spa' => '🌿 Spa',
    'fas fa-recycle' => '♻️ Recycle',
    'fas fa-water' => '💧 Water',
    'fas fa-wind' => '🌬️ Wind',
    'fas fa-cloud-sun' => '⛅ Climate',
    'fas fa-mountain' => '⛰️ Mountain',
    'fas fa-snowflake' => '❄️ Snow',

    // ===== USERS =====
    'fas fa-user' => '👤 User',
    'fas fa-users' => '👥 Users',
    'fas fa-user-plus' => '➕ Add User',
    'fas fa-user-minus' => '➖ Remove User',
    'fas fa-user-tie' => '👔 User Tie',
    'fas fa-user-cog' => '⚙️ User Settings',
    'fas fa-user-shield' => '🛡️ User Shield',

    // ===== TRANSPORT =====
    'fas fa-car' => '🚗 Car',
    'fas fa-taxi' => '🚕 Taxi',
    'fas fa-truck' => '🚚 Truck',
    'fas fa-bus' => '🚌 Bus',
    'fas fa-motorcycle' => '🏍️ Motorcycle',
    'fas fa-bicycle' => '🚲 Bicycle',
    'fas fa-ship' => '🚢 Ship',
    'fas fa-plane' => '✈️ Plane',

    // ===== SHOPPING =====
    'fas fa-shopping-cart' => '🛒 Cart',
    'fas fa-shopping-bag' => '🛍️ Bag',
    'fas fa-store' => '🏬 Store',
    'fas fa-store-alt' => '🏪 Store Alt',
    'fas fa-box' => '📦 Box',
    'fas fa-box-open' => '📭 Box Open',
    'fas fa-boxes' => '📦📦 Boxes',
    'fas fa-receipt' => '🧾 Receipt',
    'fas fa-tags' => '🏷️ Tags',

    // ===== MONEY =====
    'fas fa-money-bill' => '💵 Money',
    'fas fa-wallet' => '👛 Wallet',
    'fas fa-credit-card' => '💳 Card',
    'fas fa-coins' => '🪙 Coins',
    'fas fa-cash-register' => '🏧 Register',
    'fas fa-percentage' => '％ Percentage',

    // ===== CHARTS =====
    'fas fa-chart-line' => '📈 Line Chart',
    'fas fa-chart-bar' => '📊 Bar Chart',
    'fas fa-chart-pie' => '🥧 Pie Chart',
    'fas fa-chart-area' => '📉 Area Chart',

    // ===== SETTINGS & TOOLS =====
    'fas fa-cog' => '⚙️ Settings',
    'fas fa-tools' => '🛠️ Tools',
    'fas fa-wrench' => '🔧 Wrench',
    'fas fa-sliders-h' => '🎚️ Sliders',
    'fas fa-screwdriver' => '🪛 Screwdriver',

    // ===== SECURITY =====
    'fas fa-lock' => '🔒 Lock',
    'fas fa-unlock' => '🔓 Unlock',
    'fas fa-shield-alt' => '🛡️ Shield',
    'fas fa-key' => '🔑 Key',
    'fas fa-fingerprint' => '🆔 Fingerprint',

    // ===== MEDIA =====
    'fas fa-camera' => '📷 Camera',
    'fas fa-video' => '🎥 Video',
    'fas fa-image' => '🖼️ Image',
    'fas fa-music' => '🎵 Music',
    'fas fa-microphone' => '🎤 Microphone',

    // ===== TIME =====
    'fas fa-clock' => '⏰ Clock',
    'fas fa-calendar' => '📅 Calendar',
    'fas fa-hourglass' => '⌛ Hourglass',

    // ===== ACTIONS =====
    'fas fa-search' => '🔍 Search',
    'fas fa-filter' => '🧹 Filter',
    'fas fa-upload' => '⬆️ Upload',
    'fas fa-download' => '⬇️ Download',
    'fas fa-trash' => '🗑️ Delete',
    'fas fa-edit' => '✏️ Edit',
    'fas fa-save' => '💾 Save',
    'fas fa-plus' => '➕ Add',
    'fas fa-minus' => '➖ Minus',

    // ===== UI =====
    'fas fa-bars' => '☰ Menu',
    'fas fa-ellipsis-h' => '⋯ More',
    'fas fa-list' => '📋 List',
    'fas fa-th-large' => '🔲 Grid',
    'fas fa-eye' => '👁️ View',
    'fas fa-eye-slash' => '🙈 Hide',

    // ===== SOCIAL =====
    'fas fa-heart' => '❤️ Heart',
    'fas fa-star' => '⭐ Star',
    'fas fa-thumbs-up' => '👍 Like',
    'fas fa-thumbs-down' => '👎 Dislike',
    'fas fa-share' => '🔗 Share',

];
@endphp
                        <div class="row">
  <div class="col-xl-12 col-md-12">

                                <div class="mb-3">
                                    <label for="parent_id" class="form-label">{{ __('translation.icons') }}</label>
                                    <select class="form-control" name="icon" id="parent_id"> 
                                        <option value="0">{{ __('translation.select') }}</option>
                                      @foreach($icons as $value => $label)
                                  <option value="{{ $value }}"
                                      >
                                      {{ $label }}
                                  </option>
                              @endforeach
                                       
                                    </select>
                                </div>  
                            </div>

                            <div class="col-xl-12 col-md-12 d-none">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0"> {{ __('translation.photo') }}</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <p class="text-muted">FilePond is a JavaScript library with profile picture-shaped
                                            file
                                            upload variation.</p>
                                        <div class="currrent-logo" style="text-align: center;">
                                            <img style="width: 171px;" src="{{ asset('assets/images/noimage.png') }}"
                                                alt="">
                                        </div>
                                        <div class="avatar-xl mx-auto">
                                            <input type="file" class="filepond filepond-input-circle" name="photo"
                                                accept="image/png, image/jpeg, image/gif, image/webp" />
                                        </div>


                                    </div>
                                    <!-- end card body -->


                                </div>
                                <!-- end card -->
                            </div> <!-- end col -->


                        </div>



                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="left-area">

                                </div>
                            </div>
                            <div class="col-lg-7">
                                <button class="addProductSubmit-btn btn btn-secondary"
                                    type="submit">{{ __('translation.save') }}</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
