<?php
session_start();
if(!isset($_SESSION['dealerid'])){
    // $loginError = "You are not logged in.";
   header("location:../dealerLogin.php");
    die();
}
?>
<!DOCTYPE html>
<html>
 <head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
   <link rel="stylesheet" href="css/themify-icons/themify-icons.css">                                         <!--added   -->
    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">


  <link rel="stylesheet" href="Calendar2/fullcalendar.css" />
  <link rel="Calendar2/stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="Calendar2/lib/jquery.min.js"></script>
  <script src="Calendar2/lib/jquery-ui.min.js"></script>
  <script src="Calendar2/lib/moment.min.js"></script>
  <script src="Calendar2/fullcalendar.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.8/font-awesome-animation.min.css">
      
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.print.css" media='print'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/datepair.js/0.4.14/jquery.datepair.min.js'></script>
  <script>
    var date;
  $(document).ready(function() {
    var id;
    var d = new Date();
var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
document.getElementById("sideblock-header-content").innerHTML =d.getDate()+"<br>"+ months[d.getMonth()];

      $('#setEventModal1 .time').timepicker({
        timeFormat: 'H:i',
        disableTextInput: true,
        step: 30,
        scrollDefault: 'now',
        useSelect: true,
        className: 'form-control'
    });
    
    //initialise date input widgets for setting appointment
    $("#setEventModal1 .date").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        assumeNearbyYear: true,
        todayBtn: 'linked',
        todayHighlight: true,
        startDate: 'today'
    });
      $("#setEventModal1").datepair();
      //-----------------------------------for modal2 ------------------------------------>
      $('#setEventModal2 .time').timepicker({
        timeFormat: 'H:i',
        disableTextInput: true,
        step: 30,
        scrollDefault: 'now',
        useSelect: true,
        className: 'form-control'
    });
    
    //initialise date input widgets for setting appointment
    $("#setEventModal2 .date").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        assumeNearbyYear: true,
        todayBtn: 'linked',
        todayHighlight: true,
        startDate: 'today'
    });
      $("#setEventModal2").datepair();

   var calendar = $('#calendar').fullCalendar({
    editable:false,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay,listWeek'
    },
    eventLimit: true,
    events: 'Calendar2/load.php',
    selectable:true,
    selectHelper:true,
    nextDayThreshold: "00:00:00",



    editable:false,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"Calendar2/update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
      // alert('Event Update');
      }
     })
    },

   });


    var usercal = $('#calendar').fullCalendar('getCalendar');
        usercal.on('dayClick', function(clickedDate, jsEvent, view){
        //different modal for different user role. 
        //Doctors can set personal event and also time they'll be available for booking
        //other users can only set personal event
        var userCal = $('#calendar').fullCalendar('getCalendar');//get calendar object
        
        var today = userCal.moment();//create a moment object from the calendar's object
        
        if(today.stripTime().format() <= clickedDate.format()){
            //set the date field in the date on the modal to the selected date
            $("#setEventModal1 .date").datepicker('update', clickedDate.stripTime().format());
            
            $("#setEventModal1").modal('show');
        }
    });

        usercal.on('eventClick', function(event){
        //allow the clicking of events with status = 1

        var userCal = $('#calendar').fullCalendar('getCalendar');//get calendar object
        
        var today = userCal.moment();//create a moment object from the calendar's object
        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
       if(today.stripTime().format() <= start){
        $("#setEventModal2 .date").datepicker('update',start);
            $("#setEventModal2").modal('show');
     document.getElementById('modalTitle').value= event.title;
     document.getElementById('modalDescription').value=event.description;
     // document.getElementById('modalFromDate').value=$.fullCalendar.formatDate(event.start, "Y-MM-DD");
     // document.getElementById('modalToDate').value=$.fullCalendar.formatDate(event.end, "Y-MM-DD");
     // document.getElementById('modalFromTime').value=$.fullCalendar.formatDate(event.start, "HH:mm");
     // document.getElementById('modalToTime').value=$.fullCalendar.formatDate(event.end, "HH:mm");
     id=event.id;
        }else{
          if(confirm("Are you sure you want to remove it?"))
       
     {
      id = event.id;
      $.ajax({
       url:"Calendar2/delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        calendar2.fullCalendar('refetchEvents');
        //alert("Event Removed");
       }
      })
     }

 }
    });

        $("#appPersonalCreate").click(function(e){
        e.preventDefault();
        
        var title = $("#appPersonalTitle").val();
        var fromDate = $("#appPersonalFromDate").val();
        var fromTime = $("#appPersonalFromTime").val();
        var toDate = $("#appPersonalToDate").val();
        var toTime = $("#appPersonalToTime").val();
        var description = $("#appPersonalDescription").val();
        
        if(!title || !fromDate || !fromTime || !toDate || !toTime){
            !title ? $("#appPersonalTitleErr").html("Set event title") : $("#appPersonalTitleErr").html("");
            !fromDate ? $("#appPersonalFromDateErr").html("Set event start date") : $("#appPersonalFromDateErr").html("");
            !fromTime ? $("#appPersonalFromTimeErr").html("Set event start time") : $("#appPersonalFromTimeErr").html("");
            !toDate ? $("#appPersonalToDateErr").html("Set event end date") : $("#appPersonalToDateErr").html("");
            !toTime ? $("#appPersonalToTimeErr").html("Set event end time") : $("#appPersonalToTimeErr").html("");
            
            return;
        }
        
        //clear all error messages
        $("#appPersonalTitleErr").html("");
        $("#appPersonalFromDateErr").html("");
        $("#appPersonalFromTimeErr").html("");
        $("#appPersonalToDateErr").html("");
        $("#appPersonalToTimeErr").html("");

        //concatenate the date and time of both the 'from' and 'to' fields
        var startFrom = fromDate + " " + fromTime;//e.g "2016-10-19 09:41am"
        var endAt = toDate + " " + toTime;//e.g "2016-10-19 09:41am"
        
        //create an ISO string from the concatenated date and time of both the 'from' and 'to' fields
        var startDate = new moment(startFrom).format();
        var endDate = new moment(endAt).format();
        
        //show loading icon
      
        $.ajax({
            url:"Calendar2/insert.php",
      type:"POST",
       data: {title:title, start:startDate, end:endDate, description:description },
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       calendar2.fullCalendar('refetchEvents');
       $("#setEventModal1").modal('hide');
      }
    });
    });

        $("#appPersonalUpdate").click(function(e){
        e.preventDefault();
        
        var title = $("#modalTitle").val();
        var fromDate = $("#modalFromDate").val();
        var fromTime = $("#modalFromTime").val();
        var toDate = $("#modalToDate").val();
        var toTime = $("#modalToTime").val();
        var description = $("#modalDescription").val();
        
        if(!title || !fromDate || !fromTime || !toDate || !toTime){
            !title ? $("#modalTitleErr").html("Set event title") : $("#modalTitleErr").html("");
            !fromDate ? $("#modalFromDateErr").html("Set event start date") : $("#modalFromDateErr").html("");
            !fromTime ? $("#modalFromTimeErr").html("Set event start time") : $("#modalFromTimeErr").html("");
            !toDate ? $("#modalToDateErr").html("Set event end date") : $("#modalToDateErr").html("");
            !toTime ? $("#modalToTimeErr").html("Set event end time") : $("#modalToTimeErr").html("");
            
            return;
        }
        
        //clear all error messages
        $("#modalTitleErr").html("");
        $("#modalFromDateErr").html("");
        $("#modalFromTimeErr").html("");
        $("#modalToDateErr").html("");
        $("#modalToTimeErr").html("");
        
        //concatenate the date and time of both the 'from' and 'to' fields
        var startFrom = fromDate + " " + fromTime;//e.g "2016-10-19 09:41am"
        var endAt = toDate + " " + toTime;//e.g "2016-10-19 09:41am"
        
        //create an ISO string from the concatenated date and time of both the 'from' and 'to' fields
        var startDate = new moment(startFrom).format();
        var endDate = new moment(endAt).format();
        
        //show loading icon
        
        $.ajax({
            url:"Calendar2/update.php",
      type:"POST",
       data: {title:title, start:startDate, end:endDate, description:description, id:id },
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       calendar2.fullCalendar('refetchEvents');
       $("#setEventModal2").modal('hide');
        
      }
    });
    });

         $("#appPersonalDelete").click(function(){
      if(confirm("Are you sure you want to remove it?"))
       
     {
      $.ajax({
       url:"Calendar2/delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        calendar2.fullCalendar('refetchEvents');
        //alert("Event Removed");
        $("#setEventModal2").modal('hide');
       }
      })
     }
    });

    // var view = $('#sideblock-content').fullCalendar('getView');
    var calendar2 = $('#sideblock-content').fullCalendar({
        header:{
     left:'',
     center:"",
     right:''
    },
        events: 'Calendar2/load.php',
    }); 
    $('#sideblock-content').fullCalendar('changeView', 'listDay');
  });


  </script>
 </head>
 <body>
     <?php 


    $id=$_SESSION['dealerid'];
  include_once("../../Database.php");
    $qry1=@mysqli_query($con,"select * from dealerdata where id='$id'");
    while($data=mysqli_fetch_assoc($qry1)){
        $dealershipname=$data['DealershipName'];
        $image=$data['Image'];
        $dealername=$data['DealerName'];
         $profilePic=$data['profilePic'];

    }
    // $qry2=mysqli_query($con,"select * from dealersaccount where id='$id'");
    // while($data1=mysqli_fetch_assoc($qry2)){
    //     $profilePic=$data1['profilePic'];
    // }

        ?>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a href="index.php">
                    <span id="big-logo" ><img id="big-logo-image"  src="../../images/<?php echo $image ?>" alt="logo" style="width:40px;height:40px;border-radius: 50%" /><span id="logo-name"><?php echo " &nbsp;".$dealershipname ?></span></span>
                    
                </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                         <li class="active has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="c-blue ti-home"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="Calendar.php">
                                <i class="c-orange ti-calendar"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="Edit-Delete_a_Vehicle.php">
                                <i class="c-purple ti-pencil"></i>Edit/Delete a Vehicle</a>
                        </li>
                        <li>
                            <a href="Vehicle_with_pending_Info.php">
                                <i class="c-brown ti-palette"></i>Vehicle with pending Info</a>
                        </li>
                      
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="c-teal ti-car"></i>Add A Vehicle</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="vindecode.php">Vin Decode</a>
                                </li>
                                <li>
                                    <a href="manually.php">Manually</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
       <?php include("sidebar.php"); ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                                <?php if(isset($profilePic) && $profilePic !="default"){ ?>
                                                 <img src="images/profilePics/<?php echo $profilePic ?>" alt="Technetty.com"  />
                                        <?php     }else{ ?>
                                                 <i class="far fa-user"></i>
                                        <?php     }     ?>
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $dealername ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <?php if(isset($profilePic) && $profilePic !="default"){ ?>
                                                        <img src="images/profilePics/<?php echo $profilePic ?>" alt="Technetty.com"  />
                                                    <?php     }else{ ?>
                                                         <i class="far fa-user"></i>
                                                    <?php     }     ?>
                                                   </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $dealername ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $dealershipname ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="profile.php">
                                                        <i class="zmdi zmdi-account"></i>Profile</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="setting.php">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="billing.php">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
  <div class="container" style="margin-top: 132px;">
    <div class="row" style="padding-left:20px">
         <div id="sideblock" class="col-md-3 col-sm-12 col-xs-12" style="width: 25%;height:500px;float:left;border:1px red solid;padding:0px">
       <div id="sideblock-header"><div id="sideblock-header-content"></div></div>
       <br><center>Today's Events</center>
       <div id="sideblock-content">

       </div>
     </div>
 
   <div id="calendar" class="col-md-9 col-sm-12 col-xs-12"></div>
                <!--  modal    ------------------------------------------------------------------------------------------------->
 <div class="modal fade" id='setEventModal1' data-backdrop='static' role='dialog'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4>Create Event</h4>
                    </div>

                    <div class="modal-body">
                        <form id='personalForm' name='personalForm' class="form-horizontal">      
                            <div class="row text-center">
                                <span id='pFormErr' class="errMsg"></span>
                            </div>

                            <div class="row form-group-sm">
                                <div class="col-sm-12">
                                    <label class="control-label">Title</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span><i class="fa fa-briefcase"></i></span>
                                        </div>
                                        <input type="text" id='appPersonalTitle' class="form-control" placeholder="Title">
                                    </div>
                                    <span class="help-block errMsg" id='appPersonalTitleErr'></span>
                                </div>
                            </div>
                            
                            <div class="row form-group-sm">
                                <div class="col-sm-12">
                                    <label class="control-label">Description <small><i>(optional)</i></small></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span><i class="fa fa-book"></i></span>
                                        </div>
                                        <textarea id='appPersonalDescription' class="form-control" placeholder="Optional description"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8 form-group-sm">
                                    <label class="control-label">From Date</label>                                    
                                    <div class="input-group">
                                        <input type="text" id='appPersonalFromDate' class="form-control date start" placeholder="Start Date">
                                        <div class="input-group-addon">
                                            <span><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                    <span class="help-block errMsg" id='appPersonalFromDateErr'></span>
                                </div>

                                <div class="col-sm-4 form-group-sm">
                                    <label class="control-label">From Time</label>
                                    <div class="input-group">
                                        <input type="text" id='appPersonalFromTime' class="form-control time start">
                                        <div class="input-group-addon">
                                            <span><i class="fa fa-clock-o"></i></span>
                                        </div>
                                    </div>
                                    <span class="help-block errMsg" id='appPersonalFromTimeErr'></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8 form-group-sm">
                                    <label class="control-label">To Date</label>
                                    <div class="input-group">
                                        <input type="text" id='appPersonalToDate' class="form-control date end" placeholder="End Date">
                                        <div class="input-group-addon">
                                            <span><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                    <span class="help-block errMsg" id='appPersonalToDateErr'></span>
                                </div>

                                <div class="col-sm-4 form-group-sm">
                                    <label class="control-label">To Time</label>
                                    <div class="input-group">
                                        <input type="text" id='appPersonalToTime' class="form-control time end">
                                        <div class="input-group-addon">
                                            <span><i class="fa fa-clock-o"></i></span>
                                        </div>
                                    </div>
                                    <span class="help-block errMsg" id='appPersonalToTimeErr'></span>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" id='appPersonalCreate'>Create</button>
                        <button class="btn btn-danger btn-sm" data-dismiss='modal'>Cancel</button>
                    </div>
                </div>
            </div>
        </div>          
        <!--  modal2 -------------------------------------------------------------------------------------------------------------->
            <div class="modal fade" id='setEventModal2' data-backdrop='static' role='dialog'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4>Create Event</h4>
                    </div>

                    <div class="modal-body">
                        <form id='personalForm' name='personalForm' class="form-horizontal">      
                            <div class="row text-center">
                                <span id='pFormErr' class="errMsg"></span>
                            </div>

                            <div class="row form-group-sm">
                                <div class="col-sm-12">
                                    <label class="control-label">Title</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span><i class="fa fa-briefcase"></i></span>
                                        </div>
                                        <input type="text" id='modalTitle' class="form-control" placeholder="Title">
                                    </div>
                                    <span class="help-block errMsg" id='modalTitleErr'></span>
                                </div>
                            </div>
                            
                            <div class="row form-group-sm">
                                <div class="col-sm-12">
                                    <label class="control-label">Description <small><i>(optional)</i></small></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span><i class="fa fa-book"></i></span>
                                        </div>
                                        <textarea id='modalDescription' class="form-control" placeholder="Optional description"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8 form-group-sm">
                                    <label class="control-label">From Date</label>                                    
                                    <div class="input-group">
                                        <input type="text" id='modalFromDate' class="form-control date start" placeholder="Start Date">
                                        <div class="input-group-addon">
                                            <span><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                    <span class="help-block errMsg" id='modalFromDateErr'></span>
                                </div>

                                <div class="col-sm-4 form-group-sm">
                                    <label class="control-label">From Time</label>
                                    <div class="input-group">
                                        <input type="text" id='modalFromTime' class="form-control time start">
                                        <div class="input-group-addon">
                                            <span><i class="fa fa-clock-o"></i></span>
                                        </div>
                                    </div>
                                    <span class="help-block errMsg" id='modalFromTimeErr'></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8 form-group-sm">
                                    <label class="control-label">To Date</label>
                                    <div class="input-group">
                                        <input type="text" id='modalToDate' class="form-control date end" placeholder="End Date">
                                        <div class="input-group-addon">
                                            <span><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                    <span class="help-block errMsg" id='modalToDateErr'></span>
                                </div>

                                <div class="col-sm-4 form-group-sm">
                                    <label class="control-label">To Time</label>
                                    <div class="input-group">
                                        <input type="text" id='modalToTime' class="form-control time end">
                                        <div class="input-group-addon">
                                            <span><i class="fa fa-clock-o"></i></span>
                                        </div>
                                    </div>
                                    <span class="help-block errMsg" id='modalToTimeErr'></span>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" id='appPersonalUpdate'>Update</button>
                        <button class="btn btn-warning btn-sm" id='appPersonalDelete'>Delete</button>
                        <button class="btn btn-danger btn-sm" data-dismiss='modal'>Cancel</button>
                    </div>
                </div>
            </div>
        </div>          


    </div> 
</div>
</div>
</div>
<div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Technetty. All rights reserved. Template by <a href="https://Technetty.com">Technetty</a>.</p>
                                </div>
                            </div>
                        </div>

 </body>
</html>
