@extends('layouts.base')
@section('title')Главная страница@endsection
@section('title-block')Главная страница@endsection
@section('content')
<div class="col m-4 border rounded">
	<div class="row h-100">
		<div class="row p-4 messages align-content-start"> {{--Чат--}}
			<div class="row msg"> {{--Сообщение--}}
				<div class="col-sm-auto"> {{--ава--}}
					<img class="rounded-circle" height="48" width="48" src="{{-- user avatar --}}https://sun9-12.userapi.com/s/v1/ig2/brDwUo0mlxGOX0m8xm5i4fBTQl--1shu84iWjdPpdxsLF6nnDvRYvUnWFwE5nCDTclOFV7-dGeRIGl8fAIJa16mx.jpg?size=50x50&quality=95&crop=776,0,1430,1430&ava=1" alt="avatar">
				</div>
				<div class="col">{{--Имя и текст--}}
					<div class="row">
						<p class="font-weight-bold">Кирилл Некрасов</p>
					</div>
					<div class="row">
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, consequuntur quo. Eius eveniet deserunt error sapiente doloribus eligendi, neque exercitationem repellat ea assumenda consectetur voluptatem quis iste autem labore amet.
						</p>
					</div>
				</div>
			</div>
		</div>
		{{-- Форма отправки --}}
		<div class="row align-self-end m-0"> 
			<form class="msg_form border-top" action="{{ route('message_send') }}" method="POST">
				@csrf
				<input type="hidden" name="pid" value"-1">
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
		</div>
	</div>
</div>
<div class="col-2 m-4 p-4 border rounded"> {{--Участники--}}
	<div class="row mb-3">
		<h5>Сейчас в общем чате:</h5>
	</div>
	<div class="row px-3">
		<ul class="list-group list-group-flush p-0">
			<li class="list-group-item p-0">
				<a href="/users/" class="nav-link p-0" aria-current="page">
					<div class="row align-items-center">
						<div class="col-sm-auto">
							<img class="rounded-circle" height="24" width="24" src="{{-- user avatar --}}https://sun9-12.userapi.com/s/v1/ig2/brDwUo0mlxGOX0m8xm5i4fBTQl--1shu84iWjdPpdxsLF6nnDvRYvUnWFwE5nCDTclOFV7-dGeRIGl8fAIJa16mx.jpg?size=50x50&quality=95&crop=776,0,1430,1430&ava=1" alt="avatar">
						</div>
						<div class="col p-0">
							<p>Кирилл Некрасов</p>
						</div>
					</div>
				</a>
			</li>
		 </ul>
	</div>
</div>
@endsection