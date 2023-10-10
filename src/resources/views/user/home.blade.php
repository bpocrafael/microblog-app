@extends('layout.app')

@section('content')

    @include('layout.navbar')
    @include('post.create')

        <div class="col-sm-4">
            <div class="card border border-info shadow">
                <div class="card-header" style="background-color: #2190AE">
                    <h5 class="my-2 text-white">Users you may know</h5>
                </div>
                <li class="list-group-item my-2" style="background-color: #EBF5FB">
                    <div class="row align-items-center" style="padding-left: 10px;">
                        <div class="col-auto">
                            <img src="profile.jpg" alt="Profile Picture" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col">
                            <span class="text-black">Username 1</span>
                        </div>
                        <div class="col-auto" style="padding-right: 25px;">
                            <a href="#" class="btn btn-sm btn-primary like float-right">Follow</a>
                        </div>
                    </div>
                </li>
                <li class="list-group-item my-2" style="background-color: #EBF5FB">
                    <div class="row align-items-center" style="padding-left: 10px;">
                        <div class="col-auto">
                            <img src="profile.jpg" alt="Profile Picture" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col">
                            <span class="text-black">Username 2</span>
                        </div>
                        <div class="col-auto" style="padding-right: 25px;">
                            <a href="#" class="btn btn-sm btn-primary like float-right">Follow</a>
                        </div>
                    </div>
                </li>
                <li class="list-group-item my-2" style="background-color: #EBF5FB">
                    <div class="row align-items-center" style="padding-left: 10px;">
                        <div class="col-auto">
                            <img src="profile.jpg" alt="Profile Picture" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col">
                            <span class="text-black">Username 3</span>
                        </div>
                        <div class="col-auto" style="padding-right: 25px;">
                            <a href="#" class="btn btn-sm btn-primary like float-right">Follow</a>
                        </div>
                    </div>
                </li>
                <li class="list-group-item my-2" style="background-color: #EBF5FB">
                    <div class="row align-items-center" style="padding-left: 10px;">
                        <div class="col-auto">
                            <img src="profile.jpg" alt="Profile Picture" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col">
                            <span class="text-black">Username 4</span>
                        </div>
                        <div class="col-auto" style="padding-right: 25px;">
                            <a href="#" class="btn btn-sm btn-primary like float-right">Follow</a>
                        </div>
                    </div>
                </li>
                <li class="list-group-item my-2" style="background-color: #EBF5FB">
                    <div class="row align-items-center" style="padding-left: 10px;">
                        <div class="col-auto">
                            <img src="profile.jpg" alt="Profile Picture" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col">
                            <span class="text-black">Username 5</span>
                        </div>
                        <div class="col-auto" style="padding-right: 25px;">
                            <a href="#" class="btn btn-sm btn-primary like float-right">Follow</a>
                        </div>
                    </div>
                </li>                
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-sm-10 mx-auto">
            <div class="card border border-warning shadow-lg">
                <div class="card-header mb-2" style="background-color: #FFA903">
                    <h2 class="my-2 text-white text-center">Microblog Newsfeed</h2>
                </div>
                @include('post.show')
                <div class="card-footer" style="background-color: #FFA903;">
                    <div class="d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
