@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card mt-3">
                    <div class="card-header">
                        Update content : {{ $content->name }}
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('admin.content.update', $content->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $content->id }}">
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Name</label>
                                <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{old('name') ?: $content->name}}" required/>
                                @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                    
                                @endif
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Duration</label>
                                <input name="duration" type="text" class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" value="{{old('duration') ?: $content->duration}}" required/>
                                @if ($errors->has('duration'))
                                    <p class="text-danger">{{ $errors->first('duration') }}</p>
                                    
                                @endif
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Link</label>
                                <input name="link" type="text" class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" value="{{old('link') ?: $content->link}}" required/>
                                @if ($errors->has('link'))
                                    <p class="text-danger">{{ $errors->first('link') }}</p>
                                    
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