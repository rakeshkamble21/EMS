$(document).ready(function() {
    $(".nav li.disabled a").click(function() {
      return false;
    });
 });





// upload-Image
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}

function plan_preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('plan_output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
// tab forms 
$(document).ready(function(){
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        var activeTab = $(e.target).text(); // Get the name of active tab
        var previousTab = $(e.relatedTarget).text(); // Get the name of previous tab
        $(".active-tab span").html(activeTab);
        $(".previous-tab span").html(previousTab);
    });
});
//get the floor and append to the floor dropdown
function addfloor()
{
    // var floor = document.getElementById("floors").value;
    // var select = document.getElementById("floorno");
    //  for(var i=1;i<=floor;i++)
    //  {
    //     var option = document.createElement('option');
    //     option.text = option.value = i;
    //     select.add(option);

    //  }
    // document.write(floor);
    //document.console(option);

}
// add the data to the table in floor
function addRow() {
    sitevalidation();
          
   var myName = document.getElementById("floorno");
    var getfloorvolume = document.getElementById("floor-volume");
    var getbhk = document.getElementById("bhk");
    var getbhkqty = document.getElementById("how-bhk");
    var table = document.getElementById("myTableData");
 
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
 
    row.insertCell(0).innerHTML= '<input type="button" value = "Delete" onClick="Javacsript:deleteRow(this)">';
    row.insertCell(1).innerHTML= myName.value;
    row.insertCell(2).innerHTML=getfloorvolume.value;
    row.insertCell(3).innerHTML= getbhk.value;
    row.insertCell(4).innerHTML= getbhkqty.value;
 
 
}
 
function deleteRow(obj) {
      
    var index = obj.parentNode.parentNode.rowIndex;
    var table = document.getElementById("myTableData");
    table.deleteRow(index);
    
}
 
function addTable() {
      
    var myTableDiv = document.getElementById("myDynamicTable");
      
    var table = document.createElement('TABLE');
    table.border='1';
    
    var tableBody = document.createElement('TBODY');
    table.appendChild(tableBody);
      
    for (var i=0; i<3; i++){
       var tr = document.createElement('TR');
       tableBody.appendChild(tr);
       
       for (var j=0; j<4; j++){
           var td = document.createElement('TD');
           td.width='75';
           td.appendChild(document.createTextNode("Cell " + i + "," + j));
           tr.appendChild(td);
       }
    }
    myTableDiv.appendChild(table);
    
}
 
function load() {
    
    console.log("Page load finished");
 
}
function sitevalidation()
{
    // $(".next-step").click(function (e) {

    //     var $active = $('.bs-example .nav-tabs li.active');
    //     $active.next().removeClass('disabled');
    //     nextTab($active);

    // });
    // $(".prev-step").click(function (e) {

    //     var $active = $('.wizard .nav-tabs li.active');
    //     prevTab($active);

    // });
    // function nextTab(elem) {
    //     $(elem).next().find('a[data-toggle="tab"]').click();
    // }
    $("#sitebutton").next().find('data-toggle="tab"').click();
    var sitename=document.getElementById("sitename").value;
    var address=document.getElementById("siteaddress").value;
    var floor=document.getElementById("floors").value;
    var siteimage = document.getElementById('siteimage').value;
    var siteplan =  document.getElementById('siteplan').value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(sitename==null || sitename=="")
    {
        alert("Please enter Site Name");
    }
    else if(address==null || address=="")
    {
        alert("please enter site address");
    }
    if(floor==null || floor=="")
    {
        alert("please enter floor");
    }
    else if(!floor.match(/^\d+/))
    {
        alert("please enter only numbers in floor");
    }
    if(!allowedExtensions.exec(siteimage))
    {
        alert('Please upload file having extensions .jpeg/.jpg/.png/ only.');
        fileInput.value = '';
        return false;  
    }
    else if(!allowedExtensions.exec(siteplan))
    {
        alert('Please upload file having extensions .jpeg/.jpg/.png/ only.');
        fileInput.value = '';
        return false;    
     }
     else
     {

        
        $(document).ready(function(){
            $('.bs-example').on('click', function(){
                $('html,body').animate({scrollTop: $(this).offset().top}, 800);
            }); 
        });

        $(document).on("click", "button", function()
        {
//$('.nav-tabs > .active').next('li').find('a').trigger('click')
           $('.nav-tabs > .active').next('li').find('a').removeClass('disabled').trigger('click');
            ;
//$active.next().removeClass('disabled');

           // $("#sitefloor").tab("show");
           //$("#site").trigger("click");
          // $("ul > li > #floor").show("slow");
            //$("ul").find("#floor").trigger('click');
        });
        
        // $(document).on("click", "button", function(){
            
        //         $("#sitefloor").trigger("click");
              
        // });

        // $('#sitebutton').click(function(){
        //     //$("ul > li").next("li").find("a").trigger('click');
        //    // $("ul").next("li").find("a").trigger('click');
        //     $("a").trigger("click");
        //      });

            var floor = document.getElementById("floors").value;
            var select = document.getElementById("floorno");
            for(var i=1;i<=floor;i++)
            {
                var option = document.createElement('option');
                option.text = option.value = i;
                select.add(option);
    
            }
            //   $(".next-step").click(function (e) {

            //       var $active = $('.bs-example .nav-tabs li.active');
            //       $active.next().removeClass('disabled');
            //       nextTab($active);
            //   });
            //  function nextTab(elem) {
            //      $(elem).next().find('a[data-toggle="tab"]').click();
            //   }
     }
              
}
function floorvalidation()
{
    $(document).ready(function(){
        $('.bs-example').on('click', function(){
        $('html,body').animate({scrollTop: $(this).offset().top}, 800);
        }); 
    });
    $(document).on("click", ".btnNext", function()
    {
        $('.nav-tabs >.next').next('li').find('a').removeClass('disabled').trigger('click');
       /// $('.nav-tabs > .next').next('li').find('a').trigger('click');
    });

    $(document).on("click", ".btnPrev", function()
    {
        $('.nav-tabs > .next').prev('li').find('a').removeClass('disabled').trigger('click');
        //$('.nav-tabs > .next').prev('li').find('a').trigger('click');
    });
}
function flatvalidation()
{
    $(document).ready(function(){
        $('.bs-example').on('click', function(){
        $('html,body').animate({scrollTop: $(this).offset().top}, 800);
        }); 
    });

   $(document).on("click",".flatNex",function()
   {
        $('.nav-tabs >.rooms').next('li').find('a').removeClass('disabled').trigger('click');
       //alert("hrllo");
   })
    $(document).on("click", ".flatPrev", function()
    {
        //alert("hrllo");
        $('.nav-tabs >.flatnext').prev('li').find('a').removeClass('disabled').trigger('click');
       /// $('.nav-tabs > .next').next('li').find('a').trigger('click');
    });
}

