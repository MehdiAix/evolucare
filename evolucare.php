<?php


$urlFr     = 'https://covid19.mathdro.id/api/countries/FR';
$urlGlobal = 'https://covid19.mathdro.id/api';

// data from FRANCE
$curlConnectionFr = curl_init();
curl_setopt($curlConnectionFr, CURLOPT_URL, $urlFr);
curl_setopt($curlConnectionFr, CURLOPT_RETURNTRANSFER, true);
$resultFr = curl_exec($urlFr);
curl_close($curlConnectionFr);


// data from WORLD
$curlConnection = curl_init();
curl_setopt($curlConnection, CURLOPT_URL, $urlGlobal);
curl_setopt($curlConnection, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($urlGlobal);
curl_close($curlConnection);

$jsonArrayResponseFr = json_decode($resultFr);
$jsonArrayResponse   = json_decode($result);

// FRANCE
$confirmedFr  = $jsonArrayResponseFr->confirmed->value;
$deathsFr     = $jsonArrayResponseFr->deaths->value;
$lastUpdateFr = $jsonArrayResponseFr->lastUpdate;

// WORLD
$confirmed  = $jsonArrayResponse->confirmed->value;
$deaths     = $jsonArrayResponse->deaths->value;
$lastUpdate = $jsonArrayResponse->lastUpdate;
$urlImage   = $jsonArrayResponse->image;

$date       = new DateTime($lastUpdateFr);
$dateNow    = new DateTime();
$dateUpdate = $dateNow->diff($date)->format('%H:%I:%S');


?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">

    <title>EVOLUCARE</title>
</head>
<body>
<h1>EVOLUCARE</h1>

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row">
            <!--            WORLD -->
            <div class="col-md-3">
                <div class="card mb-4 box-shadow">
                    <img class='card-img-top' data-src='holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail' alt='Thumbnail [100%x225]'
                         style='height: 225px; width: 100%; display: block;'
                         src='data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1804685a190%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1804685a190%22%3E%3Crect%20width%3D%22288%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.828125%22%20y%3D%22118.8%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E'
                         data-holder-rendered='true'>
                    <div class="card-body">
                        <p class="card-text">Le nombre de personnes afféctées dans le monde est <span class="donneeGlobal"> <?php echo $confirmed ?? '' ?></span></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-info">Rafraîchir</button>
                            </div>
                            <small class="text-muted">il y'a <?php echo $dateUpdate ?? '' ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <!--            FRANCE -->
            <div class="col-md-3">
                <div class="card mb-4 box-shadow">
                    <img class='card-img-top' data-src='holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail' alt='Thumbnail [100%x225]'
                         style='height: 225px; width: 100%; display: block;'
                         src='data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1804685a190%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1804685a190%22%3E%3Crect%20width%3D%22288%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.828125%22%20y%3D%22118.8%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E'
                         data-holder-rendered='true'>
                    <div class="card-body">
                        <p class="card-text">Le nombre de personnes afféctées en FRANCE est <span id="donneeFR"> <?php echo $confirmedFr ?? '' ?></span></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-info">Rafraîchir</button>
                            </div>
                            <small class="text-muted">il y'a <?php echo $dateUpdate ?? '' ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- IMAGE -->
            <div class="col-md-6">
                <div class="card mb-4 box-shadow">
                    <img class='card-img-top' data-src='holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail' alt='Thumbnail [100%x225]'
                         style='height: 225px; width: 100%; display: block;'
                         src="<?php echo $urlImage ?>"
                         data-holder-rendered='true'>
                    <div class="card-body">
                        <p class="card-text">Le nombre de personnes afféctées dans le monde est <span id="donneeGlobal"> <?php echo $confirmed ?? '' ?></span></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-info">View</button>
                            </div>
                            <small class="text-muted"><small class="text-muted">il y'a <?php echo $dateUpdate ?? '' ?></small></small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script>

    async function fetchData() {
        const response = await fetch('https://covid19.mathdro.id/api');

        if (response.status === 200) {
            const data = await response.text();
            const {confirmed} = JSON.parse(data);
            console.log(confirmed.value)
            document.getElementById("donneeGlobal").textContent = confirmed.value;
        }
    }

    async function fetchDataFr() {
        const response = await fetch('https://covid19.mathdro.id/api/countries/FR');

        if (response.status === 200) {
            const data = await response.text();
            const {confirmed} = JSON.parse(data);
            console.log(confirmed.value)
            document.getElementById("donneeFR").textContent = confirmed.value;
        }
    }

</script>
</body>
</html>
