<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    // Redirigir a GitHub
    public function redirectToGitHub() {
        return Socialite::driver('github')->redirect();
    }

    // Callback después del login con GitHub
    public function handleGitHubCallback() {
        try {
            $githubUser = Socialite::driver('github')->user();

            // Buscar al usuario por email
            $user = User::where('email', $githubUser->getEmail())->first();

            // Si no existe, lo creamos
            if (!$user) {
                $user = User::create([
                    'name' => $githubUser->getName() ?? $githubUser->getNickname(),
                    'email' => $githubUser->getEmail(),
                    'github_id' => $githubUser->getId(),
                    'password' => bcrypt('password') // Puedes cambiar esto
                ]);
            }

            // Iniciar sesión al usuario
            Auth::login($user);

            return redirect('/dashboard'); // Redirigir después del login

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Hubo un problema al iniciar sesión con GitHub.');
        }
    }
}

?>