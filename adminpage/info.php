 <?php 

 $matricula=$_REQUEST['matricula'];

                                                                        $url = "http://189.194.95.69:3000/personales/".$matricula;//API
                                                                        $json = file_get_contents($url);
                                                                        $obj = json_decode($json);
                                                                        foreach ($obj as $key => $value) {
                                                                           echo $dato="<p>NOMBRE: ".$obj[$key]->NOMBRE." ".$obj[$key]->APELLIDO_PATERNO." ".$obj[$key]->APELLIDO_MATERNO."</p>";
                                                                            echo $dato="<p>Correo: ".$obj[$key]->CORREO;

                                                                            echo $dato="<p>Telefono: ".$obj[$key]->TELEFONO;

                                                                            echo $dato="<p>Carrera: ".$obj[$key]->NOMBRE_CARRERA;
                                                                        }
                                                                        $url2 = "http://189.194.95.69:3000/candados/".$matricula;//API
                                                                        $json2 = file_get_contents($url2);
                                                                        $obj2 = json_decode($json2);
                                                                        echo "<p>CANDADOS:";
                                                                        foreach ($obj2 as $key => $value) {
                                                                           

                                                                            echo $dato="<p>- ".$obj2[$key]->NOMBRE_TIPO;

                                                                        }
                                                                        ?>