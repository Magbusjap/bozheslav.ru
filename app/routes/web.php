<?php

use Illuminate\Support\Facades\Route;

// Главная
Route::get('/', function () {
    $posts = \App\Models\Post::where('status', 'published')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();
    return view('index', compact('posts'));
});

// Страницы
Route::get('/skills', fn() => view('skills'));
Route::get('/portfolio', fn() => view('portfolio'));
Route::get('/experience', fn() => view('experience'));
Route::get('/contacts', fn() => view('contacts'));

// Блог — список постов
Route::get('/blog', function () {
    $posts = \App\Models\Post::where('status', 'published')
        ->orderBy('created_at', 'desc')
        ->get();
    $categories = \App\Models\Category::all();
    return view('blog', compact('posts', 'categories'));
});

// Блог — отдельная статья
Route::get('/{slug}', function ($slug) {
    $query = \App\Models\Post::where('slug', $slug);
    
    if (!auth()->check()) {
        $query->where('status', 'published');
    }
    
    $post = $query->first();
    
    if (!$post) {
        abort(404);
    }
    
    return view('article', compact('post'));
});


// Форма обратной связи
Route::post('/contacts', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'name'    => 'required|string|max:100',
        'email'   => 'required|email|max:100',
        'subject' => 'required|string|max:200',
        'message' => 'nullable|string|max:2000',
        'honeypot' => 'max:0', // защита от спамботов
    ]);

    \Illuminate\Support\Facades\Mail::to('i@mankudinov.ru')
        ->send(new \App\Mail\ContactFormMail(
            senderName:   $request->name,
            senderEmail:  $request->email,
            mailSubject:  $request->subject ?? 'Без темы',
            mailMessage:  $request->message,
        ));

    return response()->json(['success' => true]);
})->middleware('throttle:5,1'); // максимум 5 отправок в минуту