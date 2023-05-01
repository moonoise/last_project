@extends('layouts-admin.app-admin')
@push('style')
    <style>
        /* test */
    </style>
@endpush
@section('title', 'หน้าแรก')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                  เปิด/ปิด
                </div>
                <div class="card-body">
                    {{-- @dd($appconfig->configvalue) --}}
                    <form action="{{ route('onoff.change') }}" method="post">
                        @csrf
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="onoff" id="id-on" value="on" @if(old('onoff',$appconfig->configvalue)=="on") checked @endif>
                            <label class="form-check-label" for="id-on">
                              เปิด
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="onoff" id="id-off" value="off"  @if(old('onoff',$appconfig->configvalue)=="off") checked @endif>
                            <label class="form-check-label" for="id-off">
                              ปิด
                            </label>
                          </div>
                          <div class="col-2">
                            <button type="submit" class="form-control btn-sm btn-info" onclick="return confirm('Do you change ?')">Change</button>
                          </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush


