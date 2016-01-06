<?php
							$conectaBanco = mysqli_connect ('localhost', 'root', '') or die (mysql_error());
							$selecionaBanco = mysqli_select_db ($conectaBanco, 'teste') or die (mysql_error());
							
							date_default_timezone_set("Brazil/East");
							?>