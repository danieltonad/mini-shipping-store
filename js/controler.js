/* 
    ADMIN CONTROL
*/


//

// pop Update
const  popUpdate =()=> {

    $('#update').fadeIn(20);

}

// close update
const popOut=()=>{
    $('#update').fadeOut(100);
    $('#track_id').val("");
    $('#newLocation').val("");
    $('#errorMsg').fadeOut(10);
    $('#send').fadeOut(10);
    $('#receive').fadeIn(50);
}

// send Req
const sendReq =()=>{
    val = $('#track_id').val();
    if(val !== ""){
    // send Ajax Request
    axios.post('../controler/update.php', {
        data: val
    })
        .then((response) => {
          if(response.data !== "error"){
              $('#receive').fadeOut(50);
              $('#send').fadeIn(100);
              $("#errorMsg").html("Tracking number <br>"+response.data);
              $("#errorMsg").css("background","#00C45A");
              $("#errorMsg").fadeIn(100);
          }
          else{
              $("#errorMsg").css("background", "#da2b34");
              $("#errorMsg").text("Invalid Tracking number");
            $("#errorMsg").fadeIn(100);
          }
        }, (error) => {
            console.log(error);
        });
    }
    else {
        $("#errorMsg").text("Empty Id Detected");
        $("#errorMsg").css("background", "#da2b34");
        $("#errorMsg").fadeIn(60);
    }
}

// UPDATE LOCATION
const updateReq = () => {
    loc = $('#newLocation').val();
    val = $('#track_id').val();
    if (loc !== "") {
    // send Ajax Request
    axios.post('../controler/update.php', {
        data: val,
        location: loc
    })
        .then((response) => {
            if (response.data !== "404") {
                $("#errorMsg").text("Location Updated !!");
                $("#errorMsg").css("background", "#00C45A");
                $("#errorMsg").fadeIn(800);
                $('#send').fadeOut(30).delay(1000);
            }
            else {
                $("#errorMsg").css("background", "#da2b34");
                $("#errorMsg").text("Unable to Update Location ");
                $("#errorMsg").fadeIn(100);
            }
        }, (error) => {
            console.log(error);
        });
    
    }
    else {
        $("#errorMsg").text("Empty Location Detected");
        $("#errorMsg").css("background", "#da2b34");
        $("#errorMsg").fadeIn(60);
    }

}





// validate and show image size
function validateImage(){
    if($('#item-img').val().length >= 10)
        $('#import>span').html("Image inserted");
}


/*
        INDEX INDEX
*/

//Events





// SEARCH TRACK ID

$('#searchBtn').on('click',()=>{
    val = $('#sBox').val();
    if(val !== ""){
        // Check validity
        // send Ajax Request
        axios.post('./controler/update.php', {
            search: val
        })
            .then((response) => {
                if (response.data !== "error") {
                    $('#error').css("background","#00C45A");
                    $('#error').text("Valid Track Code ");
                    $('#error').fadeIn(100).delay(700);

                    window.location.href = "search?tracker="+val;


                }
                else {
                    $('#error').css("background", "#da2b3A");
                    $('#error').text("Invalid Track Code");
                   $('#error').fadeIn(100);
                }
            }, (error) => {
                console.log(error);
            });
    }
});




