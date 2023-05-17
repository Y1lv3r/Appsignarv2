<?php include("./botonup.php") ?>
<?php include("modulos/asig3m.php") ?>
<?php include("./cabeceras/cabecera_OEstados.php") ?>
<?php include("./layout.php") ?>

<!-- Custom styles for this template -->
<title>APPSIGNAR | Otros Estados</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.19.1/extensions/filter-control/bootstrap-table-filter-control.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.19.1/bootstrap-table.min.css" />


<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
<!-- Custom fonts for this template -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" />

<link rel="stylesheet" href="extensions/fixed-columns/bootstrap-table-fixed-columns.css">
<script src="extensions/fixed-columns/bootstrap-table-fixed-columns.js"></script>

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<link rel='stylesheet' href='https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css'>

<link rel="stylesheet" href="./css/estilos_otros_estados.css">

<br>
    <br>
<div class="container-fluid" style="border-bottom: 1px solid #dee2e6;">

    <div class="row">

        <ul class="nav nav-tabs" style="border-bottom: 0px solid #dee2e6 !important;">
            
            <li class="margentabs"><a href="#tab1default" data-toggle="tab"> <button type="button" class="btn btn-success">Capacitación <?php echo date('Y'); ?></button> </a></li>
           
            <li class="margentabs"><a href="#tab2default" data-toggle="tab"><button type="button" class="btn btn-success">Compensatorio <?php echo date('Y'); ?></button> </a></li>
           
            <li class="margentabs"><a href="#tab3default" data-toggle="tab"><button type="button" class="btn btn-success">Incapacidad <?php echo date('Y'); ?></button> </a></li>
            
            <li class="margentabs"><a href="#tab4default" data-toggle="tab"><button type="button" class="btn btn-success">Licencia <?php echo date('Y'); ?></button> </a></li>
          
            <li class="margentabs"><a href="#tab5default" data-toggle="tab"><button type="button" class="btn btn-success">Inactivos <?php echo date('Y'); ?></button> </a></li>
          
            <li class="margentabs"><a href="#tab6default" data-toggle="tab"><button type="button" class="btn btn-success">Vacaciones <?php echo date('Y'); ?></button> </a></li><br><br><br>
        </ul>

    </div>
</div>
<?php
$Year2 = date("Y-m-d");
$semana = date("W");
$visible = "false";

