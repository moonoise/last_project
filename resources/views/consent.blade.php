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
                                <small class="text text-danger">กรุณากรอกข้อมูลให้ถูกต้องและครบถ้วน และไม่ปิดหน้าจอนี้จนกว่าจะบันทึกใบสมัครเรียบร้อย </small>
                                <div class="wizard-progress">
                                    <div class="step complete">
                                        <a href="/registeremail">ระบุ อีเมล</a>
                                        <div class="node"></div>
                                    </div>
                                    <div class="step complete">
                                        ส่วนที่ 1
                                        <div class="node"></div>
                                    </div>
                                    <div class="step complete">
                                        ส่วนที่ 2-3-4
                                        <div class="node"></div>
                                    </div>
                                    <div class="step in-progress">
                                        ส่วนที่ 5-6
                                        <div class="node"></div>
                                    </div>
                                    <div class="step">
                                        ส่งใบสมัคร
                                        <div class="node"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row justify-content-md-center">
                            <div class="col-md-8">
                                <label for="exampleFormControlTextarea1" class="form-label">นโยบายการคุ้มครองข้อมูลส่วนบุคคล (Privacy Policy)</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="20">
                                    ข้อกำหนดและเงื่อนไข

                                        ข้อกำหนดและเงื่อนไขฉบับนี้ ถือเป็นข้อตกลงระหว่าง …………………………………………………………………………………..

                                        คำนิยาม

                                        “บริการ” หมายถึง บริการของผู้ให้บริการภายใต้ข้อกำหนดและเงื่อนไขฉบับนี้

                                        “ผู้ให้บริการ” หมายถึง …………………………………………………………………………….

                                        ข้าพเจ้าเข้าใจดีว่า ผู้ให้บริการ จะเก็บรวบรวม ใช้ และเปิดเผยข้อมูลส่วนบุคคลของข้าพเจ้า เพื่อวัตถุประสงค์ในการให้บริการตามสัญญานี้ การวิเคราะห์ข้อมูลเพื่อวางแผนทางการตลาด การนำเสนอสินค้าและบริการอื่นๆ ของผู้ให้บริการแก่ข้าพเจ้า รวมถึงวัตถุประสงค์อื่นๆ ตามที่ผู้ให้บริการเห็นสมควร

                                        ข้าพเจ้ารับทราบดีกว่า หากข้าพเจ้าไม่ตกลงยอมรับข้อกำหนดและเงื่อนไขนี้ ผู้ให้บริการสงวนสิทธิไม่ให้บริการแก่ข้าพเจ้าได้

                                        ลงชื่อ ……………………………………………………………
                                </textarea>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-md-8 text-center">
                                <button type="button" class="btn btn-primary mt-3">ยินยอม</button>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush
