@extends('layouts.app')
@push('style')

@endpush
@section('title', 'preview')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
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
                                {{-- @dd($check) --}}
                                @empty(!$check)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($check as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endempty
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
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <span class="text text-info">{{ $data->email }}</span>
                                </div>
                                <h6 class="text text-primary">ข้อมูลส่วนที่ 1 : ข้อมูลของผู้สมัคร (ภาษาไทย)</h6>
                                <dl class="row">
                                    <dt class="col-sm-3">ชื่อ-สกุล</dt>
                                    <dd class="col-sm-9">{{ $data->prefix }}{{ $data->fname }} {{ $data->lname }}
                                        @empty(!$data->nickname)
                                            ({{ $data->nickname }})
                                        @endempty
                                    </dd>

                                    <dt class="col-sm-3">เลขที่บัตรประชาชน</dt>
                                    <dd class="col-sm-9">{{ $data->idcard }}</dd>
                                    <dt class="col-sm-3">วันเกิด</dt>
                                    <dd class="col-sm-9">{{ $data->birthdate }}</dd>
                                    <dt class="col-sm-3">อายุ</dt>
                                    <dd class="col-sm-9">{{ $data->age }}</dd>
                                    <dt class="col-sm-3">ศาสนา</dt>
                                    <dd class="col-sm-9">{{ $data->religion }}</dd>
                                    <dt class="col-sm-3">กรุ๊ปเลือด</dt>
                                    <dd class="col-sm-9">{{ $data->bloodtype }}</dd>

                                    <dt class="col-sm-3">Royal Orchid Plus No</dt>
                                    <dd class="col-sm-9">{{ $data->royalorchidplusno }}</dd>
                                    <dt class="col-sm-3">โรคประจำตัว</dt>
                                    <dd class="col-sm-9">{{ $data->congenitaldisease }}</dd>

                                    <dt class="col-sm-3">LINE ID</dt>
                                    <dd class="col-sm-9">{{ $data->lineid }}</dd>
                                    <dt class="col-sm-3">โทรศัพท์ที่ทำงาน</dt>
                                    <dd class="col-sm-9">{{ $data->telephone }}</dd>
                                    <dt class="col-sm-3">โทรศัพท์มือถือ</dt>
                                    <dd class="col-sm-9">{{ $data->mobile }}</dd>
                                    <dt class="col-sm-3">fax</dt>
                                    <dd class="col-sm-9">{{ $data->fax }}</dd>

                                    <dt class="col-sm-3">ที่อยู่อาศัย</dt>
                                    <dd class="col-sm-9">{{ $data->homeaddress }}</dd>
                                    <dt class="col-sm-3">ที่อยู่ที่ทำงาน</dt>
                                    <dd class="col-sm-9">{{ $data->workingaddress }}</dd>

                                    <dt class="col-sm-3">บุคคลที่ติดต่อได้ในกรณีฉุกเฉิน</dt>
                                    <dd class="col-sm-9">{{ $data->personfullname }}</dd>
                                    <dt class="col-sm-3">ความสัมพันธ์</dt>
                                    <dd class="col-sm-9">{{ $data->personrelationship }}</dd>
                                    <dt class="col-sm-3">โทรศัพท์มือถือ</dt>
                                    <dd class="col-sm-9">{{ $data->personmobile }}</dd>

                                    <dt class="col-sm-3">Full name</dt>
                                    <dd class="col-sm-9">{{ $data->enprefix }}{{ $data->enfname }} {{ $data->enlname }}
                                    </dd>
                                    <dt class="col-sm-3">Position</dt>
                                    <dd class="col-sm-9">{{ $data->enposition }}</dd>
                                    <dt class="col-sm-3">Division / Bureau</dt>
                                    <dd class="col-sm-9">{{ $data->endivision }}</dd>
                                    <dt class="col-sm-3">Department</dt>
                                    <dd class="col-sm-9">{{ $data->endepartment }}</dd>
                                    <dt class="col-sm-3">Ministry</dt>
                                    <dd class="col-sm-9">{{ $data->enministry }}</dd>
                                </dl>

                                <h6 class="text text-primary">ข้อมูลส่วนที่ 2 : ประวัติการรับราชการ / การทำงาน</h6>
                                <dl class="row">
                                    @php
                                        $t = ['1' => 'รับราชการ', '2' => 'บริษัทเอกชน'];
                                    @endphp
                                    @foreach ($data->part2 as $value)
                                        <dt class="col-sm-3">รับราชการ/บริษัทเอกชน </dt>
                                        @empty(!$value->personneltype)
                                         <dd class="col-sm-9">{{ $t[$value->personneltype] }}</dd>
                                        @endempty
                                        <dt class="col-sm-3">กระทรวง หรือ ชื่อบริษัท </dt>
                                        <dd class="col-sm-9">{{ $value->office }}</dd>
                                        <dt class="col-sm-3">กรม หรือ แผนก (สำหรับบริษัท) </dt>
                                        <dd class="col-sm-9">{{ $value->division }}</dd>
                                        <dt class="col-sm-3">ตำแหน่ง </dt>
                                        <dd class="col-sm-9">{{ $value->position }}</dd>
                                        <dt class="col-sm-3">ระดับ </dt>
                                        <dd class="col-sm-9">{{ $value->positionlevel }}</dd>

                                        <dt class="col-sm-3">ตำแหน่งปัจจุบันเทียบเท่าข้าราชการพลเรือน ประเภท</dt>
                                        <dd class="col-sm-9">{{ $value->position2 }}</dd>
                                        <dt class="col-sm-3">ระดับ</dt>
                                        <dd class="col-sm-9">{{ $value->positionlevel2 }}</dd>
                                    @endforeach
                                </dl>
                                <h6 class="text text-primary">ข้อมูลส่วนที่ 3 : ประวัติการศึกษา</h6>
                                <dl class="row">
                                    @php
                                        $e = ['1' => 'ปริญญาตรี', '2' => 'ปริญญาโท', '3' => 'ปริญญาเอก'];
                                    @endphp
                                    @foreach ($data->part3 as $item)
                                        @empty(!$item->edudegree)
                                        <dt class="col-sm-3">ระดับการศึกษา</dt>
                                        <dd class="col-sm-9">{{ $e[$item->edudegree] }}</dd>
                                        <dt class="col-sm-3">วุฒิการศึกษา</dt>
                                        <dd class="col-sm-9">{{ $item->eduqualification }}</dd>
                                        <dt class="col-sm-3">ชื่อสถาบันการศึกษา</dt>
                                        <dd class="col-sm-9">{{ $item->eduinstitution }}</dd>
                                        <dt class="col-sm-3">ปีที่สำเร็จการศึกษา</dt>
                                        <dd class="col-sm-9">{{ $item->eduyear }}</dd>
                                        <hr>
                                        @endempty

                                    @endforeach

                                </dl>
                                <h6 class="text text-primary">ข้อมูลส่วนที่ 4 : การศึกษาอบรม/งานด้านบริหาร</h6>
                                <dl class="row">
                                    @php
                                        $c = ['1' => 'อยู่ระหว่างการรอผลการสมัคร', '2' => 'ไม่อยู่ระหว่างการรอผลการสมัคร'];
                                    @endphp
                                    @foreach ($data->part4 as $item)
                                        <dt class="col-sm-3">อยู่ระหว่างการรอผลการสมัคร / ไม่อยู่ระหว่างการรอผลการสมัคร
                                        </dt>
                                        @empty(!$item->choices)
                                        <dd class="col-sm-9">{{ $c[$item->choices] }}</dd>
                                        @endempty

                                        <dt class="col-sm-3">ชื่อหลักสูตรที่อบรม</dt>
                                        <dd class="col-sm-9">{{ $item->coursename }}</dd>
                                        <dt class="col-sm-3">รุ่นที่</dt>
                                        <dd class="col-sm-9">{{ $item->generation }}</dd>
                                        <dt class="col-sm-3">ระยะเวลา</dt>
                                        <dd class="col-sm-9">{{ $item->period }}</dd>
                                        <dt class="col-sm-3">สถาบันที่จัด</dt>
                                        <dd class="col-sm-9">{{ $item->institution }}</dd>
                                    @endforeach
                                </dl>

                                <dl class="row">
                                    <dt class="col-sm-3">
                                        <h6 class="text text-primary">ข้อมูลส่วนที่ 5 : ลักษณะของงานที่รับผิดชอบ</h6>
                                    </dt>
                                    <dd class="col-sm-9">{{ $data->jobdescript }}</dt>
                                </dl>

                                <dl class="row">
                                    <dt class="col-sm-3">
                                        <h6 class="text text-primary">ข้อมูลส่วนที่ 6 :
                                            ความตั้งใจที่จะนำความรู้ที่ได้รับจากการศึกษาอบรมไปประยุกต์ใช้ประโยชน์
                                            และแนวทางการดำเนินการ</h6>
                                    </dt>
                                    <dd class="col-sm-9">{{ $data->descriptapplyforjob }}</dt>
                                </dl>
                                <form method="get" action="{{ route('printpreview.show',$token)}}">
                                    @csrf
                                    <input type="hidden" name="confirm_register" value="1">
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-8 text-center">
                                            <button type="submit" class="btn btn-primary mt-3">ปริ้น
                                            <i class="fa fa-print"></i></button>
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


@endpush
