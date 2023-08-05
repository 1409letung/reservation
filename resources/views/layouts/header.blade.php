<div class="card shadow">
    <div class="card-header" id="card-header">
        <h3>Private room dining Rakuzo-RAKUZO-Sapporo station square store</h3>
    </div>
</div>
<br>
<div class="shadow" id="header">

    <ol class="stepbar">
        <li class="step step1" style="width: 300px;">
            <p>Reservation details selecttion</p>
        </li>
        <li class="step step2" style="width: 350px;">
            <p>Confirmation of reservation details</p>
        </li>
        <li class="step step3" style="width: 270px;">
            <p>Booking is done</p>
        </li>
    </ol>
</div>
<style>
    .stepbar {
        width: 100%;
        position: relative;
        list-style: none;
        padding: 0;
        text-align: center;
        overflow: hidden;
        *zoom: 1;
    }

    .stepbar .step {
        color: #898989;
        height: 48px;
        position: relative;
        float: left;
        display: inline-block;
        padding: 0 56px 0 24px;
        color: #ffffff;
        background-color: #e0dcdc;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .stepbar .step:before,
    .stepbar .step:after {
        content: '';
        position: absolute;
        left: -15px;
        display: block;
        background-color: #e0dcdc;
        border-left: 4px solid #FFF;
        width: 20px;
        height: 24px;
    }

    .stepbar .step.step1:before,
    .stepbar .step.step1:after {
        content: '';
        position: absolute;
        left: -26px;
        display: block;
        background-color: #e0dcdc;
        border-left: 4px solid #FFF;
        width: 20px;
        height: 24px;
    }

    .stepbar .step.step2:before,
    .stepbar .step.step2:after {
        content: '';
        position: absolute;
        left: -13px;
        display: block;
        background-color: #e0dcdc;
        border-left: 4px solid #FFF;
        width: 20px;
        height: 24px;
    }

    .stepbar .step.step3:before,
    .stepbar .step.step3:after {
        content: '';
        position: absolute;
        left: -10px;
        display: block;
        background-color: #e0dcdc;
        border-left: 4px solid #FFF;
        width: 20px;
        height: 24px;
    }

    .stepbar .step:after {
        top: 0;
        -moz-transform: skew(30deg);
        -ms-transform: skew(30deg);
        -webkit-transform: skew(30deg);
        transform: skew(30deg);
    }

    .stepbar .step:before {
        bottom: 0;
        -moz-transform: skew(-30deg);
        -ms-transform: skew(-30deg);
        -webkit-transform: skew(-30deg);
        transform: skew(-30deg);
    }

    .stepbar .step.step1 {
        color: black;
        background-color: #fffce4;
    }

    .stepbar .step.step2 {
        color: #ffffff;
        background-color: #e0dcdc;
        /* color: black;
        background-color: #fffce4; */
    }

    .stepbar .step.step3 {
        color: #ffffff;
        background-color: #e0dcdc;
        /* color: black;
        background-color: #fffce4; */
    }

    .stepbar .step.is-current:before,
    .stepbar .step.is-current:after {
        background-color: #e0dcdc;
    }

    .stepbar .step p {
        margin-top: 10px;
    }
</style>
<br>

{{-- #fffce4;
#e0dcdc; --}}
