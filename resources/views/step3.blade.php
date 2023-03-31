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
                                        <a href="{{ route ('step2.show',$token) }}"> ส่วนที่ 1 </a>
                                        <div class="node"></div>
                                    </div>
                                    <div class="step in-progress">
                                        <a href="{{ route('step3.show',$token) }}">ส่วนที่ 2-6</a>

                                        <div class="node"></div>
                                    </div>
                                    {{-- <div class="step in-progress">
                                        ส่วนที่ 5-6
                                        <div class="node"></div>
                                    </div> --}}
                                    <div class="step">
                                        ส่งใบสมัคร
                                        <div class="node"></div>
                                    </div>
                                    <div class="step">
                                        เสร็จสิ้น
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
                                @if ($data->registerstatus === '1')
                                <div class="alert alert-success">
                                    <ul>
                                        <li>การลงทะเบียนสมบูรณ์แล้วไม่สามารถแก้ไขได้อีก</li>
                                    </ul>
                                </div>
                                @php
                                    $readonly = 'readonly';
                                @endphp

                                @else
                                    @php
                                        $readonly = '';
                                    @endphp
                                @endif

                                <form method="post" action="{{ route('step3.save',$token)}}">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <span class="text text-info">{{$data->email}}</span>
                                    </div>
                                    <h6 class="text-primary">ข้อมูลส่วนที่ 2 : ประวัติการรับราชการ / การทำงาน</h6>
                                    @foreach ($data->part2 as $value)
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="personneltype[{{$value->id}}]" id="personneltype1" value="1" @if(old('personneltype',$value->personneltype)=="1") checked @endif>
                                                    <label class="form-check-label" for="personneltype1">
                                                    รับราชการ
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="personneltype[{{$value->id}}]" id="personneltype2" value="2" @if(old('personneltype',$value->personneltype)=="2") checked @endif>
                                                    <label class="form-check-label" for="personneltype2">
                                                    บริษัทเอกชน
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <label for="office" class="form-label">กระทรวง หรือ ชื่อบริษัท </label>
                                                <input type="text" placeholder="กรุณาพิมพ์ชื่อเต็ม เช่น กระทรวงการคลัง" class="form-control" name="office[{{$value->id}}]" value="{{ old('office',$value->office) }}" {{$readonly}}>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="division" class="form-label">กรม หรือ แผนก (สำหรับบริษัท)</label>
                                                <input type="text" placeholder="กรุณาพิมพ์ชื่อเต็ม เช่น กระทรวงการคลัง" class="form-control" name="division[{{$value->id}}]" value="{{ old('division',$value->division) }}" {{$readonly}}>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="position" class="form-label">ตำแหน่ง</label>
                                                <input type="text" placeholder="" class="form-control" name="position[{{$value->id}}]" value="{{ old('position',$value->position) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="positionlevel" class="form-label">ระดับ</label>
                                                <input type="text" class="form-control" name="positionlevel[{{$value->id}}]" value="{{ old('positionlevel',$value->positionlevel) }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="position2" class="form-label">ตำแหน่งปัจจุบันเทียบเท่าข้าราชการพลเรือน ประเภท</label>
                                                <input type="text" placeholder="ตำแหน่งปัจจุบันเทียบเท่าข้าราชการพลเรือน" class="form-control" name="position2[{{$value->id}}]" value="{{ old('position2',$value->position2) }}" {{$readonly}}>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="positionlevel2" class="form-label">ระดับ</label>
                                                <input type="text" class="form-control" name="positionlevel2[{{$value->id}}]" value="{{ old('positionlevel2',$value->positionlevel2) }}" {{$readonly}}>
                                            </div>

                                            {{-- @dd($data) --}}
                                        </div>
                                    @endforeach

                                    <hr>
                                    <h6 class="text text-primary">ข้อมูลส่วนที่ 3 : ประวัติการศึกษา</h6>
                                    <div class="row g-3">
                                        @foreach ($data->part3 as $value)

                                            <div class="col-md-2">
                                                <label for="edudegree" class="form-label">ระดับการศึกษา</label>
                                                <select class="form-select" aria-label="Default select education" name="edudegree[{{$value->id}}]" id="edudegree" >
                                                    <option value="">เลือก</option>
                                                    <option value="1" @if(old('edudegree',$value->edudegree)=="1") selected @endif>ปริญญาตรี</option>
                                                    <option value="2" @if(old('edudegree',$value->edudegree)=="2") selected @endif>ปริญญาโท</option>
                                                    <option value="3" @if(old('edudegree',$value->edudegree)=="3") selected @endif>ปริญญาเอก</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="eduqualification" class="form-label">วุฒิการศึกษา</label>
                                                <input type="text" class="form-control" name="eduqualification[{{$value->id}}]" value="{{ old('eduqualification',$value->eduqualification) }}" {{$readonly}}>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="eduinstitution" class="form-label">ชื่อสถาบันการศึกษา</label>
                                                <input type="text" class="form-control" name="eduinstitution[{{$value->id}}]" value="{{ old('eduinstitution',$value->eduinstitution) }}" {{$readonly}}>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="eduyear" class="form-label">ปีที่สำเร็จการศึกษา</label>
                                                <input type="text" class="form-control" name="eduyear[{{$value->id}}]" value="{{ old('eduyear',$value->eduyear) }}" {{$readonly}}>
                                            </div>

                                        @endforeach
                                    </div>
                                    <hr>
                                    <h6 class="text text-primary">ข้อมูลส่วนที่ 4 : การศึกษาอบรม/งานด้านบริหาร</h6>
                                    @foreach ($data->part4 as $value )
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="choices[{{$value->id}}]" id="choices1" value="1" @if(old('choices',$value->choices)=="1") checked @endif>
                                                    <label class="form-check-label" for="choices1">
                                                        อยู่ระหว่างการรอผลการสมัคร หรืออยู่ระหว่างการอบรมหลักสูตร
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="choices[{{$value->id}}]" id="choices2" value="2" @if(old('choices',$value->choices)=="2") checked @endif>
                                                    <label class="form-check-label" for="choices2">
                                                        ไม่อยู่ระหว่างการรอผลการสมัคร หรืออยู่ระหว่างการอบรมหลักสูตรใด (ให้ข้ามไปส่วนที่ 5)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="coursename" class="form-label">ชื่อหลักสูตรที่อบรม</label>
                                                <input type="text" placeholder="ชื่อหลักสูตร" class="form-control" name="coursename[{{$value->id}}]" value="{{ old('coursename',$value->coursename) }}" {{$readonly}}>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="generation" class="form-label">รุ่นที่</label>
                                                <input type="text"  class="form-control" name="generation[{{$value->id}}]" value="{{ old('generation',$value->generation) }}" {{$readonly}}>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="period" class="form-label">ระยะเวลา</label>
                                                <input type="text"  class="form-control" name="period[{{$value->id}}]" id="period" value="{{ old('generation',$value->generation) }}" {{$readonly}}>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="institution" class="form-label">สถาบันที่จัด</label>
                                                <input type="text"  class="form-control" name="institution[{{$value->id}}]" id="institution" value="{{ old('institution',$value->institution) }}" {{$readonly}}>
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr>
                                    <h6 class="text text-primary">ข้อมูลส่วนที่ 5 : ลักษณะของงานที่รับผิดชอบ</h6>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <textarea  class="form-control" name="jobdescript" id="jobdescript" {{$readonly}}>{{ old('jobdescript',$data->jobdescript) }}</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <h6 class="text text-primary">ข้อมูลส่วนที่ 6 : ความตั้งใจที่จะนำความรู้ที่ได้รับจากการศึกษาอบรมไปประยุกต์ใช้ประโยชน์ และแนวทางการดำเนินการ</h6>
                                    <div class="row g-3">
                                        <div class="col-md-4">

                                            <textarea  rows="3"  class="form-control" name="descriptapplyforjob" id="descriptapplyforjob" {{$readonly}}>{{ old('descriptapplyforjob',$data->descriptapplyforjob) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-8 text-center">
                                            <button type="submit" class="btn btn-primary mt-3">ไปต่อ <i
                                                    class="fa fa-thin fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </form>
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
        $("#prefix").autocomplete({
            source: availableTags
        });

        $(document).ready(function() {

            $("#birthdate").datepicker_thai({
                dateFormat: 'yy-mm-dd',
                showOn: 'button',
                buttonText: "...",
                buttonImage: "", // ใส่ path รุป
                buttonImageOnly: false,
                currentText: "วันนี้",
                closeText: "ปิด",
                showButtonPanel: true,
                showOn: "both",
                altField:"#h_dateinput",
                altFormat: "yy-mm-dd",
                langTh:true,
                yearTh:false,
                changeYear: true,
                // numberOfMonths: 3,
                yearRange: "-60:-20",
            });

            $("#birthdate").datepicker('setDate',`{{ $data->birthdate }}`)
        });
    </script>
@endpush
