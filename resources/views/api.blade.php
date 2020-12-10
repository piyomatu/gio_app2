<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  

</head>

<body>
  <script src="{{ asset('js/app.js') }}"></script>
  {{--<script src="{{ asset('js/scriptS.js') }}"></script>--}}
  <script>
    $(function() {
      $(document).on('change','#year_select', function() {
        var year = $(this).val();
    
        $('p').text(year);
    
      } );
    } );

$('#year_select').on('change', function(){
      let year = $(this).val();
   
    $.ajax({
          type:'GET',
          url:'api/' + year,
          data:{ year : year },
          dataType:"json"
      })
      .then(function(data1){
          
      
          console.log(data1);
      });
});
  </script>
  
  
  <select>
    @foreach($country as $kuni)
      @if ($kuni != "合計" && $kuni != "上位５カ国以外計")
        <option value="{{ $kuni }}">{{$kuni}}</option>
      @endif   
    @endforeach
  </select>

  
  <select id="year_select" name="year">
    @for ($i = 2015; $i < 2019; $i++)
    <option value="{{$i}}" selected="selected">{{$i}}</option>
    @endfor
    
  </select>
  <p></p>
{{--}}
{{Form::select('year', [
   '0' => '2015',
   '1' => '2016',,
   '2' => '2017',
   '3' => '2018', 0]
)}}
--}}

  @foreach ($country as $key => $value)
    @if ($value != "合計" && $value != "上位５カ国以外計")
    {{$value}}<br>
    @endif   
  @endforeach
  @foreach ($bean as $value2)
      {{$value2}}<br>
  @endforeach


  
</body>



  
