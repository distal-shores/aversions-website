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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/quoteCarousel.js":
/*!***************************************!*\
  !*** ./resources/js/quoteCarousel.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$(document).ready(function () {\n  $('.quote-carousel').slick({\n    adaptiveHeight: true,\n    appendArrows: $('.quote-carousel_arrows'),\n    autoplay: true,\n    autoplaySpeed: 5000,\n    prevArrow: '<button type=\"button\" class=\"carousel-button slick-prev\"></button>',\n    nextArrow: '<button type=\"button\" class=\"carousel-button slick-next\"></button>'\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvcXVvdGVDYXJvdXNlbC5qcz85OTVmIl0sIm5hbWVzIjpbIiQiLCJkb2N1bWVudCIsInJlYWR5Iiwic2xpY2siLCJhZGFwdGl2ZUhlaWdodCIsImFwcGVuZEFycm93cyIsImF1dG9wbGF5IiwiYXV0b3BsYXlTcGVlZCIsInByZXZBcnJvdyIsIm5leHRBcnJvdyJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVztBQUM1QkYsR0FBQyxDQUFDLGlCQUFELENBQUQsQ0FBcUJHLEtBQXJCLENBQTJCO0FBQzFCQyxrQkFBYyxFQUFFLElBRFU7QUFFMUJDLGdCQUFZLEVBQUVMLENBQUMsQ0FBQyx3QkFBRCxDQUZXO0FBRzFCTSxZQUFRLEVBQUUsSUFIZ0I7QUFJMUJDLGlCQUFhLEVBQUUsSUFKVztBQUsxQkMsYUFBUyxFQUFFLG9FQUxlO0FBTTFCQyxhQUFTLEVBQUU7QUFOZSxHQUEzQjtBQVFBLENBVEQiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvcXVvdGVDYXJvdXNlbC5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuXHQkKCcucXVvdGUtY2Fyb3VzZWwnKS5zbGljayh7XG5cdFx0YWRhcHRpdmVIZWlnaHQ6IHRydWUsXG5cdFx0YXBwZW5kQXJyb3dzOiAkKCcucXVvdGUtY2Fyb3VzZWxfYXJyb3dzJyksXG5cdFx0YXV0b3BsYXk6IHRydWUsXG5cdFx0YXV0b3BsYXlTcGVlZDogNTAwMCxcblx0XHRwcmV2QXJyb3c6ICc8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImNhcm91c2VsLWJ1dHRvbiBzbGljay1wcmV2XCI+PC9idXR0b24+Jyxcblx0XHRuZXh0QXJyb3c6ICc8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImNhcm91c2VsLWJ1dHRvbiBzbGljay1uZXh0XCI+PC9idXR0b24+J1xuXHR9KTtcbn0pOyJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/quoteCarousel.js\n");

/***/ }),

/***/ 5:
/*!*********************************************!*\
  !*** multi ./resources/js/quoteCarousel.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/josephross/Sites/aversions-website/resources/js/quoteCarousel.js */"./resources/js/quoteCarousel.js");


/***/ })

/******/ });