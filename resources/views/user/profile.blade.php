@extends('layouts.app')

@section('content')

<section class="dashboard my-5">
    @include('components.alert')
    <div class="headerProfile">
        <div class="titleHeader">
            <h5>My Profile</h5>
        </div>
        <div class="picture">
            <div class="pictProfile">
                <img src={{ Auth::user()->avatar }} alt="">
            </div>
            <div class="iconCamera">
                {{-- <img src={{ asset('images/iconcamera.png') }} alt=""> --}}
            </div>
        </div>
    </div>
    <div class="form">
        <form action="{{ route('user.storeprofile') }}" method="POST">
        @csrf
        <div class="maincontent">
            <div class="content">
                <label for="name">Name :</label>
                <input type="text" value="{{ Auth::user()->name ?  Auth::user()->name : "" }}" name="name" required>
            </div>
            <div class="content">
                <label for="gmail">Gmail :</label>
                <input type="text" value="{{ Auth::user()->email ?  Auth::user()->email : "" }}" name="email" readonly>
            </div>
            <div class="content">
                <label for="gmail">Phone :</label>
                <input type="text" value="{{ Auth::user()->phone ?  Auth::user()->phone : "" }}" name="phone" required>
            </div>
            <div class="content">
                <label for="gmail">Occupation :</label>
                <input type="text" value="{{ Auth::user()->occupation ?  Auth::user()->occupation : "" }}" name="occupation" required>
            </div>
            {{-- <div class="content">
                <label for="gender">Gender :</label>
                <div class="radio">
                    <div class="contentradio">
                        <input type="radio" id="male" name="male" value="male">
                        <label for="male">Male</label>
                    </div>
                    <div class="contentradio">
                        <input type="radio" id="female" name="female" value="female">
                        <label for="female">Female</label>
                    </div>
                </div>
                
            </div> --}}
            <div class="content">
                <label for="birth">Date Birth :</label>
                <input type="date" name="birth" required>
            </div>
            <div class="content">
                <label for="address">Address :</label>
                <div class="content-button">
                    <input type="text" value="{{ Auth::user()->address ?  Auth::user()->address : "" }}" name="address" required>
                    <div class="button">
                        <button>Change</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</section>
@endsection