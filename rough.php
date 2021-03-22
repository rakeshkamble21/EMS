<?php
                require 'connection.php';

                try
                {
                    $sql = "SELECT * FROM employee";
                    $stmt = $db->prepare($sql); 
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) 
                    {

                         ?>
 value="<?php echo $row['firstname']." ".$row['lastname'];?>"
 value="<?php echo $row['emp_id'];?>"

 <td><input type="text" id="empid" disabled="disabled" name="empid[]" value="<?php echo $row['firstname']." ".$row['lastname'];?>"/></td>
                        <td> 
                                    <label for="present5">
                                        <input type="radio" id="present5" name="attendance_status[5]" value="Present"> Present
                                    </label>
                                    <label for="absent5">
                                        <input type="radio" id="absent5" name="attendance_status[5]" value="Absent"> Absent
                                    </label>
                        </td>
                        <td><input type="text" name="work_done[]" class="form-control"></td>
                        <td><input type="text" name="work_hours[]" class="form-control"></td>
                        name="att[<?=$row['emp_id'];?>]"