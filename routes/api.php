<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\API\AvatarController;
use App\Http\Controllers\Api\GuildController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
 *
 */


Route::apiResource('guilds', GuildController::class);
Route::apiResource('articles', ArticleController::class);
Route::apiResource('avatars', AvatarController::class);
Route::apiResource('games', AvatarController::class);
