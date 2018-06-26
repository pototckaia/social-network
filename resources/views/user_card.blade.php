<div class="user_icon">
    <div class="card">
        <div class="image-wrap">
            <img src="{{ asset($user->getPathToAvatar())}}" class="card-img-top">
        </div>

        <div class="card-block">
            <div class="card-name">{{$user->login}}</div>
            <div class="card-about">{{$user->about}}</div>
        </div>
    </div>
</div>