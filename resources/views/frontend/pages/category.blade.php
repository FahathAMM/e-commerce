@extends('layouts.front_layout')
@section('title')
    E-Shop
@endsection
@section('content')
    <div class="row">
        <h3 class="mt-3 mb-0 pb-0">Categories</h3>
        <div class="owl-carousel feautured-carousel owl-theme">
            @forelse ($Categories as $Category)
                <div class="col-3 item py-3">
                    <a href="{{ route('frontend.view.category', ['id' => $Category->slug]) }}">
                        <div class="card" style="width: 20rem;">
                            <img width="200" height="320" src='{{ asset("storage/$Category->image") }}'
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">
                                    {{ $Category->description }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <p>no data</p>
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
