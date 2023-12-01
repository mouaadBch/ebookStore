<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = 1050, user-scalable = no" />
    <title><?= $ebook['title'] ?> - Ostadi</title>
    <script src="<?php echo base_url() . 'assets/frontend/default-new/js/jquery.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/frontend/default-new/TurnJs/turn.js';  ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>

    <style>
        body {
            background: #ccc;
        }

        #book {
            margin: auto;
            width: 100%;
            height: 1123px;
        }

        #book .turn-page {
            background-color: white;
        }

        #book .cover {
            background: #333;
        }

        #book .loader {
            background-image: url(loader.gif);
            width: 24px;
            height: 24px;
            display: block;
            position: absolute;
            top: 238px;
            left: 188px;
        }

        #controls {
            position: fixed;
            bottom: 0;
            right: 0;
            width: 100%;
            border: 3px solid #73AD21;
            z-index: 9999;
            text-align: center;
            background: bisque;
        }

        #book .odd {
            background-image: -webkit-linear-gradient(left, #FFF 95%, #ddd 100%);
            background-image: -moz-linear-gradient(left, #FFF 95%, #ddd 100%);
            background-image: -o-linear-gradient(left, #FFF 95%, #ddd 100%);
            background-image: -ms-linear-gradient(left, #FFF 95%, #ddd 100%);
        }

        #book .even {
            background-image: -webkit-linear-gradient(right, #FFF 95%, #ddd 100%);
            background-image: -moz-linear-gradient(right, #FFF 95%, #ddd 100%);
            background-image: -o-linear-gradient(right, #FFF 95%, #ddd 100%);
            background-image: -ms-linear-gradient(right, #FFF 95%, #ddd 100%);
        }

        #continer {
            padding: 20px 10px;
        }

        #page-number {
            font-size: 14px;
            width: 50px;
        }
    </style>
</head>

<body>
    <!--     <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
 -->
    <div id="continer">
        <div id="book">
            <?php
            $nbrPages = 0;
            if (!empty($ebook['flipbook_content'])) {
                $flipbookContent = json_decode($ebook['flipbook_content'], true);
                $nbrPages = count($flipbookContent['pages']);
                foreach ($flipbookContent['pages'] as $order => $content) { ?>
                    <div class="cover">
                        <div style="padding: 20px 30px;">
                            <?= html_entity_decode($content) ?>
                        </div>
                    </div>
            <?php }
            } else {
                echo '<h2 style="color: red;text-align: center;">No content</h1>';
            }
            ?>
        </div>
    </div>
    <div id="controls">
        <button type="button" id="leftPDF" onclick="leftPDF()">leftPDF</button>
        <button type="button" id="zoomPDF" onclick="zoomPDF(0)">Zoom-</button>
        <label for="page-number">Page:</label> <input type="text" id="page-number" value="1"> of <span id="number-pages"><?= $nbrPages ?></span>
        <button type="button" id="zoomPDF" onclick="zoomPDF(1)">Zoom+</button>
        <button type="button" id="rightPDF" onclick="rightPDF()">rightPDF</button>
    </div>

    <script type="text/javascript">
        var myPDF = {
            zoom: 1
        };

        function rightPDF() {
            $("#book").turn('next');
        }

        function leftPDF() {
            $("#book").turn('previous');
        }

        function zoomPDF(type) {
            if (type) {
                myPDF.zoom += 0.3
                $("#book").turn("zoom", myPDF.zoom, 0);
            } else {
                myPDF.zoom -= 0.3
                $("#book").turn("zoom", myPDF.zoom, 0);
            }
        }

        $(window).ready(function() {
            $('#book').turn({
                acceleration: true,
                /* pages: numberOfPages, */
                elevation: 50,
                autoCenter: true,
                gradients: !$.isTouch,
                when: {
                    turning: function(event, page, pageObject) {
                        $('#page-number').val(page);
                    }
                }
            });


            $('#page-number').keydown(function(e) {

                if (e.keyCode == 13)
                    $('#book').turn('page', $('#page-number').val());

            });
        });

        $(window).bind('keydown', function(e) {

            if (e.target && e.target.tagName.toLowerCase() != 'input')
                if (e.keyCode == 37)
                    $('#book').turn('previous');
                else if (e.keyCode == 39)
                $('#book').turn('next');

        });
    </script>
</body>

</html>