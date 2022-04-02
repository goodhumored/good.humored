@extends('layouts.base')
@section('title')Главная страница@endsection
@section('title-block')Главная страница@endsection
@section('content')
<div class="col m-2 border rounded">
	<div class="row h-100">
		<div class="row p-4 messages align-content-start"> {{--Чат--}}
			@foreach ($chat->messages() as $msg)
				<message-block
					avatar="{{Storage::url($msg->author()->avatar()->getPath())}}"
					name="{{$msg->author()->name}}"
					text="{{$msg->text}}">
				</message-block>
			@endforeach
		</div>
		{{-- Форма отправки --}}
		<div class="row align-self-end m-0"> 
			@auth
				<message-form pid="{{$chat->id}}" token="{{csrf_token()}}" action="{{ route('message_send') }}"/>
			@else
				<p>Авторизуйтесь, чтобы оставлять сообщения в беседе</p>
			@endauth
		</div>
	</div>
</div>


<div class="col-2 m-2 p-4 border rounded"> {{--Участники--}}
	<div class="row mb-3">
		<h5>Участники онлайн:</h5>
	</div>
	<div class="row px-3">
		<ul class="list-group list-group-flush p-0">
			@foreach ($chat->members()->where('last_online', '>=', Carbon\Carbon::now()->subMinutes(5)->toDateTimeString())->get() as $member)
				@php
						$user = $member->user();
				@endphp
				<li class="list-group-item p-0">
					<a href="{{route('user', ['id'=>$user->id])}}" class="nav-link p-0" aria-current="page">
						<div class="row align-items-center">
							<div class="col-sm-auto">
								<img class="rounded-circle" height="24" width="24" src="
								{{Storage::url($user->avatar()->getPath())}}" alt="avatar">
							</div>
							<div class="col p-0">
								<p>{{$user->name}}</p>
							</div>
						</div>
					</a>
				</li>
			@endforeach
		 </ul>
	</div>
</div>
@endsection