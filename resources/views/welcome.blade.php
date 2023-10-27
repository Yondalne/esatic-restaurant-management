<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Le Sto</title>
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
              <h1><a href="/" class="text-white h2">Le Sto</a></h1>
            </div>

          </div>
        </div>

      </header>

      <div class="site-blocks-cover overlay" style="background-image: url(/images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h2 class="text-white font-weight-light mb-2 display-4">Venez reservez vos plats !</h2>
              <div class="text-white mb-4"><span class="text-white-opacity-05"><small>Ouvert de 12h à 14h | 17h à 20h</small></span></div>
              <p><a href="/menu" class="btn btn-primary btn-sm py-3 px-4 small" style="background-color: rgb(229, 9, 20) !important">Consulter le Menu du Jour</a></p>

            </div>
          </div>
        </div>
      </div>



      <footer style="position: absolute; bottom: 0; left: 0; width: 100%; text-align: center; color: white; font-family: 'Jost'; background-color: rgba(0,0,0,0.7); display: flex; align-items:center; justify-content: center;">
        <div style="height: fit-content; width: fit-content; margin-top: 20px">
            <p>Developpé par KASSE MATHILDE, <a href="https://github.com/Yondalne/" target="_blank">Yondalne</a>, KONE LAMINE M2 SIGL</p>
        </div>
      </footer>
    </div>

    @if (!empty(Session::get('success')))
        <div data-aos="fade-down" id="miPopup" style="position: absolute; top:0; left:0; z-index:1000; width: 100%; height:100%; background-color: rgba(0,0,0,0.8); display:flex; align-items: center; justify-content: center;">
            <div style="background-color: white; text-align: center; padding:70px 50px; border-radius: 8px; position: relative">
                <span id="micloseButton" style="background: none; border: none; position: absolute; top: 15px; right: 15px; cursor:pointer">X</span>
                <img src="{{asset("images/validate.png")}}" style="width: 150px; height: auto; margin-bottom:5px" alt="">
                <p>
                    Veuillez sauvegarder le code ci-dessus afin de récupérér votre plat <br>
                    <a href="#" style="font-weight: bold; font-size: 30px">{{Session::get('success')}}</a>
                </p>
            </div>
        </div>
    @endif

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

            micloseButton.addEventListener('click', miclosePopup);
            function miclosePopup() {
                let popup = document.querySelector('#miPopup');
                popup.style.display = 'none';
            }
        });
    </script>


    <script src="/js/main.js"></script>

  </body>
</html>
