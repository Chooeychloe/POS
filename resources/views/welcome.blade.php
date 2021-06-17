<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stone Base</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        
        <script type="module" src="https://unpkg.com/ionicons@5.5.1/dist/ionicons/ionicons.esm.js"></script>
        <!-- Styles -->
        <style>
            *{
                font-family: Roboto,Arial, Helvetica, sans-serif;
            }
            
            .home-nav{
               background-color: #1482C1;
               
            }

            @media only screen and (min-width: 1024px) {
                .home-nav{
                    background: url('/images/nav-bg.jpg'), #ffffff;
                    background-repeat: no-repeat;
                    background-position-x: left;
                    background-position-y: top;
                }
            }

            .hero{
                height: 60vh;
            }
            .hero-image{
                background: url('/images/hero.jpg');
                background-repeat: no-repeat;
                background-size: 100%;
                background-position-y: top;
                background-attachment: fixed;
            }
            @media only screen and (min-width: 700px) {
                .hero-image{
                    background-position-y: bottom;
                }
            }

            .section-image{
                background: url('/images/triangle-bg-image.png');
                background-repeat: no-repeat;
                background-position-x: left;
                background-position-y: top;
                background-size: 50%;
            }
        </style>
    </head>
    <body class="max-w-screen-2xl mx-auto">
        <nav class="home-nav">
            <div class="grid grid-cols-2 justify-between py-1 px-2">

                <section class="text-white flex flex-row lg:flex-row-reverse lg:pr-48 col-span-2 sm:col-span-1 justify-center sm:justify-start">
                    <div class="py-4 lg:py-2">
                        <img class="h-20 lg:h-24" src="/images/logo.png" alt="Logo">
                    </div>
                    <div class="flex justify-center flex-col text-center">
                        <h1 class="text-xl lg:text-2xl xl:text-3xl font-black">STONE BASE</h1>
                        <h6 class="text-xs lg:text-sm">Builds Your Trust</h6>
                    </div>
                </section>

                <section class="flex justify-center sm:justify-end lg:justify-start space-x-4 lg:pl-24 xl:pl-10 col-span-2 sm:col-span-1">
                    <a href="/" class="h-max my-auto text-white lg:text-blue-600  bg-blue-500 rounded-md py-1 px-2 bg-opacity-0 hover:text-white hover:bg-opacity-100 transition-all text-sm lg:text-base">ABOUT US</a>
                    <a href="/" class="h-max my-auto text-white lg:text-blue-600  bg-blue-500 rounded-md py-1 px-2 bg-opacity-0 hover:text-white hover:bg-opacity-100 transition-all text-sm lg:text-base"">SERVICES</a>
                    <a href="/" class="h-max my-auto text-white lg:text-blue-600  bg-blue-500 rounded-md py-1 px-2 bg-opacity-0 hover:text-white hover:bg-opacity-100 transition-all text-sm lg:text-base">CONTACT US</a>
                </section>
            </div>
        </nav>

        {{-- HERO --}}
        <div class="hero">
            <div class="grid grid-cols-12 h-full relative">
                <section class="col-span-12 md:col-span-10 lg:col-span-7 hero-image">
                    
                </section>
                <section class="col-span-12 md:col-span-2 lg:col-span-5 px-5 flex flex-col justify-start lg:justify-end space-y-3 bg-white absolute right-0 top-1/3 md:top-1/4 pt-10 lg:pt-0 bg-opacity-90 lg:static lg:top-0" style="min-height: 50vh; max-width: 80vw">
                    <h1 class="text-4xl xl:text-5xl text-blue-800 font-black">We Offer Services that all you need.</h1>
                    <h4 class="text-gray-700 text-sm md:text-lg">We serve 24/7 with no commitment. Join our rappidly developing team.</h4>
                    <div class="flex sm:flex-col sm:space-y-2   space-x-2 sm:space-x-0 h-max">
                        <a href="https://www.instagram.com/" class="w-max h-max">
                            <ion-icon class="text-gray-800 text-2xl md:text-4xl hover:text-blue-800 transition-all table my-auto" name="logo-facebook"></ion-icon>
                        </a>
                        <a href="https://www.instagram.com/" class="w-max h-max">
                            <ion-icon class="text-gray-800 text-2xl md:text-4xl hover:text-blue-800 transition-all table my-auto" name="logo-instagram"></ion-icon>
                        </a>
                        <a href="https://mail.google.com/mail/u/0/" class="w-max h-max">
                            <ion-icon class="text-gray-800 text-2xl md:text-4xl hover:text-blue-800 transition-all table my-auto" name="mail"></ion-icon>
                        </a>
                    </div>
                </section>
            </div>
        </div>

        <main class="my-16 lg:my-36 px-10">
            {{-- OUT STORY --}}
            <section>
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <section class="px-10">
                        <h2 class="text-center text-blue-700 text-4xl font-bold">Our Story</h2>
                        <div class="mt-5 md:max-w-md mx-auto overflow-hidden">
                            <p class="text-sm text-justify text-gray-700">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit eveniet odit assumenda, repellendus tenetur aperiam quia, laboriosam eum consequuntur nobis est fugiat magnam natus atque quibusdam nemo unde adipisci. <br/><br/> Dignissimos.Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit eveniet odit assumenda </p>
                        </div>
                        <img class="mt-5 hidden lg:block" src="/images/bg-design.png">
                    </section>
                    <section class="md:px-36 lg:px-16 pt-5 lg:pt-0">
                        <div class="section-image p-3 lg:p-5">
                            <img class="" src="/images/story.jpg" alt="people communicating">
                        </div>
                        <img class="mt-5 block lg:hidden" src="/images/bg-design.png" style="margin-top: -150px; margin-left: -100px">
                    </section>
                </div>
            </section>

            <section>
                
            </section>

            

        </main>
    </body>
</html>