?>
<div class="panel with-nav-tabs panel-default">
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane fade" id="tab1default">

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h1 class="h3 mb-0 font-weight-bold text-primary" class="label" align="center">Capacitación</h1><br>
                        <div class="table-responsive">
                            <div id="flotante2">
                                <span class="m-0 font-weight-bold text-primary">Búsqueda Genérica 1:</span>
                            </div>
                            <div id="flotante">
                                <span class="m-0 font-weight-bold text-primary">Búsqueda Genérica 2:</span>
                            </div>
                            <div id="toolbarr">
                                <div class="form-group" id="flotante3">
                                    <input type="text" align="right" style="width : 215px; heigth : 80px" class="form-control pull-right" id="searchca" placeholder="Search...">
                                </div>
                            </div>
                            <table id="tableca" data-toggle="table" data-show-jump-to="true" data-show-fullscreen="true" data-show-button-text="true" data-search="true" data-search-align="left" data-search-accent-neutralise="true" data-search-highlight="true" data-search-time-out="1" data-filter-control="true" data-show-export="true" data-click-to-select="true" data-show-columns="true" data-show-columns-toggle-all="true" data-pagination="true" data-pagination-loop="false" data-buttons="buttons" data-query-params="queryParams" data-show-columns-search="true" data-key-events="true" data-cache="false" data-fixed-columns="true" data-toolbar="#toolbarr" class="table-responsive">
                                <thead>

                                    <tr>
                                        <th data-width="250" data-field="prenomb" data-switchable="false" data-title-tooltip="Nombre del empleado" data-filter-control="input" data-halign="center" data-sortable="true">Nombre</th>
                                        <th data-width="250" data-field="pperfil" data-switchable="false" data-title-tooltip="Perfil del empleado" data-filter-control="select" data-halign="center" data-sortable="true">Perfil</th>
                                        <th data-width="250" data-field="ddate" data-switchable="false" data-title-tooltip="Division del empleado" data-filter-control="select" data-halign="center" data-sortable="true">División</th>

                                        <th data-field="anote1" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 1</th>
                                        <th data-field="anote2" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 2</th>
                                        <th data-field="anote3" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 3</th>
                                        <th data-field="anote4" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 4</th>
                                        <th data-field="anote5" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 5</th>
                                        <th data-field="anote6" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 6</th>
                                        <th data-field="anote7" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 7</th>
                                        <th data-field="anote8" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 8</th>
                                        <th data-field="anote9" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 9</th>
                                        <th data-field="anote10" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 10</th>
                                        <th data-field="anote11" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 11</th>
                                        <th data-field="anote12" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 12</th>
                                        <th data-field="anote13" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 13</th>
                                        <th data-field="anote14" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 14</th>
                                        <th data-field="anote15" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 15</th>
                                        <th data-field="anote16" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 16</th>
                                        <th data-field="anote17" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 17</th>
                                        <th data-field="anote18" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 18</th>
                                        <th data-field="anote19" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 19</th>
                                        <th data-field="anote20" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 20</th>
                                        <th data-field="anote21" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 21</th>
                                        <th data-field="anote22" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 22</th>
                                        <th data-field="anote23" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 23</th>
                                        <th data-field="anote24" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 24</th>
                                        <th data-field="anote25" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 25</th>
                                        <th data-field="anote26" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 26</th>
                                        <th data-field="anote27" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 27</th>
                                        <th data-field="anote28" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 28</th>
                                        <th data-field="anote29" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 29</th>
                                        <th data-field="anote30" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 30</th>
                                        <th data-field="anote31" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 31</th>
                                        <th data-field="anote32" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 32</th>
                                        <th data-field="anote33" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 33</th>
                                        <th data-field="anote34" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 34</th>
                                        <th data-field="anote35" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 35</th>
                                        <th data-field="anote36" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 36</th>
                                        <th data-field="anote37" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 37</th>
                                        <th data-field="anote38" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 38</th>
                                        <th data-field="anote39" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 38</th>
                                        <th data-field="anote40" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 40</th>
                                        <th data-field="anote41" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 41</th>
                                        <th data-field="anote42" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 42</th>
                                        <th data-field="anote43" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 43</th>
                                        <th data-field="anote44" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 44</th>
                                        <th data-field="anote45" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 45</th>
                                        <th data-field="anote46" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 46</th>
                                        <th data-field="anote47" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 47</th>
                                        <th data-field="anote48" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 48</th>
                                        <th data-field="anote49" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 49</th>
                                        <th data-field="anote50" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 50</th>
                                        <th data-field="anote51" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 51</th>
                                        <th data-field="anote52" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 52</th>
                                        <th data-field="anote53" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 53</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    <?php foreach ($listacapa as $asig) { ?>

                                        <tr>
                                            <td><?php echo $asig['empleado'] ?></td>
                                            <td><?php echo $asig['perfil_e'] ?></td>
                                            <td><?php echo $asig['division_e'] ?></td>

                                            <td><?php echo $asig['semana_1'] ?></td>
                                            <td><?php echo $asig['semana_2'] ?></td>
                                            <td><?php echo $asig['semana_3'] ?></td>
                                            <td><?php echo $asig['semana_4'] ?></td>
                                            <td><?php echo $asig['semana_5'] ?></td>
                                            <td><?php echo $asig['semana_6'] ?></td>
                                            <td><?php echo $asig['semana_7'] ?></td>
                                            <td><?php echo $asig['semana_8'] ?></td>
                                            <td><?php echo $asig['semana_9'] ?></td>
                                            <td><?php echo $asig['semana_10'] ?></td>
                                            <td><?php echo $asig['semana_11'] ?></td>
                                            <td><?php echo $asig['semana_12'] ?></td>
                                            <td><?php echo $asig['semana_13'] ?></td>
                                            <td><?php echo $asig['semana_14'] ?></td>
                                            <td><?php echo $asig['semana_15'] ?></td>
                                            <td><?php echo $asig['semana_16'] ?></td>
                                            <td><?php echo $asig['semana_17'] ?></td>
                                            <td><?php echo $asig['semana_18'] ?></td>
                                            <td><?php echo $asig['semana_19'] ?></td>
                                            <td><?php echo $asig['semana_20'] ?></td>
                                            <td><?php echo $asig['semana_21'] ?></td>
                                            <td><?php echo $asig['semana_22'] ?></td>
                                            <td><?php echo $asig['semana_23'] ?></td>
                                            <td><?php echo $asig['semana_24'] ?></td>
                                            <td><?php echo $asig['semana_25'] ?></td>
                                            <td><?php echo $asig['semana_26'] ?></td>
                                            <td><?php echo $asig['semana_27'] ?></td>
                                            <td><?php echo $asig['semana_28'] ?></td>
                                            <td><?php echo $asig['semana_29'] ?></td>
                                            <td><?php echo $asig['semana_30'] ?></td>
                                            <td><?php echo $asig['semana_31'] ?></td>
                                            <td><?php echo $asig['semana_32'] ?></td>
                                            <td><?php echo $asig['semana_33'] ?></td>
                                            <td><?php echo $asig['semana_34'] ?></td>
                                            <td><?php echo $asig['semana_35'] ?></td>
                                            <td><?php echo $asig['semana_36'] ?></td>
                                            <td><?php echo $asig['semana_37'] ?></td>
                                            <td><?php echo $asig['semana_38'] ?></td>
                                            <td><?php echo $asig['semana_39'] ?></td>
                                            <td><?php echo $asig['semana_40'] ?></td>
                                            <td><?php echo $asig['semana_41'] ?></td>
                                            <td><?php echo $asig['semana_42'] ?></td>
                                            <td><?php echo $asig['semana_43'] ?></td>
                                            <td><?php echo $asig['semana_44'] ?></td>
                                            <td><?php echo $asig['semana_45'] ?></td>
                                            <td><?php echo $asig['semana_46'] ?></td>
                                            <td><?php echo $asig['semana_47'] ?></td>
                                            <td><?php echo $asig['semana_48'] ?></td>
                                            <td><?php echo $asig['semana_49'] ?></td>
                                            <td><?php echo $asig['semana_50'] ?></td>
                                            <td><?php echo $asig['semana_51'] ?></td>
                                            <td><?php echo $asig['semana_52'] ?></td>
                                            <td><?php echo $asig['semana_53'] ?></td>
                                        </tr>

                                    <?php } ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab2default">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h1 class="h3 mb-0 font-weight-bold text-primary" class="label" align="center">Compensatorio</h1><br>
                        <div class="table-responsive">
                            <div id="flotante2">
                                <span class="m-0 font-weight-bold text-primary">Búsqueda Genérica 1:</span>
                            </div>
                            <div id="flotante">
                                <span class="m-0 font-weight-bold text-primary">Búsqueda Genérica 2:</span>
                            </div>
                            <div id="toolbar2">
                                <div class="form-group" id="flotante3">
                                    <input type="text" align="right" style="width : 215px; heigth : 80px" class="form-control pull-right" id="searchco" placeholder="Search...">
                                </div>
                            </div>
                            <table id="tableco" data-toggle="table" data-show-jump-to="true" data-show-fullscreen="true" data-show-button-text="true" data-search="true" data-search-align="left" data-search-accent-neutralise="true" data-search-highlight="true" data-search-time-out="1" data-filter-control="true" data-show-export="true" data-click-to-select="true" data-show-columns="true" data-show-columns-toggle-all="true" data-pagination="true" data-pagination-loop="false" data-buttons="buttons" data-query-params="queryParams" data-show-columns-search="true" data-key-events="true" data-cache="false" data-fixed-columns="true" data-toolbar="#toolbar2" class="table-responsive">
                                <thead>

                                    <tr>
                                        <th data-width="250" data-field="prenomb" data-switchable="false" data-title-tooltip="Nombre del empleado" data-filter-control="input" data-halign="center" data-sortable="true">Nombre</th>
                                        <th data-width="250" data-field="pperfil" data-switchable="false" data-title-tooltip="Perfil del empleado" data-filter-control="select" data-halign="center" data-sortable="true">Perfil</th>
                                        <th data-width="250" data-field="ddate" data-switchable="false" data-title-tooltip="Division del empleado" data-filter-control="select" data-halign="center" data-sortable="true">División</th>

                                        <th data-field="anote1" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 1</th>
                                        <th data-field="anote2" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 2</th>
                                        <th data-field="anote3" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 3</th>
                                        <th data-field="anote4" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 4</th>
                                        <th data-field="anote5" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 5</th>
                                        <th data-field="anote6" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 6</th>
                                        <th data-field="anote7" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 7</th>
                                        <th data-field="anote8" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 8</th>
                                        <th data-field="anote9" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 9</th>
                                        <th data-field="anote10" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 10</th>
                                        <th data-field="anote11" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 11</th>
                                        <th data-field="anote12" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 12</th>
                                        <th data-field="anote13" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 13</th>
                                        <th data-field="anote14" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 14</th>
                                        <th data-field="anote15" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 15</th>
                                        <th data-field="anote16" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 16</th>
                                        <th data-field="anote17" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 17</th>
                                        <th data-field="anote18" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 18</th>
                                        <th data-field="anote19" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 19</th>
                                        <th data-field="anote20" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 20</th>
                                        <th data-field="anote21" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 21</th>
                                        <th data-field="anote22" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 22</th>
                                        <th data-field="anote23" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 23</th>
                                        <th data-field="anote24" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 24</th>
                                        <th data-field="anote25" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 25</th>
                                        <th data-field="anote26" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 26</th>
                                        <th data-field="anote27" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 27</th>
                                        <th data-field="anote28" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 28</th>
                                        <th data-field="anote29" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 29</th>
                                        <th data-field="anote30" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 30</th>
                                        <th data-field="anote31" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 31</th>
                                        <th data-field="anote32" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 32</th>
                                        <th data-field="anote33" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 33</th>
                                        <th data-field="anote34" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 34</th>
                                        <th data-field="anote35" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 35</th>
                                        <th data-field="anote36" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 36</th>
                                        <th data-field="anote37" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 37</th>
                                        <th data-field="anote38" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 38</th>
                                        <th data-field="anote39" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 38</th>
                                        <th data-field="anote40" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 40</th>
                                        <th data-field="anote41" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 41</th>
                                        <th data-field="anote42" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 42</th>
                                        <th data-field="anote43" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 43</th>
                                        <th data-field="anote44" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 44</th>
                                        <th data-field="anote45" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 45</th>
                                        <th data-field="anote46" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 46</th>
                                        <th data-field="anote47" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 47</th>
                                        <th data-field="anote48" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 48</th>
                                        <th data-field="anote49" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 49</th>
                                        <th data-field="anote50" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 50</th>
                                        <th data-field="anote51" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 51</th>
                                        <th data-field="anote52" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 52</th>
                                        <th data-field="anote53" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 53</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    <?php foreach ($listacompe as $asig) { ?>

                                        <tr>
                                            <td><?php echo $asig['empleado'] ?></td>
                                            <td><?php echo $asig['perfil_e'] ?></td>
                                            <td><?php echo $asig['division_e'] ?></td>

                                            <td><?php echo $asig['semana_1'] ?></td>
                                            <td><?php echo $asig['semana_2'] ?></td>
                                            <td><?php echo $asig['semana_3'] ?></td>
                                            <td><?php echo $asig['semana_4'] ?></td>
                                            <td><?php echo $asig['semana_5'] ?></td>
                                            <td><?php echo $asig['semana_6'] ?></td>
                                            <td><?php echo $asig['semana_7'] ?></td>
                                            <td><?php echo $asig['semana_8'] ?></td>
                                            <td><?php echo $asig['semana_9'] ?></td>
                                            <td><?php echo $asig['semana_10'] ?></td>
                                            <td><?php echo $asig['semana_11'] ?></td>
                                            <td><?php echo $asig['semana_12'] ?></td>
                                            <td><?php echo $asig['semana_13'] ?></td>
                                            <td><?php echo $asig['semana_14'] ?></td>
                                            <td><?php echo $asig['semana_15'] ?></td>
                                            <td><?php echo $asig['semana_16'] ?></td>
                                            <td><?php echo $asig['semana_17'] ?></td>
                                            <td><?php echo $asig['semana_18'] ?></td>
                                            <td><?php echo $asig['semana_19'] ?></td>
                                            <td><?php echo $asig['semana_20'] ?></td>
                                            <td><?php echo $asig['semana_21'] ?></td>
                                            <td><?php echo $asig['semana_22'] ?></td>
                                            <td><?php echo $asig['semana_23'] ?></td>
                                            <td><?php echo $asig['semana_24'] ?></td>
                                            <td><?php echo $asig['semana_25'] ?></td>
                                            <td><?php echo $asig['semana_26'] ?></td>
                                            <td><?php echo $asig['semana_27'] ?></td>
                                            <td><?php echo $asig['semana_28'] ?></td>
                                            <td><?php echo $asig['semana_29'] ?></td>
                                            <td><?php echo $asig['semana_30'] ?></td>
                                            <td><?php echo $asig['semana_31'] ?></td>
                                            <td><?php echo $asig['semana_32'] ?></td>
                                            <td><?php echo $asig['semana_33'] ?></td>
                                            <td><?php echo $asig['semana_34'] ?></td>
                                            <td><?php echo $asig['semana_35'] ?></td>
                                            <td><?php echo $asig['semana_36'] ?></td>
                                            <td><?php echo $asig['semana_37'] ?></td>
                                            <td><?php echo $asig['semana_38'] ?></td>
                                            <td><?php echo $asig['semana_39'] ?></td>
                                            <td><?php echo $asig['semana_40'] ?></td>
                                            <td><?php echo $asig['semana_41'] ?></td>
                                            <td><?php echo $asig['semana_42'] ?></td>
                                            <td><?php echo $asig['semana_43'] ?></td>
                                            <td><?php echo $asig['semana_44'] ?></td>
                                            <td><?php echo $asig['semana_45'] ?></td>
                                            <td><?php echo $asig['semana_46'] ?></td>
                                            <td><?php echo $asig['semana_47'] ?></td>
                                            <td><?php echo $asig['semana_48'] ?></td>
                                            <td><?php echo $asig['semana_49'] ?></td>
                                            <td><?php echo $asig['semana_50'] ?></td>
                                            <td><?php echo $asig['semana_51'] ?></td>
                                            <td><?php echo $asig['semana_52'] ?></td>
                                            <td><?php echo $asig['semana_53'] ?></td>
                                        </tr>

                                    <?php } ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab3default">

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h1 class="h3 mb-0 font-weight-bold text-primary" class="label" align="center">Incapacidad</h1><br>
                        <div class="table-responsive">
                            <div id="flotante2">
                                <span class="m-0 font-weight-bold text-primary">Búsqueda Genérica 1:</span>
                            </div>
                            <div id="flotante">
                                <span class="m-0 font-weight-bold text-primary">Búsqueda Genérica 2:</span>
                            </div>
                            <div id="toolbar3">
                                <div class="form-group" id="flotante3">
                                    <input type="text" align="right" style="width : 215px; heigth : 80px" class="form-control pull-right" id="searchin" placeholder="Search...">
                                </div>
                            </div>

                            <table id="tablein" data-toggle="table" data-show-jump-to="true" data-show-fullscreen="true" data-show-button-text="true" data-search="true" data-search-align="left" data-search-accent-neutralise="true" data-search-highlight="true" data-search-time-out="1" data-filter-control="true" data-show-export="true" data-click-to-select="true" data-show-columns="true" data-show-columns-toggle-all="true" data-pagination="true" data-pagination-loop="false" data-buttons="buttons" data-query-params="queryParams" data-response-handler="responseHandler" data-show-columns-search="true" data-key-events="true" data-fixed-columns="true" data-toolbar="#toolbar3" class="table-responsive">
                                <thead>

                                    <tr>
                                        <th data-width="250" data-field="prenom" data-switchable="false" data-title-tooltip="Nombre del empleado" data-filter-control="input" data-halign="center" data-sortable="true">Nombre</th>
                                        <th data-width="250" data-field="perfil" data-switchable="false" data-title-tooltip="Perfil del empleado" data-filter-control="select" data-halign="center" data-sortable="true">Perfil</th>
                                        <th data-width="250" data-field="date" data-switchable="false" data-title-tooltip="Division del empleado" data-filter-control="select" data-halign="center" data-sortable="true">División</th>

                                        <th data-field="note1" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 1</th>
                                        <th data-field="note2" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 2</th>
                                        <th data-field="note3" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 3</th>
                                        <th data-field="note4" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 4</th>
                                        <th data-field="note5" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 5</th>
                                        <th data-field="note6" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 6</th>
                                        <th data-field="note7" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 7</th>
                                        <th data-field="note8" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 8</th>
                                        <th data-field="note9" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 9</th>
                                        <th data-field="note10" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 10</th>
                                        <th data-field="note11" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 11</th>
                                        <th data-field="note12" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 12</th>
                                        <th data-field="note13" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 13</th>
                                        <th data-field="note14" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 14</th>
                                        <th data-field="note15" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 15</th>
                                        <th data-field="note16" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 16</th>
                                        <th data-field="note17" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 17</th>
                                        <th data-field="note18" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 18</th>
                                        <th data-field="note19" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 19</th>
                                        <th data-field="note20" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 20</th>
                                        <th data-field="note21" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 21</th>
                                        <th data-field="note22" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 22</th>
                                        <th data-field="note23" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 23</th>
                                        <th data-field="note24" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 24</th>
                                        <th data-field="note25" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 25</th>
                                        <th data-field="note26" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 26</th>
                                        <th data-field="note27" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 27</th>
                                        <th data-field="note28" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 28</th>
                                        <th data-field="note29" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 29</th>
                                        <th data-field="note30" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 30</th>
                                        <th data-field="note31" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 31</th>
                                        <th data-field="note32" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 32</th>
                                        <th data-field="note33" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 33</th>
                                        <th data-field="note34" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 34</th>
                                        <th data-field="note35" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 35</th>
                                        <th data-field="note36" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 36</th>
                                        <th data-field="note37" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 37</th>
                                        <th data-field="note38" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 38</th>
                                        <th data-field="note39" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 38</th>
                                        <th data-field="note40" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 40</th>
                                        <th data-field="note41" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 41</th>
                                        <th data-field="note42" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 42</th>
                                        <th data-field="note43" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 43</th>
                                        <th data-field="note44" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 44</th>
                                        <th data-field="note45" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 45</th>
                                        <th data-field="note46" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 46</th>
                                        <th data-field="note47" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 47</th>
                                        <th data-field="note48" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 48</th>
                                        <th data-field="note49" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 49</th>
                                        <th data-field="note50" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 50</th>
                                        <th data-field="note51" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 51</th>
                                        <th data-field="note52" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 52</th>
                                        <th data-field="note53" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 53</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    <?php foreach ($listainca as $lib) { ?>

                                        <tr>
                                            <td><?php echo $lib['empleado'] ?></td>
                                            <td><?php echo $lib['perfil_e'] ?></td>
                                            <td><?php echo $lib['division_e'] ?></td>

                                            <td><?php echo $lib['semana_1'] ?></td>
                                            <td><?php echo $lib['semana_2'] ?></td>
                                            <td><?php echo $lib['semana_3'] ?></td>
                                            <td><?php echo $lib['semana_4'] ?></td>
                                            <td><?php echo $lib['semana_5'] ?></td>
                                            <td><?php echo $lib['semana_6'] ?></td>
                                            <td><?php echo $lib['semana_7'] ?></td>
                                            <td><?php echo $lib['semana_8'] ?></td>
                                            <td><?php echo $lib['semana_9'] ?></td>
                                            <td><?php echo $lib['semana_10'] ?></td>
                                            <td><?php echo $lib['semana_11'] ?></td>
                                            <td><?php echo $lib['semana_12'] ?></td>
                                            <td><?php echo $lib['semana_13'] ?></td>
                                            <td><?php echo $lib['semana_14'] ?></td>
                                            <td><?php echo $lib['semana_15'] ?></td>
                                            <td><?php echo $lib['semana_16'] ?></td>
                                            <td><?php echo $lib['semana_17'] ?></td>
                                            <td><?php echo $lib['semana_18'] ?></td>
                                            <td><?php echo $lib['semana_19'] ?></td>
                                            <td><?php echo $lib['semana_20'] ?></td>
                                            <td><?php echo $lib['semana_21'] ?></td>
                                            <td><?php echo $lib['semana_22'] ?></td>
                                            <td><?php echo $lib['semana_23'] ?></td>
                                            <td><?php echo $lib['semana_24'] ?></td>
                                            <td><?php echo $lib['semana_25'] ?></td>
                                            <td><?php echo $lib['semana_26'] ?></td>
                                            <td><?php echo $lib['semana_27'] ?></td>
                                            <td><?php echo $lib['semana_28'] ?></td>
                                            <td><?php echo $lib['semana_29'] ?></td>
                                            <td><?php echo $lib['semana_30'] ?></td>
                                            <td><?php echo $lib['semana_31'] ?></td>
                                            <td><?php echo $lib['semana_32'] ?></td>
                                            <td><?php echo $lib['semana_33'] ?></td>
                                            <td><?php echo $lib['semana_34'] ?></td>
                                            <td><?php echo $lib['semana_35'] ?></td>
                                            <td><?php echo $lib['semana_36'] ?></td>
                                            <td><?php echo $lib['semana_37'] ?></td>
                                            <td><?php echo $lib['semana_38'] ?></td>
                                            <td><?php echo $lib['semana_39'] ?></td>
                                            <td><?php echo $lib['semana_40'] ?></td>
                                            <td><?php echo $lib['semana_41'] ?></td>
                                            <td><?php echo $lib['semana_42'] ?></td>
                                            <td><?php echo $lib['semana_43'] ?></td>
                                            <td><?php echo $lib['semana_44'] ?></td>
                                            <td><?php echo $lib['semana_45'] ?></td>
                                            <td><?php echo $lib['semana_46'] ?></td>
                                            <td><?php echo $lib['semana_47'] ?></td>
                                            <td><?php echo $lib['semana_48'] ?></td>
                                            <td><?php echo $lib['semana_49'] ?></td>
                                            <td><?php echo $lib['semana_50'] ?></td>
                                            <td><?php echo $lib['semana_51'] ?></td>
                                            <td><?php echo $lib['semana_52'] ?></td>
                                            <td><?php echo $lib['semana_53'] ?></td>
                                        </tr>

                                    <?php } ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab4default">

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h1 class="h3 mb-0 font-weight-bold text-primary" class="label" align="center">Licencia</h1><br>
                        <div class="table-responsive">
                            <div id="flotante2">
                                <span class="m-0 font-weight-bold text-primary">Búsqueda Genérica 1:</span>
                            </div>
                            <div id="flotante">
                                <span class="m-0 font-weight-bold text-primary">Búsqueda Genérica 2:</span>
                            </div>
                            <div id="toolbar4">
                                <div class="form-group" id="flotante3">
                                    <input type="text" align="right" style="width : 215px; heigth : 80px" class="form-control pull-right" id="searchli" placeholder="Search...">
                                </div>
                            </div>
                            <table id="tableli" data-toggle="table" data-show-jump-to="true" data-show-fullscreen="true" data-show-button-text="true" data-search="true" data-search-align="left" data-search-accent-neutralise="true" data-search-highlight="true" data-search-time-out="1" data-filter-control="true" data-show-export="true" data-click-to-select="true" data-show-columns="true" data-show-columns-toggle-all="true" data-pagination="true" data-pagination-loop="false" data-buttons="buttons" data-query-params="queryParams" data-response-handler="responseHandler" data-show-columns-search="true" data-key-events="true" data-cache="false" data-fixed-columns="true" data-toolbar="#toolbar4" class="table-responsive">
                                <thead>

                                    <tr>
                                        <th data-width="250" data-field="prenomb" data-switchable="false" data-title-tooltip="Nombre del empleado" data-filter-control="input" data-halign="center" data-sortable="true">Nombre</th>
                                        <th data-width="250" data-field="pperfil" data-switchable="false" data-title-tooltip="Perfil del empleado" data-filter-control="select" data-halign="center" data-sortable="true">Perfil</th>
                                        <th data-width="250" data-field="ddate" data-switchable="false" data-title-tooltip="Division del empleado" data-filter-control="select" data-halign="center" data-sortable="true">División</th>

                                        <th data-field="anote1" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 1</th>
                                        <th data-field="anote2" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 2</th>
                                        <th data-field="anote3" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 3</th>
                                        <th data-field="anote4" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 4</th>
                                        <th data-field="anote5" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 5</th>
                                        <th data-field="anote6" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 6</th>
                                        <th data-field="anote7" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 7</th>
                                        <th data-field="anote8" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 8</th>
                                        <th data-field="anote9" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 9</th>
                                        <th data-field="anote10" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 10</th>
                                        <th data-field="anote11" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 11</th>
                                        <th data-field="anote12" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 12</th>
                                        <th data-field="anote13" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 13</th>
                                        <th data-field="anote14" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 14</th>
                                        <th data-field="anote15" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 15</th>
                                        <th data-field="anote16" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 16</th>
                                        <th data-field="anote17" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 17</th>
                                        <th data-field="anote18" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 18</th>
                                        <th data-field="anote19" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 19</th>
                                        <th data-field="anote20" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 20</th>
                                        <th data-field="anote21" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 21</th>
                                        <th data-field="anote22" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 22</th>
                                        <th data-field="anote23" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 23</th>
                                        <th data-field="anote24" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 24</th>
                                        <th data-field="anote25" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 25</th>
                                        <th data-field="anote26" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 26</th>
                                        <th data-field="anote27" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 27</th>
                                        <th data-field="anote28" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 28</th>
                                        <th data-field="anote29" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 29</th>
                                        <th data-field="anote30" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 30</th>
                                        <th data-field="anote31" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 31</th>
                                        <th data-field="anote32" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 32</th>
                                        <th data-field="anote33" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 33</th>
                                        <th data-field="anote34" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 34</th>
                                        <th data-field="anote35" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 35</th>
                                        <th data-field="anote36" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 36</th>
                                        <th data-field="anote37" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 37</th>
                                        <th data-field="anote38" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 38</th>
                                        <th data-field="anote39" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 38</th>
                                        <th data-field="anote40" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 40</th>
                                        <th data-field="anote41" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 41</th>
                                        <th data-field="anote42" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 42</th>
                                        <th data-field="anote43" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 43</th>
                                        <th data-field="anote44" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 44</th>
                                        <th data-field="anote45" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 45</th>
                                        <th data-field="anote46" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 46</th>
                                        <th data-field="anote47" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 47</th>
                                        <th data-field="anote48" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 48</th>
                                        <th data-field="anote49" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 49</th>
                                        <th data-field="anote50" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 50</th>
                                        <th data-field="anote51" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 51</th>
                                        <th data-field="anote52" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 52</th>
                                        <th data-field="anote53" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 53</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    <?php foreach ($listalice as $asig) { ?>

                                        <tr>
                                            <td><?php echo $asig['empleado'] ?></td>
                                            <td><?php echo $asig['perfil_e'] ?></td>
                                            <td><?php echo $asig['division_e'] ?></td>

                                            <td><?php echo $asig['semana_1'] ?></td>
                                            <td><?php echo $asig['semana_2'] ?></td>
                                            <td><?php echo $asig['semana_3'] ?></td>
                                            <td><?php echo $asig['semana_4'] ?></td>
                                            <td><?php echo $asig['semana_5'] ?></td>
                                            <td><?php echo $asig['semana_6'] ?></td>
                                            <td><?php echo $asig['semana_7'] ?></td>
                                            <td><?php echo $asig['semana_8'] ?></td>
                                            <td><?php echo $asig['semana_9'] ?></td>
                                            <td><?php echo $asig['semana_10'] ?></td>
                                            <td><?php echo $asig['semana_11'] ?></td>
                                            <td><?php echo $asig['semana_12'] ?></td>
                                            <td><?php echo $asig['semana_13'] ?></td>
                                            <td><?php echo $asig['semana_14'] ?></td>
                                            <td><?php echo $asig['semana_15'] ?></td>
                                            <td><?php echo $asig['semana_16'] ?></td>
                                            <td><?php echo $asig['semana_17'] ?></td>
                                            <td><?php echo $asig['semana_18'] ?></td>
                                            <td><?php echo $asig['semana_19'] ?></td>
                                            <td><?php echo $asig['semana_20'] ?></td>
                                            <td><?php echo $asig['semana_21'] ?></td>
                                            <td><?php echo $asig['semana_22'] ?></td>
                                            <td><?php echo $asig['semana_23'] ?></td>
                                            <td><?php echo $asig['semana_24'] ?></td>
                                            <td><?php echo $asig['semana_25'] ?></td>
                                            <td><?php echo $asig['semana_26'] ?></td>
                                            <td><?php echo $asig['semana_27'] ?></td>
                                            <td><?php echo $asig['semana_28'] ?></td>
                                            <td><?php echo $asig['semana_29'] ?></td>
                                            <td><?php echo $asig['semana_30'] ?></td>
                                            <td><?php echo $asig['semana_31'] ?></td>
                                            <td><?php echo $asig['semana_32'] ?></td>
                                            <td><?php echo $asig['semana_33'] ?></td>
                                            <td><?php echo $asig['semana_34'] ?></td>
                                            <td><?php echo $asig['semana_35'] ?></td>
                                            <td><?php echo $asig['semana_36'] ?></td>
                                            <td><?php echo $asig['semana_37'] ?></td>
                                            <td><?php echo $asig['semana_38'] ?></td>
                                            <td><?php echo $asig['semana_39'] ?></td>
                                            <td><?php echo $asig['semana_40'] ?></td>
                                            <td><?php echo $asig['semana_41'] ?></td>
                                            <td><?php echo $asig['semana_42'] ?></td>
                                            <td><?php echo $asig['semana_43'] ?></td>
                                            <td><?php echo $asig['semana_44'] ?></td>
                                            <td><?php echo $asig['semana_45'] ?></td>
                                            <td><?php echo $asig['semana_46'] ?></td>
                                            <td><?php echo $asig['semana_47'] ?></td>
                                            <td><?php echo $asig['semana_48'] ?></td>
                                            <td><?php echo $asig['semana_49'] ?></td>
                                            <td><?php echo $asig['semana_50'] ?></td>
                                            <td><?php echo $asig['semana_51'] ?></td>
                                            <td><?php echo $asig['semana_52'] ?></td>
                                            <td><?php echo $asig['semana_53'] ?></td>
                                        </tr>

                                    <?php } ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab5default">

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h1 class="h3 mb-0 font-weight-bold text-primary" class="label" align="center">Inactivos</h1><br>
                        <div class="table-responsive">
                            <div id="flotante2">
                                <span class="m-0 font-weight-bold text-primary">Búsqueda Genérica 1:</span>
                            </div>
                            <div id="flotante">
                                <span class="m-0 font-weight-bold text-primary">Búsqueda Genérica 2:</span>
                            </div>
                            <div id="toolbar5">
                                <div class="form-group" id="flotante3">
                                    <input type="text" align="right" class="form-control pull-right" style="width : 215px; heigth : 80px" id="searchre" placeholder="Search...">
                                </div>
                            </div>
                            <table id="tablere" data-toggle="table" data-show-jump-to="true" data-show-fullscreen="true" data-show-button-text="true" data-search="true" data-search-align="left" data-search-accent-neutralise="true" data-search-highlight="true" data-search-time-out="1" data-filter-control="true" data-show-export="true" data-click-to-select="true" data-show-columns="true" data-show-columns-toggle-all="true" data-pagination="true" data-pagination-loop="false" data-buttons="buttons" data-query-params="queryParams" data-response-handler="responseHandler" data-show-columns-search="true" data-key-events="true" data-cache="false" data-fixed-columns="true" data-toolbar="#toolbar5" class="table-responsive">
                                <thead>

                                    <tr>
                                        <th data-width="250" data-field="prenomb" data-switchable="false" data-title-tooltip="Nombre del empleado" data-filter-control="input" data-halign="center" data-sortable="true">Nombre</th>
                                        <th data-width="250" data-field="pperfil" data-switchable="false" data-title-tooltip="Perfil del empleado" data-filter-control="select" data-halign="center" data-sortable="true">Perfil</th>
                                        <th data-width="250" data-field="ddate" data-switchable="false" data-title-tooltip="Division del empleado" data-filter-control="select" data-halign="center" data-sortable="true">División</th>

                                        <th data-field="anote1" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 1</th>
                                        <th data-field="anote2" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 2</th>
                                        <th data-field="anote3" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 3</th>
                                        <th data-field="anote4" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 4</th>
                                        <th data-field="anote5" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 5</th>
                                        <th data-field="anote6" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 6</th>
                                        <th data-field="anote7" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 7</th>
                                        <th data-field="anote8" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 8</th>
                                        <th data-field="anote9" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 9</th>
                                        <th data-field="anote10" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 10</th>
                                        <th data-field="anote11" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 11</th>
                                        <th data-field="anote12" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 12</th>
                                        <th data-field="anote13" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 13</th>
                                        <th data-field="anote14" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 14</th>
                                        <th data-field="anote15" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 15</th>
                                        <th data-field="anote16" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 16</th>
                                        <th data-field="anote17" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 17</th>
                                        <th data-field="anote18" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 18</th>
                                        <th data-field="anote19" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 19</th>
                                        <th data-field="anote20" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 20</th>
                                        <th data-field="anote21" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 21</th>
                                        <th data-field="anote22" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 22</th>
                                        <th data-field="anote23" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 23</th>
                                        <th data-field="anote24" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 24</th>
                                        <th data-field="anote25" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 25</th>
                                        <th data-field="anote26" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 26</th>
                                        <th data-field="anote27" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 27</th>
                                        <th data-field="anote28" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 28</th>
                                        <th data-field="anote29" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 29</th>
                                        <th data-field="anote30" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 30</th>
                                        <th data-field="anote31" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 31</th>
                                        <th data-field="anote32" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 32</th>
                                        <th data-field="anote33" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 33</th>
                                        <th data-field="anote34" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 34</th>
                                        <th data-field="anote35" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 35</th>
                                        <th data-field="anote36" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 36</th>
                                        <th data-field="anote37" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 37</th>
                                        <th data-field="anote38" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 38</th>
                                        <th data-field="anote39" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 38</th>
                                        <th data-field="anote40" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 40</th>
                                        <th data-field="anote41" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 41</th>
                                        <th data-field="anote42" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 42</th>
                                        <th data-field="anote43" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 43</th>
                                        <th data-field="anote44" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 44</th>
                                        <th data-field="anote45" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 45</th>
                                        <th data-field="anote46" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 46</th>
                                        <th data-field="anote47" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 47</th>
                                        <th data-field="anote48" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 48</th>
                                        <th data-field="anote49" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 49</th>
                                        <th data-field="anote50" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 50</th>
                                        <th data-field="anote51" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 51</th>
                                        <th data-field="anote52" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 52</th>
                                        <th data-field="anote53" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 53</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    <?php foreach ($listareti as $asig) { ?>

                                        <tr>
                                            <td><?php echo $asig['empleado'] ?></td>
                                            <td><?php echo $asig['perfil_e'] ?></td>
                                            <td><?php echo $asig['division_e'] ?></td>

                                            <td><?php echo $asig['semana_1'] ?></td>
                                            <td><?php echo $asig['semana_2'] ?></td>
                                            <td><?php echo $asig['semana_3'] ?></td>
                                            <td><?php echo $asig['semana_4'] ?></td>
                                            <td><?php echo $asig['semana_5'] ?></td>
                                            <td><?php echo $asig['semana_6'] ?></td>
                                            <td><?php echo $asig['semana_7'] ?></td>
                                            <td><?php echo $asig['semana_8'] ?></td>
                                            <td><?php echo $asig['semana_9'] ?></td>
                                            <td><?php echo $asig['semana_10'] ?></td>
                                            <td><?php echo $asig['semana_11'] ?></td>
                                            <td><?php echo $asig['semana_12'] ?></td>
                                            <td><?php echo $asig['semana_13'] ?></td>
                                            <td><?php echo $asig['semana_14'] ?></td>
                                            <td><?php echo $asig['semana_15'] ?></td>
                                            <td><?php echo $asig['semana_16'] ?></td>
                                            <td><?php echo $asig['semana_17'] ?></td>
                                            <td><?php echo $asig['semana_18'] ?></td>
                                            <td><?php echo $asig['semana_19'] ?></td>
                                            <td><?php echo $asig['semana_20'] ?></td>
                                            <td><?php echo $asig['semana_21'] ?></td>
                                            <td><?php echo $asig['semana_22'] ?></td>
                                            <td><?php echo $asig['semana_23'] ?></td>
                                            <td><?php echo $asig['semana_24'] ?></td>
                                            <td><?php echo $asig['semana_25'] ?></td>
                                            <td><?php echo $asig['semana_26'] ?></td>
                                            <td><?php echo $asig['semana_27'] ?></td>
                                            <td><?php echo $asig['semana_28'] ?></td>
                                            <td><?php echo $asig['semana_29'] ?></td>
                                            <td><?php echo $asig['semana_30'] ?></td>
                                            <td><?php echo $asig['semana_31'] ?></td>
                                            <td><?php echo $asig['semana_32'] ?></td>
                                            <td><?php echo $asig['semana_33'] ?></td>
                                            <td><?php echo $asig['semana_34'] ?></td>
                                            <td><?php echo $asig['semana_35'] ?></td>
                                            <td><?php echo $asig['semana_36'] ?></td>
                                            <td><?php echo $asig['semana_37'] ?></td>
                                            <td><?php echo $asig['semana_38'] ?></td>
                                            <td><?php echo $asig['semana_39'] ?></td>
                                            <td><?php echo $asig['semana_40'] ?></td>
                                            <td><?php echo $asig['semana_41'] ?></td>
                                            <td><?php echo $asig['semana_42'] ?></td>
                                            <td><?php echo $asig['semana_43'] ?></td>
                                            <td><?php echo $asig['semana_44'] ?></td>
                                            <td><?php echo $asig['semana_45'] ?></td>
                                            <td><?php echo $asig['semana_46'] ?></td>
                                            <td><?php echo $asig['semana_47'] ?></td>
                                            <td><?php echo $asig['semana_48'] ?></td>
                                            <td><?php echo $asig['semana_49'] ?></td>
                                            <td><?php echo $asig['semana_50'] ?></td>
                                            <td><?php echo $asig['semana_51'] ?></td>
                                            <td><?php echo $asig['semana_52'] ?></td>
                                            <td><?php echo $asig['semana_53'] ?></td>
                                        </tr>

                                    <?php } ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab6default">

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h1 class="h3 mb-0 font-weight-bold text-primary" class="label" align="center">Vacaciones</h1><br>
                        <div class="table-responsive">
                            <div id="flotante2">
                                <span class="m-0 font-weight-bold text-primary">Búsqueda Genérica 1:</span>
                            </div>
                            <div id="flotante">
                                <span class="m-0 font-weight-bold text-primary">Búsqueda Genérica 2:</span>
                            </div>
                            <div id="toolbar6">
                                <div class="form-group" id="flotante3">
                                    <input type="text" align="right" style="width : 215px; heigth : 80px" class="form-control pull-right" id="searchva" placeholder="Search...">
                                </div>
                            </div>

                            <table id="tableva" data-toggle="table" data-show-jump-to="true" data-show-fullscreen="true" data-show-button-text="true" data-search="true" data-search-align="left" data-search-accent-neutralise="true" data-search-highlight="true" data-search-time-out="1" data-filter-control="true" data-show-export="true" data-click-to-select="true" data-show-columns="true" data-show-columns-toggle-all="true" data-pagination="true" data-pagination-loop="false" data-buttons="buttons" data-query-params="queryParams" data-response-handler="responseHandler" data-show-columns-search="true" data-key-events="true" data-fixed-columns="true" data-toolbar="#toolbar6" class="table-responsive">
                                <thead>

                                    <tr>
                                        <th data-width="250" data-field="prenom" data-switchable="false" data-title-tooltip="Nombre del empleado" data-filter-control="input" data-halign="center" data-sortable="true">Nombre</th>
                                        <th data-width="250" data-field="perfil" data-switchable="false" data-title-tooltip="Perfil del empleado" data-filter-control="select" data-halign="center" data-sortable="true">Perfil</th>
                                        <th data-width="250" data-field="date" data-switchable="false" data-title-tooltip="Division del empleado" data-filter-control="select" data-halign="center" data-sortable="true">División</th>

                                        <th data-field="note1" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 1</th>
                                        <th data-field="note2" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 2</th>
                                        <th data-field="note3" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 3</th>
                                        <th data-field="note4" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 4</th>
                                        <th data-field="note5" data-visible="true" data-width="100" data-halign="center" data-sortable="true">Semana 5</th>
                                        <th data-field="note6" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 6</th>
                                        <th data-field="note7" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 7</th>
                                        <th data-field="note8" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 8</th>
                                        <th data-field="note9" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 9</th>
                                        <th data-field="note10" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 10</th>
                                        <th data-field="note11" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 11</th>
                                        <th data-field="note12" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 12</th>
                                        <th data-field="note13" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 13</th>
                                        <th data-field="note14" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 14</th>
                                        <th data-field="note15" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 15</th>
                                        <th data-field="note16" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 16</th>
                                        <th data-field="note17" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 17</th>
                                        <th data-field="note18" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 18</th>
                                        <th data-field="note19" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 19</th>
                                        <th data-field="note20" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 20</th>
                                        <th data-field="note21" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 21</th>
                                        <th data-field="note22" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 22</th>
                                        <th data-field="note23" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 23</th>
                                        <th data-field="note24" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 24</th>
                                        <th data-field="note25" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 25</th>
                                        <th data-field="note26" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 26</th>
                                        <th data-field="note27" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 27</th>
                                        <th data-field="note28" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 28</th>
                                        <th data-field="note29" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 29</th>
                                        <th data-field="note30" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 30</th>
                                        <th data-field="note31" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 31</th>
                                        <th data-field="note32" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 32</th>
                                        <th data-field="note33" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 33</th>
                                        <th data-field="note34" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 34</th>
                                        <th data-field="note35" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 35</th>
                                        <th data-field="note36" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 36</th>
                                        <th data-field="note37" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 37</th>
                                        <th data-field="note38" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 38</th>
                                        <th data-field="note39" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 38</th>
                                        <th data-field="note40" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 40</th>
                                        <th data-field="note41" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 41</th>
                                        <th data-field="note42" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 42</th>
                                        <th data-field="note43" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 43</th>
                                        <th data-field="note44" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 44</th>
                                        <th data-field="note45" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 45</th>
                                        <th data-field="note46" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 46</th>
                                        <th data-field="note47" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 47</th>
                                        <th data-field="note48" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 48</th>
                                        <th data-field="note49" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 49</th>
                                        <th data-field="note50" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 50</th>
                                        <th data-field="note51" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 51</th>
                                        <th data-field="note52" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 52</th>
                                        <th data-field="note53" data-visible="false" data-width="100" data-halign="center" data-sortable="true">Semana 53</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    <?php foreach ($listavaca as $lib) { ?>

                                        <tr>
                                            <td><?php echo $lib['empleado'] ?></td>
                                            <td><?php echo $lib['perfil_e'] ?></td>
                                            <td><?php echo $lib['division_e'] ?></td>

                                            <td><?php echo $lib['semana_1'] ?></td>
                                            <td><?php echo $lib['semana_2'] ?></td>
                                            <td><?php echo $lib['semana_3'] ?></td>
                                            <td><?php echo $lib['semana_4'] ?></td>
                                            <td><?php echo $lib['semana_5'] ?></td>
                                            <td><?php echo $lib['semana_6'] ?></td>
                                            <td><?php echo $lib['semana_7'] ?></td>
                                            <td><?php echo $lib['semana_8'] ?></td>
                                            <td><?php echo $lib['semana_9'] ?></td>
                                            <td><?php echo $lib['semana_10'] ?></td>
                                            <td><?php echo $lib['semana_11'] ?></td>
                                            <td><?php echo $lib['semana_12'] ?></td>
                                            <td><?php echo $lib['semana_13'] ?></td>
                                            <td><?php echo $lib['semana_14'] ?></td>
                                            <td><?php echo $lib['semana_15'] ?></td>
                                            <td><?php echo $lib['semana_16'] ?></td>
                                            <td><?php echo $lib['semana_17'] ?></td>
                                            <td><?php echo $lib['semana_18'] ?></td>
                                            <td><?php echo $lib['semana_19'] ?></td>
                                            <td><?php echo $lib['semana_20'] ?></td>
                                            <td><?php echo $lib['semana_21'] ?></td>
                                            <td><?php echo $lib['semana_22'] ?></td>
                                            <td><?php echo $lib['semana_23'] ?></td>
                                            <td><?php echo $lib['semana_24'] ?></td>
                                            <td><?php echo $lib['semana_25'] ?></td>
                                            <td><?php echo $lib['semana_26'] ?></td>
                                            <td><?php echo $lib['semana_27'] ?></td>
                                            <td><?php echo $lib['semana_28'] ?></td>
                                            <td><?php echo $lib['semana_29'] ?></td>
                                            <td><?php echo $lib['semana_30'] ?></td>
                                            <td><?php echo $lib['semana_31'] ?></td>
                                            <td><?php echo $lib['semana_32'] ?></td>
                                            <td><?php echo $lib['semana_33'] ?></td>
                                            <td><?php echo $lib['semana_34'] ?></td>
                                            <td><?php echo $lib['semana_35'] ?></td>
                                            <td><?php echo $lib['semana_36'] ?></td>
                                            <td><?php echo $lib['semana_37'] ?></td>
                                            <td><?php echo $lib['semana_38'] ?></td>
                                            <td><?php echo $lib['semana_39'] ?></td>
                                            <td><?php echo $lib['semana_40'] ?></td>
                                            <td><?php echo $lib['semana_41'] ?></td>
                                            <td><?php echo $lib['semana_42'] ?></td>
                                            <td><?php echo $lib['semana_43'] ?></td>
                                            <td><?php echo $lib['semana_44'] ?></td>
                                            <td><?php echo $lib['semana_45'] ?></td>
                                            <td><?php echo $lib['semana_46'] ?></td>
                                            <td><?php echo $lib['semana_47'] ?></td>
                                            <td><?php echo $lib['semana_48'] ?></td>
                                            <td><?php echo $lib['semana_49'] ?></td>
                                            <td><?php echo $lib['semana_50'] ?></td>
                                            <td><?php echo $lib['semana_51'] ?></td>
                                            <td><?php echo $lib['semana_52'] ?></td>
                                            <td><?php echo $lib['semana_53'] ?></td>
                                        </tr>

                                    <?php } ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--aqui termina el div del contenido-->
