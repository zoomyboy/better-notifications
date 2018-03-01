<tr>
    <td class="header header-{{ $class or 'default' }} @if(config('better-notifications.headerContainer')) header-container @endif">
        @if (config('better-notifications.headerContainer'))
        <table style="margin: 0 auto; width: 570px; padding: 0 35px;">
            <tr>
                @if(config('better-notifications.headerLogo'))
                <td width="{{ $logo['width'] + 10 }}" align="left">
                    <img src="{{ $logo['url'] }}" height="{{ $logo['height'] }}" width="{{ $logo['width'] }}">
                </td>
                @endif
                <td align="left">
                    <a href="{{ $url }}">
                        {{ $slot }}
                    </a>
                </td>
            </tr>
        </table>
        @else
        <a href="{{ $url }}">
            {{ $slot }}
        </a>
        @endif
    </td>
</tr>
