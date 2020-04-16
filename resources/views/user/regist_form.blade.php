@extends('layouts.base')

@section('page_title', '使用者註冊')

@section('content')
  <style>
    #regist-form {
      margin: auto;
      width: 800px;
      padding: 10px;
    }
  </style>
  <div id="regist-form">
    <form>
      <div class="form-group">
        <label for="account"><h7>Email</h7></label>
        <input type="email" class="form-control" id="account" name="account"  aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="password"><h7>Password</h7></label>
        <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="password-confirm"><h7>Confirm E-mail</h7></label>
        <input type="password" class="form-control" id="password-confirm" name="password" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <button id="submit" type="button" class="btn btn-primary">Regist</button>
      </div>
    </form>
  </div>

  <script>
    $('#submit').click(function (){
      var post = {};
      $('#regist-form input').each(function(index, item){
        var name = $(item).attr('name');
        var value = $(item).val();
        post[name] = value;
      });

      $.ajax({
        url: '/api/regist/do-regist',
        data: post,
        type: 'POST',
        dataType: 'JSON',
        success: function (data, event) {
          if (data.result == 'success') {
            alert('註冊完成');
          } else {
            alert(`註冊失敗: ${data.message}`);
          }
        }
      });
    });
  </script>
@endsection