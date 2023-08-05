@extends('index')
<link rel="stylesheet" href="{{ asset('../resources/css/bookings/step2.css') }}">
@section('step')
    <input type="text" class="my-class" value="step2" hidden>
    <form action="{{ route('end') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body shadow" id="info_booked">
            <div class="header-body" id="info_notify">
                <p>Please check the reservation details</p>
            </div>
            <div class="card-item" id="check_info">
                <p>Private room dining Rakuzo-RAKUZO-Sapporo station square store</p>

                <h3> {{ $request->order_date }} {{ $request->quantity }} people {{ $request->checkin_time }} </h3>
                <input type="text" name="id_courses" value="{{ $request->id_courses }}" hidden>
                <input type="text" name="quantity" value="{{ $request->quantity }}" hidden>
                <input type="text" name="order_date" value=" {{ $request->order_date }}" hidden>
                <input type="text" name="checkin_time" value="{{ $request->checkin_time }}" hidden>
                <input type="text" name="privateRoom" value="{{ $request->privateRoom }}" hidden>
                <input type="text" name="fee" id="" value="{{ $request->fee }}" hidden>
            </div>

            <hr>
            <div class="format">
                <p id="f1">Reservation format</p>
                <p id="f2">Book immediately</p>
                <p>* The reservation format is immediate reservation. The reservation will be confirmed when reservation is
                    completed on the WEB</p>
            </div>
            <hr>
            <div class="course_booked">
                <p>Booked course</p>
                @foreach ($courseSelected as $item)
                    <img src="{{ asset('storage/' . $item->image . '') }}" alt="Example Image">
                    <div class="desc_item">
                        <div class="ads">
                            <p id="ads1">2 hours</p>
                            <p id="ads2">all you can drink</p>
                            <p id="ads3"> <b>{{ $item->description }} [Standard] {{ number_format($item->tax) }} yen
                                    (tax
                                    included)
                                </b></p>
                            <h5>{{ number_format($item->tax) }} yen (tax included)</h5>
                        </div>
                    </div>
                @endforeach
            </div>
            <br>
            <hr>
            <div class="private">
                <p>Reservation seat</p>
                <img src="{{ asset('storage/privateroom.jpg') }}" alt="Example Image">
                <div class="option">
                    <div class="details">
                        <p id="d1"> {{ $request->privateRoom }}</b></p>
                        <p id="d2">Charge fee: {{ $request->fee }}</p>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
        <br>
        <br>
        <div class="card shadow" id="PayPay">
            <div class="pay-details">
                <p id="p1">Ear PayPay Bonus
                <p id="p2">?</p>
                </p>
                <hr>
                <p id="p3">
                    <b>In visit us &nbsp;</b>
                    <img src="{{ asset('storage/paypay.jpg') }}" alt="Example Image">
                <p id="p3-1">150 equivalent yen &nbsp;</p>
                <p id="p3-2">(PayPay Bonus) &nbsp;</p>
                <p id="p3-3">acquisition</p>
                </p>
                <p id="p4"><i class="bi bi-snow2">&nbsp;</i>If you have not linked with PayPay,
                    you can link
                    from the reservation completion screen.</p>
                <p id="p5"><i class="bi bi-snow2">&nbsp;</i>The amount of PayPay bonus granted
                    may vary
                    depending on the conditions of your reservation. Please <a href="#">see here</a> for details.</p>
                <p id="p6"><i class="bi bi-snow2">&nbsp;</i>The maximum PayPay bonus you can get
                    with Retty is
                    equivalent to 3,000 yen per month.</p>
                <p id="p7"><i class="bi bi-snow2">&nbsp;</i>PayPay Bonus cannot be withdrawn or
                    transferred.
                    Also available at the PayPay officical store.</p>

            </div>
        </div>
        <br>
        @isset($mess)
            <div class="btn-warning" style="border-radius: 10px; text-align: center;">
                <h3>{{ $mess }}</h3>
            </div>
        @endisset
        <div class="card shadow" id="booker">
            <div class="profile">
                <p id="pf1"><b>name &nbsp;</b>
                <p id="pf2">Mandatory &nbsp;</p>
                <p>(Please input in Katakana)</p>
                </p>
                <div class="input-container">
                    <input type="text" name="name" class="form-control" style="width: 98%;" id="name">
                </div>
                <p id="pf1"><b>cell phone &nbsp;</b>
                <p id="pf2">Mandatory &nbsp;</p>
                <p>(Please input in Katakana)</p>
                </p>
                <input type="text" name="phone" class="form-control" style="width: 98%;">

                <p id="pf1"><b>email address &nbsp;</b>
                <p id="pf2">Mandatory &nbsp;</p>
                <p>(Please input in Katakana)</p>
                </p>
                <input type="email" name="email" class="form-control" style="width: 98%;">
                <p id="pf3">Please be careful not to enter the wrong email address.</p>
                <p>You may not receive the contact email due to the reception refusal settings. Please make settings so that
                    you can receive emails from: reserve@retty.me</p>
                <p id="pf4">Is this your first visit?
                <p id="pf4-1">Any</p>
                </p>
                <table border="1">
                    <tr>
                        <td style="width: 440px;">
                            <input type="radio" name="first_visit" value="1" checked id="yellow"
                                style="margin-left: 15px; margin-top: 15px;float: left;">
                            <p style="margin-top: 15px;">Yes</p>
                        </td>
                        <td style="width: 440px;">
                            <input type="radio" name="first_visit" value="0" id="blue"
                                style="margin-left: 15px; margin-top: 20px;float: left;">
                            <p style="margin-top: 20px;">No</p>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
        </div>
        <br>
        <div class="note">
            <p>If the contact information registered at the time of reservation is invalid, the reservation may not be
                completed at the discretion of the shop.</p>

            <p>Please check the <a href="#">terms of use</a> of <a href="#">use</a>, and <a
                    href="#">privacy policy regarding the acquisition of PayPay bonus</a>.</p>
        </div>
        <div class="card shadow" id="back">
            <a href="{{ route('back') }}" class="btn btn-light">Return
                to the
                previous screen</a>
        </div>

        <div class="card shadow" style="width: 40%;">
            <a href="">
                <button class="btn btn-info btn-sm" type="submit" style="width: 100%;">I agree to the terms and privacy
                    policy, <h5>Confirm with this reservation content</h5></button>
            </a>
        </div>
    </form>
@endsection
