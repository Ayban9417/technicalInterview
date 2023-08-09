<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body>
<h2>Territories</h2>
    <p style="text-align: center; color: #777;">Here are the list of territories</p>
    <ul id="myUL">
        @foreach ($territories['data'] as $territory)
            @if ($territory['parent'] === null)
                <li>
                    <span class="caret">{{ $territory['name'] }}</span>
                    <ul class="nested">
                        @foreach ($territories['data'] as $childTerritory)
                            @if ($childTerritory['parent'] === $territory['id'])
                                <li>{{ $childTerritory['name'] }}</li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach
    </ul>
    <script>
        var toggler = document.getElementsByClassName("caret");
        var i;
        for (i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function() {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        }
    </script>
</body>
</html>