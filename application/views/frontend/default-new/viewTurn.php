<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = 1050, user-scalable = no" />
    <title><?= $title ?> - Ostadi</title>
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
            </div>

        </div>
    </div>
    <!--  <div class="">
         <div id="rightPDF" onclick="rightPDF()">rightPDF</div>
         <div id="pagePDF"></div>
         <div id="leftPDF" onclick="leftPDF()"></div>
         <div id="zoomPDF" onclick="zoomPDF()">Zoom</div>
     </div> -->
    <!-- Your existing PDF viewer content here -->

    <script>
        var myState = {
            pdf: null,
            currentPage: 1,
            zoom: 0.7
        };

        var myPDF = {
            currentPage: 1,
            zoom: 1
        };

        function rightPDF() {
            $("#my_pdf_viewer").turn('next');
            myPDF.currentPage++;
        }

        function zoomPDF() {
            myPDF.zoom += 0.1

            console.log("zoomPDF :", myPDF.zoom)
            $("#my_pdf_viewer").turn("zoom", myPDF.zoom);
        }

        pdfjsLib.getDocument('<?php echo base_url("addons/ebook/view/$id/pdf"); ?>').then((pdf) => {
            myState.pdf = pdf;
            // document.getElementById("pdf_numbre_page").innerText = myState.pdf.numPages;
            render();
        });

        function render() {
            console.log("render started");
            var pdfContainer = $("#my_pdf_viewer");

            function renderPage(pageNumber) {
                if (pageNumber > myState.pdf.numPages) {
                    console.log("render completed");

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

                    return;
                }

                console.log("page : ", pageNumber);
                var pageContainer = $("<div class='page-container'></div>");
                var canvas = document.createElement('canvas');
                canvas.className = 'pdf-canvas';
                var ctx = canvas.getContext('2d');

                pdfContainer.append(pageContainer);
                pageContainer.append(canvas);
                console.log("done create tag : ", pageNumber);

                myState.pdf.getPage(pageNumber).then((page) => {
                    var viewport = page.getViewport(myState.zoom);

                    canvas.width = viewport.width;
                    canvas.height = viewport.height;

                    page.render({
                        canvasContext: ctx,
                        viewport: viewport
                    });

                    // Call renderPage recursively for the next page
                    renderPage(pageNumber + 1);
                });
            }

            // Start rendering from the first page
            renderPage(1);
        }

       
    </script>


</body>

</html>