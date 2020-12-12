<head>
  <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <script src="https://threejs.org/build/three.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://raw.githack.com/syt123450/giojs/master/assets/data/sampleData.js"></script>
  

</head>

<body>
  <div id="globalArea" style="width:800px;height:420px"></div>
  <script src="https://raw.githack.com/syt123450/giojs/master/build/gio.min.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  {{--<script src="{{ asset('js/scriptS.js') }}"></script>--}}
  

  <button id="on">回転ON</button>
  <button id="off">回転OFF</button>
  <button id="add">データ追加</button>
  <button id="clear">データクリア</button>
  <button id="usa">アメリカ</button>
  
  
  <p id="moji"></p>
  @foreach ($giodata as $key => $value4)
    <p id="giodata" data-i="{{$value4["i"]}}" data-v="{{$value4["v"]}}"></p>
  @endforeach
  
  
  {{--
  @foreach ($giodata as $data)
    <span id="giodata" data-name="{{ $data }}"></span>
  @endforeach
  --}}
  
  
  


  <select id="coutry_select" name="coutry_select">
    @foreach ($giodata as $key => $value3)
  <option value="{{ $value3["i"]}}, {{$value3["v"]}}">{{$value3["n"]}}</option>
    @endforeach
  </select>

  
  <select id="year_select" name="year_select">
    @for ($i = 2015; $i < 2019; $i++)
    <option value="{{$i}}" selected=3>{{$i}}</option>
    @endfor
    
  </select>
  <p id="ton"></p>
  <p id="see"></p>

</body>



  
