<nav class="flex items-center justify-between h-16">
    <div>
        <a href="{{ route('home') }}">
            <x-forum.logo />
        </a>
    </div>
    
    <div class="flex gap-4">
        <a href="#" class="text-sm font-semibold">Foro</a>
        <a href="#" class="text-sm font-semibold">Blog</a>
    </div>
    
    <div>
        @if(auth()->check())
            <!-- Si el usuario está autenticado, mostrar el nombre y un botón de logout -->
            <span class="text-sm font-semibold">Hola, {{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="text-sm font-semibold">Cerrar sesión</button>
            </form>
        @else
            <!-- Si el usuario no está autenticado, mostrar el botón de login -->
            <a href="{{ route('login') }}" class="text-sm font-semibold">Log in &rarr;</a>
        @endif
    </div>
</nav>
