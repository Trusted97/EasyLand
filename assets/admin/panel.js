$( document ).ready(function() {

  var site_url = $('#site_url').val();

  if ( $('#rulebook_container').length ) {

    // function getCookie(cname) {
    //   var name = cname + "=";
    //   var decodedCookie = decodeURIComponent(document.cookie);
    //   var ca = decodedCookie.split(';');
    //   for(var i = 0; i <ca.length; i++) {
    //     var c = ca[i];
    //     while (c.charAt(0) == ' ') {
    //       c = c.substring(1);
    //     }
    //     if (c.indexOf(name) == 0) {
    //       return c.substring(name.length, c.length);
    //     }
    //   }
    //   return "";
    // }

    $( "#addRule" ).on( "click", function() {

      var rule_title = $('#rule_name').val();
      var rule_body = $('#rule_body').val();

      if ( rule_title != '' && rule_body != ''){
        alert('YEEEE '+rule_title+' '+rule_body);

        $.ajax({
          method: "POST",
          url: site_url+"rulebook/add_new_rule",
          data: {
            rule_title: rule_title,
            rule_body: rule_body
          }
        })
        .done(function( msg ) {
          alert( "Data Saved: " + msg );
        });

      } else {
        alert('Tutti i campi sono richiesti '+site_url);
      }

    });

  }

});
