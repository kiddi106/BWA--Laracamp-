@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card mt-3">
                    <div class="card-header">
                        Insert a new Class
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('admin.class.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Name</label>
                                <input name="title" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{old('name')}}" required/>
                                @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                    
                                @endif
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Price</label>
                                <input name="price" type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{old('price')}}" required/>
                                @if ($errors->has('price'))
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                    
                                @endif
                            </div>
                            
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Category</label>
                                <select name="camp_id" id="camp_id" class="form-control {{ $errors->has('camp_id') ? 'is-invalid' : '' }}" required>
                                    @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                    
                                @if ($errors->has('camp_id'))
                                    <p class="text-danger">{{ $errors->first('camp_id') }}</p>
                                    
                                @endif
                            </div>
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection