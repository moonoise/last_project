<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use App\Models\Part1;

class AdminRegisterController extends Controller {

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    public function onoff() {

        return view('admin.onoff');
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

}
