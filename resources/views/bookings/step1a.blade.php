@extends('index')

@section('step')
    <input type="text" class="my-class" value="step1" hidden>
    <form action="" method="POST">
        @csrf
        <div class="card-body shadow" style="height: auto;">
            @isset($mess)
                <div class="btn-warning">
                    {{ $mess }}
                </div>
            @endisset
            <div class="header-body" id="header_hide">
                <p id="plsSC">Please select a <b>COURSE</b></p>
                <p id="p_change">
                    <a href="#" id="a_change">Change</a>
                </p>
            </div>
            <hr>
            <div class="card-item">
                @foreach ($listCourse as $item)
                    <img src="{{ asset('storage/' . $item->image . '') }}" alt="Example Image">
                    <div class="desc_item">
                        <div class="ads">
                            <p id="hours">2 hours</p>
                            <p id="drink">all you can drink</p>
                            <p id="title_course"> <b>
                                    << 9/7 ~>> [ {{ $item->name }} ] {{ $item->description }} {{ $item->price }} yen =>
                                        {{ $item->tax }} yen (tax included)
                                </b></p>
                            <h5 id="tax">{{ number_format($item->tax) }} yen (tax included)</h5>
                            <a href="#" id="view_course">View course details </a>
                            <p id="triangle-down"></p>
                        </div>
                        <button type="button" id="{{ $item->id }}" class="btn">Choice</button>
                    </div>
                    <hr>
                @endforeach
                <br>
            </div>
            {{-- end list item --}}
        </div>
        <br>
        <div class="card shadow" id="card-number">
            <p>
                <b>Please</b> select the <b>number of vistors and the date</b> and <b>time</b> of <b>your visit</b>
                <hr>
            <p>If you select a course, you can select the number of people who can make a reservation, the date and time</p>
            </p>
        </div>
        <br>
        <div class="card shadow" id="card-seat">
            <p>Please select a <b>seat</b></p>
            <hr>
            <p>You can select the seats that can be reserved by selecting the number of people, the date of visit, the time,
                and the co <br> urse</p>
        </div>
        <br>

        <div class="card shadow" id="submit-step1">
            <button class="btn-secondary" type="submit">Proceed to enter reservation infomation</button>
        </div>
    </form>
    @include('../layouts/footer')

    <script>
        $(document).ready(function() {
            // Lấy tất cả các button và thêm sự kiện click cho mỗi button
            var buttons = document.getElementsByClassName("btn");
            //var btnSub = document.getElementsByClassName("btn-secondary");

            Array.from(buttons).forEach(function(button) {
                button.addEventListener("click", function() {
                    // Thêm class "btn-success" vào button được click
                    const x = this.classList.add("btn-success");
                    //btnSub.classList.remove("btn-secondary");
                });
            });

            // Sự kiện submit form
            document.querySelector("form").addEventListener("submit", function(event) {
                event.preventDefault(); // Ngăn chặn chuyển trang mặc định của form
                var clickedButtonId = document.querySelector(".btn-success").id;
                window.location.href = "step1b/" + clickedButtonId;
            });


        });
    </script>
@endsection
