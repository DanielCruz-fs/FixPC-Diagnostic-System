<!DOCTYPE html>
<!-- saved from url=(0053)https://v4-alpha.getbootstrap.com/examples/jumbotron/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>pcAdvisory | Internal</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3 text-center">Knowledge Creator</h1>
        <p class="text-center">Create the knowledge for <strong>pcAdvisory</strong> here</p>
      </div>
    </div>

    <div class="container">
      <form class="form-horizontal" action="/create-knowledge">
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
          <div class="row">
              <label class="col-md-2">1. Type of Issue</label>
              <select name="type" class="form-control col-md-10" id="type" required="true">
                <option>-- Plese Select Type of Issue --</option>
                <option value="1">Software</option>
                <option value="2">Hardware</option>
              </select>
          </div>
        </div>
        <hr>
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
          <div class="row" id="category">
            <label class="col-md-12">2. Category of Issue</label><br>
            <div id="category-list" class="col-md-12"></div>
          </div>
        </div>
        <hr>
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
          <div class="row" id="symptoms">
            <label class="col-md-12">3. Symptoms</label><br>
            <div id="symptoms-list" class="col-md-12"></div>
            <div class="col-md-12"><input type="button" id="other-symptoms" value="Add Symptom"></div>
          </div>
        </div>
        <hr>
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
          <div class="row" id="problems">
            <label class="col-md-12">4. Problems</label>
            <div class="col-md-12"><input name="problem" class="form-control problems" placeholder="What is the problem?" required="true"></div>
          </div>
        </div>
        <hr>
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
          <div class="row" id="solutions">
            <label class="col-md-12">5. Solutions</label>
            <div id="solutions-list" class="col-md-12">
            </div>
            <div class="col-md-12"><input type="button" id="more-solutions" value="Add Solutions"></div>
          </div>
        </div>
        <div class="form-group col-md-12 col-sm-12 col-xs-12 save">
        </div>
      </form>

      <hr>

      <footer>
        <p class="text-center">&copy; pcAdvisory System 2017. All Rights Reserved.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"</script>
    <script src="js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
        <script type="text/javascript">
        $(document).ready(function(e){
          $('#category').hide();
          $('#symptoms').hide();
          $('#problems').hide();
          $('#save').hide();
          $('#solutions').hide();
        });
        $("#type").change(function(e){
            e.preventDefault();
            $.ajax({
                url: '/type/'+$(this).val()+'/category',
                dataType: 'json',
                type: 'GET',
                success: function success(data) {
                  // updating the dom
                  if (data.status == 'success') {
                    // update the dom
                    var toAppend = "";
                    for(i=0;i<data.data.length;i++) {
                        toAppend += '<input type="radio" name="category" class="category" value="'+data.data[i]['id']+'" required="true">'+data.data[i]['title']+'</br>';
                    }
                    toAppend += '<span><input type="radio" name="category" id="other-category" required="true"> Other</span>';
                    $('#category').show();
                    $('#category').children("#category-list").html(toAppend);
                    $('#symptoms').hide();
                    $('#problems').hide();
                    $('#solutions').hide();
                    $('#save').hide();
                  }
                  else {
                    alert(data.message);
                  }
                },
                error: function error(data) {}
            });
        });
        $("#category").on('click','#other-category',function(e){
            e.preventDefault();
            $(this).parent().hide();
            $("#category").children('span').children('#new-category').remove();
            $('#category').append('<span class="col-md-12"><br><input name="new_category" id="new-category" class="form-control" placeholder="What is the category Category" required="true"></span>');
            $('#symptoms').children('#symptoms-list').html("");
        });
        $("#category").on('keyup','#new-category',function(e){
            if(e.which == "13")
            {
              $('#symptoms').show();
            }
        });
        $("#category").on('click','.category',function(e){
            $.ajax({
                url: '/category/'+$(this).val()+'/symptoms',
                dataType: 'json',
                type: 'GET',
                success: function success(data) {
                  // updating the dom
                  if (data.status == 'success') {
                    // update the dom
                    var toAppend = "";
                    for(i=0;i<data.data.length;i++) {
                        toAppend += '<input type="checkbox" class="symptoms" name="symptoms[]" value='+data.data[i]['id']+'> <label class="pull-right">'+data.data[i]['title']+'</label><br>';
                    }
                    if(data.data.length < 1)
                    {
                        toAppend += '<h4 class="text-center"><strong>No symptoms found</strong></h4>';
                    }
                    $('#category').children('span').remove();
                    $('#category').children("#category-list").children('span').remove();
                    $('#category').children("#category-list").append('<span><input type="radio" name="category" id="other-category" required="true"> Other</span>');
                    $('#symptoms').show();
                    $('#symptoms').children('#symptoms-list').html(toAppend);
                    $('#problems').hide();
                    $('#solutions').hide();
                  }
                  else {
                    alert(data.message);
                  }
                },
                error: function error(data) {}
            });
        });
        $("#symptoms").on('click','#other-symptoms',function(e){
            var toAppend = '<div class="form-inline"><input name="new_symptoms[]" class="form-control symptoms col-md-11" placeholder="What is the Symptom?" required="true">';
            toAppend += '<input type="button" class="close input-group-addon col-md-1" value="x"></div>'
            $('#symptoms').children('#symptoms-list').append(toAppend);
        });
        $("#symptoms").on('click','.symptoms',function(e){
            $('#problems').show();
        });
        $("#symptoms").on('keyup','.symptoms',function(e){
            if(e.which == "13")
            {
              $('#problems').show();
              var toAppend = '<div class="form-inline"><input name="new_symptoms[]" class="form-control symptoms col-md-11" placeholder="What is the Symptom?" required="true">';
              toAppend += '<input type="button" class="close input-group-addon col-md-1" value="x"></div>'
              $(this).parent().after(toAppend);
            }
        });
        $("#problems").on('keyup','.problems',function(e){
            if(e.which == "13")
            {
              $('#solutions').show();
            }
        });
        $("#solutions").on('click','#more-solutions',function(e){
            $('#solutions').children('#solutions-list').append('<div class="form-inline"><input name="solutions[]" class="form-control solutions col-md-11" placeholder="What is the solutions?" required="true"><input type="button" class="close input-group-addon col-md-1" value="x"></div>');
            $('.save').html('<button class="btn btn-primary" id="save">Save</button>');
        });
        $("#solutions").on('keyup','.solutions',function(e){
          if(e.which == "13")
            {
            $('.save').html('<button class="btn btn-primary" id="save">Save</button>');
            $('#solutions').children('#solutions-list').append('<div class="form-inline"><input name="solutions[]" class="form-control solutions col-md-11" placeholder="What is the solutions?" required="true"><input type="button" class="close input-group-addon col-md-1" value="x"></div>');
          }
        });
        $(document).on('click','.close',function(e){
          e.preventDefault();
          $(this).prev().remove();
          $(this).remove();
        });
        $('form').submit(function(e){
          e.preventDefault();
        });
        $(document).on('click','#save',function(e){
          e.preventDefault();
            console.log("clicked for saving");
              var formData = $('form').serializeArray();
              console.log("saving data"+formData);
              $.ajax({
                  url: '/create-knowledge',
                  data: formData,
                  dataType: 'json',
                  type: 'GET',
                  success: function success(data) {
                    // updating the dom
                    console.log(data);
                    if (data.status == 'success') {
                      // updating the dom
                      alert(data.message);
                    }
                    else {
                      alert(data.message);
                    }
                  },
                  error: function error(data) {
                    console.log(data);
                  }
              });
        });
        $(document).ready(function() {
          $(window).keydown(function(event){
            if(event.keyCode == 13) {
              event.preventDefault();
              return false;
            }
          });
        });
    </script>

</body></html>