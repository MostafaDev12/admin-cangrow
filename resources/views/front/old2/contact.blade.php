 

   
@extends('layouts.front')

@section('title')
   
{{ __('اتصل بنا') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
 
@include('includes.contact-form',['classes' => 'mt-5 pt-5'])
 

    
   @stop