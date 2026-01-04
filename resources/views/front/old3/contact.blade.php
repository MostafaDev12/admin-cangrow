 
   
@extends('layouts.front')

@section('title')
   
{{ __('اتصل بنا') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
  @include('includes.form')
  
    @stop