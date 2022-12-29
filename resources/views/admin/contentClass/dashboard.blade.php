@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card mt-3">
                    <div class="card-header">
                        Content {{ $class->title }}
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12 d-flex flex-row-reverse">
                                <a href="{{ route('admin.newContent', $class->slug) }}" class="btn btn-primary btn-sm"> Add Content</a>
                            </div>
                        </div>
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Duration</th>
                                    <th>link</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($content as $cont)
                                    <tr>
                                        <td>{{ $cont->name }}</td>
                                        <td>
                                            <span class="badge bg-primary">
                                                {{ $cont->duration }}
                                            </span></td>
                                        <td>{{ $cont->link }}</td>
                                        <td>
                                            {{-- <a href="{{ route('admin.class.show', $class->slug) }}" class="btn btn-success">Show</a> --}}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.content.edit', $cont->id) }}" class="btn btn-warning">Edit</a>
                                            
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.content.destroy', $cont->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">No Content created</td>
                                        </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection