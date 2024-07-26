<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
      <meta name="description" content="Pena adalah Organisasi intra kampus yang berkomitmen pada pengembangan perangkat lunak (Programming Engineering dan Networking) untuk mendukung mahasiswa dalam mengasah minat dan potensi mereka di bidang IT. " >
      <meta name="author" content="PENA" >
      <meta name="keywords" content="penakuofficial" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>PENA</title>
    <link rel="stylesheet" href="{{ asset('assets/css/loader.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css')}}">
    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        darkMode: 'class',
        theme: {
          container: {
            center: true,
            padding: '16px',
          },
          extend: {
            screens: {
              '2xl': '1320px',
            },
          },
        },
      };
    </script>
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="shortcut icon" href="{{('assets/img/pena.png')}}" type="image/x-icon">
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
  </head>

  <body id="home">
    <!-- loader start -->
    <div class="bg-gray-100 w-full h-screen fixed z-50" id="loaderPage">
      <div class="flex items-center justify-center h-full" id="loader">
        <div class="flex space-x-2">
          <div class="w-4 h-4 bg-gray-600 rounded-full animate-bounce"></div>
          <div class="w-4 h-4 bg-gray-600 rounded-full animate-bounce delay-75"></div>
          <div class="w-4 h-4 bg-gray-600 rounded-full animate-bounce delay-150"></div>
        </div>
      </div>
    </div>

    <!-- loader end -->

    <!--Navbar start-->
    <section class="flex flex-col h-screen bg-center bg-cover bg-blend-overlay bg-fixed bg-black/30" style="background-image: url('{{ asset('assets/img/hero-section.jpg')}}');">
        <!-- Header Start -->
        <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between relative">
                    <div class="px-4">
                        <div class="logo mt-1 ml-1 flex justify-center items-center">
                            <img src="{{ asset('assets/img/pena.png') }}" alt="logo" class="w-10 h-10 my-3 sm:my-0">
                            <!-- <h3 class="ml-2 text-xl font-bold text-white">PENAKU</h3> -->
                        </div>
                    </div>
                    <div class="flex items-center px-4">
                        <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                            <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                            <span class="hamburger-line transition duration-300 ease-in-out"></span>
                            <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                        </button>
                        
                        <nav id="nav-menu" class="hidden absolute py-5 bg-cyan-800 bg-opacity-60 transition duration-500 shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                            <ul class="block lg:flex">
                                <li class="group">
                                    <a href="#home" class="text-base text-white py-2 mx-8 flex group-hover:text-cyan-500">Home</a>
                                </li>
                                <li class="group">
                                    <a href="#about" class="text-base text-white py-2 mx-8 flex group-hover:text-cyan-500">About</a>
                                </li>
                                <li class="group">
                                    <a href="#gallery" class="text-base text-white py-2 mx-8 flex group-hover:text-cyan-500">Gallery</a>
                                </li>
                                <li class="group">
                                    <a href="#contact" class="text-base text-white py-2 mx-8 flex group-hover:text-cyan-500">Contact</a>
                                </li>
                                <li class="flex items-center pl-8">
                                    <div class="flex">
                                        <span class="mr-2 text-sm text-white">light</span>
                                        <input type="checkbox" class="hidden" id="dark-toggle">
                                        <label for="dark-toggle">
                                            <div class="flex h-5 w-9 cursor-pointer items-center rounded-full bg-slate-700 p-1">
                                                <div class="toggle-circle h-4 w-4 rounded-full bg-white transition duration-300 ease-in-out"></div>
                                            </div>
                                        </label>
                                        <span class="ml-2 text-sm text-white">dark</span>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header -->

        <!-- Hero section start-->
        <div class="flex-1 flex items-center">
            <div class="container mx-auto px-4">
                <div class="text-center mx-auto">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-white font-semibold">UKM PENA</h1>
                    <p class="font-light text-xl sm:text-2xl text-white md:text-3xl mt-5">Programming Engineering & Networking Adhi Guna (PENA)</p>
                    <a href="#" class="px-5 py-2 inline-block rounded-lg bg-cyan-500 text-white hover:bg-cyan-300 transition-colors mt-10">Join Us</a>
                </div>
            </div>
        </div>
        <!-- End Hero section -->
    </section>
    <!--navbar end-->

      <!-- Back to top Start -->
          <a href="#home" id="to-top" class="fixed z-[9999] hidden justify-center items-center bottom-4 
            right-4 p-4 h-14 w-14 rounded-full bg-cyan-400 hover:animate-pulse">
                <span class="block w-5 h-5 border-t-2 border-l-2 rotate-45 mt-2"></span>
          </a>
      <!-- Back to top End -->

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
    <script src="{{ asset('assets/js/nav.js')}}"></script>
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
