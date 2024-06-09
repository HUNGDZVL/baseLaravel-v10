<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $path = $request->path(); // Returns 'cpanel/products'
        echo $path;

        $admin = $request->is("cpanel*"); // This will return true
        if ($admin) {
            echo "<h2>Chào admin</h2>";
        }
        echo "</br>";
        echo "test Middleware routes";

        return $next($request);
    }
}
