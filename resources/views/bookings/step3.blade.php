@extends('index')
<link rel="stylesheet" href="{{ asset('../resources/css/bookings/step3.css') }}">
@section('step')
    <input type="text" class="my-class" value="step3" hidden>
    <form action="" method="POST">
        @csrf
        <div class="card-body shadow" id="notify_result">
            <div class="content_end">
                <div class="thanks">
                    <h5 style="font-weight: bold;">Thanks you for your reservation</h5>
                    <p>We have sent a reservation completion email to your contact information.</p>
                    <p style="margin-top: -15px;">You can also check th reservation details from the reservation management
                        page.</p>
                </div>
                <div class="pay">
                    <div class="content_infopay">
                        <h5>If you finish as it is, you will not get the PayPay bonus
                        </h5>
                        <h6>If you link with PayPay from this page</h6>
                        <p><b style="float: left; margin-top: 8px;">At the store &nbsp;</b> <img
                                src="{{ asset('storage/paypay.jpg') }}" alt="Example Image"
                                style="height: 25px; width: 25px; float: left; margin-top: 5px;">
                        <p style="font-weight: bold; color: #fe0032; float: left;">150 Equivalent yen</p>
                        <p style="color: gray; float: left;">(PayPay Bonus)</p><b>Can be earned</b></p>
                        {{-- </p> --}}

                        <button class="btn btn-lg btn-warning" style="font-weight: bold; color: white;">
                            <a href="https://paypay.ne.jp/" style="text-decoration: none; color: white;">
                                PayPay integration
                            </a>
                        </button>

                    </div>
                </div>
                <div class="note_info" style="margin-top: 20px;">
                    <p><i class="bi bi-snow2">&nbsp;</i>PayPay bonus will be given about 7 days after your visit</p>
                    <p><i class="bi bi-snow2">&nbsp;</i>The amount of PayPay bonus granted may vary depending on the
                        conditions of your reservation. Please <a href="#">see here</a> for details.</p>
                    <p><i class="bi bi-snow2">&nbsp;</i>PayPay Bonus cannot be withdrawn or transferred. Also available at
                        the PayPay officical store.</p>
                </div>
                <div class="notyfi_footer">
                    <p>Confirm the reservation details &nbsp; > &nbsp; To store TOP &nbsp; > </p>
                </div>
            </div>
        </div>
    </form>
@endsection
