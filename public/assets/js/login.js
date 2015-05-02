(function(){
  function getLoginData(){
    return {username: $("#username").val(), password: $("#password").val(), code: $("#code").val(), _token: $("input[name='_token']").val()};
  }

  function checkLogin(){
    $.ajax({
      url: '/login',
      type: 'POST',
      data: getLoginData(),
      success: function(data){
        data = JSON.parse(data);
        if(data.second_factor){
          $('#main-login').fadeOut(function(){
            $('#second-factor').fadeIn();
          });
        }else{
          if(data.success){
            $('form').fadeOut(500);
            $('.wrapper').addClass('form-success');

            $('.user-info').css('background-image', 'url(https://s5.studentrnd.org/photo/' + $('#username').val() + '_128/1430371227.jpg)');

            $('.welcome-message').fadeOut(function(){
             setTimeout(function(){
               $('.user-info').fadeIn().css('display', 'inline-block');
             }, 50);
            });

            setTimeout(function(){
              $('.container').fadeOut(function(){
                $('.wrapper').css('height', '0%').css('margin-top', '0px');
              });
              window.location = "/";
            }, 1500);
          }else{
            alert("Invalid login credentials.");
          }
        }
      },
      error: function(){
        alert("Invalid login credentials.");
      }
    })
  }

  $("#login, #login-second-factor").click(function(event){
    event.preventDefault();
    checkLogin();
  });
})();
