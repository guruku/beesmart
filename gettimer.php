                    <script type="text/javascript" src="js/jquery-2.0.3.js"></script>
                    <script type="text/javascript" src="js/jquery.countdownTimer.js"></script>
                    <link rel="stylesheet" type="text/css" href="css/jquery.countdownTimer.css" />
                    
                    <span id="h_timer"></span>
                    <script>
                                $(function(){
                                    $('#h_timer').countdowntimer({
                                        hours :0,
                                        minutes :0,
										seconds:5,														
                                        size : "lg",
						                timeUp : timeisUp																														
                                    });
                                });
					function timeisUp() {
					alert("pesan3");
						//Code to be executed when timer expires.
					}

                            </script>

