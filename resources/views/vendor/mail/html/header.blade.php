@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://D/Screenshot_۲۰۱۹-۰۱-۲۰-۰۹-۱۵-۰۶" class="logo" alt="mail Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
