
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('backend/images/waterfall_institute_logo (1).ico')}}">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <link rel="stylesheet" href="css/application_form.css">
    <title>Student Application</title>

    <style>
        @import url('https://fonts.cdnfonts.com/css/poppins');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* font-family: 'poppins', sans-serif; */
        }

        html {
            font-family: 'poppins', sans-serif;
        }

        a {
            text-decoration: none;
            color: white;
        }

        header {
            width: 100%;
            padding: 20px 100px 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #041b68;
            z-index: 2;
            background-color: #050530;
        }


        header .logo {
            position: relative;
            max-width: max-content;
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            letter-spacing: 1px;
            font-weight: bold;
            font-size: medium;
        }

        header .logo img {
            margin-right: 10px;
        }

        header ul {
            list-style: none;
            display: flex;
            position: relative;
            align-items: center;
        }

        header ul li a {
            display: inline-block;
            color: white;
            font-weight: 400;
            margin-left: 40px;
            text-decoration: none;
            transition: .4s ease-in-out;

        }

        header ul li a:hover {
            color: #253569;
        }

        header .btn {
            padding: 10px 20px;
            font-size: small;
        }

        .btn {
            color: #333;
            display: inline-block;
            background: #017143;
            color: #fff;
            border-radius: 40px;
            font-weight: 600;
            letter-spacing: 1px;
            text-decoration: none;
            width: max-content;
            transition: .4s ease-in-out;
            border: 0;
        }

        .btn:hover {
            color: #017143;
            background: white;
        }

        .btn:active {
            color: #017143;
            background: #82af9cf5;
        }

        .top-picture {
            position: relative;
            width: 100%;
            display: flex;
            align-items: center;
            height: 30vh;
            /* padding: 20px; */
            background: url(../images/img4.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .top-picture h1 {
            color: white;
            font-size: 40pt;

        }

        .top-picture .textbox {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            background: #02021ab6;
            height: 100%;
            padding-left: 100px;
            z-index: 1;
        }

        .container {
            background-color: #041b68;
            margin: 50px;
            /* height: 100%; */
            /* margin-top: 70px; */
            display: flex;
            align-items: center;
            /* width: 100%; */
            /* padding: 30px; */
            border-radius: 5px;
        }

        .container form {
            /* background-color: #041b68; */
            margin: 30px;
            flex-basis: 50%;
            color: white;
        }

        .container form p {
            margin-bottom: 12px;
        }

        .container form p:first-child {
            font-size: large;
            font-weight: 800;
            margin-bottom: 20px;

        }

        .container form p input {
            width: 85%;
            height: 30px;
            border-radius: 5px;
            border: 0;
        }

        .container form p span {
            color: #01a561;
            font-weight: 900;
        }

        .swiper {
            position: relative;
            flex-basis: 50%;
            width: 100%;
            height: 600px;
            border-radius: 5px;
            min-width: 300px;

        }

        .swiper-slide img {
            /* padding: 10px; */
            /* position: relative; */
            width: 100%;
            height: 600px;
            object-fit: cover;
            border-radius: 5px;
            min-width: 300px;
        }

        .swiper .swiper-button-prev,
        .swiper .swiper-button-next {
            color: transparent;
        }

        .swiper .swiper-pagination-bullet-active {
            color: #fff;
        }

        button.btn {
            padding: 10px 20px;
        }
    </style>

</head>

<body>

    <header>
        <a href="#" class="logo">
            <img src="{{ asset('backend/images/Waterfall.png')}}" width="40px">
            WaterFall Institute
        </a>
        <ul>
            <li><a href="#about">About us</a></li>
            <li><a href="{{ route('student.applications')}}">Student Application</a></li>
            <li><a href="#">Staff Appliation</a></li>
            <li><a href="{{ route('login')}}" class="btn">LOGIN</a></li>
        </ul>
    </header>

    <!-- <div class="top-picture">
        <div class="textbox">
            <h1>STUDENT APPLICATION</h1>
        </div>
    </div> -->

    <div class="container">
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide"><img src="{{ asset('backend/images/img1.png')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{ asset('backend/images/img2.png')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{ asset('backend/images/img3_1.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{ asset('backend/images/img4.png')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{ asset('backend/images/img5.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{ asset('backend/images/img6.jpg')}}" alt=""></div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
<br><br>

       <div style="text-align: center; margin:auto;">
       <img src="{{ asset('backend/images/Waterfall.png')}}" width="100px">

          <h1 style="color: #fff; font-size: 40px;">THANK YOU, YOUR APPLICATION HAS <br> BEEN RECIEVED.</h1>
          <br><br><br>
          <h3 style="color: #fff; font-size: 30px;" >WE WILL GET BACK TO YOU...</h3>
          </div>
           

            

        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

        <script>
            const swiper = new Swiper('.swiper', {

                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },

                loop: true,

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },

                // Navigation arrows
                // navigation: {
                //     nextEl: '.swiper-button-next',
                //     prevEl: '.swiper-button-prev',
                // },

            });
        </script>
    </div>
   

</body>

</html>