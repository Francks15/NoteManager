var data;
$('#addComment').on('submit', function(e) {    
    e.preventDefault();
    var id = $('#post_id').val();    
    data = $(this).serializeArray();
    data.push({ name: 'post_id', value: id });    
    sendData();
});

function sendData() {    
    console.log(data);    
    $.ajax({        
        url: "../NoteManager/addComment.php",
                data: data,
                type: "POST",
                success: function(response) {            
            if (response) {
                $('#result').html(response);                
                setTimeout(function() {
                    location.reload();
                }, 2000)                
                $('#addComment')[0].reset();            
            } else {                                
                $('#addComment')[0].reset();            
            }        
        },
        error: function() {            
            $("#result").html("<div class='alert alert-danger'>Erreur réessayer plutard.</div>");         
        }    
    });
}