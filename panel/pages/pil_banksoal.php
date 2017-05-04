<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>jQuery Bootgrid Demo</title>
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/jquery.bootgrid.css" rel="stylesheet" />
  <!--      <script src="js/modernizr-2.8.1.js"></script> !-->
        <style>
            @-webkit-viewport { width: device-width; }
            @-moz-viewport { width: device-width; }
            @-ms-viewport { width: device-width; }
            @-o-viewport { width: device-width; }
            @viewport { width: device-width; }
            .column .text { color: #f00 !important; }
            .cell { font-weight: bold; }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-9">
                    <button id="removeSelected" type="button" class="btn btn-default">Remove Selected</button>
                    <button id="clearSearch" type="button" class="btn btn-default">Clear Search</button>
                    <button id="clearSort" type="button" class="btn btn-default">Clear Sort</button>
                    <button id="getSelectedRows" type="button" class="btn btn-default">Selected Rows</button>
                    <!--div class="table-responsive"-->
                        <table id="grid" class="table table-condensed table-hover table-striped" data-selection="true" data-multi-select="true" data-row-select="true" data-keep-selection="true">
                            <thead>
                                <tr>
                                    <th data-column-id="id" data-identifier="true" data-type="numeric" data-align="right" data-width="40">ID</th>
                                    <th data-column-id="sender" data-order="asc" data-align="center" data-header-align="center" data-width="75%">Sender</th>
                                    <th data-column-id="received" data-css-class="cell" data-header-css-class="column" data-filterable="true">Received</th>
                                    <th data-column-id="link" data-formatter="link" data-sortable="false" data-width="75px">Link</th>
                                    <th data-column-id="status" data-type="numeric" data-visible="false">Status</th>
                                    <th data-column-id="hidden" data-visible="false" data-visible-in-selection="false">Hidden</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>me@rafaelstaib.com</td>
                                    <td>11.12.2014</td>
                                    <td>Link</td>
                                    <td>999</td>
                                    <td>Hidden value 1</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>me@rafaelstaib.com</td>
                                    <td>12.12.2014</td>
                                    <td>Link</td>
                                    <td>999</td>
                                    <td>Hidden value 1</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>me@rafaelstaib.com</td>
                                    <td>10.12.2014</td>
                                    <td>Link</td>
                                    <td>2</td>
                                    <td>Hidden value 1</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>mo@rafaelstaib.com</td>
                                    <td>12.08.2014</td>
                                    <td>Link</td>
                                    <td>999</td>
                                    <td>Hidden value 1</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>ma@rafaelstaib.com</td>
                                    <td>12.06.2014</td>
                                    <td>Link</td>
                                    <td>3</td>
                                    <td>Hidden value 1</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>me@rafaelstaib.com</td>
                                    <td>12.12.2014</td>
                                    <td>Link</td>
                                    <td>999</td>
                                    <td>Hidden value 1</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>ma@rafaelstaib.com</td>
                                    <td>12.11.2014</td>
                                    <td>Link</td>
                                    <td>999</td>
                                    <td>Hidden value 1</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>mo@rafaelstaib.com</td>
                                    <td>15.12.2014</td>
                                    <td>Link</td>
                                    <td>999</td>
                                    <td>Hidden value 1</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>me@rafaelstaib.com</td>
                                    <td>24.12.2014</td>
                                    <td>Link</td>
                                    <td>0</td>
                                    <td>Hidden value 1</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>ma@rafaelstaib.com</td>
                                    <td>14.12.2014</td>
                                    <td>Link</td>
                                    <td>1</td>
                                    <td>Hidden value 1</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>mo@rafaelstaib.com</td>
                                    <td>12.12.2014</td>
                                    <td>Link</td>
                                    <td>999</td>
                                    <td>Hidden value 1</td>
                                </tr>
                            </tbody>
                        </table>
                    <!--/div-->
                </div>
            </div>
        </div>

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery.bootgrid.js"></script>
        <script src="js/jquery.bootgrid.fa.js"></script>
        <script>
		var $jnoc = jQuery.noConflict();
            $jnoc(function()
            {
                function init()
                {
                    $jnoc("#grid").bootgrid({
                        formatters: {
                            "link": function(column, row)
                            {
                                return "<a href=\"#\">" + column.id + ": " + row.id + "</a>";
                            }
                        },
                        rowCount: [-1, 10, 50, 75]
                    });
                }
                
                init();
                
                $jnoc("#getSelectedRows").on("click", function ()
                {
                    alert($jnoc("#grid").bootgrid("getSelectedRows"));
                });
				$jnoc("#removeSelected").on("click", function ()
                {
                    $jnoc("#grid").bootgrid("remove");
                });
				
				$jnoc("#clear").on("click", function ()
                {
                    $jnoc("#grid").bootgrid("clear");
                });

                $jnoc("#init").on("click", init);
                $jnoc("#clearSearch").on("click", function ()
                {
                    $jnoc("#grid").bootgrid("search");
                });
                
                $jnoc("#clearSort").on("click", function ()
                {
                    $jnoc("#grid").bootgrid("sort");
                });				
            });
        </script>

    </body>
</html>