@include('layouts.sidebar')

<!--end breadcrumb-->
<div class="">
        <hr>
        <div class="container py-2">
            <h2 class="font-weight-light text-center text-muted py-3">Funding History</h2>
            <!-- timeline item 1 -->
            @foreach($fund as $po)
                <div class="row">
                    <div class="col-auto text-center flex-column d-none d-sm-flex">
                        <div class="row h-50">
                            <div class="col border-end">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                        <h5 class="m-2">
                            <span class="badge rounded-pill bg-primary">&nbsp;</span>
                        </h5>
                        <div class="row h-50">
                            <div class="col border-end">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                    </div>
                    <div class="col py-2">
                        <div class="card border-primary shadow radius-15">
                            <div class="card-body">
                                <div class="float-end text-primary">{{$po->created_at}}</div>
                                <h4 class="card-title text-primary">{{$po->username}}</h4>
                                <p class="card-text">Your wallet was funded with ₦{{$po->amount}} with Paystack</p>
                                <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-target="#t2_details" data-bs-toggle="collapse">Show Details ▼</button>
                                <div class="collapse border" id="t2_details">
                                    <div class="p-2 text-monospace">
                                        <div>Amount: ₦{{$po->amount}}</div>
                                        <div>Amount Before: ₦{{$po->iwallet}}</div>
                                        <div>Amount After: ₦{{$po->fwallet}}</div>
                                        <div>Date: {{$po->created_at}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
        {{$fund->links()}}

        </div>
    </div>
</div>

@include('layouts.footer')
