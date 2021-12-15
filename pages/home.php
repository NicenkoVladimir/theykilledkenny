<head>
    <link rel="stylesheet" href="../styles/style.css">
    <script>
        function changeButtonSize(item) {

            if (item.style.width == '100%') {
                item.style.width = '50%';
            } else {
                item.style.width = '100%';
            }
        }

        function showText(item) {
            var div = item.children[1]
            div.style.display = 'inline-block';
        }

        function hideText(item) {
            var div = item.children[1]
            div.style.display = 'none';
        }
    </script>
    <style>
        #carouselPortfolio .carousel-inner div.active {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: 3fr 1fr;
            grid-column-gap: 2em;
            grid-row-gap: 1em;
            align-items: start;
            margin-bottom: 10px;
        }

        .carousel {
            height: 400px;
        }

        #reviews {
            font-size: 1.2em;
        }

        #carouselPortfolio .carousel-inner img {
            border-radius: 20%;
        }

        #carouselPortfolio .carousel-inner div:last-child {
            grid-column: 1/6;
            font-size: 1.2em;
            font-family: 'SouthParkFont';
            color: rgb(240, 225, 90);
            -webkit-text-stroke: .01em black;
            -moz-text-stroke: .01em black;
            -ms-text-stroke: .01em black;
            text-shadow: 0 0 3px rgb(0, 0, 0);
        }

        #carouselPortfolio {
            display: grid;
            text-align: center;
        }


        .offers {
            margin: 0 10%;
        }

        .star_wrap {
            position: relative;
            width: 50px;
            display: inline-block;
        }

        .star_wrap img {
            max-width: 100%;
        }

        .star_wrap:hover {
            transform: scale(1.3, 1.3);
        }


        .star_text {
            z-index: 100;
            position: absolute;
            left: 19px;
            top: 10px;
            display: none;
        }

        .logo_wrap img:hover {
            opacity: 0.2;
            border: 1px solid black;
        }


        .logo_text {
            z-index: -1;
            position: absolute;
            font-size: 1.1em;
            left: 50px;
            top: 30px;
            display: none;
            text-align: center;
        }

        .h1_page {
            margin: 0 10%;
            margin-bottom: 20px;
            border-bottom: 1px solid black;
        }

        .card-body {
            background-color: rgb(240, 225, 90);
            color: black;
            font-size: 1.2em;
            border: 1px solid black;
        }


        .offers button {
            text-align: justify;
            width: 50%;
            border: 0px;
            background-color: black;
            color: rgb(240, 225, 90);
            font-size: 2em;
        }

        .offers button:hover {
            font-family: 'CaveatBold';
            border: 1px solid rgb(240, 225, 90);

        }

        .offers div:first-child {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div id="carouselPortfolio" class="carousel slide" data-ride="carousel" data-interval="4000">
        <div class="carousel-inner w-80">
            <div class="carousel-item active">
                <div></div>
                <img class=" d-block w-100" src="../images/portfolio/image_1.png" alt="SP character_1">
                <img class="d-block w-100  " src="../images/portfolio/image_3.png" alt="SP character_2">
                <img class="d-block w-100 " src="../images/portfolio/image_2.png" alt="SP character_3">
                <div></div>
                <div>Be excited with our funny South Park characters...</div>
            </div>
            <div class="carousel-item">
                <div></div>
                <img class="d-block w-100" src="../images/portfolio/anime_2.gif" alt="SP animation_1">
                <img class="d-block w-100 " src="../images/portfolio/anime_1.gif" alt="SP animation_2">
                <img class="d-block w-100 " src="../images/portfolio/anime_2.gif" alt="SP animation_3">
                <div></div>
                <div>Make fun of our cool South Park animations...</div>
            </div>
            <div class="carousel-item">
                <div></div>
                <img class="d-block w-100 img-thumbnail " src="../images/portfolio/image_4.png" alt="SP picture_1">
                <img class="d-block w-100 img-thumbnail" src="../images/portfolio/image_5.png" alt="SP picture_2">
                <img class="d-block w-100 img-thumbnail " src="../images/portfolio/image_6.png" alt="SP picture_3">
                <div></div>
                <div>Don't forget to order your pictures from South Park...</div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselPortfolio" role="button" data-slide="prev">

            <span class="sr-only">Previous</span>
            <img src="images/previous.png" alt="next" class="w-25">
        </a>
        <a class="carousel-control-next" href="#carouselPortfolio" role="button" data-slide="next">

            <span class="sr-only">Next</span>
            <img src="images/next.png" alt="next" class="w-25">
        </a>
    </div>

    <h1 class="h1_page mb-4">What can we offer</h1>
    <div class="offers">
        <p>
            <button title="click to learn more" class="btn" type="button" data-toggle="collapse" data-target="#number_1" aria-expanded="false" aria-controls="collapseExample" onclick="changeButtonSize(this)">
                &#10026; South park characters drawings
            </button>
        </p>
        <div class="collapse" id="number_1">
            <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim
                keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
            </div>
        </div>

        <p>
            <button title="click to learn more" class="btn" type="button" data-toggle="collapse" data-target="#number_2" aria-expanded="false" aria-controls="collapseExample" onclick="changeButtonSize(this)">
                &#10026; South park animation
            </button>
        </p>
        <div class="collapse" id="number_2">
            <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim
                keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
            </div>
        </div>


        <p>
            <button title="click to learn more" class="btn" type="button" data-toggle="collapse" data-target="#number_3" aria-expanded="false" aria-controls="collapseExample" onclick="changeButtonSize(this)">
                &#10026; South park comics
            </button>
        </p>
        <div class="collapse" id="number_3">
            <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim
                keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
            </div>
        </div>

    </div>

    <div class="menu" style="margin:20px 10%;">
        <a href="?page=get-order" class="border border-dark">GET ORDER</a>
        <a href="?page=how-it-works" class="border border-dark">LEARN MORE</a>
    </div>

    <h1 class="h1_page mt-5">Customer's reviews</h1>


    <div id="carouselReviews" class="carousel slide" data-ride="carousel" data-interval="10000">
        <div class="carousel-inner w-100">
            <!-- Сюда вставляеться код jQuery -->
        </div>

    </div>


    <!-- Код который выводит обзоры клиентов -->

    <script>
        $(function() {
            $.getJSON("../php/get-reviews.php", (data) => {
                if (data) {
                    $reviews = [];
                    for ($i = 2; $i <= data.length; $i = $i + 4) {
                        $reviews.push(data.slice($i - 2, $i + 2))
                    }
                    $.each($reviews, function(i, $review) {
                        $($('#carouselReviews').children()[0]).append(`
                          <div class="carousel-item container w-80" id='innerCarouselReviews` + i + `'>
                                <div class="row">
                            </div>
                        </div>`);
                        $.each($review, function(j, val) {
                            console.log($review);
                            $($('#innerCarouselReviews' + i).children()[0]).append(`
                                    <div class="col-2 logo_wrap mt-4" onmouseover="showText(this)" onmouseout="hideText(this)">
                                        <img src="` + val['photo'] + `" alt="` + val['name'] +
                                `" class="rounded-circle img-thumbnail">
                                        <div class="logo_text">
                                            <b>` + val['name'] + ` ` + val['surname'] + `</b>
                                            <hr>
                                            ? orders
                                        </div>
                                    </div>
                                    <div class="col-4 mt-4">
                                        <h2>` + val['name'] + `</h2>
                                        <p>` + val['review'] + `</p>
                                        <div id="user_stars` + val['user_id'] + `"></div>
                                    </div>`);
                            for ($i = 1; val['grade'] != $i - 1; $i++) {
                                $('#user_stars' + val['user_id']).append(`
                                    <div class="star_wrap" onmouseover="showText(this)" onmouseout="hideText(this)">
                                        <img src="images/star_icon.png" alt="star">
                                        <div class="star_text">` + $i + `</div>
                                    </div>`);
                            };
                        });
                    });
                    $($('#carouselReviews').find('.carousel-item')[0]).addClass('active');
                    $('#carouselReviews').append(`
                <a class="carousel-control-prev" href="#carouselReviews" role="button" data-slide="prev">

                <span class="sr-only">Previous</span>
                <img src="images/previous.png" alt="next" class="w-25">
                </a>
                <a class="carousel-control-next" href="#carouselReviews" role="button" data-slide="next">

                <span class="sr-only">Next</span>
                <img src="images/next.png" alt="next" class="w-25">
                </a></div>`);
                } else {
                    $('#carouselReviews').append('<h3>No reviews</h3>');
                }

            });
        })
    </script>

</body>