<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
use OpenApi\Annotations as OA;

class BotController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/bot/getupdates",
     *      operationId="getUpdates",
     *      tags={"Projects"},
     *      summary="Get list of projects",
     *      description="Returns list of projects",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *  )
     */
    public function getUpdates()
    {
        $updates = Telegram::getUpdates();
        // $updates = Telegram::addCommand(\App\Http\Commands\HelpCommand::class);
        return response()->json($updates);
    }
}
