@if(array_key_exists("link1", $ticket_link) && array_key_exists("link2", $ticket_link) && array_key_exists("link3", $ticket_link) &&  array_key_exists("link4", $ticket_link))

       
      <br/>
      <img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
       <br/>
       Hello {{ $user_details['name'] }} , thank you for choosing achantaxi, please click the buttons below to view your tickets
       <br/><br/>
       Ticket for first trip:
        <br/><br/>
       <button  style="outline:none;background-color:#0646A2;color:white"> <a href="{{ $ticket_link['link1'] }}"> View ticket</a></button>
       <br/>
       Ticket for second trip:
        <br/><br/>
       <button  style="outline: none;background-color:#0646A2;color:white"> <a href="{{ $ticket_link['link2'] }}">View ticket</a> </button>

       <br/>
      <img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
       <br/>
       Hello {{ $user_details['name'] }} , thank you for choosing achantaxi, please click the buttons below to view your tickets
       <br/><br/>
       Ticket for third trip:
        <br/><br/>
       <button  style="outline:none;background-color:#0646A2;color:white"> <a href="{{ $ticket_link['link3'] }}"> View ticket</a></button>
       <br/>
       Ticket for forth trip:
        <br/><br/>
       <button  style="outline: none;background-color:#0646A2;color:white"> <a href="{{ $ticket_link['link4'] }}">View ticket</a> </button>
       

       
@elseif(array_key_exists("link1", $ticket_link) && array_key_exists("link2", $ticket_link))

       
<br/>
<img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
 <br/>
 Hello {{ $user_details['name'] }} , thank you for choosing achantaxi, please click the buttons below to view your tickets
 <br/><br/>
 Ticket for first trip:
  <br/><br/>
 <button  style="outline:none;background-color:#0646A2;color:white"> <a href="{{ $ticket_link['link1'] }}"> View ticket</a></button>
 <br/>
 Ticket for second trip:
  <br/><br/>
 <button  style="outline: none;background-color:#0646A2;color:white"> <a href="{{ $ticket_link['link2'] }}">View ticket</a> </button>

@else
      <br/>
      <img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
      <br/>
       Hello {{ $user_details['name'] }} , thank you for choosing achantaxi, please click the buttons below to view your tickets 
       <br/><br/>
       Ticket for your trip:
        <br/><br/>
       <button  style="outline: none;background-color:#0646A2;color:white"> <a href="{{ $ticket_link['link1'] }}">View ticket</a> </button>
      

@endif
    