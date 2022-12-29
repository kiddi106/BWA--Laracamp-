@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card mt-3">
                    <div class="card-header">
                        Update class : {{ $class->title }}
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('admin.class.update', $class->slug) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $class->id }}">
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Name</label>
                                <input name="title" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{old('title') ?: $class->title}}" required/>
                                @if ($errors->has('title'))
                                    <p class="text-danger">{{ $errors->first('title') }}</p>
                                    
                                @endif
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Price</label>
                                <input name="price" type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{old('price') ?: $class->price}}" required/>
                                @if ($errors->has('price'))
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                    
                                @endif
                            </div>
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection