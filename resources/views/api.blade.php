<body>
  <select>
    @foreach($country as $kuni)
      @if ($kuni != "合計" && $kuni != "上位５カ国以外計")
        <option value="{{ $kuni }}">{{$kuni}}</option>
      @endif   
    @endforeach
  </select>

  <select name=”year”>
    @for ($i = 0; $i < 4; $i++)
    <option value="{{$year[$i]}}">{{$i + 2015}}</option>
    @endfor
  </select>


  @foreach ($country as $key => $value)
    @if ($value != "合計" && $value != "上位５カ国以外計")
    {{$value}}<br>
    @endif   
  @endforeach
  @foreach ($bean as $value2)
      {{$value2}}<br>
  @endforeach

  
</body>



  
