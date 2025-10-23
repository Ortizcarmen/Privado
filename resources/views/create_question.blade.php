<x-forum.layouts.app>

    @if (Auth::check())  <!-- Solo se muestra el formulario si el usuario está logueado -->
        <form action="{{ route('preguntas') }}" method="POST" class="w-full max-w-4xl mx-auto mt-12 p-10 bg-gradient-to-br from-black to-gray-800 rounded-lg shadow-xl">
            @csrf
            <h2 class="text-3xl font-bold text-center text-white mb-8">Crear Pregunta</h2>

            <!-- Título -->
            <div class="mb-6">
                <label for="title" class="block text-white text-lg font-medium mb-2">Título:</label>
                <input type="text" name="title" id="title" required class="w-full p-4 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" placeholder="Escribe el título de tu pregunta">
            </div>

            <!-- Contenido -->
            <div class="mb-6">
                <label for="content" class="block text-white text-lg font-medium mb-2">Contenido:</label>
                <textarea name="content" id="content" required class="w-full p-4 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" placeholder="Describe tu pregunta aquí..."></textarea>
            </div>

            <!-- Categoría -->
            <div class="mb-6">
                <label for="category_id" class="block text-white text-lg font-medium mb-2">Categoría:</label>
                <select name="category_id" id="category_id" required class="w-full p-4 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                    <option value="" disabled selected>Selecciona una categoría</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botón de enviar -->
            <div class="text-center">
                <button type="submit" class="w-full py-3 bg-pink-600 text-white font-semibold rounded-lg hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500">Preguntar</button>
            </div>

            <div class="mt-8">
                <a href="{{ route('home') }}" class="rounded-md bg-gray-600 text-white py-2 px-4 hover:bg-gray-500">
                    ← Regresar a la página principal
                </a>
            </div>

        </form>
    @else
        <!-- Si no está logueado, muestra este mensaje -->
        <p class="text-center text-white">Por favor, inicia sesión para poder hacer una pregunta.</p>
        <a href="{{ route('login') }}" class="text-center text-blue-500">Iniciar sesión</a>
    @endif

</x-forum.layouts.app>
