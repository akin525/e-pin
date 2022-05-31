@include('layouts.sidebar')

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
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <!--                                        <h4 class="font-weight-bold mb-0">--><?php //echo $name; ?><!--</h4>-->
            </div>
        </div>
        <!--                    <div class="col-xl-9 col-md-8">-->
        <div class="col-12 grid-margin stretch-card">
            <div class="card corona-gradient-card">
                <div class="card-body py-0 px-0 px-sm-3">

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <br>
                <br>
                <div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><i class='bx bx-bookmark-heart'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Notice</h6>
                            <div class="text-white">₦1,000 Will be charged to Subscribe to epin plan</div>
                            <div class="text-white">Note that You can request for a website after you upgrade. You will have access Print any network reacharge card on your own </div>
                        </div>
                    </div>
                    <button type="button" class=" btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        </div>
        <br>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="chart-container-0">
                                <div class="card-body">
                                    <div class="card card-body">
                                        <div class="card radius-10 bg-success">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-0 text-white">Balance</p>
                                                        <h3 class="my-1 text-white">₦{{number_format(intval(Auth::user()->wallet *1),2)}}</h3>
                                                        {{--                        <p class="mb-0 font-13 text-white"><i class="bx bxs-up-arrow align-middle"></i>$34 from last week</p>--}}
                                                    </div>
                                                    <div class="widgets-icons bg-white text-success ms-auto"><i class="bx bxs-wallet"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title">Plan Fee</h4>
                                <!--                        --><?php
                                //                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                //
                                //                            $amou=intval(mysqli_real_escape_string($con,$_POST['amount']));
                                //
                                //                            print "
                                //                    <script>
                                //                        window.location = 'fun.php?amount=$amou';
                                //                    </script>
                                //                    ";
                                //                        }
                                //                        ?>
                                <form  action="{{route('plan')}}" method="post"  >
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="number"  class="form-control" name="amount" value="1000" required readonly/>
                                        </div>
                                    </div>
                            <button class="btn btn-outline-info " type="submit">Upgrade Now</button>
                            </form>
                            </div>
                            <div class="alert border-0 border-start border-5 border-info alert-dismissible fade show py-2">
                                <div class="d-flex align-items-center">
                                    <div class="font-35 text-info"><i class='bx bx-info-square'></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0 text-info">Notice</h6>
                                        <div>Kindly fund your wallet with paystack button | if any issue kindly contact our support</div>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
        </div><!--end row-->


@include('layouts.footer')
