
@extends('layouts.app')

@section('content')
{{-- <h5 class="m-5">All Program</h5> --}}
<div class="container mt-5">
    <div class="row">
        @foreach ($category as $program)  
        <div class="col-md-4">
            <a href="{{ route('program.show', $program->id) }}">
            <div class="card text-white">
                <img src="https://source.unsplash.com/500x500/?{{ $program->name }}" class="card-img" alt="{{ $program->name }}">
                <div class="card-img-overlay d-flex align-items-center p-0">
                  <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color:rgba(0, 0, 0, 0.7)" >{{ $program->name }}</h5>
                  
                </div>
              </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection

