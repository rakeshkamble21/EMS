// // $(document).ready(function() {    
//     function calculateTime() {
//             //get values
//             // var valuestart = $("#intime").val();
//             // var valuestop = $("#outtime").val();
//             var inTime = document.getElementById("intime").value;
//             var outTime = document.getElementById("outtime").value;
//              console.log(inTime);

//            // get current date
//             // var today = new Date();
//             // var dd = String(today.getDate()).padStart(2, '0');
//             // var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
//             // var yyyy = today.getFullYear();

//             // today = dd + '/' + mm + '/' + yyyy;
//             // document.write(today);
            
//             // create date format          
//              var timeStart = new Date(inTime).getHours();
//              var timeEnd = new Date(outTime).getHours();
            
             
//               var hourDiff =timeEnd-timeStart;  
//              console.log(timeEnd);
            
//             //  $("p").html("<b>Hour Difference:</b> " + hourDiff )             
             
//     }
//     // $("#work_hour").change(calculateTime);
//     // calculateTime();
//     // });

// function hitungjam()
// {
//     var data = new Array();
//     var [h1, m1] = $('#inputJammulai').val().split(":");
//     var [h2, m2] = $('#inputJamselesai').val().split(":");
//     var start = new Date(), end = new Date();
//     start.setHours(h1);
//     start.setMinutes(m1);
//     end.setHours(h2);
//     end.setMinutes(m2);    

//     var diff = end.getTime() - start.getTime();
//     var jam = (diff / 1000.0 / 60 / 60).toFixed(1);
//     data.push();

//     $('#inputSelisih').val(jam);
    
//     var data = new FormData();
//     var textinputs = document.querySelectorAll('input[name*=intime]');
//     for( var i = 0; i < textinputs.length; i++ )
//     data.append( $('#inputSelisih').val(jam));
//     //disp();
// }
var data = new Array(); 
function add_element(){
   
    var [h1, m1] = $('#inputJammulai').val().split(":");
    var [h2, m2] = $('#inputJamselesai').val().split(":");
    var start = new Date(), end = new Date();
    start.setHours(h1);
        start.setMinutes(m1);
        end.setHours(h2);
        end.setMinutes(m2);    
    
        var diff = end.getTime() - start.getTime();
        var jam = (diff / 1000.0 / 60 / 60).toFixed(1);
        data.push(jam);
        jam='';
    disp(); // displaying the array elements
    }
    
    function disp(){
    var str='';
    console.log();
    str =data.length;
    for (i=0;i<data.length;i++) 
    { 
        
    str += i + ':'+data[i];  // adding each element with key number to variable
    } 
    console.log(str);
    
    document.getElementById('inputSelisih').innerHTML=str; // Display the elements of the array
    }