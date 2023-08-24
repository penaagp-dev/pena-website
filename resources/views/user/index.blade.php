<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PENA</title>
    <link rel="stylesheet" href="{{ asset('assets/css/loader.css')}}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" />
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/galery.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/event.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/home.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/about.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/visi.css')}}" />
    <!-- icon -->
    <link rel="icon" href="{{('assets/img/pena.png')}}" />
    {{-- jquery --}}
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
  </head>

  <body>
    <!-- loader start -->
    <div class="bg-light w-100" style="height: 100vh; position: fixed; z-index: 50;" id="loaderPage">
      <div class="typing-indicator" id="loader">
        <div class="typing-circle"></div>
        <div class="typing-circle"></div>
        <div class="typing-circle"></div>
        <div class="typing-shadow"></div>
        <div class="typing-shadow"></div>
        <div class="typing-shadow"></div>
      </div>
    </div>
    <!-- loader end -->
    <!--Navbar start-->
    <span class="full-navbar" id="start">
      <span class="title">
        <span class="wrapper">
          <a href="#">
            <img src="{{ asset('assets/img/pena.png')}}" class="logo" alt="kedai" />
          </a>
          <img class="menu-btn" src="{{ asset('assets/img/burger-menu.svg')}}" alt="Burger menu" title="burger menu" onclick="togglemenu(this)" />
          <menu class="menu-nav" id="tombol">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#event">News</a>
            <a href="#galery">Galery</a>
            <a href="#contact">Contact</a>
          </menu>
        </span>
      </span>
    </span>
    <!--navbar end-->
    <!-- home start -->
    <section id="home" class="home" style="background: url('{{ asset('assets/img/bg.jpg')}}'); background-size: cover; background-position: center; z-index: 1;">
      <div class="home-wrapper px-4">
        <div class="home-des">
          <div class="wrap">
            <p class="h3 text-center fs-2 p-1" style="margin: 0;" data-aos="fade-up" data-aos-duration="1000">Pogramming, engineering, & Networking Adhi Guna</p>
            <p class="display-1 pb-4 text-center fw-semibold" style=" margin: 0" data-aos="fade-up" data-aos-duration="1500">PENA</p>
          </div>
          <div class="d-flex justify-content-center" data-aos="fade-up" data-aos-duration="2000">
            <a href="#about">
              <button class="button-about">about us</button>
            </a>
          </div>
        </div>
      </div>
      <!-- <div class="home-shadow"></div> -->
    </section>


    @extends('user.components.footer')
    @extends('user.components.visi')
    @extends('user.components.galery')
    @extends('user.components.news')
    @extends('user.components.about')







    <!-- Modal -->

    <!-- contact end -->
    <script>
      document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
    <!-- my script -->
    <script src="{{ asset('assets/js/script.js')}}"></script>
    <script src="{{ asset('assets/js/event.js')}}"></script>
    <script src="{{ asset('assets/js/loader.js')}}"></script>
    <!-- <script src="event-swipe.js"></script> -->
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- swiper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>

    <script>
      const limitText = (className, characterLimit) => {
        const textElements = document.getElementsByClassName(className);
        for (var i = 0; i < textElements.length; i++) {
          var textElement = textElements[i];
          var textContent = textElement.textContent;
          if (textContent.length > characterLimit) {
            var truncatedText = textContent.slice(0, characterLimit) + "...";
            textElement.textContent = truncatedText;
          }
        }
      }

      limitText("card-text", 75);
    </script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
