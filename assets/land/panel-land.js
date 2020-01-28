$( document ).ready(function() {

  if ( $('#container-message').length ){

    var site_url = $('#site_url').val();

    var messages_id = [];

    var newMessageIndex = 0; // Declare a numeric variable to use like new index to show a new chat message.

    //$("#chat-container").append('<div class="toast-body">'+messages_array[i].message_content+'</div>');

    function updateChat() {

      $.ajax({
        method: "POST",
        url: site_url+"chat/get_messages_id"
      })
      .done(function( data ) {
        var obj = JSON.parse(data); //Parse json response
        for (var i = 0; i < obj.length; i++) {
          if (!messages_id.includes(obj[i].message_id)){
            console.log("Da aggiungere quindi aggiungo il messaggio alla chat e poi aggiungo l'id");
          }

        }

      });

      setTimeout(updateChat,1000);
    }

    function getLastMessages() {
      //Call API get_messages for get chatroom messagess
      $.ajax({
        method: "POST",
        url: site_url+"chat/get_messages"
      })
      .done(function( data ) {
        var obj = JSON.parse(data); //Parse json response
        for (var i = 0; i < obj.length; i++) {
          //console.log(obj[i].message_id);
          messages_id.push(obj[i].message_id);
          $("#chat-container").append('<div class="toast-body">'+obj[i].message_content+'</div>');
        }

      });

    }

    function getMessageById(messageId) {

      $.ajax({
        method: "POST",
        url: site_url+"chat/get_message_by_id",
        data: {
          messageId: messageId
        }
      })
      .done(function( data ) {
        var obj = JSON.parse(data); //Parse json response
        for (var i = 0; i < obj.length; i++) {
          //console.log(obj[i].message_id);
          messages_id.push(obj[i].message_id);
          $("#chat-container").append('<div class="toast-body">'+obj[i].message_content+'</div>');
        }

      });

    }

    getLastMessages();

    setTimeout(updateChat,1000);

    $( "#message-button" ).on( "click", function() {
      var chat_message = $('#land-chat-message').val();

      if (chat_message != '' && chat_message != null){

        $.ajax({
          method: "POST",
          url: site_url+"chat/insert_message",
          data: {
            message: chat_message
          }
        })
        .done(function( last_msg ) {
          var obj = JSON.parse(last_msg); //Parse json response

          // messages.push({
          //   message_id: obj.message_id,
          //   message_content: obj.message_content,
          //   message_user_id: obj.message_user_id,
          //   message_chatroom_id: obj.message_chatroom_id,
          //   message_timestamp: obj.message_timestamp
          // });

        });
      }

    });

  }

});
