@if(array_key_exists("link1", $ticket_link) && array_key_exists("link2", $ticket_link) && array_key_exists("link3", $ticket_link) &&  array_key_exists("link4", $ticket_link))

       
     
       <h2 >Ticket for first trip:</h2>
            <br/>
      <img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
       <br/>
       Hello {{ $user_details['name'] }} thank you for choosing achantaxi, please click the buttons below to view your tickets
      
        <br/><br/>
       <button  style="outline:none;width:100px;height:50px;border-radius:5px"> <a href="{{ $ticket_link['link1'] }}" style="color:white"> View ticket</a></button>
       <br/>
       <h2 style="margin-top:4px">Ticket for second trip:</h2>
            <br/>
            <img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
       <br/>
       Hello {{ $user_details['name'] }}  thank you for choosing achantaxi, please click the buttons below to view your tickets
        <br/><br/>
       <button  style="outline: none;width:100px;height:50px;border-radius:5px"> <a href="{{ $ticket_link['link2'] }}" style="color:white">View ticket</a> </button>

       <br/>
       <h2 style="margin-top:4px">Ticket for third trip:</h2>
            <br/>
            <img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
       <br/>
       Hello {{ $user_details['name'] }}  thank you for choosing achantaxi, please click the buttons below to view your tickets
        <br/><br/>
       <button  style="outline:none;width:100px;height:50px;border-radius:5px"> <a href="{{ $ticket_link['link3'] }}" style="color:white"> View ticket</a></button>
       <br/>
       <h2 style="margin-top:4px">Ticket for forth trip:</h2>
            <br/>
            <img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
       <br/>
       Hello {{ $user_details['name'] }} , thank you for choosing achantaxi, please click the buttons below to view your tickets
        <br/><br/>
       <button  style="outline: none;width:100px;height:50px;border-radius:5px"> <a href="{{ $ticket_link['link4'] }}" style="color:white">View ticket</a> </button>
       


@elseif(array_key_exists("link1", $ticket_link) && array_key_exists("link2", $ticket_link))

       

 Ticket for first trip:
      <br/>
<img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
 <br/>
 Hello {{ $user_details['name'] }}  thank you for choosing achantaxi, please click the buttons below to view your tickets
 
  <br/><br/>
 <button  style="outline:none;width:100px;height:50px;border-radius:5px"> <a href="{{ $ticket_link['link1'] }}" style="color:white"> View ticket</a></button>
 <br/>
 Ticket for second trip:
      <br/>
<img src="{{ asset('img/acicon.png') }}" style="max-width:100px;max-height:90px" alt="App Logo"/>
 <br/>
 Hello {{ $user_details['name'] }} thank you for choosing achantaxi, please click the buttons below to view your tickets
 <br/><br/>
 <button  style="outline: none;width:100px;height:50px;border-radius:5px"> <a href="{{ $ticket_link['link2'] }}"  style="color:white">View ticket</a> </button>

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
    