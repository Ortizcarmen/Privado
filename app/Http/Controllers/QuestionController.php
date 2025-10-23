<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // Mostrar el formulario de crear pregunta
    public function create()
    {
        // Recuperar todas las categorías de la base de datos
        $categories = Category::all(); // Asegúrate de tener el modelo Category correctamente configurado
        
        // Pasar las categorías a la vista
        return view('create_question', compact('categories'));
    }
    // app/Http/Controllers/QuestionController.php

    public function show(Question $question)
    {
        // Asegúrate de que se carguen las relaciones necesarias (por ejemplo, respuestas, categoría y usuario)
        $question->load('answers', 'category', 'user');

        // Pasar la pregunta cargada a la vista
        return view('questions.show', [
            'question' => $question,
        ]);
    }

    


    // Lógica para guardar la pregunta
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',  // Asegúrate de que la categoría sea válida
        ]);

        // Crear la pregunta y asociar la categoría y el usuario
        $question = Question::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id, // Guardamos la categoría seleccionada
            'user_id' => auth()->id(), // Asociamos el usuario que hace la pregunta
        ]);

        return redirect()->route('question.show', $question->id)
            ->with('success', 'Pregunta creada con éxito');
    }

    // Eliminar pregunta
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('home');
    }
}
