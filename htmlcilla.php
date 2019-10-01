
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CILLA-IN-MANILLA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='..\styles.css'>
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container mt-3">
        <div class="row" style="">
            <div class="title col-4 col-sm-3 py-2 d-flex justify-content-center">
                <h4>Cilla Black</h4>
            </div>
        </div>
        <div class="wrapper">
            <div class="row">
                <div class="col">
                    <div class="video-container mt-5">
                        <iframe width="640" height="352" frameborder="0" allowfullscreen=""
                            src="https://www.youtube.com/embed/ZUxn6JLwdDY">
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mt-5 px-0 px-sm-5">
                    <h4 style="margin:0 0 10px 18px">Music Career</h4>
                    <p>Priscilla Maria Veronica White, British singer and TV personality (born May 27, 1943, Liverpool,
                        Eng.—died Aug. 1, 2015, Estepona, Spain), was one of Britain’s top pop vocalists in the 1960s,
                        with two number-one hit ballads in 1964, “Anyone Who Had a Heart” (written by Burt Bacharach and
                        Hal David) and “You’re My World” (an English version of the Italian song “Il Mio Mondo”), as
                        well as hit covers of such songs as “It’s for You” by the Beatles and “You’ve Lost That Lovin’
                        Feeling,” co-written by Phil Spector. Black’s distinctive voice, infectious smile, and bright
                        red hair (“from a bottle” she cheerfully admitted)—combined with her working-class roots,
                        Merseyside accent, and scouse catchphrases, such as “lorra lorra laughs” and “ta-ra, luv”—made
                        “Swinging Cilla” a national favourite for decades.</p>
                </div>
            </div>
            <div class="row">
                <div class="col mt-4 px-0 px-sm-5">
                    <h4 style="margin:0 0 10px 18px">Hit Songs</h4>
                    <p class="hits"></p>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.hits').load('htwebservice3.php');
    });
</script>

</html>
