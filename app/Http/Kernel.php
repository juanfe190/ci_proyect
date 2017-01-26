<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],

        'login'=>[
            \App\Http\Middleware\AuthMid\CheckIfResetNeeded::class,
            \App\Http\Middleware\AuthMid\AfterLogin::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\AuthMid\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\AuthMid\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        //ROLES
        'CheckRol' => \App\Http\Middleware\RolesMid\CheckRolesExistence::class,
        'CheckRolUserRelation' => \App\Http\Middleware\RolesMid\CheckRolUserRelationship::class,

        //USERS
        'CheckUser' => \App\Http\Middleware\UsersMid\CheckUsersExistance::class,
        'CheckPassOnReset' => \App\Http\Middleware\PassResetMid\CheckPassOnReset::class,
        'CheckIfResetExists' => \App\Http\Middleware\PassResetMid\CheckIfResetExists::class,

        //CATEGORIES
        'CheckColor' => \App\Http\Middleware\CategoryMid\ColorMiddleware::class,
        'CheckCategory' => \App\Http\Middleware\CategoryMid\CheckCategoryExistance::class,

        //CURSOS
        'VideoCourseCode' => \App\Http\Middleware\CursosMid\GenerateVideoCourseCode::class,
        'CheckCategoryNotEmpty' => \App\Http\Middleware\CursosMid\CategoryNotEmptyMid::class,
        'CheckCourse' => \App\Http\Middleware\CursosMid\CheckCourseExistance::class,

        //STAGES
        'SetStagePosition' => \App\Http\Middleware\StagesMid\GetStagePosition::class,
        'CheckStage' => \App\Http\Middleware\StagesMid\CheckStageExistance::class,

        //ITEMS
        'SetItemPosition' => \App\Http\Middleware\ItemsMid\GetItemPosition::class,
        'ItemCode' => \App\Http\Middleware\ItemsMid\GenerateItemCode::class
    ];
}
