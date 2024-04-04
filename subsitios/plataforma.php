<!DOCTYPE html>
<html>
    <head>
        <?php
            $config['place'] = "plataforma";
        ?>
        <!--Headers-->
        <?php include('./../vistas/header_content.php')?>
        
        <!--Traigo CSS-->
        <?php echo $config['css']; ?>
        
    </head>
    <body>
        <!-- Navegador -->
        <?php include('./../vistas/header_secundario.php')?>

        <main>

            <section class="plataforma-content home-bkg-no-color proximamente">
                <div>
                    <span>¡Proximamente!</span>
                </div>
            </section>
        </main>

        <!--footer-->
        <?php include('./../vistas/footer_interna.php')?>

        <!-- Traigo JS -->
        <?php echo $config['js']; ?>

    </body>
</html>
