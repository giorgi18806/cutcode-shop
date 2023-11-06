<?php

namespace App\Providers;

use App\Http\Kernel;
use Carbon\CarbonInterval;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            'Domain\Auth\Contracts\RegisterNewUserContract',
            'Domain\Auth\Actions\RegisterNewUserAction'
        );
    }

    public function boot(): void
    {
        Model::shouldBeStrict(!app()->isProduction()); // contains both preventLazyLoading() and preventsSilentlyDiscardingAttributes() methods
//        Model::preventLazyLoading(!app()->isProduction());
//        Model::preventsSilentlyDiscardingAttributes(!app()->isProduction());

        if(app()->isProduction()) {
//            DB::whenQueryingForLongerThan(CarbonInterval::seconds(5), function (Connection $connection, QueryExecuted $event) {
//                logger()
//                    ->channel('telegram')
//                    ->debug('whenQueryingForLongerThan: ' . $connection->query()->toSql());
//            });

            DB::listen(function ($query) {
                // $query->sql;
                // $query->bindings;
                // $query->time;

                if ($query->time > 100) {
                    logger()
                        ->channel('telegram')
                        ->debug('Query Longer Than 1ms: ' . $query->sql, $query->bindings);
                }

                dump($query->sql);
            });

            $kernel = app(Kernel::class);

            $kernel->whenRequestLifecycleIsLongerThan(
                CarbonInterval::seconds(4),
                function () {
                    logger()
                        ->channel('telegram')
                        ->debug('whenRequestLifecycleIsLongerThan: ' . request()->url());
                }
            );
        }
    }
}
