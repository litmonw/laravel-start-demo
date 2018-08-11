@extends('layouts.default')
@section('title', $user->name)
@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="col-md-12">
                <div class="col-md-offset-2 col-md-8">
                    <section class="user_info">
                        {{--这里的 ['user' => $user] 不用添加，仅当你控制器传来的变量就是$user，然后@include里的也是要$user，那是可以不传--}}
                        {{--但是如果你控制器没传，就需要['user' => Auth::user()]。--}}
                        {{--或者@include里的变量是$u，或者其他，那就要['u' => $user]这样传一下--}}
                        @include('shared._user_info', ['user' => $user])
                    </section>
                </div>
            </div>
            <div class="col-md-12">
                @if(count($statuses) > 0)
                    <ol class="statuses">
                        @foreach($statuses as $status)
                            @include('statuses._status')
                        @endforeach
                    </ol>
                    {!! $statuses->render() !!}
                @endif
            </div>
        </div>
    </div>
    {{$user->name}} - {{ $user->email }}
@stop