</div>

</div>

</div>

</body>
<!-- partial -->
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
<script>
    var $table = $('#table')

    $(function() {
        $('#toolbar').find('select').change(function() {
            $table.bootstrapTable('destroy').bootstrapTable({
                exportDataType: $(this).val(),
                exportTypes: ['xml', 'csv', 'excel'],
            })
        }).trigger('change')
        $('#toolbar2').find('select').change(function() {
            $table.bootstrapTable('destroy').bootstrapTable({
                exportDataType: $(this).val(),
                exportTypes: ['xml', 'csv', 'excel'],
            })
        }).trigger('change')
        $('#toolbar3').find('select').change(function() {
            $table.bootstrapTable('destroy').bootstrapTable({
                exportDataType: $(this).val(),
                exportTypes: ['xml', 'csv', 'excel'],
            })
        }).trigger('change')
        $('#toolbar4').find('select').change(function() {
            $table.bootstrapTable('destroy').bootstrapTable({
                exportDataType: $(this).val(),
                exportTypes: ['xml', 'csv', 'excel'],
            })
        }).trigger('change')
        $('#toolbar5').find('select').change(function() {
            $table.bootstrapTable('destroy').bootstrapTable({
                exportDataType: $(this).val(),
                exportTypes: ['xml', 'csv', 'excel'],
            })
        }).trigger('change')
        $('#toolbar6').find('select').change(function() {
            $table.bootstrapTable('destroy').bootstrapTable({
                exportDataType: $(this).val(),
                exportTypes: ['xml', 'csv', 'excel'],
            })
        }).trigger('change')
    });
