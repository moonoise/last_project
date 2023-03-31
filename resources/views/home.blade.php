@extends('layouts.app')
@push('style')

@endpush
@section('title', 'หน้าแรก')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text text-info text-center">{{ $arrContent['content_title'] }}</h3>
                        <p class="text text-primary text-center">{{ $arrContent['content']}}</p>
                        <p class="text-center">
                            <a href="{{ route('step1.show') }}" class="btn btn-info btn-center btn-lg">สมัคร</a>
                        </p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p class="text text-secendary text-center">{!! $arrContent['contact'] !!}</p>



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush
