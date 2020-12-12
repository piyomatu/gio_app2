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
 /*
    $('#year_select').on('change', function(){
      let year = $('#year_selectt').val();
   
      $.when(
          $.ajax({
          type:'GET',
          url:'api/' + year,
          data:{ year : year },
          dataType:"json",
      })
      ).then(function(data1){
          let results = data1[0];
          results = results;
      
          console.log(results)
      });
    });
*/



  
    $.ajax( {

        url: 'data/sampleData.json',
        type: "GET",
        contentType: "application/json; charset=utf-8",
        async: true,
        dataType: "json",
    })
        .then(function(inputData) {
          let dataSet = [];
            data = inputData;
            
            
            
            
            //var dataSet = [];
            
            $.each($('#giodata'), function() {
              
                var giodataI = $('#giodata').data('i');
                var giodataV = $('#giodata').data('v');
                dataSet.push({
                  "e": "JP",
                  "i": giodataI,
                  "v": giodataV
              });
            });
            
           /*
           $(function(){
            for (var i = 0; i < $('#giodata p').length; i++){
              var giodataI = $('#giodata').data('i');
              var giodataV = $('#giodata').data('v');
              dataSet.push({
                "e": "JP",
                "i": giodataI,
                "v": giodataV
              });
            }
           });
           */
           $('#see').text(JSON.stringify(dataSet));
            
              
              
            
              
            controller.addData( dataSet );
                  

            // data can be add before init() function be called
            //controller.addData( inputData );


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
              controller.addData( data );
            
              } );
            
            
              $( "#clear" ).on('click', function () {
              
              // can use clearData API to clear data in globe
              
              controller.clearData();
              
              } );

              $( "#usa" ).on('click', function () {
              
                // can use clearData API to clear data in globe
                
               controller.switchCountry( "US" );
          
                
              } );

              

              $(function() {
                $(document).on('change','#year_select', function() {
                  let year = $(this).val();
                  let countrySelect = $(this).val();
                  
                  //let giodata = $('#giodata').data();
                  
                  $('#moji').text(countrySelect);

              
                  $('p').text(year);
                  if (year) {
                      window.location = year;
                    }
                    return false;
                  });
                });

                $(function() {
                  $(document).on('change','#coutry_select', function() {
                    let values = $(this).val().split(',');
                    let countryValue = values[0];
                    let coutryTon = values[1];
                    //let countryValue = $(this).val();
                    controller.switchCountry( countryValue );
                    $('#ton').text(coutryTon);

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

