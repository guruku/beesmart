<!DOCTYPE html>
<!-- saved from url=(0052)http://thorst.github.io/jquery-idletimer/prod/demos/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Jquery-idletimer : provides you a way to monitor user activity with a page.">
    <title>CBT BEESMART | UJIAN ONLINE</title>

    <!-- jQuery and idleTimer -->
    <script type="text/javascript" src="js/jquery-1.11.0.min.js.download"></script>
    <script type="text/javascript" src="js/idle-timer.js.download"></script>

    <!-- Bootstrap/respond (ie8) and moment -->
    <link href="js/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js.download"></script>
    <script src="js/respond.js.download"></script>
    <script src="js/moment.js.download"></script>

    <!-- Respond.js proxy on external server -->
    <link href="http://netdna.bootstrapcdn.com/respond-proxy.html" id="respond-proxy" rel="respond-proxy">
    <link href="http://thorst.github.io/jquery-idletimer/prod/demos/respond.proxy.gif" id="respond-redirect" rel="respond-redirect">
    <script src="js/respond.proxy.js.download"></script>
    
    <style>
        body {
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .btn {
            padding: 5px 6px;
        }
    </style>
</head>
<body class="">
   
    <div class="container">

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        /*
        scrollToBottom plugin, chainable
        */
        $.fn.scrollToBottom = function () {
            this.scrollTop(this[0].scrollHeight);
            return this;
        };
        /*
        click event for alert button
        */
        (function ($) {
            //Display alert
            $("#alert").click(function () { alert("Hello!"); return false; });
        })(jQuery);


    </script>

    <script type="text/javascript">
        /*
        Code for document idle timer
        */
        (function ($) {
            //Define default
			
			var habis = 5; //entry berapa menit
			
            var
                docTimeout = 60000*habis; /* default 60000 ada adalah 1 menit
            ;

            /*
            Handle raised idle/active events
            */
            $(document).on("idle.idleTimer", function (event, elem, obj) {
                $("#docStatus")
                    .val(function (i, v) {
                        return v + "Idle @ " + moment().format() + " \n";
                    })
                    //.removeClass("alert-success")
                    //.addClass("alert-warning")
                    //.scrollToBottom();
					//$("#myModal").modal("show");
					//window.location="logout.php";
					window.location="idle.php";
					
            });
            $(document).on("active.idleTimer", function (event, elem, obj, e) {
                $('#docStatus')
                    .val(function (i, v) {
                        return v + "Active [" + e.type + "] [" + e.target.nodeName + "] @ " + moment().format() + " \n";
                    })
                    //.addClass("alert-success")
                    //.removeClass("alert-warning")
                    //.scrollToBottom();
					//					$("#myModal").modal("hide");
					<?php
					include "config/server.php";
					if(isset($_COOKIE['PESERTA'])){
					$user = $_COOKIE['PESERTA'];
					$jam = date("H:i:s");
					$sql2 = mysql_query("Update cbt_siswa_ujian set XLastUpdate = '$jam' where XTglUjian = '$xtglujian' and XNomerUjian = '$user' and XStatusUjian = '1'");
					}
					?>
            });

           

            //Clear old statuses
            $('#docStatus').val('');

            //Start timeout, passing no options
            //Same as $.idleTimer(docTimeout, docOptions);
            $(document).idleTimer(docTimeout);

            //For demo purposes, style based on initial state
            if ($(document).idleTimer("isIdle")) {
                $("#docStatus")
                  .val(function (i, v) {
                      return v + "Initial Idle State @ " + moment().format() + " \n";
                  })
                  .removeClass("alert-success")
                  .addClass("alert-warning")
                  .scrollToBottom();
            } else {
                $('#docStatus')
                    .val(function (i, v) {
                        return v + "Initial Active State @ " + moment().format() + " \n";
                    })
                    .addClass("alert-success")
                    .removeClass("alert-warning")
                    .scrollToBottom();
            }


            //For demo purposes, display the actual timeout on the page
            $('#docTimeout').text(docTimeout / 10000);


        })(jQuery);

    </script>



</body></html>