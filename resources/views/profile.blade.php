@extends('layout')

@section('title', $user->login)

@section('css')
@stop

@section('content')
        <div class="row">
        <div class="card">

            <div class="col-xs-12 col-sm-4 center">
                <div class="profile-picture">
                    <img class="editable img-responsive" alt=" Avatar" src="{{ asset($user->getPathToAvatar())}}" >
                </div>
            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-5 info">
                <h2 class="profile-title">
                    <span>{{ $user->login }}</span>
                </h2>

                <div class="profile-user-info">

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Contact with me:</div>
                        <div class="profile-info-value">
                            <span>{{ $user->email != '' ? $user->email: '---' }}</span>
                        </div>
                    </div>

                </div>

                <div class="hr hr-8 dotted"></div>

                {{--<div class="profile-user-info">--}}
                    {{--<div class="profile-info-row">--}}
                        {{--<div class="profile-info-name">My post here</div>--}}
                        {{--<div class="profile-info-value">--}}
                            {{--<a href="{{route('post.index')}}" > -> </a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="profile-user-info">
                    <div class="profile-info-row">
                        <div class="profile-info-name profile-about"> About me:</div>
                        <div class="profile-info-value">
                            <span>{{ $user->about != '' ? $user->about : '---'}}<span>
                        </div>
                    </div>
                </div>


                <div class="profile-user-info">
                    <div class="profile-info-row">
                        <div class="profile-info-name profile-about"> Number of posts: </div>
                        <div class="profile-info-value">
                            <span>{{ $count }}<span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop