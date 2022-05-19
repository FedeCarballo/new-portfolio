<?php
    if(isset($_POST['enviar'])){
        if(!empty($_POST['nombre'])&& !empty($_POST['email'])&&!empty($_POST['asunto'])&&!empty($_POST['msg'])){
            $nombre=$_POST['nombre'];
            $email=$_POST['email'];
            $asunto=$_POST['asunto'];
            $msg="Nombre: ".$nombre."\n".$_POST['msg'];
            $header="From: ".$email."\r\n";
            $header.="Reply-To: noreply@example.com"."\r\n";
            $header.="X-Mailer: PHP/".phpversion();
            $tuCasilla="carballo523@gmail.com";
            $mail=mail($tuCasilla,$asunto,$msg,$header);
            if($mail){
                echo "<script>
                        alert('Gracias! en breve nos pondremos en contacto con usted');
                        window.location='../index.html'
                        </script>";
            }else{
                echo "<script>
                        alert('Lamento decirte que no hemos podido enviar su consulta');
                        window.location='../index.html'
                        </script>";
            }
        }
        else{
            echo "<script>
            alert('Error, faltan parametros');
                    window.location='../index.html'
                  </script>"; 
        }
    }  
?>