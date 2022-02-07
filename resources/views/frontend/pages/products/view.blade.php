@extends('layouts.front_layout')
@section('title')
    e-shop
@endsection
@section('content')

    <div class="card shadow-lg p-3 mb-5 bg-body rounded text-left">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <img class="card-img-top" style="width: 300px" height="300"
                        src="https://cms-assets.tutsplus.com/cdn-cgi/image/width=850/uploads/users/1223/posts/38083/image-upload/Xton.jpg"
                        alt="">
                </div>
                <div class="col-8">
                    <div class="d-flex  justify-content-between">
                        <h4 class="card-title">Title</h4>
                        <button class="btn btn-danger text-right">Title</button>
                    </div>
                    <hr>
                    <div>
                        <label class="d-inline p-2" for="">Original Price: Rs <s>1500</s> </label>
                        <b class="d-inline p-2" for="">Selling Price Rs: <s>1500</s> </b>
                    </div>
                    <div>
                        <label class="p-2" for="">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit
                            exercitationem ullam cum labore. Quasi quos, laboriosam libero aspernatur nulla alias ratione
                            porro commodi, nam aut asperiores sunt, fugit aperiam sint!
                        </label>
                    </div>
                    <hr>
                    <div>
                        <span class="badge bg-success">In Stock</span>
                    </div>
                    <div class="row">
                        <label for="">Qty</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
