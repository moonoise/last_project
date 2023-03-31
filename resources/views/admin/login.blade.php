@extends('layouts.login')
@push('style')
 <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endpush
@section('title', 'หน้าแรก')
@section('content')
<div class="container py-5">
    <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->

          <!-- Icon -->
          <div class="fadeIn first">
            <h3 class="text text-info mt-3">Login</h3>
          </div>

          <!-- Login Form -->
          <form method="POST" action="{{ route('authenticate') }}">
            @csrf
            <input type="text" id="email" class="fadeIn second" name="email" placeholder="login">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            <input type="submit" class="fadeIn fourth" value="Log In">
          </form>

          <!-- Remind Passowrd -->
          <div id="formFooter">
            <a class="underlineHover" href="#">...</a>
          </div>

        </div>
      </div>
</div>
@endsection

@push('script')

@endpush
