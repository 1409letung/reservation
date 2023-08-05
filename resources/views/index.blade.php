<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('../resources/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/layouts/header.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/layouts/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/bookings/step1a.css') }}">
    <title>Reservation</title>
</head>
<style>
    .active {
        background-color: #fffce4;
        color: black;
    }
</style>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10" id="main">
                @include('layouts/header')
                @include('layouts/alert')
                {{-- content for step --}}
                @yield('step')
                <br>
            </div>
        </div>
        <br>

    </div>
</body>
<script>
    const elements = document.getElementsByClassName('my-class');
    const step2Elements = document.querySelectorAll(
        '.stepbar .step.step2, .stepbar .step.step2:before, .stepbar .step.step2:after');
    // const menu1 = document.querySelector('.step1');
    // const menu2 = document.querySelector('.step2');
    // const menu3 = document.querySelector('.step3');
    function swapColors() {
        step2Elements.forEach(element => {
            if (element.style.backgroundColor === '#e0dcdc') {
                element.style.backgroundColor = '#fffce4';
            } else {
                element.style.backgroundColor = '#e0dcdc';
            }
        });
    }
    if (elements.length > 0) {
        const value = elements[0].value;
        //console.log(value);
        if (value == 'step2') {
            swapColors();
        }
        if (value == 'step3') {
            menu3.classList.add('active');
        }
    } else {
        console.log("Không tìm thấy phần tử có class name 'my-class'");
    }
</script>

</html>
