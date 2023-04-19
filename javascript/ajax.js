$(function() {
    $("#chatform").submit(function(e) {
        e.preventDefault(); // dont reload the page
        var values = $("#chatform").serialize();
        var comment = $("#comment").val(); // get the comment from the input field
        console.log(comment);

        //2023-04-19 00:26:52
        date = new Date();
        var dateString = date.getFullYear() + "-" + date.getMonth() + "-" + date.getDate();
        dateString += " " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
    
        $('#chatbox table tbody').append("<tr><td></td><td>" + comment + "</td><td>" + dateString + "</td></tr>"); // adds a row to the table already on the page
        $("#comment").val("");
        
        $.ajax({ // perform AJAX call to PHP
            type: "POST", 
            url: "../handlers/commenthandler.php",
            data: values,
            success: function() { // when HTTP 200 is returned from url
            },
            error: function () { // anything besides 200 is returned from url
              alert("FAILURE");
            }
          });
     });
});