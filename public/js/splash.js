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
/******/ 	return __webpack_require__(__webpack_require__.s = 11);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/splash.js":
/*!********************************!*\
  !*** ./resources/js/splash.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$(document).ready(function () {\n  var classes = ['invert', 'hue-rotate', 'pink', 'normal'];\n\n  function changeImgDisplayToInline(img) {\n    img.css('display', 'inline');\n  }\n\n  function displaySquares() {\n    var time = 100;\n\n    if (window.innerWidth > 500) {\n      $('#square-grid .grid img').each(function () {\n        var $that = $(this);\n        setTimeout(function () {\n          changeImgDisplayToInline($that);\n        }, time);\n        time += 100;\n      });\n    } else {\n      var _loop = function _loop(x) {\n        var img = $(\"#square-grid .grid img\").eq(x);\n        setTimeout(function () {\n          changeImgDisplayToInline(img);\n        }, time);\n        time += 100;\n      };\n\n      for (var x = 0; x < 3; x++) {\n        _loop(x);\n      }\n    }\n  }\n\n  function removeTitleText() {\n    $('.song-title:nth-of-type(1)').remove();\n    setTimeout(function () {\n      $('.song-title:nth-of-type(1)').remove();\n    }, 600);\n    setTimeout(function () {\n      $('#square-grid').remove();\n    }, 1200);\n  }\n\n  function replaceSquaresWithText() {\n    $('#square-grid .grid img').each(function (i) {\n      if (i < 3) {\n        $(this).remove();\n      }\n    });\n    $('#square-grid .grid').prepend('<div class=\"song-title\" id=\"famous\"><h1>Famous</h1></p>');\n    setTimeout(function () {\n      $('#square-grid .grid img').each(function (i) {\n        if (i < 3) {\n          $(this).remove();\n        }\n      });\n      $('<div class=\"song-title\" id=\"last\"><h1>Last</h1></p>').insertAfter('#famous');\n    }, 600);\n    setTimeout(function () {\n      $('#square-grid .grid img').each(function (i) {\n        if (i < 3) {\n          $(this).remove();\n        }\n      });\n      $('<div class=\"song-title\" id=\"lines\"><h1>Lines</h1></p>').insertAfter('#last');\n    }, 1200);\n  }\n\n  var _int = window.setInterval(function () {\n    var randomNum = Math.floor(Math.random() * classes.length);\n    $('#face').removeClass();\n    $('#face').addClass(classes[randomNum]);\n  }, 400);\n\n  setTimeout(function () {\n    $('#face').css('display', 'none');\n    $('#title').css('display', 'flex');\n    setTimeout(function () {\n      $('#title').css('display', 'none');\n      $('#face').css('display', 'block');\n      $('#title h1').text('New Single');\n      setTimeout(function () {\n        $('#face').css('display', 'none');\n        $('#title').css('display', 'flex');\n        setTimeout(function () {\n          $('#face').css('display', 'block');\n          $('#title').css('display', 'none');\n          setTimeout(function () {\n            $('#face').css('display', 'none');\n            $('#square-grid').css('display', 'flex');\n            displaySquares();\n            setTimeout(function () {\n              replaceSquaresWithText();\n              setTimeout(function () {\n                $('#square-grid').addClass('fade-out');\n                setTimeout(function () {\n                  removeTitleText();\n                  $('#single-copy').css('display', 'flex');\n                  setTimeout(function () {\n                    $('#video').css('opacity', 0);\n                  }, 1200);\n                }, 1500);\n              }, 2000);\n            }, 1000);\n          }, 1200);\n        }, 1500);\n      }, 1500);\n    }, 1200);\n  }, 1500);\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc3BsYXNoLmpzPzlhYjEiXSwibmFtZXMiOlsiJCIsImRvY3VtZW50IiwicmVhZHkiLCJjbGFzc2VzIiwiY2hhbmdlSW1nRGlzcGxheVRvSW5saW5lIiwiaW1nIiwiY3NzIiwiZGlzcGxheVNxdWFyZXMiLCJ0aW1lIiwid2luZG93IiwiaW5uZXJXaWR0aCIsImVhY2giLCIkdGhhdCIsInNldFRpbWVvdXQiLCJ4IiwiZXEiLCJyZW1vdmVUaXRsZVRleHQiLCJyZW1vdmUiLCJyZXBsYWNlU3F1YXJlc1dpdGhUZXh0IiwiaSIsInByZXBlbmQiLCJpbnNlcnRBZnRlciIsImludCIsInNldEludGVydmFsIiwicmFuZG9tTnVtIiwiTWF0aCIsImZsb29yIiwicmFuZG9tIiwibGVuZ3RoIiwicmVtb3ZlQ2xhc3MiLCJhZGRDbGFzcyIsInRleHQiXSwibWFwcGluZ3MiOiJBQUFBQSxDQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQVc7QUFDekIsTUFBSUMsT0FBTyxHQUFHLENBQUMsUUFBRCxFQUFXLFlBQVgsRUFBeUIsTUFBekIsRUFBaUMsUUFBakMsQ0FBZDs7QUFDQSxXQUFTQyx3QkFBVCxDQUFtQ0MsR0FBbkMsRUFBeUM7QUFDckNBLE9BQUcsQ0FBQ0MsR0FBSixDQUFRLFNBQVIsRUFBbUIsUUFBbkI7QUFDSDs7QUFDRCxXQUFTQyxjQUFULEdBQTBCO0FBQ3RCLFFBQUlDLElBQUksR0FBRyxHQUFYOztBQUNBLFFBQUdDLE1BQU0sQ0FBQ0MsVUFBUCxHQUFvQixHQUF2QixFQUE0QjtBQUN4QlYsT0FBQyxDQUFDLHdCQUFELENBQUQsQ0FBNEJXLElBQTVCLENBQWlDLFlBQVc7QUFDeEMsWUFBSUMsS0FBSyxHQUFHWixDQUFDLENBQUMsSUFBRCxDQUFiO0FBQ0FhLGtCQUFVLENBQUUsWUFBVztBQUNuQlQsa0NBQXdCLENBQUVRLEtBQUYsQ0FBeEI7QUFDSCxTQUZTLEVBRVBKLElBRk8sQ0FBVjtB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UCxJQUhPLENBQVY7QUFJSCxpQkFQUyxFQU9QLElBUE8sQ0FBVjtBQVFILGVBVlMsRUFVUCxJQVZPLENBQVY7QUFXSCxhQWJTLEVBYVAsSUFiTyxDQUFWO0FBY0gsV0FsQlMsRUFrQlAsSUFsQk8sQ0FBVjtBQW1CSCxTQXRCUyxFQXNCUCxJQXRCTyxDQUFWO0FBdUJILE9BMUJTLEVBMEJQLElBMUJPLENBQVY7QUEyQkgsS0EvQlMsRUErQlAsSUEvQk8sQ0FBVjtBQWdDSCxHQW5DUyxFQW1DUCxJQW5DTyxDQUFWO0FBb0NILENBcEdEIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3NwbGFzaC5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuICAgIHZhciBjbGFzc2VzID0gWydpbnZlcnQnLCAnaHVlLXJvdGF0ZScsICdwaW5rJywgJ25vcm1hbCddO1xuICAgIGZ1bmN0aW9uIGNoYW5nZUltZ0Rpc3BsYXlUb0lubGluZSggaW1nICkge1xuICAgICAgICBpbWcuY3NzKCdkaXNwbGF5JywgJ2lubGluZScpO1xuICAgIH1cbiAgICBmdW5jdGlvbiBkaXNwbGF5U3F1YXJlcygpIHtcbiAgICAgICAgdmFyIHRpbWUgPSAxMDA7XG4gICAgICAgIGlmKHdpbmRvdy5pbm5lcldpZHRoID4gNTAwKSB7XG4gICAgICAgICAgICAkKCcjc3F1YXJlLWdyaWQgLmdyaWQgaW1nJykuZWFjaChmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgICB2YXIgJHRoYXQgPSAkKHRoaXMpO1xuICAgICAgICAgICAgICAgIHNldFRpbWVvdXQoIGZ1bmN0aW9uKCkgeyBcbiAgICAgICAgICAgICAgICAgICAgY2hhbmdlSW1nRGlzcGxheVRvSW5saW5lKCAkdGhhdCApOyBcbiAgICAgICAgICAgICAgICB9LCB0aW1lKTtcbiAgICAgICAgICAgICAgICB0aW1lICs9IDEwMDtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgZm9yKGxldCB4ID0gMDsgeCA8IDM7IHgrKykge1xuICAgICAgICAgICAgICAgIGxldCBpbWcgPSAkKCBcIiNzcXVhcmUtZ3JpZCAuZ3JpZCBpbWdcIiApLmVxKHgpO1xuICAgICAgICAgICAgICAgIHNldFRpbWVvdXQoIGZ1bmN0aW9uKCkgeyBcbiAgICAgICAgICAgICAgICAgICAgY2hhbmdlSW1nRGlzcGxheVRvSW5saW5lKCBpbWcgKTsgXG4gICAgICAgICAgICAgICAgfSwgdGltZSk7XG4gICAgICAgICAgICAgICAgdGltZSArPSAxMDA7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9XG4gICAgZnVuY3Rpb24gcmVtb3ZlVGl0bGVUZXh0KCkge1xuXG4gICAgICAgICQoJy5zb25nLXRpdGxlOm50aC1vZi10eXBlKDEpJykucmVtb3ZlKCk7XG4gICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAkKCcuc29uZy10aXRsZTpudGgtb2YtdHlwZSgxKScpLnJlbW92ZSgpO1xuICAgICAgICB9LCA2MDApO1xuICAgICAgICBzZXRUaW1lb3V0KGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgJCgnI3NxdWFyZS1ncmlkJykucmVtb3ZlKCk7XG4gICAgICAgIH0sIDEyMDApO1xuICAgIH1cbiAgICBmdW5jdGlvbiByZXBsYWNlU3F1YXJlc1dpdGhUZXh0KCkge1xuICAgICAgICAkKCcjc3F1YXJlLWdyaWQgLmdyaWQgaW1nJykuZWFjaChmdW5jdGlvbihpKSB7XG4gICAgICAgICAgICBpZihpIDwgMykge1xuICAgICAgICAgICAgICAgICQodGhpcykucmVtb3ZlKCk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgICAgICAkKCcjc3F1YXJlLWdyaWQgLmdyaWQnKS5wcmVwZW5kKCAnPGRpdiBjbGFzcz1cInNvbmctdGl0bGVcIiBpZD1cImZhbW91c1wiPjxoMT5GYW1vdXM8L2gxPjwvcD4nICk7XG4gICAgICAgIHNldFRpbWVvdXQoIGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgJCgnI3NxdWFyZS1ncmlkIC5ncmlkIGltZycpLmVhY2goZnVuY3Rpb24oaSkge1xuICAgICAgICAgICAgICAgIGlmKGkgPCAzKSB7XG4gICAgICAgICAgICAgICAgICAgICQodGhpcykucmVtb3ZlKCk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAkKCAnPGRpdiBjbGFzcz1cInNvbmctdGl0bGVcIiBpZD1cImxhc3RcIj48aDE+TGFzdDwvaDE+PC9wPicgKS5pbnNlcnRBZnRlciggJyNmYW1vdXMnICk7XG4gICAgICAgIH0sIDYwMCk7XG4gICAgICAgIHNldFRpbWVvdXQoIGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgJCgnI3NxdWFyZS1ncmlkIC5ncmlkIGltZycpLmVhY2goZnVuY3Rpb24oaSkge1xuICAgICAgICAgICAgICAgIGlmKGkgPCAzKSB7XG4gICAgICAgICAgICAgICAgICAgICQodGhpcykucmVtb3ZlKCk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAkKCAnPGRpdiBjbGFzcz1cInNvbmctdGl0bGVcIiBpZD1cImxpbmVzXCI+PGgxPkxpbmVzPC9oMT48L3A+JyApLmluc2VydEFmdGVyKCAnI2xhc3QnICk7XG4gICAgICAgIH0sIDEyMDApO1xuICAgIH1cbiAgICB2YXIgaW50ID0gd2luZG93LnNldEludGVydmFsKCBmdW5jdGlvbigpIHtcbiAgICAgICAgdmFyIHJhbmRvbU51bSA9IE1hdGguZmxvb3IoIE1hdGgucmFuZG9tKCkgKiBjbGFzc2VzLmxlbmd0aCApO1xuICAgICAgICAkKCcjZmFjZScpLnJlbW92ZUNsYXNzKCk7XG4gICAgICAgICQoJyNmYWNlJykuYWRkQ2xhc3MoY2xhc3Nlc1tyYW5kb21OdW1dKTtcbiAgICB9LCA0MDApO1xuICAgIHNldFRpbWVvdXQoIGZ1bmN0aW9uKCkgeyBcbiAgICAgICAgJCgnI2ZhY2UnKS5jc3MoJ2Rpc3BsYXknLCAnbm9uZScpO1xuICAgICAgICAkKCcjdGl0bGUnKS5jc3MoJ2Rpc3BsYXknLCAnZmxleCcpO1xuICAgICAgICBzZXRUaW1lb3V0KCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICQoJyN0aXRsZScpLmNzcygnZGlzcGxheScsICdub25lJyk7XG4gICAgICAgICAgICAkKCcjZmFjZScpLmNzcygnZGlzcGxheScsICdibG9jaycpO1xuICAgICAgICAgICAgJCgnI3RpdGxlIGgxJykudGV4dCgnTmV3IFNpbmdsZScpO1xuICAgICAgICAgICAgc2V0VGltZW91dCggZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAgICAgJCgnI2ZhY2UnKS5jc3MoJ2Rpc3BsYXknLCAnbm9uZScpO1xuICAgICAgICAgICAgICAgICQoJyN0aXRsZScpLmNzcygnZGlzcGxheScsICdmbGV4Jyk7XG4gICAgICAgICAgICAgICAgc2V0VGltZW91dCggZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAgICAgICAgICQoJyNmYWNlJykuY3NzKCdkaXNwbGF5JywgJ2Jsb2NrJyk7XG4gICAgICAgICAgICAgICAgICAgICQoJyN0aXRsZScpLmNzcygnZGlzcGxheScsICdub25lJyk7XG4gICAgICAgICAgICAgICAgICAgIHNldFRpbWVvdXQoIGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgJCgnI2ZhY2UnKS5jc3MoJ2Rpc3BsYXknLCAnbm9uZScpO1xuICAgICAgICAgICAgICAgICAgICAgICAgJCgnI3NxdWFyZS1ncmlkJykuY3NzKCdkaXNwbGF5JywgJ2ZsZXgnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGRpc3BsYXlTcXVhcmVzKCk7XG4gICAgICAgICAgICAgICAgICAgICAgICBzZXRUaW1lb3V0KCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICByZXBsYWNlU3F1YXJlc1dpdGhUZXh0KCk7IFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHNldFRpbWVvdXQoIGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKCcjc3F1YXJlLWdyaWQnKS5hZGRDbGFzcygnZmFkZS1vdXQnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgc2V0VGltZW91dCggZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICByZW1vdmVUaXRsZVRleHQoKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICQoJyNzaW5nbGUtY29weScpLmNzcygnZGlzcGxheScsICdmbGV4Jyk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBzZXRUaW1lb3V0KCBmdW5jdGlvbigpIHtcblxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICQoJyN2aWRlbycpLmNzcygnb3BhY2l0eScsIDApO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfSwgMTIwMCk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0sIDE1MDApO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0sIDIwMDApO1xuICAgICAgICAgICAgICAgICAgICAgICAgfSwgMTAwMCk7XG4gICAgICAgICAgICAgICAgICAgIH0sIDEyMDApO1xuICAgICAgICAgICAgICAgIH0sIDE1MDApO1xuICAgICAgICAgICAgfSwgMTUwMCk7XG4gICAgICAgIH0sIDEyMDApO1xuICAgIH0sIDE1MDApO1xufSk7Il0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/splash.js\n");

/***/ }),

/***/ 11:
/*!**************************************!*\
  !*** multi ./resources/js/splash.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/samcoll/Code/aversions/resources/js/splash.js */"./resources/js/splash.js");


/***/ })

/******/ });