@extends('layouts.front_layout')
@section('title')
    e-shop
@endsection
@section('content')

    <div class="row">
        <h3 class="mt-3 mb-0 pb-0">Featured Products</h3>
        <div class="owl-carousel feautured-carousel owl-theme">
            @forelse ($featureProducts as $featureProduct)
                <div class="col-3 item py-3">
                    <div class="card" style="width: 20rem;">
                        <img width="200" height="320" src='{{ asset("storage/$featureProduct->image") }}'
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">
                                {{ $featureProduct->name }}
                            </p>
                            <div>
                                <h6 class="float-end">${{ $featureProduct->selling_price }}.00</h6>
                                <h6 class="float-start"><s>${{ $featureProduct->original_price }}.00</s></h6>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
        </div>
        @endforelse
    </div>


    <div class="row">
        <h3 class="mt-3 mb-0 pb-0">Trending Categories</h3>
        <div class="owl-carousel feautured-carousel owl-theme">
            @forelse ($trendingCategories as $trendingCategory)
                <a href="{{ route('frontend.view.category', ['id' => $trendingCategory->id]) }}">
                    <div class="col-3 item py-3">
                        <div class="card" style="width: 20rem;">
                            <img width="200" height="280" src='{{ asset("storage/$trendingCategory->image") }}'
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">
                                    {{ $trendingCategory->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
        </div>
        @endforelse
    </div>






    @push('scripts')
        <script>
            $('.feautured-carousel').owlCarousel({
                loop: true,
                margin: 180,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            })
        </script>
    @endpush

@endsection
