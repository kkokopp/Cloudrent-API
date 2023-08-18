<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
     
     <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full lg:translate-x-0 bg-gradient-to-t from-blue-500 to-birtu" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto my-5 shadow">
           <a href="#" class="flex flex-col items-center mb-5 m-5">
              <img src="{{ asset('images/logo.jpg') }}" class="w-auto" alt="Flowbite Logo" />
              <h1 class="text-white bold">Cloud Rent</h1>
            </a>
           <hr class="bg-black border-1 opacity-100">
           <ul class="space-y-2 font-medium pt-3">

              
              <li>
                  <x-sidebar-menu :link="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <svg aria-hidden="true" class="w-6 h-6 transition duration-75 e" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                    <span class="ml-3">Dashboard</span>
                  </x-sidebar-menu>
              </li>
              <li>
                  <x-sidebar-menu :link="route('mobil')" :active="request()->routeIs('mobil')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink w-6 h-6" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                      <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Mobil</span>
                  </x-sidebar-menu>
                </li>
                <li>
                  <x-sidebar-menu :link="route('pesanan')" :active="request()->routeIs('pesanan')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cart w-6 h-6" viewBox="0 0 16 16">
                      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>                    
                    <span class="flex-1 ml-3 whitespace-nowrap">Pesanan</span>
                    @if(count($pesanan_notif)!== 0)
                      <span class="bg-pink-100 text-pink-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-pink-900 dark:text-pink-300">{{ count($pesanan_notif) }}</span>
                    @endif
                  </x-sidebar-menu>
              </li>
              <li>
                  <x-sidebar-menu :link="route('invoice')" :active="request()->routeIs('invoice')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6" fill="currentColor"><path d="M9.5,10.5H12a1,1,0,0,0,0-2H11V8A1,1,0,0,0,9,8v.55a2.5,2.5,0,0,0,.5,4.95h1a.5.5,0,0,1,0,1H8a1,1,0,0,0,0,2H9V17a1,1,0,0,0,2,0v-.55a2.5,2.5,0,0,0-.5-4.95h-1a.5.5,0,0,1,0-1ZM21,12H18V3a1,1,0,0,0-.5-.87,1,1,0,0,0-1,0l-3,1.72-3-1.72a1,1,0,0,0-1,0l-3,1.72-3-1.72a1,1,0,0,0-1,0A1,1,0,0,0,2,3V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V13A1,1,0,0,0,21,12ZM5,20a1,1,0,0,1-1-1V4.73L6,5.87a1.08,1.08,0,0,0,1,0l3-1.72,3,1.72a1.08,1.08,0,0,0,1,0l2-1.14V19a3,3,0,0,0,.18,1Zm15-1a1,1,0,0,1-2,0V14h2Z"></path></svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Tagihan</span>
                    @if(count($transfer_notif) !== 0)
                      <span class="bg-pink-100 text-pink-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-pink-900 dark:text-pink-300">{{ count($transfer_notif) }}</span>
                    @endif
                  </x-sidebar-menu>
              </li>
              <hr>
              <li>
                  <x-sidebar-menu :link="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Administrator</span>
                  </x-sidebar-menu>
                  
                  <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-sidebar-menu :link="route('logout')" @click.prevent="$root.submit();">
                      <svg fill="currentColor" class="flex-shrink-0 w-6 h-6 transition duration-75" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                      viewBox="0 0 198.715 198.715" xml:space="preserve"><g><path d="M161.463,48.763c-2.929-2.929-7.677-2.929-10.607,0c-2.929,2.929-2.929,7.677,0,10.606
                       c13.763,13.763,21.342,32.062,21.342,51.526c0,19.463-7.579,37.761-21.342,51.523c-14.203,14.204-32.857,21.305-51.516,21.303
                       c-18.659-0.001-37.322-7.104-51.527-21.309c-28.405-28.405-28.402-74.625,0.005-103.032c2.929-2.929,2.929-7.678,0-10.606
                       c-2.929-2.929-7.677-2.929-10.607,0C2.956,83.029,2.953,138.766,37.206,173.019c17.132,17.132,39.632,25.697,62.135,25.696
                       c22.497-0.001,44.997-8.564,62.123-25.69c16.595-16.594,25.734-38.659,25.734-62.129C187.199,87.425,178.059,65.359,161.463,48.763
                       z"/><path d="M99.332,97.164c4.143,0,7.5-3.358,7.5-7.5V7.5c0-4.142-3.357-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v82.164
                       C91.832,93.807,95.189,97.164,99.332,97.164z"/></g></svg>
                      <span class="flex-1 ml-3 whitespace-nowrap">Log Out</span>
                    </x-sidebar-menu>

                    {{-- <x-dropdown-link href="{{ route('logout') }}"
                             @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link> --}}
                </form>
              </li>
           </ul>
        </div>
     </aside>  
</div>

