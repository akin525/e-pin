@include('layouts.sidebar')

<div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-white"><i class='bx bx-bookmark-heart'></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-white">Notice Alerts</h6>
            <div class="text-white">Always check the availability of each network before making any order</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="row">
<div class="col">
    <div class="card radius-10 overflow-hidden">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <p class="mb-0">MTN</p>
                    <h1 class="mb-0"><b>Availability</b></h1>
                </div>
                <div class="ms-auto">	<i class='bx bx-cart font-30'></i>
                </div>
            </div>
            <h6>₦100 -{{$mtn['100']}}</h6>
            <h6>₦200 -{{$mtn['200']}}</h6>
            <h6>₦500 -{{$mtn['500']}}</h6>
        </div>

    </div>
</div>
<div class="col">
    <div class="card radius-10 overflow-hidden">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <p class="mb-0">GLO</p>
                    <h5 class="mb-0"><b>Availability</b></h5>
                </div>
                <div class="ms-auto">	<i class='bx bx-cart font-30'></i>
                </div>
            </div>
            <h6>₦100 -{{$glo['100']}}</h6>
            <h6>₦200 -{{$glo['200']}}</h6>
            <h6>₦500 -{{$glo['500']}}</h6>
        </div>
    </div>
</div>
<div class="col">
    <div class="card radius-10 overflow-hidden">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <p class="mb-0">9MOBILE</p>
                    <h5 class="mb-0"><b>Availability</b></h5>
                </div>
                <div class="ms-auto">	<i class='bx bx-cart font-30'></i>
                </div>
            </div>
            <h6>₦100 -{{$ninemobile['100']}}</h6>
            <h6>₦200 -{{$ninemobile['200']}}</h6>
            <h6>₦500 -{{$ninemobile['500']}}</h6>
        </div>
    </div>
</div>
<div class="col">
    <div class="card radius-10 overflow-hidden">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <p class="mb-0">AIRTEL</p>
                    <h5 class="mb-0"><b>Availability</b></h5>
                </div>
                <div class="ms-auto">	<i class='bx bx-cart font-30'></i>
                </div>
            </div>
            <h6>₦100 -{{$airtel['100']}}</h6>
            <h6>₦200 -{{$airtel['200']}}</h6>
            <h6>₦500 -{{$airtel['500']}}</h6>
        </div>
    </div>
</div>
</div>
<div class="row">
    @if (session('status'))
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Error Alerts</h6>
                    <div class="text-white">{{session('status')}}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="alert border-0 border-start border-5 border-info alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="font-35 text-info"><i class='bx bx-info-square'></i>
            </div>
            <div class="ms-3">
                <h2 class="mb-0 text-info"> How to Make Order</h2>
                <div>To make your oder, kindly do the following</div>
                <h6>1. Select Network e.g MTN, GLO, ..</h6>
                <h6>2. Select Amount e.g 100, 200, 500</h6>
                <h6>3. Type in your quantity e.g 10, 30, 50</h6>
                <h6>5a. Click on Order Now to get it instantly and follow promptly</h6>
                <h6></h6>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="col-12 col-lg-4">
        <div class="card radius-10">
            <div class="card-body">
                <h2>Generate E-pins</h2>
                    <h5>Kindly choose below to order rightly.</h5>
                <br>
                <form class="row g-3" method="POST" action="{{ route('getpin') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Network</label>
                        </div>
                        <select name="network" class="form-control" id="inputGroupSelect01" required="">
                            <option selected="">Choose...</option>
                            <option value="MTN">MTN</option>
                            <option value="9MOBILE">9MOBILE</option>
                            <option value="GLO">GLO</option>
                            <option value="AIRTEL">AIRTEL</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <select name="amount" class="form-control" id="inputGroupSelect02" required="">
                            <option selected="">Choose...</option>
                            <option value="100">#100</option>
                            <option value="200">#200</option>
                            <option value="500">#500</option>
                        </select>
                        <div class="input-group-append">
                            <label class="input-group-text" for="inputGroupSelect02">Denomination</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Quantity</label>
                        </div>
                        <input name="quantity" type="number" min="1" max="5" class="form-control" required="">
                    </div>
{{--                    <div class="d-grid gap-2">--}}
                        <button type="submit" class="btn btn-primary" style="background-color: #ff0066;"><i class="bx bxs-cart"></i>Make Order now</button>
{{--                    </div>--}}
                </form>
                <br>
                <div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><i class='bx bx-bookmark-heart'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Notice</h6>
                            <div class="text-white">Note that You can request for a website after you upgrade. You will have access Print any network reacharge card on your own </div>
                        </div>
                    </div>
                    <button type="button" class=" btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12 col-lg-8">
        <div class="card radius-10">
            <div class="card-body">
                <style>
                    img {
                        max-width: 100%;
                        height: auto;
                    }
                </style>
                <div class="card-body">
                    <div class="center">
                        <img    src="{{asset('assets/images/epins.jpg')}}" alt="#" />
                    </div>
                </div>

                <br>


            </div>
        </div>
    </div>

</div>



<h6 class="mb-0 text-uppercase text-center">Download Card Sample</h6>
<hr/>
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <a href="{{route('sample')}}">
{{--                        <i class="bx bxs-download"></i>--}}
                        <h4 class="my-1">Sample 1</h4>
                        <p class="mb-0 font-13 text-success"><i class="bx bxs-download align-middle"></i>Recharge Card Sample2.pdf</p>
                    </a>
                    <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-download"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <a href="#">
                        {{--                        <i class="bx bxs-download"></i>--}}
                        <h4 class="my-1">Sample 2</h4>
                        <p class="mb-0 font-13 text-success"><i class="bx bxs-download align-middle"></i>Recharge Card Sample2.pdf</p>
                    </a>
                    <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-download"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <a href="#">
                        {{--                        <i class="bx bxs-download"></i>--}}
                        <h4 class="my-1">Sample 3</h4>
                        <p class="mb-0 font-13 text-success"><i class="bx bxs-download align-middle"></i>Recharge Card Sample2.pdf</p>
                    </a>
                    <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-download"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <a href="#">
                        {{--                        <i class="bx bxs-download"></i>--}}
                        <h4 class="my-1">Sample 4</h4>
                        <p class="mb-0 font-13 text-success"><i class="bx bxs-download align-middle"></i>Recharge Card Sample2.pdf</p>
                    </a>
                    <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-download"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@include('layouts.footer')
