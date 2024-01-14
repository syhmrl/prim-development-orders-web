@extends('layouts.master')

@section('css')
<link href="{{ URL::asset('assets/libs/chartist/chartist.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Subject</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item active">Subject >> Edit Subject</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="card col-md-12">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form method="post" action="{{ route('subject.update', $subject->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            {{csrf_field()}}
            <div class="card-body">
            @if(\Session::has('error'))
                <div class="alert alert-danger">
                    <p>{{ \Session::get('error') }}</p>
                </div>
            @endif
            <div class="form-group">
                    <label>Subject Name</label>
                    <input type="text" name="subject_name" class="form-control" placeholder="Nama Penuh" value="{{$subject->name}}">
                </div>

                <div class="form-group">
                    <label>Subject Code</label>
                    <input type="text" name="kod" class="form-control" placeholder="Kod Subjek" value="{{$subject->code}}">
                </div>
                <input type="hidden" name="organization_id" value="{{$subject->organization_id}}">
                <div class="form-group mb-0">
                    <div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                            Save
                        </button>
                    </div>
                </div>
        </div>
    </form>
</div>
</div>

@endsection


@section('script')
<!-- Peity chart-->
<script src="{{ URL::asset('assets/libs/peity/peity.min.js')}}"></script>

<!-- Plugin Js-->
<script src="{{ URL::asset('assets/libs/chartist/chartist.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/jquery-mask/jquery.mask.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/dashboard.init.js')}}"></script>

<script>
    $(document).ready(function() {
        $('.alert').delay(3000).fadeOut();
    });
</script>
@endsection