## Coding Assessment Round 2 - VOSCO Technologies
Create a single web page that does the following.
a) Show a calendar ( JS Based preferred ) - can use existing library for this
b) Month view by default ( Optional - option to switch to day view ).
c) Click anywhere on a date/time slot to open a popup to add an entry. 
d) It should save the entry in the database for that particular date, time, entry text, etc.
e) Next time the page is loaded, it should show all saved entries in respective date/time.
e) All ajax based, no page refresh.

Platform  - PHP or Laravel

This Project is used to manage everyday activity.You can easily add , remove , update  and also able to set the time of the event.
You can see all the calender events you added in a single popup.

To follow along, this application has been documented as an article. you can checkout here.

Set up

To set up this project, first clone the repositiory

$ git clone https://github.com/kanikaacem/calenderEntries.git
Change your working directory into the project directory

$ cd calenderEnteries
Then install dependencies using Composer

composer install

Run the application with the following command

$ php artisan serve

# Screenshot : 1 (Main GUI)
<p> It helps to manage the everyday activity easily. It include side navbar to navigate through the month in the calender.It also 
    some navigation button at the top of the Calender like left ,right, month ,day etc . It also show all the events in a singe menu
    .The present date of the month is shaded with the darkgrey color. </p>
<p align="center"><img src="https://github.com/kanikaacem/calenderEntries/blob/main/c1.PNG" width="auto"></a></p>

# Screenshot : 2 (Month navigation in calender)
<p> Sidebar present in the left help to navigate the month in the calender.
<p align="center"><img src="https://github.com/kanikaacem/calenderEntries/blob/main/c2.PNG" width="auto"></a></p>

# Screenshot : 3 (Adding event in calender)
<p> To add the entry in the calender , click the date on which you want to enter the event . Then a popup pops up to 
    enter the title of the event and click "OK" to save the entry in the database .</p>
<p align="center"><img src="https://github.com/kanikaacem/calenderEntries/blob/main/c3.PNG" width="auto"></a></p>

# Screenshot : 4 (Events in calender)
<p> It shows all the events you added in the calender. </p>
<p align="center"><img src="https://github.com/kanikaacem/calenderEntries/blob/main/c4.PNG" width="auto"></a></p>

# Screenshot : 5 (Manage timing of events)
<p> You can easily manage timing of the events with  day button . You can also add your entry from here. </p>
<p align="center"><img src="https://github.com/kanikaacem/calenderEntries/blob/main/c5.PNG" width="auto"></a></p>

# Screenshot : 6 (Update Events)
<p> You can easily update the date, time of the events by easily drag and drop .</p>
<p> It also show the weekly schedule of the user.</p>
<p align="center"><img src="https://github.com/kanikaacem/calenderEntries/blob/main/c6.PNG" width="auto"></a></p>

# Screenshot : 7 (Main Website GUI)
<p align="center"><img src="https://github.com/kanikaacem/calenderEntries/blob/main/c7.PNG" width="auto"></a></p>

# Screenshot : 8 (Main Website GUI)
<p align="center"><img src="https://github.com/kanikaacem/calenderEntries/blob/main/c8.PNG" width="auto"></a></p>

# Screenshot : 9 (Main Website GUI)
<p align="center"><img src="https://github.com/kanikaacem/calenderEntries/blob/main/c9.PNG" width="auto"></a></p>


