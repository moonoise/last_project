@extends('layouts.app')
@push('style')
    <style>
        .wizard-progress {
            display: table;
            width: 100%;
            table-layout: fixed;
            position: relative;
        }

        .wizard-progress .step {
            display: table-cell;
            text-align: center;
            vertical-align: top;
            overflow: visible;
            position: relative;
            font-size: 14px;
            font-weight: bold;
        }

        .wizard-progress .step:not(:last-child):before {
            content: '';
            display: block;
            position: absolute;
            left: 50%;
            top: 37px;
            background-color: #fff;
            height: 6px;
            width: 100%;
        }

        .wizard-progress .step .node {
            display: inline-block;
            border: 6px solid #fff;
            background-color: #fff;
            border-radius: 18px;
            height: 18px;
            width: 18px;
            position: absolute;
            top: 25px;
            left: 50%;
            margin-left: -18px;
            box-sizing: unset;
        }

        .wizard-progress .step.complete:before {
            background-color: #07c;
        }

        .wizard-progress .step.complete .node {
            border-color: #07c;
            background-color: #07c;
            box-sizing: unset;
        }

        .wizard-progress .step.complete .node:before {
            box-sizing: unset;
            font-family: 'Kanit', sans-serif;
            content: "";
        }

        .wizard-progress .step.in-progress:before {
            background: #07c;
            background: -moz-linear-gradient(left, #07c 0%, #fff 100%);
            background: -webkit-linear-gradient(left, #07c 0%, #fff 100%);
            background: linear-gradient(to right, #07c 0%, #fff 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#07c", endColorstr="#fff", GradientType=1);
        }

        .wizard-progress .step.in-progress .node {
            border-color: #07c;
            box-sizing: unset;
        }
        /* calendar */
        .ui-tabs{
            font-family:tahoma;
            font-size:11px;
        }
        /* Overide css code กำหนดความกว้างของปฏิทินและอื่นๆ */
        .ui-datepicker{
            width:220px;
            font-family:tahoma;
            font-size:11px;
            text-align:center;
        }
        .ui-datepicker-trigger {
            border: 1px solid #cccccc;
            background: #ececec !important;
            padding: 0px;
        }

    </style>
@endpush
@section('title', 'หน้าแรก')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex bd-highlight mb-3">
                            <div class="p-2 bd-highlight">

                                <div class="wizard-progress">
                                    <div class="step complete">
                                        ระบุ อีเมล
                                        <div class="node"></div>
                                    </div>
                                    <div class="step complete">
                                        <a href="{{ route ('step2.show',$token) }}">ส่วนที่ 1 </a>
                                        <div class="node"></div>
                                    </div>
                                    <div class="step complete">
                                        <a href="{{ route('step3.show',$token) }}">ส่วนที่ 2-6</a>

                                        <div class="node"></div>
                                    </div>
                                    <div class="step complete">

                                        <a href="{{ route('step4.show',$token) }}">ส่งใบสมัคร</a>
                                        <div class="node"></div>
                                    </div>
                                    <div class="step complete">
                                        <a href="{{ route('step5.show',$token) }}">เสร็จสิ้น</a>
                                        <div class="node"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row justify-content-md-left">
                            <div class="col-md-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <p class="text text-center"><a href="{{ route('printpreview.show',$token) }}" class="btn btn-info btn-center">ปริ้นใบสมัคร</a></p>
                                {{-- @dd($data->part2) --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="{{ asset('title_name.js') }}"></script>
    <script src="{{ asset('js/jqueryui_datepicker_thai_min.js') }}"></script>
    <script>

    </script>
@endpush
