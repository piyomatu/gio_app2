const { forEach, countBy } = require("lodash");

var container = document.getElementById("globalArea");

//config用のオプション設定
var config = {
  "control": {
    "stats": false,
    "disableUnmentioned": false,
    "lightenMentioned": true,
    "inOnly": false,
    "outOnly": false,
    "initCountry": "JP",
    "halo": true
  },
  "color": {
    "surface": 1744048,
    "selected": 2141154,
    "in": 16765762,
    "out": 5366382,
    "halo": 2141154,
    "background": 0
  },
  "brightness": {
    "ocean": 0.95,
    "mentioned": 0.28,
    "related": 0.74
  }
};

var controller = new GIO.Controller(container,config);

var data;
 

    


    
      $.ajax( {

          url: 'data/sampleData.json',
          type: "GET",
          contentType: "application/json; charset=utf-8, ",
          async: true,
          dataType: "json",
          
      })
      /*
      $.ajax( {

        url: 'api/' + year,
        type: "GET",
        async: true,
        dataType: "text",
        
    })*/
      

      //$.get(url,testData,null,"json")
          .then(function(inputData) {

            
              
            

              data = inputData;

              data2 = $('#giodata').data('json');

              var dataSet = [];
              dataSet.push(data2);
              

              controller.addData( data2 );

              var giocount = $('#giodata').length; 
              /*
              $('#see').text(JSON.stringify(data2));
              $('#json').text(JSON.stringify(inputData));
            */
             

              $( "#on" ).on('click', function () {

                // can use clearData API to clear data in globe
                controller.setAutoRotation( true, 0.5 );
              
                } );
              $( "#off" ).on('click', function () {
                // can use clearData API to clear data in globe
                controller.setAutoRotation(false);
              
                } );
              

              $( "#add" ).on('click', function () {

                // can use clearData API to clear data in globe
                //alert("クリックされました");
                controller.addData( data2 );
              
                } );
              
              
                $( "#clear" ).on('click', function () {
                
                // can use clearData API to clear data in globe
                
                controller.clearData();
                
                } );

                





                $(function() {
                  $(document).on('change','#coutry_select', function() {
                    let values = $(this).val().split(',');
                    let countryValue = values[0];
                    let coutryTon = values[1];
                    let countryName = values[2];
                    
                    //let countryValue = $(this).val();
                    controller.switchCountry( countryValue );
                    $('#ton').html(countryName + "から" +  '<br>' + "日本へのコーヒー豆輸出量は" +  '<br>' + coutryTon + "トンです"); 
                  });
                });
                
                $(function() {
                  $(document).on('change','#year_select', function() {
                    let year = $(this).val();
                    let countrySelect = $(this).val();
                    
                    //let giodata = $('#giodata').data();
                    
                    
                   
                
                
                    $('p').text(year);
                    if (year) {
                
                         $('#moji').text(countrySelect);
                        window.location = year;
                        
                        $( "#year_select" ).val( $( this ).val() );
                      }
                      
                    });
                
                    
                  });

                
                
                controller.init();

                
          });
        
     
  

    


    console.log($.fn.jquery);





controller.onCountryPicked( function( select, relate ) {

  console.log( select );
  console.log( relate );

});






  // data can be add after init() function be called, after add new data, the system will be automatically updated

  






//controller.init();

