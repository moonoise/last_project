<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use App\Models\Part1;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SentMail;
use Carbon\Carbon;
// use Barryvdh\DomPDF\Facade\Pdf;



class StepRegisController extends Controller
{
    public function step1_show(){
        return view('step1');
    }

    public function step1(Request $request) {

        $validator = Validator::make($request->all(),
        [
            'email' => 'required|email:rfc,dns',
        ],[
            'email.required' => 'กรุณากรอกอีเมล ที่ถูกต้อง ',
            'email.email' => 'อีเมลไม่ถูกต้อง ',
        ]);
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        //check create
        $email = Part1::where('email', '=', $request->email )->first();
        if ($email != null) {
            return back()
            ->withErrors(['error','อีเมลนี้ ลงทะเบียนไว้อยู่แล้ว โปรดตรวจสอบ ลิ้งที่ส่งให้ทางอีเมล'])
            ->withInput();
        }

        // ถ้าไม่ซ้ำ ก็ให้ลงทะเบียนต่อไปได้
        // create email & token
        // step ต่อไป ใช้ token ในการลงทะเบียน

        $register = new  Part1;
        $register->email = $request->email;
        do {
            $token = Str::random(32);

        } while (Part1::where("token", "=", $token)->first() instanceof Part1);

        $register->token = $token;
        $register->consent = 1;
        $register->save();

        //ส่งเมลล

        $details = [
            'title' => 'การรับสมัคร',
            'url' => route('step2.show',$token),
        ];
        // dd($mailData);
        Mail::to($request->email)->send(New SentMail($details));

        return redirect()->route('step2.show',$token);
    }

    public function step2($token) {
        $data = Part1::where('token' , '=' , $token)->first();
        return view('step2',compact('data','token'));

    }


    public function step2_save (Request $request, $token) {
        $validator = Validator::make($request->all(),
        [
            'prefix' => 'required',
            'fname' => 'required',
            'lname' => 'required'
        ],[

        ]);
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $part1 = Part1::where("token", "=", $token)->first();
        if ($part1) {
            if ($part1->registerstatus === '0') {
                $part1->prefix = $request->prefix;
                $part1->fname = $request->fname;
                $part1->lname = $request->lname;
                $part1->nickname = $request->nickname;
                $part1->birthdate = $request->birthdate;

                $part1->age = $request->age;
                $part1->religion = $request->religion;
                $part1->idcard = $request->idcard;
                $part1->royalorchidplusno = $request->royalorchidplusno;
                $part1->bloodtype = $request->bloodtype;
                $part1->congenitaldisease = $request->congenitaldisease;

                $part1->lineid = $request->lineid;
                $part1->homeaddress = $request->homeaddress;
                $part1->workingaddress = $request->workingaddress;
                $part1->telephone = $request->telephone;
                $part1->fax = $request->fax;
                $part1->mobile = $request->mobile;

                $part1->personfullname = $request->personfullname;
                $part1->personrelationship = $request->personrelationship;
                $part1->personmobile = $request->personmobile;

                $part1->enprefix = $request->enprefix;
                $part1->enfname = $request->enfname;
                $part1->enlname = $request->enlname;
                $part1->enposition = $request->enposition;
                $part1->endivision = $request->endivision;
                $part1->endepartment = $request->endepartment;
                $part1->enministry = $request->enministry;

                $part1->save();

                return redirect()->route('step3.show',$token);
            }else {
                return redirect()->route('step3.show',$token);
            }

        }else {
            return response('เกิดข้อผิดพลาด',404);
        }

    }

    public function step3 ($token) {
        $d = Part1::where('token' , '=' , $token)->first();
        if ($d->registerstatus === '0') {
            if (count($d->part2) === 0) {
                $d->part2()->create([
                    ['part1_id'=> $d->id]
                ]);
            }

            if (count($d->part3) === 0) {
                $d->part3()->createMany([
                    ['part1_id' => $d->id],
                    ['part1_id' => $d->id],
                    ['part1_id' => $d->id]
                ]);
            }

            if (count($d->part4) === 0) {
                $d->part4()->create([
                    ['part1_id' => $d->id]
                ]);
            }
        }
        $data = Part1::where('token' , '=' , $token)->first();
        $data->part2;
        $data->part3;
        $data->part4;

        return  view('step3',compact('data','token'));

    }

    function step3_save(Request $request, $token) {
        $part1 = Part1::where("token", "=", $token)->first();
        if ($part1->registerstatus === '0') {
            foreach ($part1->part2 as $value) {
                //  dd($request);
                $value->update([
                    'personneltype' => $request->personneltype[$value->id],
                    'office' => $request->office[$value->id],
                    'division' => $request->division[$value->id],
                    'position' => $request->position[$value->id],
                    'positionlevel' => $request->positionlevel[$value->id],
                    'position2' => $request->position2[$value->id],
                    'positionlevel2' => $request->positionlevel2[$value->id]
                ]);
            }

            foreach ($part1->part3 as $value) {
                $value->update([
                    'edudegree' => $request->edudegree[$value->id],
                    'eduqualification' => $request->eduqualification[$value->id],
                    'eduinstitution' => $request->eduinstitution[$value->id],
                    'eduyear' => $request->eduyear[$value->id]
                ]);
            }

            foreach ($part1->part4 as $value) {
                $value->update([
                    'choices' => $request->choices[$value->id],
                    'coursename' => $request->coursename[$value->id],
                    'generation' => $request->generation[$value->id],
                    'period' => $request->period[$value->id],
                    'institution' => $request->institution[$value->id]
                ]);
            }

            $part1->update([
                'jobdescript' => $request->jobdescript,
                'descriptapplyforjob' => $request->descriptapplyforjob,
            ]);

            return redirect()->route('step4.show',$token);
        }else {
            return redirect()->route('step4.show',$token);
        }

    }

    public function step4($token) {
        $data = Part1::where('token' , '=' , $token)->first();

        $check = array(
            // '1' => 'ชื่อ ไม่ระบุ',
            // '2' => 'สกุล ไม่ระบุ'
         );

        return view('step4',compact('data','token','check'));
    }

    public function step5($token , Request $request) {

        $data = Part1::where('token' , '=' , $token)->first();

        if($data->registerstatus != '1'){
            $data->update(['registerstatus' => '1']);
            // dd($data);
        }

        return view('step5',compact('token','data'));
    }

    public function printpreview($token) {

        $data = Part1::where('token' , '=' , $token)->first();
        // $pdf = Pdf::loadView('printpreview',['data'=>$data]);
        // return $pdf->stream('registed.pdf');
        return view('printpreview',compact('data','token'));
    }


}
