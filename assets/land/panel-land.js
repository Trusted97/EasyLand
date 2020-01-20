$( document ).ready(function() {

  if ( $('#container-message').length ){

    var site_url = $('#site_url').val();

    function update_messages() {

      $.ajax({
        method: "POST",
        url: site_url+"chat/get_messages"
      })
      .done(function( msg ) {
        
      });

      setTimeout(update_messages, 5000);

    }

    setTimeout(update_messages,5000);

    $( "#message-button" ).on( "click", function() {
      var chat_message = $('#land-chat-message').val();
      var chatroom_id = $('#chatrooom_id').val();

      if (chat_message != '' && chat_message != null){

        $.ajax({
          method: "POST",
          url: site_url+"chat/insert_message",
          data: {
            message: chat_message
          }
        })
        .done(function( msg ) {
          alert( "Data Saved: " + msg );
        });
      }

    });

  }

});
