<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS | Content Management System</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#the-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{ url('/') }}"> H.Johnny </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="the-navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="{{ route('blog') }}">หน้าแรก</a></li>
                <li><a href="#">เกี่ยวกับ</a></li>
                <li><a href="#">ติดต่อสอบถาม</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container -->
        </nav>
    </header>

    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class="copyright">&copy; 2019 โรงเรียนเตรียมพุทธศาสตร์ จ.ปราจีนบุรี</p>
                </div>
                <div class="col-md-4">
                    <nav>
                        <ul class="social-icons">
                            <li>
                              <span class="badge badge-pill badge-primary">
                                <a href="#" class="i fa fa-facebook"></a>
                              </span>
                            </li>
                            <li>
                              <span class="badge badge-pill badge-primary">
                                <a href="#" class="i fa fa-twitter"></a>
                              </span>
                            </li>
                            <li>
                              <span class="badge badge-pill badge-primary">
                                <a href="#" class="i fa fa-google-plus"></a>
                              </span>
                            </li>
                            <li>
                              <span class="badge badge-pill badge-primary">
                                <a href="#" class="i fa fa-youtube"></a>
                              </span>
                            </li>
                            <li>
                              <span class="badge badge-pill badge-primary">
                                <a href="#" class="i fa fa-github"></a>
                              </span>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ url('js/bootstrap.min.js') }}"></script>
</body>
</html>
