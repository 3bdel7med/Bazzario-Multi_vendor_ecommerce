@extends('layouts.app')
@section('title')

@endsection
@section('content')

  <div class="section">
    <div class="section-header">
      <div class="section-title">{{ $category->name }} Products</div>
      <a onclick="showModularPage('arrivals')" class="section-link" style="cursor:pointer">View All →</a>
    </div>

    <div class="prod-grid">
        @foreach ($category->products as $products )
        <a href="{{ route('productDetails',$products->id) }}">
               <div class="prod-card">
                    <div class="prod-img" style="background:#f0eeff"><span class="prod-badge badge-sale">-40%</span><div class="prod-wish">🤍</div>🎧</div>
                    <div class="prod-body"><div class="prod-vendor">{{ $products->name }}</div>
                    <div class="prod-name">{{ $products->description }}</div><div class="prod-stars"><span class="stars">★★★★★</span><span class="rating-cnt">(1,284)</span></div><div class="prod-price-row"><span class="prod-price">$89</span><span class="prod-old">$149</span><span class="prod-discount">40% off</span></div></div>
                </div>
        </a>
        @endforeach


    </div>
  </div>


@endsection
