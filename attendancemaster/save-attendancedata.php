
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $empid_array = $_POST["emp_id"]; 
    $hours_array = $_POST["hours"]; 

    for($i=0;$i<count($empid_array);i++)
    {
        echo $hours_array[$i];
    }

}