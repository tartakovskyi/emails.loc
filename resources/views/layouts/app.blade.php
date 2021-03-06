<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">


  <title>@yield('metaTitle', config('app.name'))</title>


  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/png">

</head>

<body id="page-top">

  <!-- Navigation -->
  @auth
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="/">Email Sending Service</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/recipient/list/">Recipients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/group/list/">Groups</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/campaign/list/">Campaigns</a>
          </li>
          @can('admin')
          <li class="nav-item">
            <a class="nav-link" href="/users/list/">Users</a>
          </li>
          @endcan
          <li class="nav-item">
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="btn btn-link icon-link d-flex align-items-center">
                <svg><use xlink:href="/img/icons.svg#logout"></use></svg>
                Log Out
              </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  @endauth

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>@yield('title', config('app.name'))</h1>
      <p class="lead">@yield('subTitle')</p>
    </div>
  </header>

  <main class="main">
    <div class="container">
      @yield('content')      
    </div>
  </main>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Email Sending Service 2019 @if (date('Y') > 2019) - {{date('Y')}} @endif</p>
    </div>
    <!-- /.container -->
  </footer>

  @isset ($entity)
  <script>
    const entity = '{{$entity}}';
  </script>
  @endisset

  @isset ($id)
  <script>
    const recGroupId = '{{$id}}';
  </script>
  @endisset

  <script src="/js/app.js"></script>
  <script src="/js/jquery.easing.min.js"></script>

  @isset ($list)
  <link href="/css/datatables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <script src="/js/datatables.min.js"></script>
  @endisset

  @if ($entity = 'campaign')
  <script src="/js/jquery.inputmask.min.js"></script>
  <script>
    $('.date-input').inputmask("datetime",{
      inputFormat: "yyyy-mm-dd HH:MM",
      placeholder: "_",
      alias: "datetime"
    });

  </script>
  @endif

  <script>
    $(document).ready(function() {
      $('.rec-list').each(function(){
        if($(this).find('input:checked').length) {
          $('.rec-group__heading input[name='+this.id+']').prop('checked', true)
        }
      })
    })
  </script>

</body>

</html>
