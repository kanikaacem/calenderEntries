<!DOCTYPE html>
<html>
<head>
    <title>Manage Your Daily Activity</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script scr="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <style> 
          .list-group-item{
            text-align: center;
            font-style: bold;
            font-style: italic;
            font-weight: 700;
            font-family: times new roman;

          }

         .fc-widget-header{
            background-color:black;
            color:white;
            font-family: times new roman;
         }
/*         style="background-image: linear-gradient(to right, #ffc0cb45 , #b3d7ff5c);"
*/         .fc-button.fc-state-active{
            background-color: black;
            color: white;
            font-family: times new roman;
            }

            .fc-button{
                font-family: times new roman;
            }
            .fc-center{
                font-family: times new roman;
            }
            .fc-today{
                   background-color: darkgrey !important;
            }
           
    </style>
</head>
<body>
    <div class="row">
        
        <div class="list-group col-3" id="monthName" style="padding-top:30px; padding-left:50px;">
            <h1 class="text-center" style=" font-family: fantasy;">Manage Your Daily Activity</h1>

              <a href="#" data-id="0" class="list-group-item list-group-item-action list-group-item-dark">January</a>
              <a href="#" data-id="1" class="list-group-item list-group-item-action list-group-item-dark">February</a>
              <a href="#" data-id="2" class="list-group-item list-group-item-action list-group-item-dark">March</a>
              <a href="#" data-id="3" class="list-group-item list-group-item-action list-group-item-dark">April</a>
              <a href="#" data-id="4" class="list-group-item list-group-item-action list-group-item-dark">May</a>
              <a href="#" data-id="5" class="list-group-item list-group-item-action list-group-item-dark">June</a>
              <a href="#" data-id="6" class="list-group-item list-group-item-action list-group-item-dark">July</a>
              <a href="#" data-id="7" class="list-group-item list-group-item-action list-group-item-dark">August</a>
              <a href="#" data-id="8" class="list-group-item list-group-item-action list-group-item-dark">September</a>
              <a href="#" data-id="9" class="list-group-item list-group-item-action list-group-item-dark">October</a>
              <a href="#" data-id="10" class="list-group-item list-group-item-action list-group-item-dark">November</a>
              <a href="#" data-id="11" class="list-group-item list-group-item-action list-group-item-dark">December</a>
          </div>
        
        <div class="col-9" style="width:100%; padding-top:80px; padding-left:30px; padding-right:30px;">
            <div id="calendar"></div>
    </div>

    <div id="eventmodal" class="modal" tabindex="-1" role="dialog" >
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Event Lists</h5>
            <button type="button" class="close" onclick="closeModal()" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Event Title</th>
                      <th scope="col">Start Time</th>
                      <th scope="col">End Time</th>
                    </tr>
                  </thead>
                  <tbody id="tBody"></tbody>
                </table>
            </div>
         </div>
      </div>
    </div>
       
<script>

$(document).ready(function () {

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        editable:true,
        editable:true,
        customButtons: {
            allevents: {
                text: 'All Events',
                click: function() {
                 $.ajax({
                    url:"/all-entries",
                    type:"GET",
                    success:function(response){
                    if(response.status){
                    var number = 1;
                    var trHTML = '';
                    var events = response.data;
                      
                    for(i in events){
                       trHTML +='<tr><td>'+ number + '</td><td>'
                                    + events[i].title
                                    + '</td><td>'+events[i].start_time
                                    +'</td><td>'+events[i].end_time
                                    + '</td></tr>';
                        number = number + 1; 
                      }
                      $('#tBody').html(trHTML);
                      $('#eventmodal').show();
                    }
                    else{
                     alert("No entries present");
                    }
                  },
                    error:function(data){
                }

                 });
              }
            }
        },
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay,allevents'
        },
        events:'/',
        selectable:true,
        selectHelper: true,
        select:function(start, end, allDay)
        {
            var title = prompt('Event Title:');

            if(title)
            {
                var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                $.ajax({
                    url:"/action",
                    type:"POST",
                    data:{
                        title: title,
                        start: start,
                        end: end,
                        type: 'add'
                    },
                    success:function(data)
                    {     
                     console.log(data);
                     calendar.fullCalendar('renderEvent',{
                        id: data.id,
                        title: data.title,
                        start: data.start_time,
                        end: data.end_time,
                    },true);
                    alert("Event Created Successfully");
                    }
                })
            }
        },
        editable:true,
        eventResize: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"/action",
                type:"POST",
                data:{
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(data)
                {   
                    // calendar.fullCalendar('udpateEvent',{
                    //     id: data.id,
                    //     title: data.title,
                    //     start: data.start_time,
                    //     end: data.end_time,
                    // },true);
                    alert("Event Updated Successfully");
                }
            })
        },
        eventDrop: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"/action",
                type:"POST",
                data:{
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                 alert("Event Updated Successfully");
                }
            })
        },

        eventClick:function(event)
        {
            if(confirm("Are you sure you want to remove it?"))
            {
                var id = event.id;
                $.ajax({
                    url:"/action",
                    type:"POST",
                    data:{
                        id:id,
                        type:"delete"
                    },
                    success:function(response)
                    {   
                        calendar.fullCalendar('removeEvents',id);
                        alert("Event Deleted Successfully");
                    }
                })
            }
        }
    });
});
  
    $('a').click(function(){
    var month = $(this).data('id');
    var m = moment([moment().year(),month,1]);
    $('#calendar').fullCalendar('gotoDate',m);

    // var date = $('#calendar').fullCalendar('getDate');
    // alert(date);
    // alert($(this).text());
        });
    
    function closeModal(){
        $('#eventmodal').hide();
    }
</script>
  
</body>
</html>