@extends('layouts.app')

@section('content')

    <div class="headerProfile">
        <div class="titleHeader m-2">
            <h5>Class {{ $camp->title }}</h5>
        </div>
        
    </div>
    <div class="class-wrapp">
        <div class="listStudy">
            @foreach ($content as $item)
            <div class="contentStudy">
                <a href="{{ route('user.class', ['camp_id'=>$item->camp_id,'content'=> $item->id]) }}">
                    <div class="titleStudy">
                        <h5>{{ $item->name }}</h5>
                    </div>
                    <div class="subTitle">
                        <h4>{{ $item->duration }}</h4>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="contentPlaylist">
            <div class="videoPlaylist">
                {{-- <video controls = "true">
                    <source src="https://www.youtube.com/watch?v=hKB-YGF14SY"/>
                    Browsermu tidak mendukung tag ini, upgrade donk!
                  </video>
                   --}}
                   <iframe 
                   src="{{ $video->link }}?autoplay=1" autoplay;>
                   </iframe>
            </div>
            <div class="buttonPlaylist">
                <div class="textPlaylist">
                    <h5>{{ $title->name }}</h5>
                </div>
                @if ($any)
                <div class="nextPlaylist">
                    <a href="{{ route('user.class', ['camp_id'=>$title->camp_id,'content'=> $title->id + 1]) }}">
                        <button>Next</button>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

@endsection