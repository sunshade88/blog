<?php

use App\Http\Controllers\NewsletterController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Services\Newsletter;
use Symfony\Component\Yaml\Yaml;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\RegisterController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\PostCommentsController;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');








//