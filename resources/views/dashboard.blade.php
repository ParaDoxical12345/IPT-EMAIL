@extends('base')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="branding">
        <img src="https://play-lh.googleusercontent.com/ZU9cSsyIJZo6Oy7HTHiEPwZg0m2Crep-d5ZrfajqtsH-qgUXSqKpNA2FpPDTn-7qA5Q" alt="Logo">
    </div>
    <a class="navbar-brand" href="#">EmailApp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>

      <ul class="navbar-nav">
        @auth

        <li class="nav-item ml-5">
            <span class="navbar-text text-light mr-3">
              User: {{ auth()->user()->name }}
            </span>
          </li>

          <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <button class="nav-link text-light" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="background-color: rgba(128, 128, 128, 0.7);">
                Logout
            </button>
        </li>
        @endauth
      </ul>
    </div>
  </nav>

    <div class="content">
        <p>Contents Here:
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia, culpa. Quibusdam dicta assumenda alias nam reprehenderit tempore nisi pariatur. Iure nesciunt placeat numquam ab accusantium quae vel accusamus exercitationem autem.</p>
    </div>
@endsection

<style>
    .navbar {
            background-color: #0066b2;
        }

        .branding {
            margin-right: 10px;
        }

        .branding img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .navbar-brand {
            margin-left: 0;
        }
</style>
