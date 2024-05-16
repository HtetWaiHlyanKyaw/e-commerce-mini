@section('style')
    <style>


    </style>
@endsection
<div class="">
    <ul>
        <li class="list-item">
            <a class="text-dark" href="{{ route('user.profile') }}">
                <p style="font-size: 15px;">Profile</p>
            </a>
        </li>
        <li class="list-item"><a href="{{ route('user.history') }}" class=" text-dark">
                <p style="font-size: 15px;">Purchase History</p>
            </a>
        </li>

        <li class="list-item">
            <div class="widget price mt-20">
                <button class="btn btn-outline-danger text-center" style="margin-top:10px; width: 100%;" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="fa fa-arrow-left"></i> Logout</button>
            </div>

        </li>
    </ul>
</div>
