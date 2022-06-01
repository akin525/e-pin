<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('assets/images/pri.png')}}" type="image/png" />
    <!--plugins-->
    <link href="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/header-colors.css')}}" />
    <title>{{Auth::user()->name}}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
<!--wrapper-->
<style>
    .wrapper {
        width: 100%;
        position: relative
    }
    .page-content {
        padding: 1.5rem 1.5rem 0.7rem 1.5rem
    }
    .row {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(var(--bs-gutter-y) * -1);
        margin-right: calc(var(--bs-gutter-x)/ -2);
        margin-left: calc(var(--bs-gutter-x)/ -2)
    }
    .row>* {
        flex-shrink: 0;
        width: 100%;
        max-width: 100%;
        padding-right: calc(var(--bs-gutter-x)/ 2);
        padding-left: calc(var(--bs-gutter-x)/ 2);
        margin-top: var(--bs-gutter-y)
    }
    .col {
        flex: 1 0 0%
    }
    .row-cols-auto>* {
        flex: 0 0 auto;
        width: auto
    }
    .row-cols-1>* {
        flex: 0 0 auto;
        width: 100%
    }
    .row-cols-2>* {
        flex: 0 0 auto;
        width: 50%
    }
    .row-cols-3>* {
        flex: 0 0 auto;
        width: 33.3333333333%
    }
    .row-cols-4>* {
        flex: 0 0 auto;
        width: 25%
    }
    .row-cols-5>* {
        flex: 0 0 auto;
        width: 20%
    }
    .row-cols-6>* {
        flex: 0 0 auto;
        width: 16.6666666667%
    }
    .col-auto {
        flex: 0 0 auto;
        width: auto
    }
    .col-1 {
        flex: 0 0 auto;
        width: 8.3333333333%
    }
    .col-2 {
        flex: 0 0 auto;
        width: 16.6666666667%
    }
    .col-3 {
        flex: 0 0 auto;
        width: 25%
    }
    .col-4 {
        flex: 0 0 auto;
        width: 33.3333333333%
    }
    .col-5 {
        flex: 0 0 auto;
        width: 41.6666666667%
    }
    .col-6 {
        flex: 0 0 auto;
        width: 50%
    }
    .col-7 {
        flex: 0 0 auto;
        width: 58.3333333333%
    }
    .col-8 {
        flex: 0 0 auto;
        width: 66.6666666667%
    }
    .col-9 {
        flex: 0 0 auto;
        width: 75%
    }
    .col-10 {
        flex: 0 0 auto;
        width: 83.3333333333%
    }
    .col-11 {
        flex: 0 0 auto;
        width: 91.6666666667%
    }
    .col-12 {
        flex: 0 0 auto;
        width: 100%
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid transparent;
        border-radius: .25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    }

    .radius-10 {
        border-radius: 10px
    }

    .card-body {
        flex: 1 1 auto;
        padding: 1rem 1rem
    }
    .d-flex {
        display: flex!important
    }
    .align-items-center {
        align-items: center!important
    }
    .mb-0 {
        margin-bottom: 0!important
    }
    .text-secondary {
        color: #6c757d!important
    }
    .my-1 {
        margin-top: .25rem!important;
        margin-bottom: .25rem!important
    }
    .font-13 {
        font-size: 13px
    }
    .text-success {
        color: #15ca20!important
    }
    .bxs-up-arrow:before {
        content: "\ee2d"
    }
    .bx {
        font-family: boxicons!important;
        font-weight: 400;
        font-style: normal;
        font-variant: normal;
        line-height: inherit;
        display: inline-block;
        text-transform: none;
        speak: none;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale
    }
    .widgets-icons {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ededed;
        font-size: 26px;
        border-radius: 10px
    }

    .bg-light-success {
        background-color: rgb(23 160 14 / .11)!important
    }

</style>
<div class ="wrapper">

{{--    <div class="page-wrapper">--}}
        <div class="page-content">
                <div class="row">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                @foreach($pin as $pi)
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Primedata Company</p>
                                    <h4 class="my-1">Ref No: 2J0997u100n036  ₦{{$pi['amount']}}</h4>
                                    <h2 class="my-1"><b>PIN</b>: {{$pi['pin']}}</h2>
                                    <h2 class="my-1">Serial No: {{$pi['serial']}}</h2>
                                    <h2 class="my-1">Expiry Date: {{$pi['expiry']}}</h2>
                                    <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i>Prime</p>
                                </div>
                                <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-wallet"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
</div>


