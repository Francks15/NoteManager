var data;
$('#addAdmin').on('submit', function(e) {
    e.preventDefault();
    data = $(this).serializeArray();
    sendData();
});
function sendData() {
    console.log(data);
    $.ajax({
        url: "addAdmin.php",
        data: data,
        type: "POST",
        success: function(response) {
            if (response) {
                $('#result').html(response);
                setTimeout(function(){
                  location.reload();
                },2000)
                $('#addAdmin')[0].reset();
            } else {
                //empty form
                $('#addAdmin')[0].reset();
            }
        },
        error: function() {
            $("#result").html("<div class='alert alert-danger'>Erreur réessayer plutard.</div>");
 
        }
    });
}