<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1024, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @guest
        @include('inc.modals.auth')
        @include('inc.modals.reg')
    @endguest
    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="toast-container position-absolute p-3 top-3 end-0">
            @include('inc.toasts.succ')
            @include('inc.toasts.fail')
            @include('inc.toasts.info')
        </div>
    </div>
    @include('inc.header')

    <div class="container p-4">
        <h1>@yield('title-block')</h1>
        <div class="row vh-100">
            {{-- @include('inc.sidebar') --}}
            @yield('content')
        </div>
        <div class="row fixed-row-bottom">
            @include('inc.footer')
        </div>
    </div>

<script>
    messages = @json(session()->get('messages'));
</script>
<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Boostrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- js -->
<script src="/js/app.js"></script>

</body>
</html>