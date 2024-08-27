<?php

namespace App\Http\Controllers\frontoffice;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Post;
use App\Models\Service;
use App\Models\SubCategory;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function readService()
    {
        $serviceBanner = Post::where("posts.category", "=", ",4,")
            ->where("posts.is_maincontent", "=", 1)
            ->first();

        $serviceSubmenu = SubCategory::where("sub_categories.main_cate_id", "=", 4)
            ->join("posts", "sub_categories.cate_title", "=", "posts.title")
            ->select(
                "sub_categories.*",
                "posts.thumbnail_link",
                "posts.thumbnail_alt",
            )
            ->get();

        DB::statement("SET SESSION group_concat_max_len = 100000000000000");
        $serviceExample = Service::join("sub_categories", "services.sub_cate_id", "=", "sub_categories.id")
            ->leftjoin('post_images', 'post_images.service_id', '=', 'services.id')
            ->where('services.pin', 1)
            ->select(
                "services.*",
                "sub_categories.cate_title as type",
                DB::raw("GROUP_CONCAT(post_images.image_link) AS images"),
                "sub_categories.cate_url as slug",
            )
            ->orderBy("id", "DESC")
            ->first();

        $serviceList = Service::leftjoin("sub_categories", "services.sub_cate_id", "=", "sub_categories.id")
            ->where("services.pin", "=", 1)
            ->select(
                "services.*",
                "sub_categories.cate_title as type",
                "sub_categories.cate_url as slug"
            )
            ->orderBy("services.id", "DESC")
            ->get();

        $portfolioList = Portfolio::leftjoin("categories", "portfolios.category", "=", "categories.id")
            ->inRandomOrder()
            ->select(
                "portfolios.*",
                "categories.cate_title as type",
                "categories.cate_url as slug"
            )
            ->orderBy("portfolios.id", "DESC")
            ->limit(4)
            ->get();

        if ($serviceBanner && $serviceList && $serviceExample && $serviceSubmenu) {
            return response()->json([
                "status" => 200,
                "message" => "Get portfolio data successfully.",
                "banner" => $serviceBanner,
                "submenu" => $serviceSubmenu,
                "example" => $serviceExample,
                "list" => $serviceList,
                "ports" => $portfolioList,
            ], 200);
        }
        return response()->json([
            "status" => 422,
            "message" => "Something went wrong."
        ], 422);
    }

    public function readServiceDetail($id)
    {
        $services = Service::join("sub_categories", "services.sub_cate_id", "=", "sub_categories.id")
            ->leftjoin("post_images", "services.id", "=", "post_images.service_id")
            ->where("services.id", "=", $id)
            ->select(
                "services.id as id",
                "services.title as title",
                "services.description as description",
                "services.content as content",
                "services.thumbnail_link as thumbnail_link",
                "services.thumbnail_title as thumbnail_title",
                "services.thumbnail_alt as thumbnail_alt",
                "services.address as address",
                "services.size as size",
                "services.status as status",
                "sub_categories.cate_title as type",
                "post_images.id as sub_id",
                "post_images.image_link as sub_image_link",
                "post_images.title as sub_image_title",
                "post_images.alt as sub_image_description"
            )
            ->get();

        $formattedServices = [];
        foreach ($services as $service) {
            $mainservice = [
                'id' => $service->id,
                'title' => $service->title,
                'description' => $service->description,
                'content' => $service->content,
                'thumbnail_link' => $service->thumbnail_link,
                'thumbnail_title' => $service->thumbnail_title,
                'thumbnail_alt' => $service->thumbnail_alt,
                'address' => $service->address,
                'size' => $service->size,
                'status' => $service->status,
                'type' => $service->type,
                'subimages' => [],
            ];
            if ($service->sub_id) {
                $subimages = [
                    'id' => $service->sub_id,
                    'image_link' => $service->sub_image_link,
                    'image_title' => $service->sub_image_title,
                    'image_description' => $service->sub_image_description,
                ];
                $mainservice['subimages'][] = $subimages;
            }
            $existingMainServiceKey = array_search($mainservice['id'], array_column($formattedServices, 'id'));
            if ($existingMainServiceKey !== false) {
                $formattedServices[$existingMainServiceKey]['subimages'][] = $subimages;
            } else {
                $formattedServices[] = $mainservice;
            }
        }

        if ($services) {
            return response()->json([
                "status" => 200,
                "message" => "Get service detail data successfully.",
                "data" => $formattedServices
            ], 200);
        }
        return response()->json([
            "status" => 422,
            "message" => "Something went wrong."
        ], 422);
    }

    public function readServiceByCategory(Request $request)
    {
        try {
            $url = $request->url;
            $banner = SubCategory::where("sub_categories.cate_url", "=", $url)
                ->join("posts", "sub_categories.cate_title", "=", "posts.title")
                ->select(
                    "posts.*",
                )
                ->first();

            DB::statement("SET SESSION group_concat_max_len = 100000000000000");
            $service = Service::leftjoin('post_images', 'post_images.service_id', '=', 'services.id')
                ->leftjoin("sub_categories", "services.sub_cate_id", "=", "sub_categories.id")
                ->where("sub_categories.cate_url", "=", $url)
                // ->where('post_images.service_id', 'services.id')
                ->select(
                    "services.*",
                    DB::raw("GROUP_CONCAT(post_images.image_link) AS images"),
                    "sub_categories.cate_title as type",
                    "sub_categories.cate_url as slug"
                )
                ->get();

            if ($banner) {
                return response()->json([
                    "status" => 200,
                    "message" => "Get data successfully.",
                    "banner" => $banner,
                    "service" => $service
                ], 200);
            }
            return response()->json([
                "status" => 422,
                "message" => "Something went wrong."
            ], 422);
        } catch (Exception $e) {
            return response([
                'message' => 'error',
                'errorMessage' => $e->getMessage(),
            ], 500);
        }
    }
}
