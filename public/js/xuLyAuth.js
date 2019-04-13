$(document).ready(function(){
  $("#buttonlogin").click(function() {
        $.ajax({
            //type
            type: 'POST',
            url: 'checkname', //geturl
            data: {
              _token: "{{ csrf_token() }}", //sendtoken
              'name': $('#username').val(),
            },
            success: function(data) {
              alert('ok');
            },
        }).fail(function(){
          alert('fail');
        });

    });
});
