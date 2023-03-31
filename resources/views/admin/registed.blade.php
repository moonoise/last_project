@extends('layouts-admin.app-admin')
@push('style')
    <style>
        /* test */
    </style>
@endpush
@section('title', 'หน้าแรก')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ผู้ลงทะเบียน</div>
                    <div class="card-body">
                          @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                        <form action="{{ route('registed_show.search')}}" method="get">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="q" id="q" class="form-control md-3">
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" value="search" class="form-control mb-3 btn btn-primary">
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </form>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>#</th>
                                </tr>
                                <tbody>
                                    @foreach ($part1 as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1}}</td>
                                            <td>{{ $item->prefix.$item->fname." ".$item->lname }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <form action="{{ route('registed_show.destroy',$item->id) }}" method="Post">
                                                <a class="btn btn-primary btn-sm" href="{{ route('step4.show',$item->token) }}" target="preview">ดู</a>
                                                <a class="btn btn-info btn-sm" href="{{ route('printpreview.show',$item->token) }}" target="printpreview">ปริ้น</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                            </form>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </thead>
                        </table>
                        <div class="d-flex justify-content-center">
                             {!! $part1->links() !!}
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush


