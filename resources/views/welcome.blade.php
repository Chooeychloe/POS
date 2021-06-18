<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stone Base</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        
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

            .design-title{
                background: url('/images/title-design.png');
                background-repeat: no-repeat;
                background-position-y: bottom;
            }

            html {
                scroll-behavior: smooth;
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
                    <a href="#story" class="h-max my-auto text-white lg:text-blue-600  bg-blue-500 rounded-md py-1 px-2 bg-opacity-0 hover:text-white hover:bg-opacity-100 transition-all text-sm lg:text-base">ABOUT US</a>
                    <a href="#offer" class="h-max my-auto text-white lg:text-blue-600  bg-blue-500 rounded-md py-1 px-2 bg-opacity-0 hover:text-white hover:bg-opacity-100 transition-all text-sm lg:text-base"">SERVICES</a>
                    <a href="#footer" class="h-max my-auto text-white lg:text-blue-600  bg-blue-500 rounded-md py-1 px-2 bg-opacity-0 hover:text-white hover:bg-opacity-100 transition-all text-sm lg:text-base">CONTACT US</a>
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

        <main class="mb-16 mt-24 lg:my-36 px-3 md:px-24">
            {{-- OUR STORY --}}
            <section id="story">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <section class="">
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

            {{-- WE OFFER --}}
            <section class="max-w-screen-lg mx-auto px-5" id="offer">
                <h2 class="text-blue-700 text-4xl font-bold mb-5 md:mb-10 lg:mb-24">WE OFFER</h2>

                <section class="flex  lg:space-x-10 my-5 flex-col lg:flex-row justify-center lg:justify-start">
                    <div class="p-3 lg:p-5 section-image w-max mx-auto lg:mx-0 flex overflow-hidden flex-shrink-0">
                        <div data-aos="fade-up" data-aos-once="true" class="w-80 md:w-96 h-80 md:h-96 relative">
                            <img  class="min-h-full min-w-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" src="/images/deliver.jpg" alt="Delivery Truck">
                        </div>
                    </div>
                    <div class="max-w-lg mx-auto lg:mx-0">
                        <h4 class="font-bold text-xl md:text-2xl my-3">DELIVERY</h4>
                        <p class="text-justify text-gray-700 text-sm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit blanditiis nam cupiditate exercitationem, suscipit obcaecati ad consectetur maiores tempora atque excepturi culpa facere. Officia optio quaerat sunt ea provident doloremque!</p>
                    </div>
                </section>

                <section class="flex  lg:space-x-10 my-10 flex-col lg:flex-row-reverse justify-center lg:justify-between">
                    <div class="p-3 lg:p-5 section-image w-max mx-auto lg:mx-0 flex overflow-hidden flex-shrink-0">
                        <div data-aos="fade-up" data-aos-once="true" class="w-80 md:w-96 h-80 md:h-96 relative">
                            <img class="min-h-full min-w-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" src="/images/costumer-support.jpg" alt="Delivery Truck">
                        </div>
                    </div>
                    <div class="max-w-lg mx-auto lg:mx-0 md:pr-10">
                        <h4 class="font-bold text-xl md:text-2xl my-3">COSTUMER SUPPORT</h4>
                        <p class="text-justify text-gray-700 text-sm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit blanditiis nam cupiditate exercitationem, suscipit obcaecati ad consectetur maiores tempora atque excepturi culpa facere. Officia optio quaerat sunt ea provident doloremque!

                        Reprehenderit blanditiis nam cupiditate exercitationem, suscipit obcaecati ad consectetur maiores tempora atque excepturi culpa facere. Officia optio quaerat sunt ea provident doloremque!
                        </p>
                    </div>
                </section>

                <section class="flex  lg:space-x-10 my-5 flex-col lg:flex-row justify-center lg:justify-start">
                    <div class="p-3 lg:p-5 section-image w-max mx-auto lg:mx-0 flex overflow-hidden flex-shrink-0">
                        <div data-aos="fade-up" data-aos-once="true" class="w-80 md:w-96 h-80 md:h-96 relative">
                            <img class="min-h-full min-w-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" src="/images/maintenance.jpg" alt="Delivery Truck">
                        </div>
                    </div>
                    <div class="max-w-lg mx-auto lg:mx-0">
                        <h4 class="font-bold text-xl md:text-2xl my-3">MAINTENANCE</h4>
                        <p class="text-justify text-gray-700 text-sm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit blanditiis nam cupiditate exercitationem, suscipit obcaecati ad consectetur maiores tempora atque excepturi culpa facere. Officia optio quaerat sunt ea provident doloremque!</p>
                    </div>
                </section>
                
            </section>

            {{-- OUR CLIENT --}}
            <section class="my-10">
                <div class="design-title w-max px-2 py-3">
                    <h2 class="text-blue-700 text-2xl md:text-3xl lg:text-4xl font-bold">OUR CLIENTS</h2>
                </div>
                <div class="py-5">
                    <div data-aos="fade-right" data-aos-once="true" class="border border-blue-300 shadow-md w-72 h-24 overflow-hidden relative mx-3 inline-block">
                        <img  class="min-h-full min-w-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" src="/images/amazon-logo.png" alt="amazon">
                    </div>
                    <div data-aos="fade-right" data-aos-once="true" class="border border-blue-300 shadow-md w-72 h-24 overflow-hidden relative mx-3 inline-block">
                        <img class="min-h-full min-w-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" src="/images/bird-logo.png" alt="bird">
                    </div>
                    <div data-aos="fade-right" data-aos-once="true" class="border border-blue-300 shadow-md w-72 h-24 overflow-hidden relative mx-3 inline-block">
                        <img class="min-h-full min-w-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" src="/images/rocket-logo.jpg" alt="rocket">
                    </div>
                </div>

            </section>

            {{-- CEO TESTIMONIAL --}}
            <section data-aos="fade-down"  class="mb-10 mt-10 md:mt-36 flex flex-col space-y-2 justify-center">
                <h1 class="text-5xl font-black text-center">"Business Partners makes the Best Works"</h1>
                <p class="max-w-screen-md text-center text-gray-600 mx-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eius id sequi ipsa nemo sit quia tempora voluptatum ab. Cupiditate tenetur molestias quas doloribus aliquid hic, facilis ea repellendus! Repellat! Molestias eius id sequi ipsa nemo sit quia tempora voluptatum ab. Cupiditate tenetur molestias quas doloribus aliquid hic, facilis ea repellendus! Repellat!</p>
                <div class="w-16 h-16 rounded-full border-8 border-blue-500 relative mx-auto overflow-hidden">
                    <img class="min-h-full min-w-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" src="/images/ceo.jpg" alt="CEO">
                </div>
                <h5 class="text-center text-lg font-bold">John Doe</h5>
                <h6 class="text-center text-sm">CEO Stone Base Corp.</h6>
            </section>
        </main>

        <footer id="footer">
            <div class="grid grid-cols-12">

                <section class="col-span-12 lg:col-span-4 bg-blue-700 px-5 py-10 text-white sm:text-center flex sm:flex-col" style="background-color: #1482C0">
                    <img class="w-36 sm:w-48 sm:mx-auto" src="/images/logo.png" alt="logo">
                    <div class="flex flex-col justify-center">
                        <h1 class="text-4xl font-bold my-2">STONE BASE</h1>
                        <h2 class="text-md">BUILDS YOUR TRUST</h2>
                    </div>
                </section>

                <section class="col-span-12 lg:col-span-8 p-10 text-white flex flex-col justify-center space-y-5" style="background-color: #169898">

                    {{-- contancts --}}
                    <div class="flex flex-col space-y-5 sm:flex-row sm:space-y-0 sm:space-x-5">
                        <section class="flex space-x-1">
                            <div>
                                <ion-icon class="text-5xl" name="mail"></ion-icon>
                            </div>
                            <div class="flex flex-col justify-center">
                                <h6 class="text-gray-200 text-xs">Email</h6>
                                <h5>stonebase@gmail.com</h5>
                            </div>
                        </section>
                        <section class="flex space-x-1">
                            <div>
                                <ion-icon class="text-5xl" name="call"></ion-icon>
                            </div>
                            <div class="flex flex-col justify-center">
                                <h6 class="text-gray-200 text-xs">Phone</h6>
                                <h5>+63912339592</h5>
                            </div>
                        </section>
                        <section class="flex space-x-1">
                            <div>
                                <ion-icon class="text-5xl" name="location"></ion-icon>
                            </div>
                            <div class="flex flex-col justify-center">
                                <h6 class="text-gray-200 text-xs">Location</h6>
                                <h5>Bacoor, Cavite</h5>
                            </div>
                        </section>
                    </div>

                    <div class="flex flex-col space-y-10 md:flex-row md:space-y-0 md:space-x-10">
                        <section class="md:w-max">
                            <h6 class="text-xs text-gray-200 mb-2">Be on our mailing list</h6>
                            <div class="flex justify-between border-4 border-white">
                                <input type="text" placeholder="Your Email" class="p-3 bg-transparent outline-none placeholder-gray-100 w-full">
                                <div class="border-l-4 px-4 py-2 hover:bg-green-700 transition-all cursor-pointer flex-shrink-0">
                                    <h3 class="text-white text-lg">Be Notified</h3>
                                </div>
                            </div>
                        </section>

                        <section class="w-max">
                            <h6 class="text-xs text-gray-200 mb-2">Lets Connect</h6>
                            <div class="flex space-x-5 h-max">
                                <a href="https://www.instagram.com/" class="w-max h-max">
                                    <ion-icon class="text-white text-5xl hover:text-blue-800 transition-all table my-auto" name="logo-facebook"></ion-icon>
                                </a>
                                <a href="https://www.instagram.com/" class="w-max h-max">
                                    <ion-icon class="text-white text-5xl hover:text-blue-800 transition-all table my-auto" name="logo-instagram"></ion-icon>
                                </a>
                                <a href="https://mail.google.com/mail/u/0/" class="w-max h-max">
                                    <ion-icon class="text-white text-5xl hover:text-blue-800 transition-all table my-auto" name="mail"></ion-icon>
                                </a>
                            </div>
                        </section>
                    </div>

                </section>

            </div>
        </footer>

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </body>
</html>
