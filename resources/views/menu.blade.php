<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Restaurant ESATIC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900">
    <link rel="stylesheet" href="/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    <link rel="stylesheet" href="/css/aos.css">

    <link rel="stylesheet" href="/css/style.css">

  </head>
  <body>

    <div class="site-wrap">



      <header class="site-navbar py-4 absolute transparent" role="banner">

        <div class="container">
          <div class="row align-items-center">


            <div class="col-3" data-aos="fade-down">
              <h1><a href="/" class="text-white h2">Restaurant ESATIC</a></h1>
            </div>

          </div>
        </div>

      </header>

      <div class="site-blocks-cover overlay" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h2 class="text-white font-weight-light mb-2 display-4">{{$title}}</h2>
            </div>
          </div>
        </div>
      </div>

    @if (!empty($menu))
        <div class="site-section bg-light block-13">
            <div class="container">
                <div class="row mb-3">
                    {{-- <div class="col-md-12 text-center">
                        <h2 class="font-weight-bold text-black">Au montage</h2>
                    </div> --}}
                </div>

                <div class="nonloop-block-13 owl-carousel">
                    @foreach ($menu->dishes as $dish)
                        <div class="text-center p-3 p-md-5 bg-white">
                            <div class="mb-4">
                                <img src="{{asset("storage/".str_replace('public/', '', $dish->image))}}" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
                            </div>
                            <div class="">
                                <h3 class="font-weight-light h5">{{ $dish->name }}</h3>
                                <h4 class="font-weight-medium h6">{{ $dish->description }}</h4>
                                <div class="row justify-content-between align-items-center">
                                    <a class="btn btn-danger mt-2" href="/order/{{$dish->id}}">Commander</a>
                                    <a href="#">Prix : {{$dish->price}} FCFA</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    @endif

    @if (!empty($menus))
        <div class="site-section bg-light block-13">
            <div class="container">
                @foreach ($menus as $menu)
                    <div class="row mb-5">
                        <div class="col-md-12 text-center">
                            <h2 class="font-weight-bold text-black">Menu du {{ $menu->date }}</h2>
                        </div>
                    </div>
                    <div class="nonloop-block-13 owl-carousel">
                        @foreach ($menu->dishes as $dish)
                            <div class="text-center p-3 p-md-5 bg-white">
                                <div class="mb-4">
                                    <img src="{{asset("storage/".str_replace('public/', '', $dish->image))}}" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
                                </div>
                                <div class="">
                                    <h3 class="font-weight-light h5">{{ $dish->name }}</h3>
                                    <h4 class="font-weight-medium h6">{{ $dish->description }}</h4>
                                    <div class="row justify-content-between align-items-center">
                                        <a href="#">Prix : {{$dish->price}} FCFA</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    @endif



    </div>

    <footer style="position: sticky; bottom: 0; left: 0; width: 100%; text-align: center; color: white; font-family: 'Jost'; background-color: rgba(0,0,0,0.7); display: flex; align-items:center; justify-content: center;">
        <div style="height: fit-content; width: fit-content; margin-top: 20px">
            <p>Developpé par <a href="https://github.com/Yondalne/" target="_blank">Yondalne</a></p>
        </div>
    </footer>

    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.stellar.min.js"></script>
    <script src="/js/jquery.countdown.min.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/aos.js"></script>

    <script src="/js/mediaelement-and-player.min.js"></script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
                  }
                });
                }
            });
    </script>


    <script src="/js/main.js"></script>
  </body>
</html>
