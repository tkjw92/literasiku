@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="{{ env('APP_URL') }}/assets/dist/images/logo.svg" class="logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
