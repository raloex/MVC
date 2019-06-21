<!DOCTYPE html>
<html lang="es">  
    <head>    
        <title>Título de la WEB</title>    
        <meta charset="UTF-8">
        <meta name="title" content="Título de la WEB">
        <meta name="description" content="Descripción de la WEB">  
        <?php require 'views/header.php'; ?>
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    </head>  
    <body>    
        <?php require 'views/menu.php'; ?>

        <div id="main">
            <h1 class="text-center">Vuelo</h1>
        </div>

        <div id="app">
            {{ message }}
        </div>

        <script>
            var app = new Vue({
                el: '#app',
                data: {
                    message: 'Hello Vue!'
                }
            });
        </script>

        <?php require 'views/footer.php'; ?>
    </body>  
</html>