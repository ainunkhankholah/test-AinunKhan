<?php

namespace App\Providers;

use App\Factories\MessageFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        foreach (['success', 'info', 'danger', 'warning'] as $type) {
            RedirectResponse::macro(
                $type,
                function (string $content) use ($type) {
                    return $this->with('message', [
                        'type' => $type,
                        'content' => $content,
                    ]);
                }
            );
        }
    }
}
