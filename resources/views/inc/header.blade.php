@php
	$authorized = true;
@endphp

<header class="p-3 bg-dark text-white">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="{{ route('home') }}">goodhumored</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">Главная</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('im')}}">Личные сообщения</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('user', ['id'=>0])}}">Профиль</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('people')}}">Люди</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('about')}}">Описание</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('echo')}}">Эхо</a>
						</li>
					</ul>
					@guest
					<ul class="navbar-nav ms-auto">
						<li class="nav-item">
							<button class="btn nav-link" type="button" data-bs-toggle="modal" data-bs-target="#authModal">Вход</button>
						</li>
						<li class="nav-item">
							<button class="btn nav-link"  type="button" data-bs-toggle="modal" data-bs-target="#regModal">Регистрация</button>
						</li>
					</ul>
					@endguest
				</div>
			</div>
		</nav>
	</div>
</header>