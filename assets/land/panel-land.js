$( document ).ready(function() {

  if ( $('#container-message').length ){

    var site_url = $('#site_url').val();

    var messages = [];

    var newMessageIndex = 0; // Declare a numeric variable to use like new index to show a new chat message.

    function updateChat(messages_array) {

      var oldCountMessages = messages_array.length; // Previously, you need to save the messages's length.

      // You need to print the messages, only once.
      for (var i = 0; i < messages_array.length; i++) {
        console.log('Stampa il mess una volta sola'+i);
        console.log('newMessageIndex Stampa il mess una volta sola'+newMessageIndex);
        $("#chat-container").append('<div class="toast-body">'+messages_array[i].message_content+'</div>');
      }
      // Self-looping function to show check if there are new messages.
      (function loop() {
        // Checking if there are new messages.
        if (messages_array.length > oldCountMessages) {
          // Initializing newMessageIndex with the new message index, to show it.
          newMessageIndex = messages_array.length - 1;
          // Printing only the new message.
          $("#chat-container").append('<div class="toast-body">'+messages_array[newMessageIndex].message_content+'</div>');
          console.log('Stampa solo il nuovo mess'+i);
          console.log('newMessageIndex Stampa solo il nuovo mess'+newMessageIndex);
        }
        // Updating oldCountMessages variable for the next verification in the looping function.
        oldCountMessages = messages_array.length;
        setTimeout(loop, 1000); // Checking the server every second.
      })();

      

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
          messages.push(obj[i]);
        }

      });

    }

    getLastMessages();

    setTimeout(updateChat(messages),1500);

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

          messages.push({
            message_id: obj.message_id,
            message_content: obj.message_content,
            message_user_id: obj.message_user_id,
            message_chatroom_id: obj.message_chatroom_id,
            message_timestamp: obj.message_timestamp
          });

        });
      }

    });

    // var oldCountMessages = messages.length; // Previously, you need to save the messages's length.
    //
    //
    // var newMessageIndex = 0; // Declare a numeric variable to use like new index to show a new chat message.
    //
    // // You need to print the messages, only once.
    // for (var i = 0; i < messages.length; i++) {
    //   $("#chat-container").append('<div class="toast-body">'+messages[i].message_content+'</div>');
    // }
    // // Self-looping function to show check if there are new messages.
    // (function loop() {
    //   // Checking if there are new messages.
    //   if (messages.length > oldCountMessages) {
    //     // Initializing newMessageIndex with the new message index, to show it.
    //     newMessageIndex = messages.length - 1;
    //     // Printing only the new message.
    //     $("#chat-container").append('<div class="toast-body">'+messages[i].message_content+'</div>');
    //     console.log(g_messages);
    //     console.log('test');
    //     console.log(messages);
    //   }
    //   // Updating oldCountMessages variable for the next verification in the looping function.
    //   oldCountMessages = messages.length;
    //   setTimeout(loop, 1000); // Checking the server every second.
    // })();

  }

});
