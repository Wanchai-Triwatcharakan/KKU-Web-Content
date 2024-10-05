<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Exception;

use App\Models\Post;
use App\Models\ScheduleTime;
use App\Models\SeminarRoom;
use App\Models\PostImage;

class RoomSeminarController extends BaseController
{
    //
    public function getSeminarRoom() {
        $room = SeminarRoom::all();
        return response([
            'message' => 'ok',
            'data' => $room,
        ], 200);
    }

    public function createRoom(Request $req) {
        $this->getAuthUser();
        $files = $req->allFiles();
        $params = $req->all();
        // $validator = Validator::make($req->all(), [
        //     'Thumbnail' => "mimes:jpg,png,jpeg,pdf|max:5000|nullable",
        //     'title' => "mimes:jpg,png,jpeg,pdf|max:5000|nullable",
        // ]);
        // if ($validator->fails()) {
        //     return $this->sendErrorValidators('Invalid params', $validator->errors());
        // }

        /* Upload Thumbnail */
        // $newFolder = "upload/" . date('Y') . "/" . date('m') . "/" . date('d') . "/";
        // $thumbnail = (isset($files['Thumbnail'])) ? $this->uploadImage($newFolder, $files['Thumbnail'], "", "", $params['ThumbnailName']) : "";

        // $thumbnail_title = isset($files['Thumbnail']) && !empty($files['Thumbnail']) ? $params['ThumbnailTitle'] : "";
        // $thumbnail_alt = isset($files['Thumbnail']) && !empty($files['Thumbnail']) ? $params['ThumbnailAlt'] : "";

        try {

            DB::beginTransaction();
            $room = SeminarRoom::create([
                "title" => $params['title'],
                "description" => $params['description'],
                "status_display" => $params['display'],
                "priority" => $params['priority'],
            ], Response::HTTP_CREATED);

            $scheduleList = json_decode($params['schedulelist'], true);
            $scheduleData = [];
            foreach ($scheduleList as $index => $list) {
                if(!$list['startTime']) { continue;}
                $scheduleData[] = [
                    'room_id' => $room->id,
                    'time_start' => $list['startTime'],
                    'time_end' => $list['endTime'],
                    'description' => $list['details'],
                    'priority' => $index+1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            ScheduleTime::insert($scheduleData);

            DB::commit();

            return response([
                'message' => 'success',
                'description' => 'Created successful'
            ], 201);
        } catch (Exception $e) {
            DB::rollback();
            return response([
                'message' => 'error',
                'description' => 'Something went wrong',
                'errorsMessage' => $e->getMessage()
            ], 501);
        }
    }

    public function updateRoom(Request $req, $id) {
        $this->getAuthUser();
        $files = $req->allFiles();
        $params = $req->all();

        try {

            $room = SeminarRoom::find($id);
            DB::beginTransaction();
            $room->update([
                "title" => $params['title'],
                "description" => $params['description'],
                "status_display" => $params['display'],
                "priority" => $params['priority'],
            ]);

            $scheduleList = json_decode($params['schedulelist'], true);
            $scheduleData = [];
            $existingSchedules = [];
            $newSchedules = [];

            foreach ($scheduleList as $schedule) {
                // เช็คว่ามี id หรือไม่
                if (isset($schedule['id'])) {
                    // ถ้ามี id ให้ใส่ลงใน array สำหรับการอัปเดตข้อมูลเดิม
                    $existingSchedules[] = $schedule;
                } else {
                    // ถ้าไม่มี id ให้ใส่ลงใน array สำหรับการเพิ่มใหม่
                    $newSchedules[] = $schedule;
                }
            }

            foreach ($existingSchedules as $schedule) {
                ScheduleTime::where('id', $schedule['id'])->update([
                    'time_start' => $schedule['time_start'],
                    'time_end' => $schedule['time_end'],
                    'description' => $schedule['description'],
                    'updated_at' => now(),
                ]);
            }

            // ดึง id ของ ScheduleTime ทั้งหมดที่เกี่ยวข้องกับ post_id นี้
            $existingScheduleIds = ScheduleTime::where('room_id', $params['id'])->pluck('id')->toArray();

            // ดึง id ของข้อมูลจาก $existingSchedules
            $inputScheduleIds = array_column($existingSchedules, 'id');

            // หาความแตกต่างของ id ที่ไม่มีใน $existingSchedules
            $idsToDelete = array_diff($existingScheduleIds, $inputScheduleIds);

            // ลบข้อมูลที่ไม่มี id ใน $existingSchedules
            if (!empty($idsToDelete)) {
                ScheduleTime::whereIn('id', $idsToDelete)->delete();
            }

            foreach ($newSchedules as $index => $list) {
                if(!$list['time_start']) { continue;}
                $scheduleData[] = [
                    'room_id' => $params['id'],
                    'time_start' => $list['time_start'],
                    'time_end' => $list['time_end'],
                    'description' => $list['description'],
                    'priority' => $index+1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            if (!empty($scheduleData)) {
                ScheduleTime::insert($scheduleData);
            }

            DB::commit();

            return response([
                'message' => 'success',
                'description' => 'Created successful'
            ], 201);
        } catch (Exception $e) {
            DB::rollback();
            return response([
                'message' => 'error',
                'description' => 'Something went wrong',
                'errorsMessage' => $e->getMessage()
            ], 501);
        }
    }

    public function deleteRoom($id) {
        try {
            DB::beginTransaction();
            $room = SeminarRoom::where('id', $id)->first();
            $room->delete();

            ScheduleTime::where('room_id', $room->id)->delete();

            DB::commit();
            return response([
                'message' => 'success',
                'description' => 'delete room success',
            ], 201);
            
        } catch (Exception $e) {
            DB::rollback();
            return response([
                'message' => 'error',
                'description' => 'Something went wrong',
                'errorsMessage' => $e->getMessage()
            ], 501);
        }
    }

    public function getScheduleTime($type, $id) {
        if($type == 'post') {
            $scheduleTime = ScheduleTime::where('post_id', $id)->orderBy('time_start', 'asc')->get();
        } else if($type == 'room') {
            $scheduleTime = ScheduleTime::where('room_id', $id)->orderBy('time_start', 'asc')->get();
        }
        return response([
            'message' => 'ok',
            'data' => $scheduleTime,
        ], 200);
    }

    // createSchedule
    public function createSchedule(Request $req)
    {
        $this->getAuthUser();
        $files = $req->allFiles();
        $params = $req->all();
        $validator = Validator::make($req->all(), [
            'Thumbnail' => "mimes:jpg,png,jpeg,pdf|max:5000|nullable",
        ]);
        if ($validator->fails()) {
            return $this->sendErrorValidators('Invalid params', $validator->errors());
        }

        /* Upload Thumbnail */
        $newFolder = "upload/" . date('Y') . "/" . date('m') . "/" . date('d') . "/";
        $thumbnail = (isset($files['Thumbnail'])) ? $this->uploadImage($newFolder, $files['Thumbnail'], "", "", $params['ThumbnailName']) : "";

        $thumbnail_title = isset($files['Thumbnail']) && !empty($files['Thumbnail']) ? $params['ThumbnailTitle'] : "";
        $thumbnail_alt = isset($files['Thumbnail']) && !empty($files['Thumbnail']) ? $params['ThumbnailAlt'] : "";

        try {

            DB::beginTransaction();
            $postCreated = Post::create([
                "thumbnail_link" => $thumbnail,
                "thumbnail_title" => $thumbnail_title,
                "thumbnail_alt" => $thumbnail_alt,
                "category" => $params['category'],
                "title" => $params['title'],
                "keyword" => $params['keyword'],
                "description" => $params['description'],
                "slug" => $params['slug'],
                "topic" => $params['topic'],
                "iframe" => isset($params['iframe']) ? $params['iframe'] : "",
                "content" => $params['content'],
                "redirect" => $params['redirect'],
                "date_begin_display" => $params['display_date'],
                "date_end_display" => $params['hidden_date'],
                "status_display" => $params['display'],
                "pin" => $params['pin'],
                "is_maincontent" => $params['isMainContent'],
                "priority" => $params['priority'],
                "language" => $params['language'],
                "tags" => $params['open_room'],
                "defaults" => 1,
            ], Response::HTTP_CREATED);

            $scheduleList = json_decode($params['schedulelist'], true);
            $scheduleData = [];
            // if(count($scheduleList) > 0) {
                foreach ($scheduleList as $index => $list) {
                    if(!$list['startTime']) { continue;}
                    $scheduleData[] = [
                        'post_id' => $postCreated->id,
                        'time_start' => $list['startTime'],
                        'time_end' => $list['endTime'],
                        'description' => $list['details'],
                        'priority' => $index+1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
                ScheduleTime::insert($scheduleData);
            // }

            DB::commit();

            return response([
                'message' => 'success',
                'description' => 'Created successful'
            ], 201);
        } catch (Exception $e) {
            DB::rollback();
            return response([
                'message' => 'error',
                'description' => 'Something went wrong',
                'errorsMessage' => $e->getMessage()
            ], 501);
        }
    }

    public function updateSchedule(Request $req)
    {
        $this->getAuthUser();
        $files = $req->allFiles();
        $params = $req->all();
        $validator = Validator::make($req->all(), [
            'Thumbnail' => "mimes:jpg,png,jpeg,pdf|max:5000|nullable",
        ]);
        if ($validator->fails()) {
            return $this->sendErrorValidators('Invalid params', $validator->errors());
        }

        try {
            DB::beginTransaction();
            $newFolder = "upload/" . date('Y') . "/" . date('m') . "/" . date('d') . "/";
            $uploadMoreImage = array();
            $addMoreImage = array();
            $idRemove = explode(',', $params['moreImageRemove']);

            if (isset($params['EditImageLink'])) {
                PostImage::where('post_id', $params['id'])->where('language', $params['language'])->delete();
                $numb = count($params['EditImageLink']);
                for ($ii = 0; $ii < $numb; $ii++) {
                    array_push($addMoreImage, [
                        "post_id" => $params['id'],
                        "language" =>  $params['language'],
                        "title" => ($params['EditImageTitle'][$ii]) ? $params['EditImageTitle'][$ii] : "",
                        "alt" => ($params['EditImageAlt'][$ii]) ? $params['EditImageAlt'][$ii] : "",
                        "image_link" =>   $params['EditImageLink'][$ii],
                        "position" => $ii + 1,
                    ]);
                }
                PostImage::insert($addMoreImage);
            }

            if (isset($params['Images'])) {
                foreach ($files['Images'] as $key => $val) {
                    array_push($uploadMoreImage, [
                        "post_id" => $params['id'],
                        "image_link" => $this->uploadImage($newFolder, $files['Images'][$key], "", "", $params['ImagesName'][$key]),
                        "alt" => ($params['ImagesAlt'][$key]) ? $params['ImagesAlt'][$key] : "",
                        "title" => ($params['ImagesTitle'][$key]) ? $params['ImagesTitle'][$key] : "",
                        "position" => $params['ImagesPosition'][$key],
                        "language" => $params['language'],
                    ]);
                }
                PostImage::insert($uploadMoreImage);
            }

            /* ยังขาด function สำหรับลบ image ออกจาก frontend! */
            PostImage::where('post_id', $params['id'])
                ->where('language', $params['language'])
                ->whereIn('id', $idRemove)
                ->delete();

            /* Upload Thumbnail */
            $thumbnail = "";
            if (isset($files['Thumbnail'])) {
                $thumbnail = $this->uploadImage($newFolder, $files['Thumbnail'], "", "", $params['ThumbnailName']);
            } else {
                $thumbnail = $params['ThumbnailLink'];
            }


            $this->priorityPostUpdate($params['old_priority'], $params['priority'], $params['language'], "priority");

            $conditions  = ['id' => $params['id'], 'language' => $params['language']];
            $values = [
                'id' => $params['id'],
                "language" => $params['language'],
                "thumbnail_link" => $thumbnail,
                "thumbnail_title" => $params['ThumbnailTitle'],
                "thumbnail_alt" => $params['ThumbnailAlt'],
                "category" => $params['category'],
                "title" => $params['title'],
                "keyword" => $params['keyword'],
                "description" => $params['description'],
                "slug" => $params['slug'],
                "topic" => $params['topic'],
                "iframe" => isset($params['iframe']) ? $params['iframe'] : "",
                "content" => $params['content'],
                "redirect" => $params['redirect'],
                "date_begin_display" => $params['display_date'],
                "date_end_display" => $params['hidden_date'],
                "status_display" => $params['status_display'],
                "pin" => $params['pin'],
                "tags" => $params['open_room'],
                "is_maincontent" => $params['is_maincontent'],
                "priority" => $params['priority'],
                "updated_at" => date('Y-m-d H:i:s')
            ];

            DB::table('posts')->updateOrInsert($conditions, $values);

            $scheduleList = json_decode($params['schedulelist'], true);
            $scheduleData = [];
            $existingSchedules = [];
            $newSchedules = [];

            foreach ($scheduleList as $schedule) {
                // เช็คว่ามี id หรือไม่
                if (isset($schedule['id'])) {
                    // ถ้ามี id ให้ใส่ลงใน array สำหรับการอัปเดตข้อมูลเดิม
                    $existingSchedules[] = $schedule;
                } else {
                    // ถ้าไม่มี id ให้ใส่ลงใน array สำหรับการเพิ่มใหม่
                    $newSchedules[] = $schedule;
                }
            }

            foreach ($existingSchedules as $schedule) {
                ScheduleTime::where('id', $schedule['id'])->update([
                    'time_start' => $schedule['time_start'],
                    'time_end' => $schedule['time_end'],
                    'description' => $schedule['description'],
                    'updated_at' => now(),
                ]);
            }

            // ดึง id ของ ScheduleTime ทั้งหมดที่เกี่ยวข้องกับ post_id นี้
            $existingScheduleIds = ScheduleTime::where('post_id', $params['id'])->pluck('id')->toArray();

            // ดึง id ของข้อมูลจาก $existingSchedules
            $inputScheduleIds = array_column($existingSchedules, 'id');

            // หาความแตกต่างของ id ที่ไม่มีใน $existingSchedules
            $idsToDelete = array_diff($existingScheduleIds, $inputScheduleIds);

            // ลบข้อมูลที่ไม่มี id ใน $existingSchedules
            if (!empty($idsToDelete)) {
                ScheduleTime::whereIn('id', $idsToDelete)->delete();
            }

            foreach ($newSchedules as $index => $list) {
                if(!$list['time_start']) { continue;}
                $scheduleData[] = [
                    'post_id' => $params['id'],
                    'time_start' => $list['time_start'],
                    'time_end' => $list['time_end'],
                    'description' => $list['description'],
                    'priority' => $index+1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            if (!empty($scheduleData)) {
                ScheduleTime::insert($scheduleData);
            }
            
            DB::commit();
            return response([
                'message' => 'success',
                'description' => 'Updated successful',
                'data' => $params,
            ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response([
                'message' => 'error',
                'description' => 'Something went wrong.',
                'errorsMessage' => $e->getMessage()
            ], 501);
        }
    }


    /* Private function  */
    private function priorityPostUpdate($current, $new, $language, $column)
    {
        $setOp = ($new <= $current) ? ["<", ">="] : [">", "<="];
        $updating = Post::where($column, $setOp[0], $current)->where($column, $setOp[1], $new)->where('language', $language);
        if ($new <= $current) {
            return $updating->increment($column, 1);
        } else {
            return $updating->decrement($column, 1);
        }
    }
}
