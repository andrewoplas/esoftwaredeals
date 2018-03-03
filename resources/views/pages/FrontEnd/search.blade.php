@extends('layouts.front_end.master')

@section('content')
  <div class="main-content">
  <div class="row">
    <h1 class="search-header">Search results for <b>{{ app('request')->input('s') }}</b></h1>
    <div class="col-md-12">

      @foreach ($products as $product)
      <div class="col-md-3 product-container">
        <img src="{{ asset($product->image) }}" class="card-s" width="100%">
        <div class="col-md-12 product-card">
          <div class="row">
            <div class="col-md-12 align-center padding-sm">
              <h2>{{ $product->product_name }}</h2>
              <h3>${{ $product->price }}</h3>
            </div>
          </div>
        </div>
        <div class="col-md-12 nopadding product-card">
          <div class="col-md-6 nopadding">
            <button class="product-button non-highlight-button">
              <i class="search-bar-icon material-icons">favorite</i>
            </button>
          </div>
          <div class="col-md-6 nopadding">
            <button class="product-button highlight-button">
              <i class="search-bar-icon material-icons">add_shopping_cart</i>
            </button>
          </div>
        </div>
      </div>
      @endforeach

      <div>

      </div>

    </div>
  </div>
</div>
@endsection
