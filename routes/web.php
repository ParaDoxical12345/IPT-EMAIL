    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::middleware(['auth', 'verified'])->group(function(){
        Route::get('/dashboard', function(){
            return view('dashboard');
        })->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

    Route::middleware('guest')->group(function () {
        Route::get('/', [AuthController::class, 'loginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
        Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
        Route::post('/register', [AuthController::class, 'register']);
        Route::get('/verification/{user}/{token}', [AuthController::class, 'verification']);
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware('auth', 'verified');;


