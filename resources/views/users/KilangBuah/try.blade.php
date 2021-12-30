@extends($layout)

@section('content')


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head> --}}

<body>
    <input type="text" class="calc" value="">
    <input type="text" class="calc" value="">
    <input type="text" class="calc" value="">
    <input type="text" class="calc" value="">
    <input type="text" class="calc" value="">

    <span id="total"></span>
</body>



<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
</script>
<script type="text/javascript">
   $(document).ready(function(){
    $('.calc').change(function(){
        var total = 0;
        $('.calc').each(function(){
            if($(this).val() != '')
            {
                total += parseInt($(this).val());
            }
        });
        $('#total').html(total);
    });
});
</script>
{{-- </body>

</html> --}}


@endsection
