  <x-layout>
      <x-slot:title>{{ $title }}</x-slot:title>
      @auth
      @if (Auth::user()->role == 'masyarakat')
          <h1>yes sirr</h1>
      @endif
      @if (Auth::user()->role == 'petugas')
          <h1>nah sirr</h1>
      @endif
          <h3 class="text-xl">Hello World!</h3>
      @else
          <p>Not logged in</p> <!-- Tambahkan ini untuk debugging -->
      @endauth

  </x-layout>
