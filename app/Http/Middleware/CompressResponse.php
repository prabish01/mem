<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CompressResponse
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Check if we should compress the response
        if (in_array('gzip', $request->getEncodings()) && function_exists('gzencode')) {
            $content = gzencode($response->getContent(), 9);

            return $response
                ->setContent($content)
                ->withHeaders([
                    'Content-Encoding' => 'gzip',
                    'Content-Length' => strlen($content),
                    'Cache-Control' => 'no-transform',
                ]);
        }

        return $response;
    }
}
