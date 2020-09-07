

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='calendar/fullcalendar.min.css' rel='stylesheet' />
<link href='calendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='calendar/lib/moment.min.js'></script>
<script src='calendar/lib/jquery.min.js'></script>
<script src='calendar/fullcalendar.min.js'></script>
<script>

  $(document).ready(function(){ 


    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
        events: {
        url: 'calendar/demos/php/get-events.php',
        error: function() {
          $('#script-warning').show();
        }
      },
      loading: function(bool) {
        $('#loading').toggle(bool);
      },
  //        customButtons: {
  //     addEventButton: {
  //       text: 'add event...',
  //       click: function() {
  //         var dateStr = prompt('Enter a date in YYYY-MM-DD format');
  //         var date = moment(dateStr);
  //         var title=prompt('Enter a title');
  //         if (date.isValid()) {
  //           $('#calendar').fullCalendar('renderEvent', {
  //             title: title,
  //             start: date,
  //             allDay: true
              
  //           });
  //              var xhttp = new XMLHttpRequest();
  // xhttp.onreadystatechange = function() {
  //   if (this.readyState == 4 && this.status == 200) {
  //  document.getElementById("txtHint").innerHTML = this.responseText;
  //   }
  // };
  // xhttp.open("GET", "calendar/demos/json/event.php?title="+title+"& date="+date+"& allDay=true", true);
  // xhttp.send();
  //           // var myObj = {title, start, allDay};
  //           // var myJSON = JSON.stringify(myObj);
  //           // window.location = "calendar/demos/json/event.json?x=" + myJSON;
            
  //         } else {
  //           alert('Invalid date.');
  //         }
  //       }
  //     }
  //   },
    //   eventClick: function(eventObj) {
    //   if (eventObj.url) {
    //     alert(
    //       'Clicked ' + eventObj.title + '.\n' +
    //       'Will open ' + eventObj.url + ' in a new tab'
    //     );

    //     window.open(eventObj.url);

    //     return false; // prevents browser from following link in current tab.
    //   } else {
    //    eventObj.title="hello i am new title";
    //    // $('#calendar').fullCalendar('renderEvent',eventObj, true);
    //     alert('Clicked ' + eventObj.title);
    //   }
    // },
  eventClick: function(event, element) {

    event.title = prompt('Event Title:');

    $('#calendar').fullCalendar('updateEvent', event);

  },

      defaultDate: '2018-03-12',
      selectable:true,
      editable: true,
      navLinks: true, // can click day/week names to navigate views
      eventLimit: true, // allow "more" link when too many events
  //      droppable: true,
  // drop: function(date) {
  //   alert("Dropped on " + date.format());
  // },
 


      select: function(start, end) {
        var title = prompt('Event Title:');
        var eventData;
        if (title) {
          eventData = {
            title: title,
            start: start,
            end: end
          };

          $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
        }
        $('#calendar').fullCalendar('unselect');
      }
    
  //       events: {
  //   url: 'calendar/demos/json/events.json',
  //   type: 'POST',
  //   data: {
  //     custom_param1: 'something',
  //     custom_param2: 'somethingelse'
  //   },
  //   error: function() {
  //     alert('there was an error while fetching events!');
  //   },
  //   color: 'yellow',   // a non-ajax option
  //   textColor: 'black' // a non-ajax option
  // },
    });


   

// $(function() {

//   $('#calendar').fullCalendar({
//     eventClick: function(eventObj) {
//       if (eventObj.url) {
//         alert(
//           'Clicked ' + eventObj.title + '.\n' +
//           'Will open ' + eventObj.url + ' in a new tab'
//         );

//         window.open(eventObj.url);

//         return false; // prevents browser from following link in current tab.
//       } else {
//         alert('Clicked ' + eventObj.title);
//       }
//     },
//     defaultDate: '2018-08-15',
//     events: [
//       {
//         title: 'simple event',
//         start: '2018-08-02'
//       },
//       {
//         title: 'event with URL',
//         url: 'https://www.google.com/',
//         start: '2018-08-03'
//       }
//     ]
//   });

// });

  });
// $(function() {

//   $('#calendar').fullCalendar({
//     eventClick: function(eventObj) {
//       if (eventObj.url) {
//         alert(
//           'Clicked ' + eventObj.title + '.\n' +
//           'Will open ' + eventObj.url + ' in a new tab'
//         );

//         window.open(eventObj.url);

//         return false; // prevents browser from following link in current tab.
//       } else {
//         alert('Clicked ' + eventObj.title);
//       }
//     },
//     defaultDate: '2018-08-15',
//     events: [
//       {
//         title: 'simple event',
//         start: '2018-08-02'
//       },
//       {
//         title: 'event with URL',
//         url: 'https://www.google.com/',
//         start: '2018-08-03'
//       }
//     ]
//   });

// });



</script>
<style>

  body {
    margin: 0;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #script-warning {
    display: none;
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    text-align: center;
    font-weight: bold;
    font-size: 12px;
    color: red;
  }

  #loading {
    display: none;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  #calendar {

    max-width: 900px;
    margin: 40px auto;
    padding: 0 10px;
    cursor: pointer;
  }

</style>
</head>
<body>

  <div id='script-warning'>
    <code>php/get-events.php</code> must be running.
  </div>

  <div id='loading'>loading...</div>
 <!--  <?php
//  $x = file_get_contents(dirname(__FILE__) . '/calendar/demos/json/events.json');
// echo "<script> console.log($x); </script>";
//include_once("../../Database.php");
//$query=mysqli_query($con,"select * from events");
//$input_arrays=mysqli_fetch_assoc($query);
// var_dump($input_arrays);
//$myJSON = json_encode($input_arrays);
// var_dump($myJSON);
//echo "<script> console.log($myJSON); </script>";
 ?> -->
  <div id='calendar'></div>
<div id="txtHint" >dsfsd</div>
</body>
</html>
