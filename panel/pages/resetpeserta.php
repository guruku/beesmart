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

    <style>
        @-webkit-viewport {
            width: device-width;
        }

        @-moz-viewport {
            width: device-width;
        }

        @-ms-viewport {
            width: device-width;
        }

        @-o-viewport {
            width: device-width;
        }

        @viewport {
            width: device-width;
        }

    </style>
</head>
<body>
 

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--<button id="append" type="button" class="btn btn-default">Append</button>
                    <button id="clear" type="button" class="btn btn-default">Clear</button>
                    <button id="removeSelected" type="button" class="btn btn-default">Remove Selected</button>
                    <button id="clearSearch" type="button" class="btn btn-default">Clear Search</button>
                    <button id="clearSort" type="button" class="btn btn-default">Clear Sort</button>
                    <button id="getSelectedRows" type="button" class="btn btn-primary">Reset Peserta</button>
                    div class="table-responsive"-->
                    
                    <button id="getSelectedRows" type="button" class="btn btn-primary">Reset Peserta</button>
                    <button id="getPindahIP" type="button" class="btn btn-default">Ganti Station</button>
                    <input type="hidden" id="nilai"><input type="hidden" id="tokez" value="<?php echo $_REQUEST['token']; ?>">
                        <table id="grid" class="table table-condensed table-hover table-striped" data-selection="true" data-multi-select="true" 
                        data-row-select="true" data-keep-selection="true">
                            <thead>
                                <tr style="background-color:#e7e7e7">
                                    <th data-column-id="id" data-identifier="true" data-type="numeric" data-align="right" data-width="20px">No.</th>
                                    <th data-column-id="nomer" data-order="asc" data-align="center" data-header-align="center" data-width="10%" 
                                    data-filterable="true">No.Ujian</th>
                                    <th data-column-id="nama" data-css-class="cell" data-header-css-class="column" data-filterable="true" data-width="30%" >Nama Siswa</th>
                                    <th data-column-id="nisn" data-css-class="cell" data-header-css-class="column" data-filterable="true" data-width="9%" >NISN</th>                                    <th data-column-id="kelas" data-css-class="cell" data-header-css-class="column" data-filterable="true" data-width="9%" >Kelas</th>                                    <th data-column-id="jurusan" data-css-class="cell" data-header-css-class="column" data-filterable="true" data-width="10%" >Jurusan</th>                                    <th data-column-id="mapel" data-css-class="cell" data-header-css-class="column" data-filterable="true" data-width="14%" >Mapel</th>
                                    <th data-column-id="status" data-css-class="cell" data-header-css-class="column" data-filterable="true" data-width="10%" >Status</th>                                    
<!--                                    <th data-column-id="link" data-formatter="link" data-sortable="false" data-width="75px">Link</th> 
                                    <th data-column-id="status" data-type="numeric" data-visible="false">Status</th>
                                    <th data-column-id="status" data-type="numeric" data-visible="true">Status</th>!-->
                                    <th data-column-id="hidden" data-visible="false" data-visible-in-selection="false">Hidden</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
include "../../config/server.php";
if(isset($_REQUEST['token'])){

		$sql = mysql_query("select su.*,s.*,su.urut as yoi,u.XKodeMapel,m.XNamaMapel from cbt_siswa_ujian su left join cbt_siswa s on s.XNomerUjian=su.XNomerUjian
		left join cbt_ujian u on u.XTokenUjian = su.XTokenUjian
		left join cbt_mapel m on m.XKodeMapel = u.XKodeMapel
		where u.XStatusUjian = '1' and su.XTokenUjian = '$_REQUEST[token]' order by su.Urut");
		while($s = mysql_fetch_array($sql)){
		if($s['XStatusUjian']=='1'){$xsta = "Online";}
		elseif($s['XStatusUjian']=='9'){$xsta = "Selesai";}
		echo "
										<tr>
											<td>$s[yoi]</td>
											<td>$s[XNomerUjian]</td>
											<td>$s[XNamaSiswa]</td>
											<td>$s[XNIK]</td>
											<td>$s[XKodeKelas]</td>
											<td>$s[XKodeJurusan]</td>
											<td>$s[XNamaMapel]</td>
											<td>$xsta</td>
										</tr>
		"; 
		}
		
} 		
?>
  
                            </tbody>
                        </table>
                    <!--/div-->
                </div>
            </div>
        </div>

        <footer id="footer">
        </footer>
        
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/jquery.bootgrid.css" rel="stylesheet" />
        <script src="js/js/modernizr-2.8.1.js"></script>
        <script src="js/jquery-1.11.1.min.js"></script>
<!--    <script src="js/bootstrap.js"></script>  !-->
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
                
                $jnoc("#append").on("click", function ()
                {
                    $jnoc("#grid").bootgrid("append", [{
                            id: 0,
                            sender: "hh@derhase.de",
                            received: "Gestern",
                            link: ""
                        },
                        {
                            id: 12,
                            sender: "er@fsdfs.de",
                            received: "Heute",
                            link: ""
                        }]);
                });
                
                $jnoc("#clear").on("click", function ()
                {
                    $jnoc("#grid").bootgrid("clear");
                });
                
                $jnoc("#removeSelected").on("click", function ()
                {
                    $jnoc("#grid").bootgrid("remove");
                });
                
                $jnoc("#clearSearch").on("click", function ()
                {
                    $jnoc("#grid").bootgrid("search");
                });
                
                $jnoc("#clearSort").on("click", function ()
                {
                    $jnoc("#grid").bootgrid("sort");
                });
                
                $jnoc("#getSelectedRows").on("click", function ()
                {
					var nilaix = $jnoc("#grid").bootgrid("getSelectedRows");
					var tokex = document.getElementById("tokez").value;
                    //alert($("#grid").bootgrid("getSelectedRows"));
					//alert(nilaix);
					//document.getElementById("nilai").value = nilaix;
									
                    var data = 'nama=' + nilaix + '& token=' + tokex;
                    $jnoc.ajax({
                        type: 'POST',
                        url: "reset.php",
                        data: data,
                        success: function() {
                            					document.getElementById("nilai").value = nilaix;
													  document.location.reload();
									
                        }
                    });				  
                });

				$jnoc("#getPindahIP").on("click", function ()
                {
					var nilaix = $jnoc("#grid").bootgrid("getSelectedRows");
					var tokex = document.getElementById("tokez").value;
                    //alert($("#grid").bootgrid("getSelectedRows"));
					//alert(nilaix);
					//document.getElementById("nilai").value = nilaix;
									
                    var data = 'nama=' + nilaix + '& token=' + tokex;
					
					alert();
					
                    $jnoc.ajax({
                        type: 'POST',
                        url: "hapus_ip.php",
                        data: data,
                        success: function() {
                            					document.getElementById("nilai").value = nilaix;
												document.location.reload();
									
                        }
                    });				  
					

                });
				
            });
        </script>
</body>
</html>