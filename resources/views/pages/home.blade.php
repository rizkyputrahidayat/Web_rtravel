@extends('layouts.app')

@section('title')
    Home | RTRAVEL
@endsection
@section('content')
<!-- Header -->
<header class="text-center">
  <h1>
    Explore the Beautiful World
    <br />
    as Easy One Click
  </h1>
  <p class="mt-3">You will see beautiful moment you never see before</p>
  <a href="#popular" class="btn btn-get-started px-4 mt-4">Get Started</a>
</header>

<!-- Main -->
<main>
  <div class="container">
    <section class="section-stats row justify-content-center" id="stats">
      <div class="col-3 col-md-2 stats-detail">
        <h2>20K</h2>
        <p>Members</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>12</h2>
        <p>Contries</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>3K</h2>
        <p>Hotels</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>11</h2>
        <p>Partners</p>
      </div>
    </section>
  </div>

  <!-- Header Wisata Popular -->
  <section class="section-popular" id="popular">
    <div class="container">
      <div class="row">
        <div class="col text-center section-popular-heading">
          <h2>Wisata Popular</h2>
          <p class="mt-3">
            Something that you never try <br />
            before in this world
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- Wisata Popular -->
  <section class="section-popular-content mt-3" id="popularContent">
    <div class="container">
      <div class="section-popular-travel row justify-content-center">
        @foreach ($items as $item)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card-travel text-center d-flex flex-column"
            style="background-image: url('{{ $item->galleries->count() ? 
                  Storage::url($item->galleries->first()->image) : '' }}');">
            <div class="travel-country">{{ $item->location }}</div>
            <div class="travel-location">{{ $item->title }}</div>
            <div class="travel-button mt-auto">
              <a href="{{route('detail', $item->slug)}}" class="btn btn-travel-details px-4">View Details</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Our Partners -->
  <section class="section-networks">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h2>Our Partners</h2>
          <p>
            Companies are trusted us <br />
            more than just a trip
          </p>
        </div>
        <div class="col-md-8 text-center">
          <img src="frontend/images/partners.png" alt="Partners Logo" />
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonial -->
  <section class="section-testimonial-heading" id="testimonialHeading">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h2>They are Loving US</h2>
          <p>
            Moment were giving them <br />
            the best experience
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- Testimonial User -->
  <section class="section section-testimonial-content" id="testimonialContent">
    <div class="container">
      <div class="section-popular-travel row justify-content-center">
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content">
              <img src="frontend/images/logoo.png" alt="Logo User" class="mb-4 rounded-circle" />
              <h3 class="mb-4">Rizky Putra</h3>
              <p class="testimonial">
                It was glorious and i cloud <br />
                not stop to say wohooo for <br />
                every single moment <br />
                Dankeeee
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">Trip to Belitung</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content">
              <img src="frontend/images/logoo.png" alt="Logo User" class="mb-4 rounded-circle" />
              <h3 class="mb-4">Rafi Abdul</h3>
              <p class="testimonial">
                " The trip was amazing and <br />
                I saw something beautiful in <br />
                that Island that makes me <br />
                want to learn more "
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">Trip to Bromo</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content">
              <img src="frontend/images/logoo.png" alt="Logo User" class="mb-4 rounded-circle" />
              <h3 class="mb-4">Rafif Baghiz</h3>
              <p class="testimonial">
                " I loved it when the waves was shaking harder <br />
                - I was scared too "
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">Trip to Belitung</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <a href="" class="btn btn-need-help px-4 mt-4 mx-1">I Need Help</a>
          <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-4 mx-1">Get Started</a>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection