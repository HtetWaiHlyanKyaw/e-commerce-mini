@section('style')
    <style>


    </style>
@endsection
<div class="bg-light ">
    <ul>
        <li class="list-item">
            <a class="text-dark" href="{{ route('user.profile') }}">
                <p><b>Profile</b></p>
            </a>
        </li>
        <li class="list-item"><a href="{{ route('user.history') }}" class=" text-dark">
                <p><b>Purchase History</b></p>
            </a>
        </li>
        <li class="list-item"><a href="#" class="text-dark">
                <p><b>Reviews</b></p>
            </a>
        </li>
        <li class="list-item">
            <div class="widget price mt-20">
                <button class="btn btn-dark text-center" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="fa fa-arrow-left"></i> Logout</button>
            </div>
        </li>
    </ul>
</div>
