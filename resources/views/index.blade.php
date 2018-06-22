<!DOCTYPE html>
<!-- saved from url=(0053)https://v4-alpha.getbootstrap.com/examples/jumbotron/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FixPc</title>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/css/mdb.min.css" rel="stylesheet">

  </head>
  <body>

    <!-- Main jumbotron for a primary marketing message or call to action -->
<!--Jumbotron-->
<div class="row mb-5" style="margin-top: -35px;">
    <div class="col-md-12">
        <div class="card card-image" style="background-image: url(https://wallpapersmug.com/large/63499a/digital-art-circuit-abstract.jpg);">
            <div class="text-white text-center rgba-stylish-strong py-5 px-4">
                <div class="py-5">

                    <!--Content-->
                        <h6 class="orange-text font-bold"><i class="fas fa-screwdriver"></i> FixPc</h6>
                        <h2 class="card-title pt-3 mb-5 font-bold">La Solución para tu Computadora!</h2>
                        <p class="px-5 pb-4">Esta Aplicación es un pequeño sistema experto que es capaz de identificar
                        los problemas y sintomas mas comunes de una computadora de escritorio, al fianl nos
                        presenta las mas recomendadas soluciones al igual que un experto en el area pueda sugerir.</p>
                        <a class="btn peach-gradient" href="#begin"><i class="fas fa-ambulance left"></i> Empezar</a>
                    <!--Content-->

                </div>
            </div>
        </div>
    </div>
</div>
<!--Jumbotron-->

    <div class="container">
      <!-- Example row of columns -->
      <div class="col-md-8 offset-md-2">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading-padding" id="begin">
              <h2 class="text-center">Identificación De Problemas</h2>
              <hr class="for-h2">
          </div>
          <hr>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <h5>Tipo de problema que tiene su PC</h5>
              <a href="" class="btn btn-info type" data-id="1">Software <i class="fa fa-laptop mr-1"></i></a>
              <a href="" class="btn btn-success type pull-right" data-id="2">Hardware <i class="fa fa-wrench mr-1"></i></a>
          </div>
        </div>
        <hr>
        <div class="margin20"">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4><span class="badge pink">Categoria</span></h4>
                <div class="list-group" id="category"></div>
            </div>
          </div>
        </div>
        <hr>
        <div class="margin20"">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4><span class="badge purple">Sintomas</span></h4>
                <div id="symptoms"></div>
            </div>
          </div>
        </div>
        <hr>
        <section alt="Solution Identification">
          <div class="margin20"">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <h4><span class="badge red">Posible Problema</span></h4>
                  <div id="problems"></div>
              </div>
            </div>
          </div>
          <hr>
          <div class="margin20"">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <h4><span class="badge cyan">Posibles Soluciones</span></h4>
                  <div id="solution"></div>
              </div>
            </div>
          </div>
          <div class="margin20"">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <a href="#begin" type="button" class="btn btn-warning btn-lg btn-block new-diagnosis">Nueva Consulta</a>
              </div>
            </div>
          </div>
        </section>
      </div>
      <hr>
      <footer>
        <p class="text-center">&copy; FixPc System 2018. Todos los derechos reservados.</p>
      </footer>
    </div> <!-- /container -->

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/js/mdb.min.js"></script>

    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e){
          $('#category').hide();
          $('#symptoms').hide();
          $('#problems').hide();
          $('#solution').hide();
        });
        $(".type").click(function(e){
            e.preventDefault();
            $.ajax({
                url: '/type/'+$(this).attr('data-id')+'/category',
                dataType: 'json',
                type: 'GET',
                success: function success(data) {
                  // updating the dom
                  if (data.status == 'success') {
                    // update the dom
                    var toAppend = "";
                    if(data.data.length > 0)
                    {
                      for(i=0;i<data.data.length;i++) {
                          toAppend = toAppend + '<a href="" class="category list-group-item list-group-item-action waves-effect" data-id="'+data.data[i]['id']+'">'+data.data[i]['title']+'</a>';
                      }
                    }
                    else{
                      toAppend = '<h4><strong>No category found</strong></h4>';
                    }
                    $('#category').show().html(toAppend);
                    $('#symptoms').hide();
                    $('#problems').hide();
                    $('#solution').hide();
                  }
                  else {
                    alert(data.message);
                  }
                },
                error: function error(data) {}
            });
        });
        $("#category").on('click','.category',function(e){
            e.preventDefault();
            $.ajax({
                url: '/category/'+$(this).attr('data-id')+'/symptoms',
                dataType: 'json',
                type: 'GET',
                success: function success(data) {
                  // updating the dom
                  if (data.status == 'success') {
                    // update the dom
                    var toAppend = "<form class='form'>";
                    for(i=0;i<data.data.length;i++) {
                        toAppend = toAppend + '<div class="form-check"><input type="checkbox" class="form-check-input" name="symptoms[]" value='+data.data[i]['id']+'><label style="form-check-label">'+data.data[i]['title']+'</label></div>';
                    }
                    if(data.data.length > 0)
                    {
                        toAppend = toAppend + '<button type="button" class="btn btn-default btn-lg btn-block symptoms">Encontrar Problemas</button>';
                    }
                    else 
                    {
                        toAppend = toAppend + '<h4 class="text-center"><strong>Sintomas No Encontrados</strong></h4>';
                    }
                    toAppend = toAppend + '</form>';
                    $('#symptoms').show().html(toAppend);
                    $('#problems').hide();
                    $('#solution').hide();
                  }
                  else {
                    alert(data.message);
                  }
                },
                error: function error(data) {}
            });
        });
        $("#symptoms").on('click','.symptoms',function(e){
            e.preventDefault();
            var formData = $('form').serializeArray();
            console.log(formData);
            $.ajax({
                url: '/symptoms/problems',
                data: formData,
                dataType: 'json',
                type: 'GET',
                success: function success(data) {
                  // updating the dom
                  if (data.status == 'success') {
                    // updating the dom
                    toAppend = '<blockquote class="blockquote bq-danger"><p class="bq-title">'+data.data.title+
                                '</p></blockquote><a href="" class="btn btn-default btn-lg btn-block problems" data-id="'+data.data.id+'">Mostrar Posible Solución</a>';
                    $('#problems').show().html(toAppend);
                    $('#solution').hide();
                  }
                  else {
                    alert(data.message);
                  }
                },
                error: function error(data) {}
            });
        });
        $("#problems").on('click','.problems',function(e){
            e.preventDefault();
            $.ajax({
                url: '/problems/'+$(this).attr('data-id')+'/solution',
                dataType: 'json',
                type: 'GET',
                success: function success(data) {
                  // updating the dom
                  if (data.status == 'success') {
                    var toAppend = "";
                    for(i=0;i<data.data.length;i++) {
                        toAppend = toAppend + '<blockquote class="blockquote bq-primary"><p class="cyan-text">Solución Probable # '+(i+1)+':<br>'+data.data[i]['title']+'</p></blockquote>';
                        console.log(toAppend);
                    }
                    $('#solution').show().html(toAppend);
                  }
                  else {
                    alert(data.message);
                  }
                },
                error: function error(data) {}
            });
        });
        $(".new-diagnosis").click(function(e){
          $('#category').hide();
          $('#symptoms').hide();
          $('#problems').hide();
          $('#solution').hide();
        });
    </script>

</body>
</html>