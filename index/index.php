<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="js/app.js">
    <link rel="stylesheet" href="js/main.js">
    <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
    <meta name="author" content="Vincent Garreau" />
    <link rel="stylesheet" media="screen" href="css/style.css">
    <title>Kalendar</title>
</head>

<body class="light">
    <div class="container-fluid h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div id="particles-js"></div>
            <div class="glass">
                <div class="calendar">
                    <div class="calendar-header">
                        <span class="month-picker" id="month-picker">February</span>
                        <div class="year-picker">
                            <span class="year-change" id="prev-year">
                                <pre><</pre>
                            </span>
                           
                                <select class="form-select" aria-label="Default select example">
                                    <option id="year" selected>2021</option>
                                    <?php 
                                        for($selectyear=2021; $selectyear>=1950; $selectyear--){
                                            echo '<option value="'.$selectyear.'" class="year-option" onclick="yearFunction('.$selectyear.')">'.$selectyear.'</option>';
                                        }
                                    ?>
                                </select>
                            
                            <span class="year-change" id="next-year">
                                <pre>></pre>
                            </span>
                        </div>
                    </div>
                    <div class="calendar-body">
                        <div class="calendar-week-day">
                            <div>Sun</div>
                            <div>Mon</div>
                            <div>Tue</div>
                            <div>Wed</div>
                            <div>Thu</div>
                            <div>Fri</div>
                            <div>Sat</div>
                        </div>
                        <div class="calendar-days"></div>
                    </div>
                    <div class="selected-day" id="selectedday"></div>
                    <div class="month-list"></div>
                </div>
            
                <script src="js/main.js"></script>
            </div>
        </div>
    </div>
<!-- scripts -->
<script src="../particles.js"></script>
<script src="js/app.js"></script>

<!-- stats.js -->
<script src="js/lib/stats.js"></script>
</body>
</html>