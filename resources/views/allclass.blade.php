
@extends('layouts.app')
@section('content')

<h3 class="m-3 text-center">{{ $programs->name }}</h3>

{{-- Jika Content post tidak kosong --}}
@if ($camps->count())

<div class="card mb-3">
    <img src="https://source.unsplash.com/1200x400/?study" class="card-img-top" alt="...">
    <div class="card-body text-center">
      <h5 class="card-title"><a href="{{ route('checkout.create', $camps[0]->slug) }}" class="text-decoration-none text-dark" >{{ $camps[0]->title }}</a></h5>
      
      
    <p class="card-text"><small>Pembukaan kelas baru dengan mentor mentor ahli dibidangnya untuk membimbing kalian mencapai tujuan sebagai programer dan ahli {{ $programs->name }} dalam pembelajaran bersifat daring dan ter monitoring</small></p>

    <a href="{{ route('checkout.create', $camps[0]->slug) }}" class="text-decoration-none btn btn-primary">Read More</a>
    </div>
  </div>
<div class="container">
    <div class="row">
        @foreach ($camps->skip(1) as $item)        
            <div class="col-md-4 mb-3">
                <div class="card" >
                    <div class="position-absoulute bg-dark px-3 py-2 text-white " style="background-color: rgba(0,0,0,0.7)"><a href="{{ route('program.show', $programs->id) }}">{{ $programs->title }}</a></div>
                    <img src="https://source.unsplash.com/1600x900/?{{ $item->title }}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    {{-- <p><small><a href="/post?user={{ $item->user->username }}" class="text-decoration-none">{{ $item->user->name }}</a> >{{ $item->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}</small></p> --}}
                    <p class="card-text" >kelas {{ $item->title }} dengan mentor mentor ahli dibidangnya untuk membimbing kalian mencapai tujuan sebagai programer dan ahli {{ $programs->name }} dalam pembelajaran bersifat daring dan ter monitoring</p>
                    <span class="badge bg-primary">
                      Rp {{ $item->price }}.000
                  </span></td>
                    <a href="{{ route('checkout.create', $item->slug)  }}" class="text-decoration-none btn btn-primary">Read More</a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</div>
    
@else
  <p class="text-center fs-4">No Post Found</p>
@endif
<div class="d-flex justify-content-end">
{{-- {{ $posts->links() }} --}}
</div>
@endsection

