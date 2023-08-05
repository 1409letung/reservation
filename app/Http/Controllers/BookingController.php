<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CourseService;

class BookingController extends Controller
{
    protected $courseService;
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    //step 1a
    public function index()
    {
        $listCourse = $this->courseService->getListCourse();
        return view('bookings.step1a', ['listCourse' => $listCourse]);
    }

    //step 1b: lấy lại thông tin course đã chọn
    public function step1b($id)
    {

        if (isset($id) == '') {
            $mess = "Please select a COURSE";
            $listCourse = $this->courseService->getListCourse();
            return view(
                'bookings.step1a',
                [
                    'listCourse' => $listCourse,
                    'mess'       => $mess
                ]
            );
        } else {
            $courseSelected = $this->courseService->getCourseSelected($id);
            return view('bookings.step1b')->with('courseSelected', $courseSelected);
        }
    }

    //AJAX lấy giờ dịch vụ theo ngày
    public function getHours($day)
    {
        return $hours = $this->courseService->getHours($day);
    }

    //AJAX lấy phí theo loại phòng
    public function getFee($typeRoom)
    {
        $fee = $this->courseService->getFee($typeRoom);
        // dd($fee);
        return $fee;
    }

    //back from step 1b -> step1a
    public function change()
    {
        return redirect('/');
    }

    //xử lý thông tin step 1b ->step 2
    public function inTmpStep1b(Request $request)
    {
        //dd($request);
        $id = $request['id_courses'];
        if ($request['quantity'] == 0 && $request['order_date'] == '' && $request['checkin_time'] == '' && $request['privateRoom'] == 0) {
            $result = "Please select the infomations for your booking!!";
            $courseSelected = $this->courseService->getCourseSelected($id);
            return view(
                'bookings.step1b',
                [
                    'courseSelected' => $courseSelected,
                    'result' => $result
                ]
            );
        } elseif ($request['privateRoom'] == 0) {
            $result = "Please choose your seat!";
            $courseSelected = $this->courseService->getCourseSelected($id);
            return view(
                'bookings.step1b',
                [
                    'courseSelected' => $courseSelected,
                    'result' => $result
                ]
            );
        } elseif ($request['quantity'] == 0) {
            $result = "Please choose number people!!";
            $courseSelected = $this->courseService->getCourseSelected($id);
            return view(
                'bookings.step1b',
                [
                    'courseSelected' => $courseSelected,
                    'result' => $result
                ]
            );
        } elseif ($request['checkin_time'] == '') {
            $result = "Please select your visit time!!";
            $courseSelected = $this->courseService->getCourseSelected($id);
            return view(
                'bookings.step1b',
                [
                    'courseSelected' => $courseSelected,
                    'result' => $result
                ]
            );
        } elseif ($request['order_date'] == '') {
            //dd($request);
            $result = "Please select the date of your visit!!";
            $courseSelected = $this->courseService->getCourseSelected($id);
            return view(
                'bookings.step1b',
                [
                    'courseSelected' => $courseSelected,
                    'result' => $result
                ]
            );
        } else {
            $data1b = $request->all();
            session(['data1b' => $data1b]);
            $courseSelected = $this->courseService->getCourseSelected($id);
            return view(
                'bookings.step2',
                [
                    'request' => $request,
                    'courseSelected' => $courseSelected
                ]
            );
        }
    }

    //return back screen
    public function backScreen()
    {
        $data = session('data1b');
        $id = $data['id_courses'];
        $courseSelected = $this->courseService->getCourseSelected($id);
        return view('bookings.step1b', [
            'courseSelected' => $courseSelected,
            'data' => $data
        ]);
    }

    //step 3
    public function step3(Request $request)
    {
        //dd($request);
        $name           = $request['name'];
        $phone          = $request['phone'];
        $email          = $request['email'];
        $id_courses     = $request['id_courses'];
        $quantity       = $request['quantity'];
        $order_date     = $request['order_date'];
        $checkin_time   = $request['checkin_time'];
        $private_room   = $request['privateRoom'];
        $fee   = $request['fee'];
        $first_visit    = $request['first_visit'];
        $courseSelected = $this->courseService->getCourseSelected($id_courses);
        if ($name == null && $phone == null && $email == null) {
            $mess = "Please enter information";
            return view('bookings.step2', [
                'mess' => $mess,
                'request' => $request,
                'courseSelected' => $courseSelected
            ]);
        } elseif ($name == null) {
            $mess = "Please enter your name";
            return view('bookings.step2', [
                'mess' => $mess,
                'request' => $request,
                'courseSelected' => $courseSelected
            ]);
        } elseif ($phone == null) {
            $mess = "Please enter your number phone";
            return view('bookings.step2', [
                'mess' => $mess,
                'request' => $request,
                'courseSelected' => $courseSelected
            ]);
        } elseif ($email == null) {
            $mess = "Please enter your email";
            return view('bookings.step2', [
                'mess' => $mess,
                'request' => $request,
                'courseSelected' => $courseSelected
            ]);
        } else {
            //dd($request);
            $this->courseService->create($name, $phone, $email, $id_courses, $quantity, $order_date, $checkin_time, $private_room, $fee, $first_visit);
            return view('bookings.step3');
        }
    }
}