</script>
<script>
    // Write on keyup event of keyword input element
    $(document).ready(function() {
        $("#searchca").keyup(function() {
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#tableca tbody tr"), function() {
                if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
    });
</script>
<script>
    // Write on keyup event of keyword input element
    $(document).ready(function() {
        $("#searchco").keyup(function() {
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#tableco tbody tr"), function() {
                if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
    });
</script>
<script>
    // Write on keyup event of keyword input element
    $(document).ready(function() {
        $("#searchin").keyup(function() {
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#tablein tbody tr"), function() {
                if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
    });
</script>
<script>
    // Write on keyup event of keyword input element
    $(document).ready(function() {
        $("#searchli").keyup(function() {
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#tableli tbody tr"), function() {
                if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
    });
</script>
<script>
    // Write on keyup event of keyword input element
    $(document).ready(function() {
        $("#searchre").keyup(function() {
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#tablere tbody tr"), function() {
                if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
    });
</script>
<script>
    // Write on keyup event of keyword input element
    $(document).ready(function() {
        $("#searchva").keyup(function() {
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#tableva tbody tr"), function() {
                if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
    });
</script>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.js'></script>
<script src="script.js"></script>



<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/86186/moment.js'></script>
<script src='https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js'></script>
<script src=""></script>
<!-- partial -->

<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js'></script>
<script src='https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js'></script>
<script src="./semdetalle.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/themes/bootstrap-table/bootstrap-table.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF/jspdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/key-events/bootstrap-table-key-events.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/mobile/bootstrap-table-mobile.min.js"></script>

<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/export/bootstrap-table-export.min.js"></script>

<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/themes/bootstrap-table/bootstrap-table.min.js"></script>


</html>