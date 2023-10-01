<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
        <div class="container">
          <a class="navbar-brand" href="{{ route('app.main') }}">{{ config("app.name") }}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Консоль
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="{{route('categories.list')}}">
                        Категории
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{route('articles.index')}}">
                        Новости
                    </a>
                </li>
                </ul>
              </li>
            </ul>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-end" style="margin-right:0">
              @if (auth()->user())
                <li class="nav-item text-light mx-3">
                  {{auth()->user()->name}}
                </li>
                <li class="nav-item text-light mx-3">
                  <form action="{{route('auth.logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Выйти</button>
                  </form>
                </li>
              @else 

                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{route('auth.register')}}">Регистрация</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{route('auth.login-page')}}">Вход</a>
                </li>

              @endif
              
            </ul>

          </div>
        </div>
      </nav>
</header>
