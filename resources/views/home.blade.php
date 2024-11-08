  <x-layout>
      <x-slot:title>{{ $title }}</x-slot:title>
      {{-- @auth
      @if (Auth::user()->role == 'masyarakat')
          <h1>yes sirr</h1>
      @endif
      @if (Auth::user()->role == 'petugas')
          <h1>nah sirr</h1>
      @endif
          <h3 class="text-xl">Hello World!</h3>
      @else
          <p>Not logged in</p> <!-- Tambahkan ini untuk debugging -->
      @endauth --}}
      <div class=" px-6 pt-8 lg:px-8">
          <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
              aria-hidden="true">
          </div>
          <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:py-32">
              <div class="text-center">
                  <h1 class="text-balance text-5xl font-semibold tracking-tight sm:text-7xl" style="color: #51eefc">
                      Pelaporan Masyarkat Online</h1>
                  <p class="mt-8 text-pretty text-lg font-medium text-gray-100 sm:text-xl/8">Website untuk masyarakat
                      yang ingin melaporkan mengenai masalah yang di alami.</p>
                  <div class="mt-10 flex items-center justify-center gap-x-6">
                  </div>
              </div>
          </div>
          <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
              aria-hidden="true">
          </div>
      </div>
      </div>



      <section style="background-color: #303030">
          <div
              class="gap-8 items-center py-8 px-8 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6"">
              <img class="w-full dark:hidden" src="img/laptopfoto.jpeg" alt="dashboard image">
              <img class="w-full hidden dark:block"
                  src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/cta/cta-dashboard-mockup-dark.svg"
                  alt="dashboard image">
              <div class="mt-4 md:mt-0">
                  <h2 class="mb-4 text-4xl tracking-tight font-extrabold dark:text-white" style="color: #51eefc">Segera
                      laporkan keresahan Anda pada kami!</h2>
                  <p class="mb-6 font-light text-gray-100 md:text-lg dark:text-gray-400">Website kami dapat mem-provide
                      Anda/Masyarakat untuk menerima masalah-masalah yang Anda alami, masalah Internel maupun External.
                      Kami siap membantu 24/7.</p>
                  <a href="/posts"
                      class="inline-flex items-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900">
                      Laporkan!
                      <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                      </svg>
                  </a>
                  @if (!auth()->check())
                      <a href="/login"
                          class="inline-flex items-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900">
                          Sebelum Melapor sebaiknya Anda login terlebih dahulu!
                          <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                              xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd"
                                  d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                          </svg>
                      </a>
                  @endif
              </div>
          </div>
      </section>

  </x-layout>
