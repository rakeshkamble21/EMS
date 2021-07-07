
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/all.css">
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
    <script src="js/create-site.js"></script> 
    <script src="js/all.js"></script>
    <script src="js/fullscreen.js"></script>
</head>
<body style="background-image:url('images/bg.jpg')" >
<div class="nav-side-menu">
    <div class="brand">EMS</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="#" onclick="addEventListener();">
                  <i class="fas fa-tachometer-alt fa-lg"></i> Dashboard
                  </a>
                </li>
          
                <li data-toggle="collapse" data-target="#users" class="collapsed">
                  <a href="#"><i class="fa fa-users fa-lg"></i> Users <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="users">
                    <li >
                      <a href="employeemaster/add-employee.php"><i class="fas fa-user-plus"></i>&nbsp; Add Employees </a>
                    </li>
                    <li >
                      <a href="employeemaster/add-full-time-employee.php"><i class="fas fa-user-plus"></i>&nbsp; Add 12 Hours Employees </a>
                    </li>
                    <li >
                      <a href="employeemaster/view-full-time-employee.php"><i class="fas fa-user-plus"></i>&nbsp; View 12 Hours Employees </a>
                    </li>
                    <li >
                      <a href="employeemaster/view-employee.php"><i class="fas fa-eye"></i></i>&nbsp; View Employees </a>
                    </li>
                </ul>
                    

                <li data-toggle="collapse" data-target="#attendance" class="collapsed">
                  <a href="#"><i class="fa fa-users fa-lg"></i> Attendance <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="attendance">
                <li>
                  <a href="attendancemaster/view-attendance.php"><i class="fas fa-eye"></i> &nbsp; View Attendance </a>
                </li>  
                <li>
                  <a href="attendancemaster/view-full-time-attendance.php"><i class="fas fa-eye"></i> &nbsp; View 12 hours Attendance </a>
                </li> 
                <li >
                  <a href="attendancemaster/attendance.php"><i class="fas fa-plus"></i> &nbsp; Add Attendance</a>
                </li>
                <li >
                  <a href="attendancemaster/full-time-attendance.php"><i class="fas fa-plus"></i> &nbsp; Add 12 hours  Attendance</a>
                </li>
                <li >
                  <a href="attendancemaster/save-attendance.php"><i class="fas fa-plus"></i> &nbsp; Save Attendance</a>
                </li>
                <li >
                  <a href="attendancemaster/save-full-time-attendance.php"><i class="fas fa-plus"></i> &nbsp; Save 12 hours  Attendance</a>
                </li>
              </ul>


              <li data-toggle="collapse" data-target="#payroll" class="collapsed">
                  <a href="#"><i class="fa fa-users fa-lg"></i> Payroll <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="payroll">

                  <li>
                    <a href="payrollmaster/payroll.php"><i class="fas fa-rupee-sign"></i> &nbsp;Salary </a>
                  </li>
                  <li>
                    <a href="payrollmaster/full-time-payroll.php"><i class="fas fa-rupee-sign"></i> &nbsp;12 hours  salary </a>
                  </li>
               
                  <li>
                    <a href="payrollmaster/salary-print.php"><i class="fas fa-rupee-sign"></i> &nbsp;Salary Print</a>
                  </li>
                  <li>
                    <a href="payrollmaster/full-time-salary-print.php"><i class="fas fa-rupee-sign"></i> &nbsp;12 hours  salary Print </a>
                  </li>
                
                </ul>
                <li data-toggle="collapse" data-target="#advance" class="collapsed">
                  <a href="#"><i class="fa fa-users fa-lg"></i> Advance <span class="arrow"></span></a>
                </li> 
                <ul class="sub-menu collapse" id="advance">
                <li>
                    <a href="advancemaster/advance.php"><i class="fas fa-rupee-sign"></i> &nbsp;Advance </a>
                  </li>
                  <li>
                    <a href="advancemaster/full-time-advance.php"><i class="fas fa-rupee-sign"></i> &nbsp;12 hours  Advance </a>
                  </li>
                  <li>
                    <a href="advancemaster/view-advance.php"><i class="fas fa-rupee-sign"></i> &nbsp;View Advance </a>
                  </li>
                  <li>
                    <a href="advancemaster/view-full-time-advance.php"><i class="fas fa-rupee-sign"></i> &nbsp;View 12 hours Advance </a>
                  </li>
                  <!-- <li>
                    <a href="payrollmaster/salary-print.php"><i class="fas fa-rupee-sign"></i> &nbsp;Salary Print</a>
                  </li> -->
                </ul>


                <li data-toggle="collapse" data-target="#workassign" class="collapsed">
                  <a href="#"><i class="fa fa-users fa-lg"></i> Work Assign <span class="arrow"></span></a>
                </li> 
                <ul class="sub-menu collapse" id="workassign">
                <li>
                    <a href="workassignmaster/assign_work.php"><i class="fas fa-rupee-sign"></i> &nbsp;Assign Work </a>
                  </li>
                <li>
                    <a href="workassignmaster/add-work-details.php"><i class="fas fa-rupee-sign"></i> &nbsp;Save Work Assign </a>
                  </li>
                  <li>
                    <a href="workassignmaster/view-work-assignment.php"><i class="fas fa-rupee-sign"></i> &nbsp;View work assign </a>
                  </li>
                
                  <li>
                    <a href="workassignmaster/work_assign-report.php"><i class="fas fa-rupee-sign"></i> &nbsp;Work Assign Report</a>
                  </li>
                </ul>
                <li data-toggle="collapse" data-target="#new" class="collapsed">
                    <a href="export-database.php"><i class="fas fa-rupee-sign"></i> &nbsp;Export </a>
                  </li>
                  <li data-toggle="collapse" data-target="#new" class="collapsed">
                    <a href="logout.php"><i class="fas fa-rupee-sign"></i> &nbsp;Logout </a>
                  </li>

<!-- 
                 <li>
                  <a href="#">
                  <i class="fas fa-user-tie fa-lg"></i> Profile
                  </a>
                  </li>

                 <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i> Users
                  </a>
                </li> -->
            </ul>
     </div>
</div>
<script type="text/javascript">
    window.onload = maxWindow;

    function maxWindow() {
        window.moveTo(0, 0);

        if (document.all) {
            top.window.resizeTo(screen.availWidth, screen.availHeight);
        }

        else if (document.layers || document.getElementById) {
            if (top.window.outerHeight < screen.availHeight || top.window.outerWidth < screen.availWidth) {
                top.window.outerHeight = screen.availHeight;
                top.window.outerWidth = screen.availWidth;
            }
        }
    }
</script> 
<script>


  // var elem=document.getElementById("myvideo");
  // if (elem.requestFullscreen) {
  //   elem.requestFullscreen();
  // } else if (elem.webkitRequestFullscreen) { /* Safari */
  //   elem.webkitRequestFullscreen();
  // } else if (elem.msRequestFullscreen) { /* IE11 */
  //   elem.msRequestFullscreen();
  // }
  document.addEventListener('dbclick'()=>{
  document.documentElement.requestFullScreen().catch((e))={

    console.log(e);
  })
  });

</script>