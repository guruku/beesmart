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
        <link href="../css/bootstrap.css" rel="stylesheet" />
        <link href="../css/jquery.bootgrid.css" rel="stylesheet" />
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

                <div class="col-md-12">
                    <button id="getSelectedRows" type="button" class="btn btn-default">Ambil Pilihan</button>
                    <!--div class="table-responsive"-->
                        <table id="grid" class="table table-condensed table-hover table-striped" data-selection="true" data-multi-select="true" data-row-select="true" data-keep-selection="true">
                            <thead>
                                <tr>
                                    <th data-column-id="id" data-identifier="true" data-type="numeric" data-align="right" data-width="40">ID</th>
                                    <th data-column-id="sender" data-order="asc" data-align="center" data-header-align="center" data-width="15%">Kode Soal</th>
                                    <th data-column-id="received" data-css-class="cell" data-header-css-class="column" data-filterable="true" data-width="45%">
                                    Mata Pelajaran</th>
                                    <th data-column-id="link" data-formatter="link" data-sortable="false" data-width="75px">Soal</th>
                                    <th data-column-id="status" data-type="numeric" data-visible="false">Acak</th>
                                    <th data-column-id="hidden" data-visible="false" data-visible-in-selection="false">Guru</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
		include "../../config/server.php";							
$sql0 = mysql_query("
select * from cbt_paketsoal p left join cbt_mapel m on p.XKodeMapel = m.XKodeMapel
where p.XStatusSoal = 'Y'");
while($s=mysql_fetch_array($sql0)){ ?>

                            
                                <tr>
                                	<td><?php echo $s['Urut']; ?></td>
                                    <td><?php echo $s['XKodeSoal']; ?></td>
                                    <td><?php echo $s['XNamaMapel']; ?></td>
                                    <td><?php echo $s['XLevel']; ?></td>
                                    <td>Link</td>
                                    <td>999</td>
                                    <td>Hidden value 1</td>
                                </tr>
<?php } ?>                                
                             
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
					var anu = $jnoc("#grid").bootgrid("getSelectedRows");
                    //alert($jnoc("#grid").bootgrid("getSelectedRows"));
					alert(anu);
					
					
                });
            });
        </script>
    </body>
</html>