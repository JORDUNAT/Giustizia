
    <div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">
    <section class="main row">

        <aside class="col-xs-12  col-sm-3 col-md-2 col-lg-2"> 
            <h3 align="center"><b>MENU</b></h3>

        <div class="container col-xs-12  col-sm-12 col-md-12 col-lg-12">

            <ul id="nav">
                <?php 
                    if($_SESSION['s_tipusu']=='1'){
                        echo '<li><a href="#" class="sub" tabindex="1"><span class="glyphicon  glyphicon-home"></span> <b> </b> OFICINA</a>';
                        echo '<ul>';
                        echo '<li><a href="frm_Cargarlogo.php"> Cargar Logo</a></li>';
                        echo '<li><a href="flk_Oficinas.php">Datos Oficina</a></li>';
                        echo '<li><a href="flk_CambioClave.php">Cambiar Mi Clave</a></li>';  
                        echo '</ul>';
                        echo '</li>';

                        echo '<li><a href="#" class="sub" tabindex="1"><span class="glyphicon glyphicon-filter"></span> <b> </b> PARAMETRICA</a>';
                        echo '<ul>';
                        echo '<li><a href="frm_ListaTipoProcesos.php"> Tipo Procesos</a></li>';
                        echo '<li><a href="frm_ListaTipoJuzgado.php"> Tipo Juzgado</a></li>';
                        echo '<li><a href="frm_ListaTipoaccion.php">Tipo Acción</a></li>';
                        echo '<li><a href="frm_ListaTipoDocumento.php">Tipo Documento</a></li>';  
                        echo '<li><a href="frm_ListaTipoUsuario.php">Tipo Usuario</a></li>'; 
                        echo '<li><a href="frm_ListaDepartamentos.php">Departamentos</a></li>'; 
                        echo '<li><a href="frm_ListaMunicipios.php">Municipios</a></li>'; 
                        echo '<li><a href="frm_ListaJuzgados.php">Juzgados</a></li>'; 
                        echo '</ul>';
                        echo '</li>';


                    }

                 ?>

                <li><a href="#" class="sub" tabindex="1"><span class="glyphicon  glyphicon-user"></span> <b> </b> CLIENTES</a>
                    <ul>
                        <li><a href="frm_ListaClientes.php"> Administrar Clientes</a></li>
                        <?php 
                            if($_SESSION['s_tipusu']=='3'){
                            echo '<li><a href="flk_CambioClave.php">Cambiar Mi Clave</a></li>'; 
                            }
                         ?>

                    </ul>
                </li>

                <li><a href="#" class="sub" tabindex="1"><span class="glyphicon  glyphicon-cloud"></span> <b> </b> CONSULTAS</a>
                    <ul>
                        <li><a href="frm_ListaConsultas.php">Administrar Consultas</a></li>
                    </ul>
                </li>

                <li><a href="#" class="sub" tabindex="1"><span class="glyphicon  glyphicon-folder-open"></span>  <b> </b> EXPEDIENTES</a>
                    <ul>
                        <li><a href="#">Admin Expedientes</a></li>
                    </ul>
                </li>

                <li><a href="frm_Agenda.php" class="sub" tabindex="1"><span class="glyphicon  glyphicon-calendar"></span> <b> </b> AGENDA</a>
                </li>

                <li><a href="#" class="sub" tabindex="1"><span class="glyphicon  glyphicon-user"></span> <b> </b> USUARIOS</a>
                    <ul>
                        <li><a href="frm_ListaUsuarios.php">Administrar Usuario</a></li>
                        <?php 
                            if($_SESSION['s_tipusu']<>'3' && $_SESSION['s_tipusu']<>'1'){
                            echo '<li><a href="flk_CambioClave.php">Cambiar Mi Clave</a></li>'; 
                            }
                         ?>
                    </ul>
                </li>
                <li><a id="btn_Inicio"><span class="glyphicon  glyphicon-off"></span> <b> </b> INICIO</a></li>
                <li>  <div align="center" class="col-xs-10  col-sm-10 col-md-10 col-lg-10"><br></div></li>
            </ul>
        </div>          
        </aside>