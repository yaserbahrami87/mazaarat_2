<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Mazaar')
<img src="https://photo.mazaar.net/images/logo_green.png" class="logo" alt="Mazaarat">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
