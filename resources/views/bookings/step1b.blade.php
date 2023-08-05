@extends('index')

<link rel="stylesheet" href="{{ asset('../resources/css/bookings/step1b.css') }}">
@section('step')
    <input type="text" class="my-class" value="step1" hidden>
    @isset($result)
        <div class="btn-danger" style="border-radius: 10px; text-align: center;">
            <h3>{{ $result }}</h3>
        </div>
    @endisset
    <form action="{{ route('step1b2') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body shadow" style="height: auto;">
            <div class="header-body" id="header_hide">
                <p id="plsSC">Please select a <b>COURSE</b></p>
                <p id="p_change">
                    <a href="{{ route('change') }}" id="a_change">Change</a>
                </p>
            </div>
            <hr>
            <div class="card-item">
                @foreach ($courseSelected as $item)
                    <input type="text" value="{{ $item->id }}" readonly name="id_courses" hidden>
                    <img src="{{ asset('storage/' . $item->image . '') }}" alt="Example Image">
                    <div class="desc_item">
                        <div class="ads">
                            <p id="title_stand"> <b> {{ $item->description }} [Standard]
                                    {{ number_format($item->tax) }} yen (tax included)</b></p>
                            <h5>{{ number_format($item->tax) }} yen (tax included) </h5>
                        </div>
                @endforeach
            </div>
            <br>
            <br>
        </div>
        </div>
        <br>
        <br>
        <div class="card shadow" id="booking">
            <p id="p_intro">
                <b>Please</b> select the <b>number of vistors and the date</b> and <b>time</b> of <b>your visit</b>
            </p>
            <div class="row" id="info_booking">
                <div class="col-lg" id="number_people">
                    <select name="quantity" id="quantity" class="form-select form-select-lg mb-10"
                        aria-label=".form-select-lg example">
                        @isset($data['quantity'])
                            <option value="{{ $data['quantity'] }}"> <i class="bi bi-person"></i>{{ $data['quantity'] }} people
                            </option>
                        @endisset
                        <option value="0"> <i class="bi bi-person"></i>Chose number of vistors</option>
                        <option value="1"> <i class="bi bi-person"></i>1 people</option>
                        <option value="2"> <i class="bi bi-person"></i>2 people</option>
                        <option value="3"> <i class="bi bi-person"></i>3 people</option>
                    </select>
                </div>
                <div class="col" id="book_date">
                    @if (isset($data))
                        <date-picker format="{{ $data['order_date'] }}" style="margin-left: 30%;" id="order_date"
                            name="order_date">
                        </date-picker>
                    @else
                        <date-picker format="DD/MM (DDD)" style="margin-left: 30%;" id="order_date" name="order_date">
                        </date-picker>
                    @endif
                </div>
                <div class="w-100" id="book_time">
                    <p><b>Please</b> select <b>your visit time</b></p>
                </div>
                <div class="col-6" id="list_time">
                    <div class="chosetime" id="chose_time">
                        <i id="left" class="fa-solid fa-angle-left"></i>
                        <i id="right" class="fa-solid fa-angle-right"></i>
                        {{-- <button type="button" id="prev">
                            < </button>
                                <button type="button" id="next"> > </button> --}}
                        <div class="daddybox" id="daddybox">
                            @isset($data)
                                <div class="box">
                                    <span>17:00</span><br>
                                    <input type="radio" name="checkin_time" value="{{ $data['checkin_time'] }}"
                                        id="checkin_time" checked>
                                </div>
                            @endisset
                        </div>
                    </div>
                    <div class="col" id="book_note">
                        <div class="htt" style="margin-left: -18px;">
                            <div class="tn">
                                <p class="tt"></p>
                            </div>
                            <p id="imOK">Immediate reservation OK</p>
                        </div>
                        <div class="request">
                            <p id="re_icon"></p>
                            <p id="re_cont">Request reservation</p>
                        </div>
                        <p id="mess" style="width: 455px;">Request reservations will be confirmed by contacting
                            the
                            shop</p>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <br>

        <div class="card shadow" id="room">
            <div class="private" style="margin-bottom: 20px;">
                <p>Please select a <b>seat</b></p>
                <hr>
                <img src="{{ asset('storage/privateroom.jpg') }}" alt="Example Image">
                <div class="selection">
                    <div class="ads_title" id="ads_title">
                        <p id="pri_non"> <b>Private room / non-smoking seat</b></p>
                        {{-- <p id="charge"></p> --}}
                        <div class="charge" id="charge">
                            @if (isset($data))
                                <p>Charge fee: {{ $data['fee'] }}</p>
                            @else
                                <p>Charge fee: None</p>
                            @endif
                        </div>
                        <select name="privateRoom" id="selectRoom" class="form-select">
                            @if (isset($data))
                                @switch($data['privateRoom'])
                                    @case('Non')
                                        <option value="">Select room</option>
                                        <option value="Non" selected>None</option>
                                        <option value="Private room">Private room</option>
                                        <option value="Non smoking">Non smoking seat</option>
                                    @break

                                    @case('Private room')
                                        <option value="">Select room</option>
                                        <option value="Non">None</option>
                                        <option value="Private room" selected>Private room</option>
                                        <option value="Non smoking">Non smoking seat</option>
                                    @break

                                    @case('Non smoking')
                                        <option value="">Select room</option>
                                        <option value="Non">None</option>
                                        <option value="Private room">Private room</option>
                                        <option value="Non smoking" selected>Non smoking seat</option>
                                    @break

                                    @default
                                @endswitch
                            @else
                                <option value="">Select room</option>
                                <option value="Non">None</option>
                                <option value="Private room">Private room</option>
                                <option value="Non smoking">Non smoking seat</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
        <br>

        <div class="card shadow" id="submit_step1b">
            <button class="btn btn-info" type="submit" id="btn2">Proceed to enter reservation
                infomation</button>
        </div>
    </form>
    <br>
    @include('../layouts/footer')
    <script src="{{ asset('../resources/js/jquery-3.6.1.js') }}"></script>
    <script src="{{ asset('../resources/js/bookings/step1b_datepicker.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        //get hours
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });


        $('#order_date').click(function() {
            var order_date = document.getElementById('order_date');
            if (order_date.openCalender == 'autoClose') {
                var day = order_date.date['day'];
                var dayFull = order_date.date['day'] + ',' + ' ' + order_date.date['month'] + ' ' +
                    order_date.date[
                        'date'];
                //console.log(dayFull);
                // console.log(order_date.date['dayShort']);
                //AJAX
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '../service/' + day,
                    success: function(response) {
                        var len = 0;
                        if (response != null) {
                            len = response.length;
                            var input =
                                '<input type="text" name="order_date" id="order_date" value="' +
                                dayFull + '" hidden>';
                            $("#book_date").append(input);
                        }

                        if (len > 0) {
                            if ($("#daddybox").html()) {
                                // Nếu đã tồn tại, xóa mã HTML hiện tại
                                $("#daddybox").empty();
                            }
                            for (var i = 0; i < len; i++) {
                                var service_hours = response[i]['service_hours'];
                                var box = '<div class="box"><span>' + service_hours +
                                    '</span><br><input type="radio" name="checkin_time" value="' +
                                    service_hours + '" id="checkin_time"></div>';
                                $("#daddybox").append(box);
                            }
                        }
                    }
                })
            }
        });

        $('#selectRoom').click(function() {
            var typeRoom = document.getElementById('selectRoom').value;
            //console.log(typeRoom);
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '../room/' + typeRoom,
                success: function(response) {
                    if (response != null) {
                        if ($("#charge").html()) {
                            // Nếu đã tồn tại, xóa mã HTML hiện tại
                            $("#charge").empty();
                        }
                        var fee = response[0]['fee'];
                        var p = '<p>Charge fee: ' + fee +
                            '</p> <input type="text" name="fee" id="" value="' + fee +
                            '" hidden>';
                        $("#charge").append(p);
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        const daddybox = document.querySelector(".daddybox"),
            firstBox = carousel.querySelectorAll("box")[0],
            arrowIcons = document.querySelectorAll(".chosetime i");

        let isDragStart = false,
            isDragging = false,
            prevPageX, prevScrollLeft, positionDiff;

        const showHideIcons = () => {
            // showing and hiding prev/next icon according to carousel scroll left value
            let scrollWidth = daddybox.scrollWidth - daddybox.clientWidth; // getting max scrollable width
            arrowIcons[0].style.display = daddybox.scrollLeft == 0 ? "none" : "block";
            arrowIcons[1].style.display = daddybox.scrollLeft == scrollWidth ? "none" : "block";
        }

        arrowIcons.forEach(icon => {
            icon.addEventListener("click", () => {
                let firstBoxWidth = firstBox.clientWidth +
                    14; // getting first img width & adding 14 margin value
                // if clicked icon is left, reduce width value from the carousel scroll left else add to it
                daddybox.scrollLeft += icon.id == "left" ? -firstBoxWidth : firstBoxWidth;
                setTimeout(() => showHideIcons(), 60); // calling showHideIcons after 60ms
            });
        });
    </script>
    <style>
        input[type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid gray;
            background-color: white;
            outline: none;
            transition: border-color 0.2s, background-color 0.2s;
        }

        input[type="radio"]:checked {
            border-color: orange;
            background-color: white;
        }

        input[type="radio"]:checked::after {
            content: "";
            display: block;
            width: 12px;
            height: 12px;
            background-color: orange;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            position: relative;
            top: 50%;
            left: 50%;
        }
    </style>
@endsection
