<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use App\Models\Part1;
use App\Models\app_config;

class AdminRegisterController extends Controller {

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    public function onoff() {

        $appconfig = app_config::where('configname','=','onoff')->first();
        return view('admin.onoff',compact('appconfig'));
    }

    public function onoff_change(Request $request){

        $c = app_config::where('configname','=','onoff')->first();
        $c->update(['configvalue'=>$request->onoff]);

        return redirect()->route('onoff.show')->with('success','Change is success');
    }

    public function registed_show(){
        $part1 = Part1::query()->paginate(30);

        return view('admin.registed',compact('part1'));
    }

    public function registed_search(Request $request){
        $part1 = Part1::search($request->q)->paginate(10) ?? Part1::query()->paginate(10);

        return view('admin.registed',compact('part1'));
    }

    public function destroy($id) {
        Part1::where('id',$id)->delete();
        return redirect()->route('registed_show.show')->with('success','data has been deleted successfully');
    }

    public function preview($token) {
        $data = Part1::where('token' , '=' , $token)->first();

        $check = array(
            // '1' => 'ชื่อ ไม่ระบุ',
            // '2' => 'สกุล ไม่ระบุ'
         );

        return view('admin.preview',compact('data','token','check'));
    }

}
