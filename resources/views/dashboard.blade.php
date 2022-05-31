@include("layouts.sidebar")

<div class="row">

    @if (session('status1'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Success Alerts</h6>
                    <div class="text-white">{{session('status1')}}!</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(Auth::user()->plan ==0)
    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-dark">Warning Alerts</h6>
                <div class="text-dark">Please Kindly Pay ₦1000 To Subscribe For Reacharge-Card Printing
                <a href="{{url('upgrade')}}" class="btn btn-primary">Click Here</a>
                </div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @else
        <div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">User Plan</h6>
                    <div class="text-white">You Are On Retailer Plan</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-12 col-lg-8">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Sales Overview</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="chart-container-0">
                    <canvas id="chart71"></canvas>


                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="card radius-10">
            <div class="card-body">
                <div class="chart-container-0">
                    <div class="card-body">
                        <h4 class="card-title">Enter Amount Below</h4>
                        <form  action="" method="post" id="paymentForm" >
                            <div class="form-group">
                                <div class="input-group mb-3">
                                        <label class="form-control">NGN</label>
                                    <input type="number" min="200" maxlength="4" class="form-control" name="amount" id="amount" placeholder="00.00" required/>
                                </div>

                            </div>
                            <input type="hidden"  id="email-address" value="{{Auth::user()->email}}">
                    </div>
                    <center>
                <button class="btn btn-outline-success btn-block " type="submit" onclick="payWithPaystack()">Click Fund With Paystack</button>
                <script src="https://js.paystack.co/v1/inline.js"> </script>
                    </center>
                        <br>
                    </form>
                    @if (session('status'))
                        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-white">Success Alerts</h6>
                                    <div class="text-white">{{session('status')}}!</div>
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
                                <h6 class="mb-0 text-info">Notice</h6>
                                <div>Kindly fund your wallet with paystack button | if any issue kindly contact our support</div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
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
    <div class="col">
        <div class="card radius-10 bg-info">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-dark">Total Deposit</p>
                        <h3 class="my-1 text-dark">₦{{number_format(intval($totaldeposite *1),2)}}</h3>
{{--                        <p class="mb-0 font-13 text-dark"><i class="bx bxs-up-arrow align-middle"></i>$24 from last week</p>--}}
                    </div>
                    <div class="widgets-icons bg-white text-dark ms-auto"><i class="bx bxs-wallet"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Total Order</p>
                        <h3 class="my-1 text-white">₦{{number_format(intval(0 *1),2)}}</h3>
{{--                        <p class="mb-0 font-13 text-white"><i class="bx bxs-down-arrow align-middle"></i>$34 from last week</p>--}}
                    </div>
                    <div class="widgets-icons bg-white text-danger ms-auto"><i class="bx bxs-cart"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-dark">Total Transaction</p>
                        <h3 class="my-1 text-dark">₦{{number_format(intval(0 *1),2)}}</h3>
{{--                        <p class="mb-0 font-13 text-dark"><i class="bx bxs-down-arrow align-middle"></i>12.2% from last week</p>--}}
                    </div>
                    <div class="widgets-icons bg-white text-dark ms-auto"><i class='bx bx-wallet'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);
    function payWithPaystack(e) {
        e.preventDefault();
        let handler = PaystackPop.setup({
            key: 'pk_test_91772cfd1588c421d1253b8012a4e408a1b324bc', // Replace with your public key
            email: document.getElementById("email-address").value,
            amount: document.getElementById("amount").value * 100,
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
// label: "Optional string that replaces customer email"
            onClose: function(){
                alert('Window closed.');
            },
            callback: function(response){
                let message = 'Payment complete! Reference: ' + response.reference;
                // alert(message);


                window.location = '{{ route('tran', '/') }}/'+response.reference;

            }
        });
        handler.openIframe();
    }
</script>

@include('layouts.footer')
