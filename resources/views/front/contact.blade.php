
   
@extends('layouts.front')

@section('title')
   
{{ __('اتصل بنا') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
@php
$phones =  explode(',', $gs->phones);
$emails =   explode(',', $gs->emails);
$addresses =  json_decode($gs->{'addresses_' . $sign});
$randomPhone = Arr::random($phones);
@endphp

	<main>
		<section class="my-5">
			<div class="contact">
				<div class="container">
					<div class="row" id="appointments">
						<div class="title-body">
							<h3>
								{{ __('المواعيد الاسبوعيه') }}		    
							</h3>
						</div>
					</div>
					<div class="row">

						@foreach ($locations as $k=>$location)
						<div class="col-md-4 col-sm-6 mb-4 box-invisible box-invisible">
							<div class="card p-4 text-center">
								<div class="icon-box feature">
									<i class="fa fa-calendar"></i>
								</div>
								<h4>{{ $location->{'title_' . $sign} }} </h4>
								<p>
									{{ $location->{'date_' . $sign} }}
								</p>
							</div>
						</div>
					@endforeach
					 

					</div>
					<div class="row" id="contact-section">
						<div class="title-body">
							<h3>
								{{ __(key: 'الاتصال') }}	 </h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-6 mb-4 box-invisible">
							<div class="card p-4 text-center">
								<div class="icon-box feature">
									<i class="fa fa-phone"></i>
								</div>
								<h4> 	{{ __(key: 'الاتصال الهاتفي') }}	
								</h4>

								@foreach ($phones as $phone)
								<p><a href="tel:+2{{ $phone }}">{{ $phone }}</a> </p>
								@endforeach
								 

							</div>
						</div>
						<div class="col-md-4 col-sm-6 mb-4 box-invisible">
							<div class="card p-4 text-center">
								<div class="icon-box feature">
									<i class="fa fa-solid fa-envelope"></i>
								</div>
								<h4>
									 	{{ __(key: 'البريد الإلكتروني') }}	
								</h4>
								@foreach ($emails as $email)
								<p>
									<a href="mailto:{{ $email }}">{{ $email }}</a>
								</p>
								@endforeach
							</div>
						</div>


					</div>
					<div class="row" id="locations">
						<div class="title-body">
							<h3>
								{{ __(key: 'موقعنا') }}		
							 </h3>
						</div>
					</div>
					<div class="row">
						@foreach ($locations as $k=>$location)

						<div class="col-md-4 col-sm-6 mb-4 box box-invisible">
							<div class="p-0 card rounded-3">
								<iframe
									src="{{ $location->map }}"
									width="100%" height="100%" style="border: 0px; width: 100%;" allowfullscreen=""
									loading="lazy" referrerpolicy="no-referrer-when-downgrade"
									data-gtm-yt-inspected-14="true"></iframe>
								<p class="p-4">
									{{ $location->{'title_' . $sign} }} : 	{{ $location->{'address_' . $sign} }}

								</p>
							</div>
						</div>
						@endforeach
					 
					</div>
				</div>
			</div>
		</section>
	</main>


	@stop