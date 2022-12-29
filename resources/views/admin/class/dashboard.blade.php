@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card mt-3">
                    <div class="card-header">
                        All Class
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12 d-flex flex-row-reverse">
                                <a href="{{ route('admin.class.create') }}" class="btn btn-primary btn-sm"> Add Class</a>
                            </div>
                        </div>
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Camp</th>
                                    <th>
                                        
                                    </th>
                                    <th>Price</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($class as $kelas)
                                    <tr>
                                        <td>{{ $kelas->title }}</td>
                                        <td>
                                            <span class="badge bg-primary">
                                                ON
                                            </span></td>
                                        <td>Rp. {{ $kelas->price }}.000</td>
                                        <td>
                                            <a href="{{ route('admin.class.show', $kelas->slug) }}" class="btn btn-success">Show</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.class.edit', $kelas->slug) }}" class="btn btn-warning">Edit</a>
                                            {{-- @if ($discount->is_paid)
                                                <span class="badge bg-success">Paid</span>
                                            @else
                                                <span class="badge bg-warning">Waiting</span> 
                                            @endif --}}
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.class.destroy', $kelas->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        {{-- <td>
                                            @if (!$discount->is_paid)
                                            <form action="{{ route('admin.discount.update', $discount->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-primary btn-sm">Set to Paid</button>
                                            </form>
                                                
                                            @endif
                                        </td> --}}
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">No discount created</td>
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