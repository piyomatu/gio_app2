/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/script.js":
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var container = document.getElementById("globalArea"); //config用のオプション設定

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
var controller = new GIO.Controller(container, config);
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

$.ajax({
  url: 'data/sampleData.json',
  type: "GET",
  contentType: "application/json; charset=utf-8",
  async: true,
  dataType: "json",
  success: function success(inputData) {
    data = inputData; // data can be add before init() function be called

    controller.addData(inputData);
    $("#on").on('click', function () {
      // can use clearData API to clear data in globe
      controller.setAutoRotation(true, 0.5);
    });
    $("#off").on('click', function () {
      // can use clearData API to clear data in globe
      controller.setAutoRotation(false);
    });
    $("#add").on('click', function () {
      // can use clearData API to clear data in globe
      //alert("クリックされました");
      controller.addData(data);
    });
    $("#clear").on('click', function () {
      // can use clearData API to clear data in globe
      controller.clearData();
    });
    controller.init();
  }
});
console.log($.fn.jquery);
controller.onCountryPicked(function (select, relate) {
  console.log(select);
  console.log(relate);
}); // data can be add after init() function be called, after add new data, the system will be automatically updated
//controller.init();

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/script.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/gio_app2/resources/js/script.js */"./resources/js/script.js");


/***/ })

/******/ });