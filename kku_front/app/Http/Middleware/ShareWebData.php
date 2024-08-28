<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class ShareWebData extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $infos = $this->getWebInfo('', '');
        $webInfo = $this->infoSetting($infos);
        // View::share('datatest', $datatest);
        $main_cate = Category::where('is_menu', true)->OrderBy('cate_priority')->get();
        View::share('webInfo', $webInfo);
        View::share('main_cate', $main_cate);
        return $next($request);
    }
}
