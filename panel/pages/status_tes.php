<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
?>
     <form id="fabForm" method="post" class="form-horizontal bv-form" novalidate="novalidate"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                    <div class="form-group">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" id="toggleChkSelFabricante" name="toggleChkSelFabricante"></th>
                                    <th>Fabricante</th>
                                </tr>
                                </thead>
                                <tbody id="selFabricanteBody"><tr data-idproductosolicitud="1" data-id="1"><td><div class="checkbox"><label><input type="checkbox" name="fabLinkChoice[]" value="1"></label></div></td><td>Dist1</td><td>DR</td><td class="has_pais fabTd-1"><span id="14">México</span>, <span id="15">Nicaragua</span>, <span id="16">Panamá</span></td><td>1212212</td></tr><tr data-idproductosolicitud="1" data-id="1"><td><div class="checkbox"><label><input type="checkbox" name="fabLinkChoice[]" value="1"></label></div></td><td>Dist1</td><td>DR</td><td class="has_pais fabTd-1"><span id="14">México</span>, <span id="15">Nicaragua</span>, <span id="16">Panamá</span></td><td>1212212</td></tr></tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Regresar</button>
                        <button type="submit" class="btn btn-primary" disabled="" id="btnAgregarSelFabricante"><i class="fa fa-save"></i> Agregar</button>
                    </div>
                </form>
