<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\AdSlide;

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
        $cate = Category::where('cate_url', $request->path())->first();
        if ($cate) {
            // ถ้า $cate ไม่ใช่ null
            $imageBanner = AdSlide::where('page_id', $cate->id)->first();
        } else {
            // ถ้า $cate เป็น null
            $imageBanner = null; // หรือกำหนดค่า default อะไรก็ได้
        }
        // print_r($imageBanner);
        $infos = $this->getWebInfo('', '');
        $webInfo = $this->infoSetting($infos);
        // View::share('datatest', $datatest);
        $main_cate = Category::where('is_menu', true)->OrderBy('cate_priority')->get();
        View::share('webInfo', $webInfo);
        View::share('main_cate', $main_cate);
        View::share('cate', $cate);
        View::share('imageBanner', $imageBanner);
        return $next($request);
    }
}
