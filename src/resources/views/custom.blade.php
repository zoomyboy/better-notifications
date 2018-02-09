@component('BetterNotifications::views.message', [
	'level' => $level,
	'heading' => $heading
])
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
# Hello!
@endif

{{-- Intro Lines --}}
@foreach($elements as $element)
<div class="row {{ $element['class'] ?? '' }}">
@if($element['type'] == 'line')
{!! $element['content'] !!}
@endif
@if($element['type'] == 'action')
@component('BetterNotifications::views.button', ['element' => $element])
{!! $element['content'] !!}
@endcomponent
@endif
@if($element['type'] == 'row')
<table width="100%" cellpadding="0" cellspacing="5" border="0">
@foreach($element['elements'] as $subelement)
<tr> <td align="center">
@component('BetterNotifications::views.subbutton', ['element' => $subelement])
{!! $subelement['action'] !!}
@endcomponent
</td> </tr>
@endforeach
</table>
@endif
</div>
@endforeach



{{-- Salutation --}}
@if(! empty($salutation))
{!! $salutation !!}
@endif

@if ($subcopy)
@component('BetterNotifications::views.subcopy')
{!! $subcopy !!}
@endcomponent
@endif
@endcomponent
