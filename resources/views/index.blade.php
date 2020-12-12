<head>
  <meta charset="UTF-8">
    <title>Try setStyle - Gio.js</title>
    {{--
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    --}}
    
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}



    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    

    <script src="https://threejs.org/build/three.min.js"></script>
    {{--<script src="../build/gio.min.js"></script>--}}

    
  <!-- load data in this data script -->
  <script src="https://raw.githack.com/syt123450/giojs/master/assets/data/sampleData.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
  
  <div id="globalArea" style="width:800px;height:420px"></div>
  <script src="https://raw.githack.com/syt123450/giojs/master/build/gio.min.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>


  


  

  <button id="on">回転ON</button>
  <button id="off">回転OFF</button>
  <button id="add">データ追加</button>
  <button id="clear">データクリア</button>
  <button id="usa">アメリカ</button>
  
  <p id="moji"></p>
  
  
  <select>
    @foreach($countries as $country)
      <option value="{{ $country->Name }}">{{$country->Name}}</option>
    @endforeach
  </select>
  <select name="year_select">
    @for ($i = 2015; $i < 2019; $i++)
  <option value="{{$i}}">{{$i}}</option>
    @endfor
    
  </select>

  <select id="country_select">
    @foreach($countryJp as $countryJ)
      <option value="{{ $countryJ->code }}">{{$countryJ->name}}</option>
    @endforeach
  </select>

  

  <p>使用Api: 政府統計の総合窓口（e-Stat）</p>
  <p>このサービスは、政府統計総合窓口(e-Stat)のAPI機能を使用していますが、サービスの内容は国によって保証されたものではありません。

  </p>


</body>