@extends('layouts.app')

@section('title', 'Seamless - Modern AMS Platform')
@section('description', 'A modern, unified AMS Platform built for now and what\'s to come.')

@section('content')
<div class="min-h-screen">
  @include('components.Section.hero')
  @include('components.Section.frustration')
  @include('components.Section.better-way')
  @include('components.Section.features')
  @include('components.Section.membership')
  @include('components.Section.testimonials')
</div>
@endsection
