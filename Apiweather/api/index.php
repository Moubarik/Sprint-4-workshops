<?php 
    // Url de l'API
    $url = "http://api.openweathermap.org/data/2.5/weather?q=Morocco &lang=fr&units=metric&appid=e00e8bee6880bf2f131f5283edea2d8b";

    // On get les resultat
    $raw = file_get_contents($url);
    // Décode la chaine JSON
    $json = json_decode($raw);
    echo '<pre>';
//    var_dump($json);
    echo'</pre>';
    $name = $json->name;
    // echo $name;
    $weather = $json->weather [0]->main;
    $desc = $json->weather[0]->description;
    // echo $weather." ".$desc;
    $temp = $json->main->temp;
    $feel_like = $json->main->feels_like;
    // echo $temp."".$feel_like;
$speed=$json->wind->speed;
$deg=$json->wind->deg;
// echo $speed."".$deg;

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Boostrap -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <!-- Style -->
            <link rel="stylesheet" href="style.css">
            <title>Météo</title>
        </head>
<body>
<body>
            <div class="container text-center py-5">
                <h1>Météo du jour à <strong><?php echo $name; ?></strong></h1>

                <div class="row justify-content-center align-items-center">
                    <?php 
                        switch($weather)
                        {
                            case "Clear":
                                ?>
                                   <div class="icon sunny">
                                        <div class="sun">
                                            <div class="rays"></div>
                                        </div>
                                    </div>           
                                <?php
                                break;
    
                                case 'Drizzle':
                                ?>
                                <div class="icon sun-shower">
                                    <div class="cloud"></div>
                                        <div class="sun">
                                            <div class="rays"></div>
                                    </div>
                                        <div class="rain"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Rain':
                                ?>
                                <div class="icon rainy">
                                    <div class="cloud"></div>
                                    <div class="rain"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Clouds':
                                ?>
                                <div class="icon cloudy">
                                    <div class="cloud"></div>
                                    <div class="cloud"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Thunderstorm':
                                ?>
                                <div class="icon thunder-storm">
                                    <div class="cloud"></div>
                                        <div class="lightning">
                                            <div class="bolt"></div>
                                            <div class="bolt"></div>
                                    </div>
                                </div>
                                <?php 
                                break;
    
                                case 'Snow':
                                ?>
                                <div class="icon flurries">
                                    <div class="cloud"></div>
                                        <div class="snow">
                                            <div class="flake"></div>
                                            <div class="flake"></div>
                                    </div>
                                </div>
    
                                <?php 
                                break;
                        }
                        ?>

                        <div class="meteo_desc  text-left">
                        <h2>
                                <?php echo $temp; ?> °C / Ressenti <?php echo $feel_like; ?> °C <br />
                                <?php echo $speed; ?> Km/h - <?php echo $deg; ?> ° <br /> 
                                <?php echo $desc; ?>
                        </h2>
                    </div>
                </div>
            </div>
        </body>
</body>
</html>