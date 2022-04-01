@extends('layouts.base')
@section('title')Главная страница@endsection
@section('title-block')Главная страница@endsection
@section('content')
<div class="col m-2 border rounded">
	<div class="row h-100">
		<div class="row p-4 messages align-content-start"> {{--Чат--}}
			@foreach ($chat->messages() as $msg)
				<div class="row msg mx-0 pt-2 mt-1"> {{--Сообщение--}}
					<div class="col-sm-auto"> {{--ава--}}
						<img class="rounded-circle" height="32" width="32"
						src="{{Storage::url($msg->author()->avatar()->getPath())}}" alt="avatar">
					</div>
					<div class="col">{{--Имя и текст--}}
						<div class="row">
							<p class="font-weight-bold">{{$msg->author()->name}}</p>
						</div>
						<div class="row px-4">
							{{$msg->text}}
						</div>
					</div>
				</div>
			@endforeach
		</div>
		{{-- Форма отправки --}}
		<div class="row align-self-end m-0"> 
			@auth
				<form class="msg_form border-top" action="{{ route('message_send') }}" method="POST">
					@csrf
					<input type="hidden" name="pid" value="{{ $chat->id }}">
					<div class="row p-3">
						<div class="col textfield">
							<textarea name="text" class="form-control" style="max-height: 150px"></textarea>
						</div>
						<div class="col-sm-auto btns">
							<div class="row">
								<button type="submit" class="btn btn-dark">Отправить</button>
							</div>
						</div>
					</div>
				</form>
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