var users = [];
var messages = [];
var created_at = [];
var html = '';
var all_html = '';
var guide_id = 1;
$(document).ready(function(){
  $.get('/guides/get_all_messages_by_guide_id/'+guide_id, function(res) {
    for(var i=0; i<res.messages.length; i++){
      users.push(res.messages[i].user_name);
      messages.push(res.messages[i].message);
      created_at.push(res.messages[i].created_at);
      html = "<p>" + users[i] + " says: " + messages[i] + " at " + created_at[i] + "</p>";
      $('#messages').append(html);
    }
  }, "json");

  console.log(all_html);
  // $('#messages').html(all_html);;
  $('form').submit(function(){
    return false;
  });
});