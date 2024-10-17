<?php
namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Responses\CustomLoginResponse;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\RequestPasswordResetLinkViewResponse;

use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
        // $this->app->singleton(RequestPasswordResetLinkViewResponse::class, function () {
        //     return new class implements RequestPasswordResetLinkViewResponse {
        //         public function toResponse($request)
        //         {
        //             return view('auth.passwords.request');  // Retourner la vue personnalisée
        //         }
        //     };
        // });
        
        // Tu n'as pas besoin de définir les vues ici, car elles sont dans boot()
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Vue pour la page d'enregistrement
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // Vue pour la page de connexion
        Fortify::loginView(function () {
            return view('auth.login');
        });
        Fortify::requestPasswordResetLinkView(function (){
            return view('auth.passwords.request');  // Retourner la vue pour demander le lien de réinitialisation du mot de passe
        });
        Fortify::resetPasswordView(function () {
        return view('auth.passwords.reset');  
        });
        Fortify::verifyEmailView(function () {
            return view('auth.verify-email');  // Retourner la vue pour la vérification de l'email
        });

Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);

        // Enregistrer une implémentation pour LoginViewResponse
        $this->app->singleton(LoginViewResponse::class, function () {
            return new class implements LoginViewResponse {
                public function toResponse($request)
                {
                    return view('auth.login');  // Retourner la vue de connexion
                }
            };
        });

        // Autres configurations liées à Fortify
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        
        // Limitation des tentatives de connexion
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());
            return Limit::perMinute(5)->by($throttleKey);
        });

        // Limitation des tentatives pour l'authentification à deux facteurs
        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
        
    }
}
