<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>صفحه ورود</title>
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link rel="stylesheet" href="{{url('css/bootstrap_rtl.css')}}">
    <!-- Styles -->
    <style>

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="col-lg-4 col-lg-offset-4 div_login">
    <div>
      <form id="Formlogin">
       <input type="text" id="username" placeholder="نام کاربری" class="form-control mt-15">
       <input type="password" id="password" placeholder="کلمه عبور"  class="form-control mt-15">
       <div class="col-lg-4"> <input type="submit" class="btn btn-success mt-15" value="ورود"></div>
          <div class="col-lg-8 mt-15" id="div_msg"></div>
      </form>
    </div>
    </div>
</div>
</body>

<script type="text/javascript" src="{{url('js/jquery-1.12.4.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/select2.min.js')}}"></script>
<script>

    $(document).ready(function() {
 $("#Formlogin").on('submit',(function(e) {
            e.preventDefault();
            var data = new FormData();
            data.append('username',$("#username").val());
            data.append('password',$("#password").val());
     if($("#username").val()!='' && $("#password").val()!='') {
                $.ajax({
                    url: "login",
                    type: "POST",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {

                       var arr=window.JSON.parse(data);

                      if(arr[0]['result']=='Invalid')  $("#div_msg").html('نام کاربری یاکلمه ورود صحیح نمی باشد');
                      else  if(arr[0]['result']=='Valid')  $("#div_msg").html('اطلاعات شما صحیح می باشد');

                    }
                });
            }
            else $("#div_msg").html('فیلدها نباید خالی باشند');

        }));

    });


</script>
</html>
