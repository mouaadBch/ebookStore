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
        /* Basic sample */

        body {
            overflow: hidden;
            background-color: #fcfcfc;
            margin: 0;
            padding: 0;
        }

        .flipbook-viewport {
            overflow: hidden;
            width: 100%;
            height: 100%;
        }

        .flipbook-viewport .pdf-container {
            position: absolute;
            top: 50%;
            left: 50%;
            margin: auto;
        }

        .flipbook-viewport #my_pdf_viewer {
            width: 922px;
            height: 600px;
            left: -461px;
            top: -300px;
        }

        .flipbook-viewport .page {
            width: 461px;
            height: 600px;
            background-color: white;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        .flipbook .page {
            -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            -ms-box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            -o-box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .flipbook-viewport .page img {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            margin: 0;
        }

        .flipbook-viewport .shadow {
            -webkit-transition: -webkit-box-shadow 0.5s;
            -moz-transition: -moz-box-shadow 0.5s;
            -o-transition: -webkit-box-shadow 0.5s;
            -ms-transition: -ms-box-shadow 0.5s;

            -webkit-box-shadow: 0 0 20px #ccc;
            -moz-box-shadow: 0 0 20px #ccc;
            -o-box-shadow: 0 0 20px #ccc;
            -ms-box-shadow: 0 0 20px #ccc;
            box-shadow: 0 0 20px #ccc;
        }
    </style>
</head>

<body>
    <div class="flipbook-viewport">
        <div class="pdf-container">
            <div id="my_pdf_viewer">
                <?php
                $flipbookContent = json_decode($ebook['flipbook_content'], true);
                foreach ($flipbookContent['pages'] as $order => $content) { ?>
                    <div class="">
                        <div style="padding: 20px 10px;">
                            <?= html_entity_decode($content) ?>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>
        <div class="">
            <div id="rightPDF" onclick="rightPDF()">rightPDF</div>
            <div id="pagePDF"></div>
            <div id="leftPDF" onclick="leftPDF()"></div>
            <div id="zoomPDF" onclick="zoomPDF()">Zoom</div>
        </div>
    </div>
    <!-- Your existing PDF viewer content here -->

    <script>
        console.log("render started");
        var pdfContainer = $("#my_pdf_viewer");
        pdfContainer.turn({
            acceleration: true,
            autoCenter: true,
            duration: 600,
            elevation: 50,
            when: {
                turned: function(e, page) {
                    console.log('Current view: ', $(this).turn('view'));
                }
            }
        });
    </script>


</body>

</html>