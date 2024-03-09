<x-mail::message>
# Introduction

The body of your message.

<x-mail::panel>
This is the panel content.
<h4>You bought these items.</h4>

</x-mail::panel>


<x-mail::table>

| goods       | count         |  price  |
| ------------- |:-------------:| --------:|
@foreach($carts as $cart)
| {{$cart['name']}}      | {{$cart['count']}}      |  {{$cart['count']*$cart['price']}}     |
@endforeach
| ------------- |:-------------:| --------:|
|        |          | total price:  {{$totalPrice}} |

</x-mail::table>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ 'app.name' }}
</x-mail::message>
