<?php

namespace App\Http\Services;

use App\Models\Bookings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Courses;
use App\Models\Schedules;
use App\Models\Fees;

class CourseService
{

    //lấy list course
    public function getListCourse()
    {
        return Courses::selectRaw('*')->get();
    }

    //lấy thông tin 1 course đã chọn ở step1a
    public function getCourseSelected($id)
    {
        return Courses::select('*')->where('id', '=', $id)->get();
    }

    //nhận thông tin từ request => insert
    public function create($name, $phone, $email, $id_courses, $quantity, $order_date, $checkin_time, $private_room, $fee, $first_visit)
    {
        //xử lý lại request, chỉ lấy những giá trị cần truyền vào, không lấy hết toàn bộ request
        try {

            $qr = DB::insert("INSERT INTO bookings(name, phone, email, id_courses, quantity, order_date, checkin_time, private_room, fee, first_visit) VALUES ('$name', '$phone', '$email', '$id_courses', '$quantity', '$order_date', '$checkin_time', '$private_room', '$fee', '$first_visit')");
            Session::flash('success', 'Congratulations on your successful booking!!!');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        // return true;
    }

    //AJAX lấy giờ dịch vụ theo ngày
    public function getHours($day)
    {
        $result = Schedules::select('day', 'service_hours')->where('day', $day)->orderby('id', 'asc')->get();
        return response()->json($result);
    }

    //AJAX lấy phí theo phòng
    public function getFee($typeRoom)
    {
        $result = Fees::select('fee')->where('type_room', $typeRoom)->get();
        return response()->json($result);
    }
}
