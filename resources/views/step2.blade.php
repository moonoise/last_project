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
                                    <div class="step in-progress">
                                        <a href="{{ route ('step2.show',$token) }}"> ส่วนที่ 1 </a>
                                        <div class="node"></div>
                                    </div>
                                    <div class="step">
                                        ส่วนที่ 2-6
                                        <div class="node"></div>
                                    </div>
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
                                <form action="{{ route('step2.save',$token) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <span class="text text-info">{{ $data->email }} </span>
                                    </div>
                                    <h6 class="text-primary">ข้อมูลส่วนที่ 1 : ข้อมูลของผู้สมัคร (ภาษาไทย)</h6>
                                    <div class="row g-3">
                                        <div class="col-md-2">
                                            <label for="prefix" class="form-label">คำนำหน้า</label>
                                            <input class="form-control" id="prefix" placeholder="" name="prefix" value="{{ old('prefix',$data->prefix)}}" {{$readonly}}>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="fname" class="form-label">ชื่อ</label>
                                            <input type="text" class="form-control" name="fname" value="{{ old('fname',$data->fname) }}" {{$readonly}}>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="lname" class="form-label">สกุล</label>
                                            <input type="text" class="form-control" name="lname" value="{{ old('lname',$data->lname) }}" {{$readonly}}>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="nickname" class="form-label">ชื่อเล่น</label>
                                            <input type="text" class="form-control" name="nickname" value="{{ old('nickname',$data->nickname) }}" {{$readonly}}>
                                        </div>
                                        {{-- row --}}
                                        <div class="col-md-3">
                                            <label for="birthdate" class="form-label">วันเกิด</label>
                                            <div class="d-flex flex-row">
                                                <input type="text" class="form-control" id="birthdate" placeholder=""
                                                    name="birthdate" value="{{ old('birthdate',$data->birthdate) }}" {{$readonly}}>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="age" class="form-label">อายุ</label>
                                            <div class="d-flex flex-row">
                                                <input type="number" min="20" max="60" class="form-control" id="age"
                                                    name="age" value="{{ old('age', $data->age) }}" {{$readonly}}>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="religion" class="form-label">ศาสนา</label>
                                            <div class="d-flex flex-row">
                                                <input type="text" class="form-control" id="religion"
                                                    name="religion" value="{{ old('religion',$data->religion) }}" {{$readonly}}>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="bloodtype" class="form-label">กรุ๊ปเลือด</label>
                                            <div class="d-flex flex-row">
                                                <input type="text" class="form-control" id="bloodtype" list="bloodtypeList"
                                                    name="bloodtype" value="{{ old('bloodtype',$data->bloodtype)}}" {{$readonly}}>
                                                <datalist id="bloodtypeList">
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="idcard" class="form-label">เลขที่บัตรประชาชน</label>
                                            <div class="d-flex flex-row">
                                                <input type="text" class="form-control" id="idcard" placeholder="ใส่เฉพาะตัวเลขเท่านั้น"
                                                    name="idcard" value="{{ old('idcard',$data->idcard) }}" {{$readonly}}>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="royalorchidplusno" class="form-label">Royal Orchid Plus No</label>
                                            <div class="d-flex flex-row">
                                                <input type="text" class="form-control" id="royalorchidplusno"
                                                    name="royalorchidplusno" value="{{ old('royalorchidplusno',$data->royalorchidplusno) }}" {{$readonly}}>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="congenitaldisease" class="form-label">โรคประจำตัว</label>
                                            <div class="d-flex flex-row">
                                                <input type="text" class="form-control" id="congenitaldisease"
                                                    name="congenitaldisease" value="{{ old('congenitaldisease',$data->congenitaldisease) }}" {{$readonly}}>
                                            </div>
                                        </div>
                                        {{-- row --}}

                                        <div class="col-md-3">
                                            <label for="email" class="form-label">อีเมล</label>
                                            <div class="d-flex flex-row">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-solid fa-envelope"></i></span>
                                                    <input type="text" class="form-control" id="email"
                                                    name="email" aria-label="email" value="{{ old('email',$data->email) }} " readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="lineid" class="form-label">LINE ID</label>
                                            <div class="d-flex flex-row">
                                                <div class="input-group">
                                                    <span class="input-group-text" ><i class="fas fa-comments"></i></span>
                                                    <input type="text" class="form-control" id="lineid" name="lineid" value="{{ old('lineid',$data->lineid) }}" {{$readonly}}>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="telephone" class="form-label">โทรศัพท์ที่ทำงาน</label>
                                            <div class="d-flex flex-row">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                    <input type="number" class="form-control" id="telephone"
                                                    name="telephone" value="{{ old('telephone',$data->telephone) }}" {{$readonly}}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="mobile" class="form-label">โทรศัพท์มือถือ</label>
                                            <div class="d-flex flex-row">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                                    <input type="number" class="form-control" id="mobile"
                                                    name="mobile" value="{{ old('mobile',$data->mobile) }}" {{$readonly}}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="fax" class="form-label">fax</label>
                                            <div class="d-flex flex-row">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-fax"></i></span>
                                                    <input type="number" class="form-control" id="fax"
                                                    name="fax" value="{{ old('fax',$data->fax) }}" {{$readonly}}>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="homeaddress" class="form-label">ที่อยู่อาศัย</label>
                                            <div class="d-flex flex-row">
                                                <textarea class="form-control" name="homeaddress" id="homeaddress"  rows="2" {{$readonly}}>{{ old('homeaddress',$data->homeaddress) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="workingaddress" class="form-label">ที่อยู่ที่ทำงาน</label>
                                            <div class="d-flex flex-row">
                                                <textarea class="form-control" name="workingaddress" id="workingaddress"  rows="2" {{$readonly}}>{{ old('workingaddress',$data->workingaddress) }}</textarea>
                                            </div>
                                        </div>
                                        {{-- row --}}
                                        <hr>
                                        <div class="col-md-4">
                                            <label for="personfullname" class="form-label">บุคคลที่ติดต่อได้ในกรณีฉุกเฉิน</label>
                                            <input type="text" class="form-control" name="personfullname" value="{{ old('personfullname',$data->personfullname) }}" {{$readonly}}>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="personrelationship" class="form-label">ความสัมพันธ์</label>
                                            <input type="text" class="form-control" name="personrelationship" value="{{ old('personrelationship',$data->personrelationship) }}" {{$readonly}}>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="personmobile" class="form-label">โทรศัพท์มือถือ</label>
                                            <div class="d-flex flex-row">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                                    <input type="number" class="form-control" id="personmobile"
                                                    name="personmobile" value="{{ old('personmobile',$data->personmobile) }}" {{$readonly}}>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h6 class="text text-primary">ภาษาอังกฤษ</h6>
                                        <div class="col-md-2">
                                            <label for="enprefix" class="form-label">title</label>
                                            <input class="form-control" id="enprefix" placeholder="" name="enprefix" value="{{ old('enprefix',$data->enprefix) }}" {{$readonly}}>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="enfname" class="form-label">name</label>
                                            <input type="text" class="form-control" name="enfname" value="{{ old('enfname',$data->enfname) }}" {{$readonly}}>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="enlname" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="enlname" value="{{ old('enlname',$data->enlname)}}" {{$readonly}}>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="enposition" class="form-label">Position</label>
                                            <input type="text" class="form-control" name="enposition" value="{{ old('enposition',$data->enposition) }}" {{$readonly}}>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="endivision" class="form-label">Division / Bureau</label>
                                            <input type="text" class="form-control" name="endivision" value="{{ old('endivision',$data->endivision) }}" {{$readonly}}>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="endepartment" class="form-label">Department</label>
                                            <input type="text" class="form-control" name="endepartment" value="{{ old('endepartment',$data->endepartment) }}" {{$readonly}}>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="enministry" class="form-label">Ministry</label>
                                            <input type="text" class="form-control" name="enministry" value="{{ old('enministry',$data->enministry) }}" {{$readonly}}>
                                        </div>

                                    </div>
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-8 text-center">
                                            <button type="submit" class="btn btn-primary mt-3">ไปต่อ <i
                                                    class="fa fa-thin fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </form>

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
