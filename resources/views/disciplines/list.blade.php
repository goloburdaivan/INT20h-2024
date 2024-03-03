
@extends('layout')

@section('content')
<div class="container">
    <h5 class="mt-3 mb-3">Мої дисципліни</h5>
    <div class="row">
        @foreach($disciplines as $discipline)
            @php($teacher = $discipline->teacher()->get()->first())
            <div class="col-lg-4">
                <a href="discipline.html" class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">{{ $discipline->title  }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $teacher->rank }}: {{$teacher->name . " " . $teacher->surname}}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection('content')
