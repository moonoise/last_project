<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<meta name="description" content="Static &amp; Dynamic Tables" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<style>
    /* @import url('https://fonts.googleapis.com/css2?family=Sarabun&display=swap'); */

    @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Thai:wght@100&family=Sarabun:wght@100&display=swap');


    @page {
        margin-top: 1cm;
        margin-right: 1cm;
        margin-bottom: 1cm;
        margin-left: 1cm;
    }

    body {
        margin: 0px;
    }

</style>

</head>

<body style="font-family: 'Sarabun', sans-serif; font-size:14px;">
    <div class="div_main">
        <table width="95%" cellpadding="0" cellspacing="0" align="right">
            <tr>
                <td width="80%" align="center" style=" vertical-align:bottom; padding-right:5px"> <img
                        src="{{ asset('assets/images/bbLogo.jpg') }}" width="120" /><br />
                    <p>ใบสมัครเข้ารับการศึกษาอบรม <br />หลักสูตรนักบริหารการงบประมาณระดับกลาง (นงก.) รุ่นที่ 5</p>
                </td>
            </tr>
        </table>
        <table width="95%" cellpadding="1" cellspacing="3" align="right">
            <tr>
                <td colspan="1" height="50px" valign="bottom"
                    style="border-bottom-width:thin;  border-bottom-style:solid;">1. ข้อมูลของผู้สมัคร
                    (กรุณากรอกข้อมูลให้ครบถ้วนและชัดเจนทุกข้อ)</td>
            </tr>
            <tr>
                <td colspan="1">ภาษาไทย</td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom-width:thin;  border-bottom-style:dotted;">ชื่อ : {{ $data->prefix.$data->fname." ".$data->lname }}</td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom-width:thin;  border-bottom-style:dotted;">ชื่อเล่น : {{ $data->nickname }}</td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom-width:thin;  border-bottom-style:dotted;">หมายเลขบัตรประชาชน : {{ $data->idcard }}</td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom-width:thin;  border-bottom-style:dotted;">E-mail address : <font
                        style="padding-left:3em;">Line ID : {{ $data->lineid}}</font>
                    <font style="padding-left:3em;">Royal Orchid Plus No : {{ $data->royalorchidplusno }} </font>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom-width:thin;  border-bottom-style:dotted;">กรุ๊ปเลือด : {{ $data->bloodtype }}<font
                        style="padding-left:3em;">โรคประจำตัว (ถ้ามี) : {{ $data->congenitaldisease }}</font>
                </td>
            </tr>
            <tr>
                <td colspan="2" valign="top" style="border-bottom-width:thin;  border-bottom-style:dotted;">
                    ที่อยู่ปัจจุบัน : {{ $data->homeaddress }}</td>
            </tr>
            <tr>
                <td colspan="2" valign="top" style="border-bottom-width:thin;  border-bottom-style:dotted;">
                    ที่อยู่ที่ทำงาน : {{ $data->workingaddress }}</td>
            </tr>
            <tr>
                <td colspan="2" valign="top" style="border-bottom-width:thin;  border-bottom-style:dotted;">
                    โทรศัพท์ : {{ $data->telephone }} <font style="text-indent:1em;"> &emsp;โทรสาร : {{ $data->fax }}&ensp; </font>&emsp;มือถือ : {{ $data->mobile }}&ensp; </td>
            </tr>
            <tr>
                <td colspan="2" align="justify" style="border-bottom-width:thin;  border-bottom-style:dotted;">
                    ชื่อบุคคลที่ติดต่อได้ในกรณีฉุกเฉิน : &emsp;&emsp;{{ $data->personfullname }}&emsp;&emsp;&emsp;&emsp;ความสัมพันธ์ : &emsp;&emsp;{{ $data->personrelationship }}</td>
            </tr>
            <tr>
                <td colspan="2" align="justify" style="border-bottom-width:thin;  border-bottom-style:dotted;">มือถือ: &emsp;&emsp;{{ $data->personmobile }} </td>
            </tr>
            <tr>
                <td colspan="1">ภาษาอังกฤษ</td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom-width:thin;  border-bottom-style:dotted;">Name : &emsp;&emsp;{{ $data->enprefix }}{{ $data->enfname }} {{ $data->enlname }}</td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom-width:thin;  border-bottom-style:dotted;">Position : &emsp;&emsp;{{ $data->enposition }}<font
                        style="padding-left:3em;">Division/Bureau : &ensp;&emsp;&emsp; {{ $data->endivision }}</font>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom-width:thin;  border-bottom-style:dotted;">Department : &ensp;&emsp;{{ $data->endepartment }}<font
                        style="padding-left:3em;">Ministry : &ensp;&emsp;{{ $data->enministry }}</font>
                </td>
            </tr>
            <tr style="border-top-style:dotted">
                <td colspan="2" height="50px" valign="bottom"
                    style="border-bottom-width:thin;  border-bottom-style:solid;">2. ประวัติการรับราชการ /
                        การทำงาน</td>
            </tr>
            @php
                $t = ['1' => '[ / ] รับราชการ    [ ] บริษัทเอกชน',
                    '2' => '[ ] รับราชการ    [ / ] บริษัทเอกชน'];
            @endphp
            @foreach ($data->part2 as $value)
            <tr>
                <td style="border-bottom-width:thin;  border-bottom-style:dotted;">
                    {{ $t[$value->personneltype] }}
                </td>
            </tr>
            <tr>
                <td style="border-bottom-width:thin;  border-bottom-style:dotted;">ปัจจุบันดำรงตำแหน่ง :&ensp;
                    &ensp;&ensp; {{ $value->position }} <font style="padding-left:3em;">ระดับ : &ensp; {{ $value->positionlevel }}</font>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom-width:thin;  border-bottom-style:dotted;">หน่วยงาน : {{ $value->office }}
                    &emsp;&emsp;&emsp; <font style="padding-left:3em;">สังกัด : {{ $value->division }}</font>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom-width:thin;  border-bottom-style:dotted;">
                    ตำแหน่งปัจจุบันเทียบเท่าข้าราชการพลเรือน ประเภท : &emsp; {{ $value->position2 }} <font style="padding-left:3em;">ระดับ : {{ $value->positionlevel2 }}
                    </font>
                </td>
            </tr>
            @endforeach

            <tr style="border-top-style:dotted">
                <td colspan="2" height="50px" valign="bottom"
                    style="border-bottom-width:thin;  border-bottom-style:solid;">
                    3. ประวัติการศึกษา
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellpadding="5" cellspacing="5">
                        @php
                            $e = ['1' => 'ปริญญาตรี', '2' => 'ปริญญาโท', '3' => 'ปริญญาเอก'];
                        @endphp
                        @foreach ($data->part3 as $item)
                        <tr valign="top">
                            <td style="border-bottom-width:thin;  border-bottom-style:dotted;">[{{ $e[$item->edudegree] }}] {{ $item->eduqualification }}</td>
                            <td style="border-bottom-width:thin;  border-bottom-style:dotted;">{{ $item->eduinstitution }}</td>
                            <td style="border-bottom-width:thin;  border-bottom-style:dotted;">พ.ศ. {{ $item->eduyear }}</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr style="border-top-style:dotted">
                <td colspan="2" height="50px" valign="bottom"
                    style="border-bottom-width:thin;  border-bottom-style:solid;">
                    4. การศึกษาอบรม / งานด้านการบริหาร</td>
            </tr>
            @php
                $c = ['1' => '[ / ] ไม่อยู่ระหว่างการรอผลการสมัคร หรืออยู่ระหว่างการอบรมหลักสูตรใด ๆ [  ] อยู่ระหว่างการรอผลการสมัคร หรืออยู่ระหว่างการอบรมหลักสูตร',
                 '2' => '[  ] ไม่อยู่ระหว่างการรอผลการสมัคร หรืออยู่ระหว่างการอบรมหลักสูตรใด ๆ [ / ] อยู่ระหว่างการรอผลการสมัคร หรืออยู่ระหว่างการอบรมหลักสูตร'];
            @endphp
            @foreach ($data->part4 as $item)
            <tr>
                <td colspan="2">{{$c[$item->choices]}}</td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom-width:thin; word-break:break-all;  border-bottom-style:dotted;">
                    อบรมหลักสูตร : {{ $item->coursename }} &ensp;&ensp; รุ่นที่ : {{ $item->generation }}</td>
            </tr>
            <tr>
                <td colspan="2"
                    style="border-bottom-width:thin; word-break:break-all;  border-bottom-style:dotted;">
                    ระยะเวลา : &ensp;&ensp; {{ $item->period }}  &ensp;&ensp;&ensp;&ensp; สถาบันที่จัด:&ensp;&ensp;{{ $item->institution }} </td>
            </tr>
            @endforeach

            <tr>
                <td colspan="2" height="50px" valign="bottom"
                    style="border-bottom-width:thin;  border-bottom-style:solid;">
                    5. ลักษณะของงานที่รับผิดชอบ</td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom-width:thin   border-top-width:thin; ">
                    <p style="text-indent: 3em;">{{ $data->jobdescript }}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2" height="50px" valign="bottom"
                    style="border-bottom-width:thin;  border-bottom-style:solid; ">6.
                        ความตั้งใจที่จะนำความรู้ที่ได้รับจากการศึกษาอบรมไปประยุกต์ใช้ประโยชน์
                        และแนวทางการดำเนินการ</td>
            </tr>
            <tr>
                <td colspan="2"
                    style="border-bottom-width:thin;  border-bottom-style:solid; border-top-width:thin; ">
                    <p style="text-indent: 3em;">{{ $data->descriptapplyforjob }}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2"><br />
                    <p style="text-indent: 3em;">
                        ข้าพเจ้ามีความประสงค์จะเข้ารับการศึกษาอบรมหลักสูตรนักบริหารการงบประมาณระดับกลาง (นงก.) รุ่นที่ 5
                        และขอรับรองว่า ข้าพเจ้าสามารถเข้ารับการศึกษาอบรมได้ตลอดหลักสูตรและยินดีปฏิบัติตามข้อกำหนด
                        รวมทั้งเงื่อนไขของหลักสูตรนี้ทุกประการ </p>
                    <p style="text-indent: 3em;">ขอรับรองว่าข้อมูลที่ระบุในเอกสารใบสมัครเป็นข้อมูลที่ถูกต้องและเป็นจริง
                    </p>
                </td>
            </tr>

            <tr align="center">
                <td colspan="2"><br />
                    <br />
                    (ลงชื่อ)....................................................................<br />
                    ({{ $data->prefix }}{{ $data->fname }} {{ $data->lname }})<br />
                    ผู้สมัครเข้ารับการศึกษาอบรมหลักสูตรนักบริหารการงบประมาณระดับกลาง (นงก.) รุ่นที่ ....<br />
                    <br />วันที่
                </td>
            </tr>
            <tr>
                <td colspan="2"><br />
                    <p>หมายเหตุ : การสมัครเข้ารับการศึกษาอบรมหลักสูตร นงก. รุ่นที่ 5 ของท่านจะสมบูรณ์
                        ต่อเมื่อท่านสมัครผ่านระบบออนไลน์ และได้ส่งใบสมัคร (ฉบับจริง)
                        และหนังสือรับรองและยินยอมอนุญาตของหัวหน้าหน่วยงาน (ฉบับจริง) พร้อมแนบหลักฐานประกอบการสมัคร
                        โดยมีหนังสือนำส่งถึงผู้อำนวยการสำนักงบประมาณ
                        มาที่สำนักงบประมาณภายในระยะเวลาที่กำหนดตามประกาศรับสมัคร</p>
                </td>
                </td>
            </tr>

        </table>

    </div>
</body>

</html>
