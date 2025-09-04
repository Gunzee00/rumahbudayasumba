@component('mail::message')
{{-- Logo Hotel --}}
{{-- <img src="{{ asset('../assets-user/img/rumahbudayasumba.png') }}" alt="Rumah Budaya Sumba" style="width:150px; margin-bottom:20px;"> --}}

# Thank You, {{ $booking->customer_name }} 🎉

Your booking has been successfully created. Here are your reservation details:

@component('mail::panel')
**Room**: {{ $booking->room->name_room }}  
**Check-in**: {{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}  
**Check-out**: {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}  
**Number of Guests**: {{ $booking->guest_count }}  
**Total Price**: Rp {{ number_format($booking->total_price, 0, ',', '.') }}  

@if($booking->special_request)
**Special Requests:**  
{{ $booking->special_request }}
@endif
@endcomponent

We will contact you shortly to confirm your booking.

@component('mail::button', ['url' => url('/')])
Visit Our Website
@endcomponent

Thank you,<br>
**Rumah Budaya Sumba**
@endcomponent
