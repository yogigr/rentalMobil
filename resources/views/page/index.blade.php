@extends('layouts.front')
@section('title', $contact->deskripsi_pendek)
@section('description', $contact->deskripsi)
@section('content')
<div class="position-relative mb-lg-5">
  <!-- shape Hero -->
  <!--intro-->
  <section class="section section-lg section-shaped pb-250">
    <div class="shape shape-style-1 shape-default">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="container py-lg-md d-flex mt-lg-5">
      <div class="col px-0">
        <div class="row">
          <div class="col-lg-6">
            <h1 class="display-3  text-white">{{ strtoupper($contact->nama_perusahaan) }}
              <span>{{ $contact->deskripsi_pendek }}</span>
            </h1>
            <p class="lead text-white">
              {{ $contact->deskripsi }}
            </p>
            <div class="btn-wrapper">
              <a href="#" class="btn btn-info btn-icon mb-3 mb-sm-0" data-toggle="modal" data-target="#booking-modal">
                <span class="btn-inner--text">Booking Sekarang</span>
              </a>
            </div>
          </div>
          <div class="col-lg-6">
            <img src="{{ asset('images/cars/intro-vehicles.png') }}" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
    <!-- SVG separator -->
    <div class="separator separator-bottom separator-skew">
      <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </section>
  <!-- 1st Hero Variation -->
</div>

<!--cars-->
@include('sections.cars')

@include('sections.why')

@include('sections.how')

@include('sections.contact')

@include('sections.booking-modal')
@endsection