<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json([
                    'meta' => [
                        'status' => Response::HTTP_UNAUTHORIZED,
                        'message' => 'Token is Invalid!',
                    ],
                    'data' => null,
                ], Response::HTTP_UNAUTHORIZED);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json([
                    'meta' => [
                        'status' => Response::HTTP_UNAUTHORIZED,
                        'message' => 'Token is Expired!',
                    ],
                    'data' => null,
                ], Response::HTTP_UNAUTHORIZED);
            }else {
                return response()->json([
                    'meta' => [
                        'status' => Response::HTTP_UNAUTHORIZED,
                        'message' => 'Authorization Token Not Found!',
                    ],
                    'data' => null,
                ], Response::HTTP_UNAUTHORIZED);
            }
        }
        return $next($request);
    }
}
