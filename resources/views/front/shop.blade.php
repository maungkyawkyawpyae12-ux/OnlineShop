@extends('layouts.front')
@section('content')

        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="6000">
      <img src="{{ asset('images/tissot.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="{{ asset('images/omega.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/rolex.jpg') }}" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                    @foreach($items as $item)
                        <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{$item->image}}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h6 class="">{{$item->name}}</h><br>
                                     @if($item->discount>0)
                           
                                      <span class="text-decoration-line-through">{{$item->price}}</span>
                                      {{$item->price-($item->price*($item->discount/100))}}$
                                      @else
                                      {{$item->price}}$
                                      @endif
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center row">
                                    <div class="d-flex justify-content-between align-item-center mt-2">
                                            <a class="btn btn-sm btn-outline-dark " href="{{route('shop-item',$item->id)}}">Details</a>
                                            <input type="hidden" name='' class="qty" value="1">
                                            <button class="btn btn-sm btn-dark addToCart" 
                                            data-id="{{$item->id}}"
                                            data-name="{{$item->name}}"
                                            data-price="{{$item->price}}"
                                            data-discount="{{$item->discount}}"
                                            data-image="{{ asset($item->image) }}"
                                            >Add To Cart</button>
                                    </div>
                                    
                            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{$items->links()}}
            </div>
        </section>
        
@endsection
