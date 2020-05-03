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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/header.js":
/*!********************************!*\
  !*** ./resources/js/header.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$(document).ready(function () {\n  var $logo = $('#logo-default');\n  $('.container-fluid').scroll(function () {\n    var value = $(this).scrollTop();\n\n    if (value > 100 && value <= 200) {\n      $logo.css('opacity', (200 - value) * 0.01);\n    } else if (value <= 100) {\n      $logo.css('opacity', 1);\n    }\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvaGVhZGVyLmpzPzRmNGQiXSwibmFtZXMiOlsiJCIsImRvY3VtZW50IiwicmVhZHkiLCIkbG9nbyIsInNjcm9sbCIsInZhbHVlIiwic2Nyb2xsVG9wIiwiY3NzIl0sIm1hcHBpbmdzIjoiQUFBQUEsQ0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFXO0FBQzVCLE1BQUlDLEtBQUssR0FBR0gsQ0FBQyxDQUFDLGVBQUQsQ0FBYjtBQUVBQSxHQUFDLENBQUMsa0JBQUQsQ0FBRCxDQUFzQkksTUFBdEIsQ0FBNkIsWUFBWTtBQUN4QyxRQUFJQyxLQUFLLEdBQUdMLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUU0sU0FBUixFQUFaOztBQUNBLFFBQUlELEtBQUssR0FBRyxHQUFSLElBQWVBLEtBQUssSUFBSSxHQUE1QixFQUFpQztBQUNoQ0YsV0FBSyxDQUFDSSxHQUFOLENBQVUsU0FBVixFQUFzQixDQUFDLE1BQU1GLEtBQVAsSUFBZ0IsSUFBdEM7QUFDQSxLQUZELE1BRU8sSUFBSUEsS0FBSyxJQUFJLEdBQWIsRUFBa0I7QUFDeEJGLFdBQUssQ0FBQ0ksR0FBTixDQUFVLFNBQVYsRUFBcUIsQ0FBckI7QUFDSztBQUNOLEdBUEQ7QUFRQSxDQVhEIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2hlYWRlci5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuXHR2YXIgJGxvZ28gPSAkKCcjbG9nby1kZWZhdWx0Jyk7XG5cblx0JCgnLmNvbnRhaW5lci1mbHVpZCcpLnNjcm9sbChmdW5jdGlvbiAoKSB7XG5cdFx0dmFyIHZhbHVlID0gJCh0aGlzKS5zY3JvbGxUb3AoKTtcblx0XHRpZiAodmFsdWUgPiAxMDAgJiYgdmFsdWUgPD0gMjAwKSB7XG5cdFx0XHQkbG9nby5jc3MoJ29wYWNpdHknLCAoKDIwMCAtIHZhbHVlKSAqIDAuMDEpKTtcblx0XHR9IGVsc2UgaWYgKHZhbHVlIDw9IDEwMCkge1xuXHRcdFx0JGxvZ28uY3NzKCdvcGFjaXR5JywgMSk7XG4gICAgICBcdH1cblx0fSk7XG59KTsgIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/header.js\n");

/***/ }),

/***/ 2:
/*!**************************************!*\
  !*** multi ./resources/js/header.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/samcoll/Sites/aversions-website/resources/js/header.js */"./resources/js/header.js");


/***/ })

/******/ });