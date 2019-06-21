<!DOCTYPE html>
<html lang="es">  
    <head>    
        <title>Acceso</title>    
        <meta charset="UTF-8">
        <meta name="title" content="Acceso">
        <meta name="description" content="Descripción de la WEB">  
        <?php require 'views/header.php'; ?>

    </head>  
    <body>
        <div class="wrapper">
            <div class="m-account-w" data-bg-img="<?= constant('URL') ?>public/img/account/<?= rand(0, 3) ?>.jpg">
                <div class="m-account">
                    <div class="row no-gutters">

                        <div class="col-md-6">
                            <div class="m-account--content-w">
                                <img class="logo" src="<?= constant('URL') ?>public/img/logo.png" alt="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="m-account--form-w">
                                <div id="app" class="m-account--form">

                                    <form id="login" name="login" action="#" method="post">
                                        <label class="m-account--title">Panel de gestión</label>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <i class="fas fa-user"></i>
                                                </div>

                                                <input type="text" name="username" placeholder="Usuario" class="form-control" autocomplete="off" v-model="$v.text.$model" :class="status($v.text)">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <i class="fas fa-key"></i>
                                                </div>

                                                <input type="password" name="password" placeholder="Contraseña" class="form-control" autocomplete="off">
                                            </div>
                                        </div>
                                    </form>


                                    <div class="m-account--actions">
                                        <a href="#" class="btn-link">¿Has olvidado tus datos?</a>
                                        <button id="formSubmit" type="submit" class="btn btn-rounded btn-info">Accede</button>
                                        <span id="mensaje"></span>
                                    </div>

                                    <div class="m-account--footer">
                                        <p>&copy; <?= date('Y') ?> Netllar SL</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php require 'views/footer.php'; ?>
        <script src="<?php echo constant('URL'); ?>public/js/vuelidate.min.js"></script>  
        <script src="<?php echo constant('URL'); ?>public/js/validators.min.js"></script>  
        <script>
            Vue.use(window.vuelidate.default)
            const {required, minLength} = window.validators

            new Vue({
                el: "#app",
                data: {
                    text: ''
                },
                validations: {
                    text: {
                        required,
                        minLength: minLength(5)
                    }
                },
                methods: {
                    status(validation) {
                        return {
                            error: validation.$error,
                        }
                    }
                }
            })
        </script>

        <script>
            $(document).ready(function () {

                $('#formSubmit').click(function (e) {
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: '<?= constant('URL') . 'login/login' ?>',
                        data: $('#login').serialize(),
                        beforeSend: function () {
                            $("#mensaje").html("Procesando, espere por favor...");
                        },
                        success: function (result) {
                            
                            $("#mensaje").html(result.message);
                            
                        }
                    });
                });

            });
        </script>
    </body>
</html>
