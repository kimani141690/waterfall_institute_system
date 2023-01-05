<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('backend/images/waterfall_institute_logo (1).ico')}}">

    <title>Waterfall Institute</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <style>
        @import url('https://fonts.cdnfonts.com/css/poppins');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-family: 'poppins', sans-serif;
        }

        a {
            text-decoration: none;
            color: white;
        }

        body {
            background-color: #050530;
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

        .content {
            position: relative;
            width: 100%;
            display: flex;
            align-items: center;
            height: 88vh;


            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .content .textbox {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-width: 90%;
            background: linear-gradient(to right, #050530, rgb(255, 0, 0, 0));
            height: 100%;
            padding-left: 100px;
            z-index: 1;
        }

        .content .textbox div {
            width: 90%;
        }

        .content .textbox h2 {
            color: white;
            font-size: 1.5em;
            line-height: 1.4em;
            font-weight: 500;
        }

        .content .textbox h2 span:first-child {
            color: white;
            font-size: 38pt;
            font-weight: 900;
        }

        .content .textbox h2 span:last-child {
            color: #00814b;
            font-size: 1em;
            font-style: italic;
            font-weight: 900;

        }

        .content .textbox p {
            color: white;
            margin-top: 20px;
        }

        .content .textbox a.btn {
            margin-top: 20px;
            padding: 12px 25px;
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
        }

        .btn:hover {
            color: #017143;
            background: white;
        }

        .btn:active {
            color: #017143;
            background: #82af9cf5;
        }


        .content .imgbox {
            width: 50%;
            position: relative;
            height: 90%;
            display: flex;

        }

        .content .imgbox img {
            width: 1000px;
            height: 30em;
            object-fit: cover;
        }


        /* ----------------- FEATURES --------------------- */

        .featured {
            background: linear-gradient(#050530, #fff);
        }

        .mini-container {
            margin: 0px auto;
            max-width: 1080px;
            padding: 0 20px;
        }

        .featured .mini-container .row .col-3 {

            flex-basis: 30%;
            min-width: 250px;
            height: 10em;
            margin: 10px 0 25px;
            text-align: center;
            padding: 10px;
        }

        .row {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .col-3 .feat-item {
            margin: 17px 0 10px;
        }

        .col-4 {
            flex-basis: 25%;
            padding: 10px;
            min-width: 200px;
            margin-bottom: 50px;
            transition: transform 0.5s;
        }

        .col-4 img {
            width: 100%;
        }

        .featured h2.title {
            position: relative;
            width: 100%;
            text-align: center;
            padding: 15px 0px 0;
            line-height: 60px;
        }

        .featured h2.title::after {
            content: '';
            background: #041b68;
            width: 50px;
            height: 5px;
            border-radius: 5px;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        /* ******** ABOUT ********** */

        .about {
            background-color: #fff;
            padding: 70px 0;
        }

        .about h2 {
            width: 100%;
            text-align: center;
            line-height: 60px;
            position: relative;
        }

        .about h2::after {
            content: '';
            background: #041b68;
            width: 50px;
            height: 5px;
            border-radius: 5px;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .about .about-ct {
            padding: 10px 100px;
            display: flex;
            align-items: center;
        }

        .about .about-ct p {
            flex-basis: 50%;
            min-width: 300px;
            font-size: large;
        }

        .about .about-ct .container {
            flex-basis: 50%;
            margin-right: 4%;
        }

        .about .about-ct .swiper {
            position: relative;
            width: 500px;
            height: 470px;
            border-radius: 5%;
            min-width: 300px;


        }

        .swiper-slide img {
            background: radial-gradient(rgb(255, 255, 255), #050530);
            padding: 10px;
            width: 100%;
            height: 470px;
            object-fit: cover;
            border-radius: 5%;

        }

        .swiper .swiper-button-prev,
        .swiper .swiper-button-next {
            color: transparent;
        }

        .swiper .swiper-pagination-bullet-active {
            color: #fff;
        }

        /* ---------footer-------- */
        .footer {
            color: rgb(180, 180, 180);
            font-size: 18px;
            padding: 60px 0 20px;
        }

        .footer h3,
        .footer h2 {
            color: white;
        }

        .footer p {
            margin: 10px 0;
        }

        .footer-col1,
        .footer-col2,
        .footer-col3 {
            min-width: 300px;
            margin-bottom: 20px;
        }

        .footer-col1 {
            flex-basis: 30%;
        }

        .footer ul {
            list-style-type: none;
        }

        .footer .footer-col1 ul {
            display: flex;
        }

        .footer .footer-col1 ul li {
            margin-right: 20px;
        }

        .footer .footer-col1 .fa {
            font-size: 30px;
            color: #017143;
            margin-top: 5px;
            transition: .5s;
        }

        .footer .fa.fa-facebook-official:hover {
            color: rgb(0, 0, 168);
        }

        .footer .fa.fa-youtube-play:hover {
            color: red;
        }

        .footer .fa.fa-twitter:hover {
            color: rgb(40, 135, 243);
        }

        .footer .fa.fa-instagram:hover {
            color: rgb(231, 21, 179);
        }

        .footer .fa.fa-linkedin:hover {
            color: rgb(109, 199, 230);
        }

        .footer-col2,
        .footer-col3 {
            flex-basis: 12%;
        }

        .copyright {
            font-weight: medium;
            text-align: center;
            padding: 40px 0;
            background-color: black;
            color: white;
            font-family: 'Times New Roman', Times, serif;
            font-size: 14pt;
        }
    </style>
</head>

<body>
    <section>
        <header>
            <a href="#" class="logo">
                <img src="{{ asset('backend/images/Waterfall.png')}}" width="40px">
                WATERFALL INSTITUTE
            </a>
            <ul>
                <li><a href="#about">About us</a></li>
                <li><a href="{{ route('student.applications')}}">Student Application</a></li>
                <li><a href="#">Staff Appliation</a></li>
                <li><a href="{{ route('login')}}" class="btn">LOGIN</a></li>
            </ul>
        </header>
        <div class="content" style="background-image: url(https://images.unsplash.com/photo-1568792923760-d70635a89fdc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80);">
            <div class="textbox">
                <div>
                    <h2>
                        <span> IT'S NOT JUST A SCHOOL</span><br />
                        <span> IT'S A HOME AWAY FROM HOME</span>
                    </h2>
                    <p>
                        Brighten your future with the opportunity to study here. Many programs, courses and chances await you. Don't
                        be left behind.
                    </p>

                    <a href="#values" class="btn">LEARN MORE</a>
                </div>
            </div>

            <div class="imgbox">
                <!-- <img src="images/img1.png" alt="schoolpicture"> -->
            </div>
        </div>
    </section>

    <!-- Features -->

    <div class="featured" id="values">
        <h2 class="title">Our Values</h2>
        <div class="mini-container">
            <div class="row">
                <div class="col-3">
                    <div class="feat-item">

                        <!-- {{ asset('backend/images/waterfall_institute_logo (1).ico')}} -->
                        <img src="{{ asset('backend/images/book1-svgrepo-com.svg')}}" alt="" width="50px" height="50px">
                        <h3>Transparency</h3>
                    </div>

                    <p>We are always close to our staff and students. We are One</p>


                </div>
                <div class="col-3">
                    <div class="feat-item">
                        <img src="{{ asset('backend/images/group-svgrepo-com.svg')}}" alt="" width="50px" height="50px">
                        <h3>Innovation</h3>
                    </div>
                    <p>We aim at building everyone's potential so that they can soar to greater heights</p>

                </div>
                <div class="col-3">
                    <div class="feat-item">
                        <img src="{{ asset('backend/images/cells-svgrepo-com.svg')}}" alt="" width="50px" height="50px">
                        <h3>Diversity</h3>
                    </div>
                    <p>We encourage uniqueness and taking pride in one's culture, to bring the best out of them</p>

                </div>

            </div>
        </div>

    </div>


    <section class="about" id="about">
        <h2>About Us</h2>
        <div class="about-ct">
            <div class="container">
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <!-- {{ asset('backend/images/waterfall_institute_logo (1).ico')}} -->

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
            </div>
            <p>
                We as Waterfall Institute aim at directing each of our students in their desired career paths to fulfil
                their lifelong goals and ambitions. We take pride in our values as an International Institution and we embrace
                diversity and all sorts of culture. We are WaterFall Institute, We are the University of choice. Are you ready
                to
                get started?
            </p>
        </div>
    </section>
    <!-- --------------- Footer ------------- -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col1">
                    <h2>Get In Touch</h2>
                    <h6>WE CAN ENSURE RELIABILITY,<br>
                        LOW COST PRODUCTS,<br>
                        AND MOST IMPORTANT,<br>
                        COMFORT
                    </h6>
                    <p>Reach out to us on Social Media</p>
                    <ul>
                        <li><i class="fa fa-facebook-official" aria-hidden="true"></i></li>
                        <li><i class="fa fa-youtube-play" aria-hidden="true"></i></li>
                        <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                        <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
                        <li><i class="fa fa-linkedin" aria-hidden="true"></i></li>
                    </ul>
                </div>

                <div class="footer-col2">
                    <h3>Call us</h3>
                    <p>+254 783 697123 - Alex</p>
                    <p>+254 783 697123 - Mandy</p>
                    <br>

                    <h3>Email</h3>
                    <p>info@waterallinstitute.org</p>


                </div>

                <div class="footer-col3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="">Student Application</a></li>
                        <li><a href="">Staff Application</a></li>
                        <li><a href="#copyright">Privacy Policy</a></li>
                    </ul><br>&nbsp;

                </div>
            </div>
        </div>
    </div>

    <div class="copyright" id="copyright">
        &copy; Waterfall Institute, All Rights Reserved, 1984 - 2023
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
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });
    </script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script type="text/javascript">
    $(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");

            Swal.fire({
                title: 'Delete This Data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                        'Deleted!',
                        'Data has been succesfully deleted.'
                    )
                }
            })
        });
    });
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@if (Session::has('message'))
<script>
    var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
</script>
@endif
</body>

</html>