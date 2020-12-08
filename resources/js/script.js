
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

        url: "app/data/sampleData.json",
        type: "GET",
        contentType: "application/json; charset=utf-8",
        async: true,
        dataType: "json",
        success: function ( inputData ) {

            data = inputData;

            // data can be add before init() function be called

            controller.addData( inputData );
            controller.init();

        }

    } );



//controller.addData(data);
//controller.setAutoRotation( true, 0.5 );

controller.onCountryPicked( function( select, relate ) {

  console.log( select );
  console.log( relate );

});


$( '#on' ).click(function () {
  controller.setAutoRotation(true, 1);
});
$( '#off' ).click(function () {
  controller.setAutoRotation(false);
});
$( '#clear' ).click(function () {
  controller.clearData();
});



//controller.init();

