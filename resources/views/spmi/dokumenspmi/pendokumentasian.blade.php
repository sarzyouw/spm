@extends('layouts.app')

@section('title', 'Pendokumentasian - SPMI STMI')

@section('content')
{{-- HERO SECTION ASLI --}}

@if(!session('logged_in'))
<section class="hero-section" style="background-color: #1e4bb1; color: white; padding: 100px 0; text-align: center;">
    <div class="container">
        <h1 style="font-size: 3.5rem; font-weight: bold;">Pendokumentasian</h1>
        <p style="font-size: 1.5rem; opacity: 0.9;">Politeknik STMI Jakarta</p>
    </div>
</section>
@endif

<section class="py-5">
  <div class="container bg-white shadow-sm p-4 p-md-5 rounded-3 border-start border-4 border-info">
    <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Pendokumentasian <span class="text-primary"></span></h2>
            <div class="mx-auto bg-primary rounded" style="width: 70px; height: 4px;"></div>
        </div>


  </div>
</section>
@endsection