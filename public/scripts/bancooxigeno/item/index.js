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
/******/ 	return __webpack_require__(__webpack_require__.s = 168);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/scripts/bancooxigeno/item/index.js":
/*!******************************************************!*\
  !*** ./resources/scripts/bancooxigeno/item/index.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
eval("\n\nwindow.loadWindow = function (id, tipo) {\n  window.location.href = HOST_URL + '/bancooxigeno/item/tab/' + id + '/' + tipo;\n};\n\nwindow.itemDelete = function (id) {\n  Swal.fire({\n    title: 'Esta seguro de borrar el registro?',\n    text: \"Recuerde que el registro se eliminará permanentemente.\",\n    icon: 'warning',\n    showCancelButton: true,\n    confirmButtonText: 'Si, Eliminar!!!',\n    cancelButtonText: \"No, cancelar\"\n  }).then(function (result) {\n    if (result.value) {\n      itemDeleteAction(id);\n    }\n  });\n};\n\nfunction itemDeleteAction(id) {\n  $.ajax({\n    url: HOST_URL + '/bancooxigeno/item/general/' + id,\n    type: 'DELETE'\n  }).done(function (response) {\n    if (response === 1) {\n      Swal.fire({\n        icon: 'success',\n        title: 'El registro fue borrado satisfactoriamente',\n        showConfirmButton: false,\n        timer: 2000\n      });\n      window.table.draw();\n    } else {\n      Swal.fire({\n        icon: 'error',\n        title: 'El registro no puede ser eliminado, primero debe borrar los registros relacionados',\n        showConfirmButton: false,\n        timer: 4000\n      });\n    }\n  });\n}\n\nwindow.itemPrint = function (id) {\n  window.open(HOST_URL + '/bancooxigeno/item/ficha/' + id, '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400');\n};\n\nvar table;\n\nvar KTDatatablesDataSourceAjaxServer = function () {\n  var initTable1 = function initTable1() {\n    window.table = $('#kt_datatable').DataTable({\n      responsive: true,\n      searchDelay: 500,\n      processing: true,\n      serverSide: true,\n      ajax: {\n        url: HOST_URL + '/bancooxigeno/item',\n        type: 'GET'\n      },\n      columns: [{\n        data: 'id',\n        name: 'bi.id',\n        title: 'Acciones'\n      }, {\n        data: 'codigo',\n        name: 'bi.codigo',\n        title: 'Código'\n      }, {\n        data: 'establecimiento',\n        name: 'ce.nombre',\n        title: 'Establecimiento'\n      }, {\n        data: 'fecha_formateada',\n        name: 'bi.fecha',\n        title: 'Fecha'\n      }, {\n        data: 'estado',\n        name: 'bi.estado',\n        title: 'Estado'\n      } //{data: 'Actions', responsivePriority: -1},\n      ],\n      columnDefs: [{\n        targets: 0,\n        searchable: false,\n        width: \"350px\",\n        orderable: false,\n        render: function render(data, type, full, meta) {\n          var ingresar = '<a href=\"javascript:itemPrint(\\'' + data + '\\');\" class=\"btn btn-outline-success btn-sm mr-2 \">' + '<i class=\"fa flaticon-technology \">&nbsp;Imprimir</i>' + '</a>';\n\n          if (full.estado === 'Abierto') {\n            ingresar += '<a href=\"javascript:loadWindow(\\'' + full.id + '\\',\\'update\\');\" class=\"btn btn-outline-primary btn-sm mr-2\">' + '<i class=\"fa flaticon2-menu-4\">&nbsp;Ingresar</i>' + '</a>' + '<a href=\"javascript:itemDelete(\\'' + data + '\\');\" class=\"btn btn-outline-danger btn-sm\">' + '<i class=\"fa flaticon-delete\">&nbsp;Eliminar</i>' + '</a>';\n          } else {\n            ingresar += '';\n          }\n\n          return '<div align=\"center\"> ' + ingresar + ' </div>';\n        }\n      }]\n    });\n  };\n\n  return {\n    //main function to initiate the module\n    init: function init() {\n      initTable1();\n    }\n  };\n}();\n\njQuery(document).ready(function () {\n  KTDatatablesDataSourceAjaxServer.init();\n  $.ajaxSetup({\n    headers: {\n      'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n    }\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvc2NyaXB0cy9iYW5jb294aWdlbm8vaXRlbS9pbmRleC5qcz8xM2EwIl0sIm5hbWVzIjpbIndpbmRvdyIsImxvYWRXaW5kb3ciLCJpZCIsInRpcG8iLCJsb2NhdGlvbiIsImhyZWYiLCJIT1NUX1VSTCIsIml0ZW1EZWxldGUiLCJTd2FsIiwiZmlyZSIsInRpdGxlIiwidGV4dCIsImljb24iLCJzaG93Q2FuY2VsQnV0dG9uIiwiY29uZmlybUJ1dHRvblRleHQiLCJjYW5jZWxCdXR0b25UZXh0IiwidGhlbiIsInJlc3VsdCIsInZhbHVlIiwiaXRlbURlbGV0ZUFjdGlvbiIsIiQiLCJhamF4IiwidXJsIiwidHlwZSIsImRvbmUiLCJyZXNwb25zZSIsInNob3dDb25maXJtQnV0dG9uIiwidGltZXIiLCJ0YWJsZSIsImRyYXciLCJpdGVtUHJpbnQiLCJvcGVuIiwiS1REYXRhdGFibGVzRGF0YVNvdXJjZUFqYXhTZXJ2ZXIiLCJpbml0VGFibGUxIiwiRGF0YVRhYmxlIiwicmVzcG9uc2l2ZSIsInNlYXJjaERlbGF5IiwicHJvY2Vzc2luZyIsInNlcnZlclNpZGUiLCJjb2x1bW5zIiwiZGF0YSIsIm5hbWUiLCJjb2x1bW5EZWZzIiwidGFyZ2V0cyIsInNlYXJjaGFibGUiLCJ3aWR0aCIsIm9yZGVyYWJsZSIsInJlbmRlciIsImZ1bGwiLCJtZXRhIiwiaW5ncmVzYXIiLCJlc3RhZG8iLCJpbml0IiwialF1ZXJ5IiwiZG9jdW1lbnQiLCJyZWFkeSIsImFqYXhTZXR1cCIsImhlYWRlcnMiLCJhdHRyIl0sIm1hcHBpbmdzIjoiQUFBYTs7QUFFYkEsTUFBTSxDQUFDQyxVQUFQLEdBQW9CLFVBQVNDLEVBQVQsRUFBYUMsSUFBYixFQUFtQjtBQUNuQ0gsUUFBTSxDQUFDSSxRQUFQLENBQWdCQyxJQUFoQixHQUF1QkMsUUFBUSxHQUFHLHlCQUFYLEdBQXVDSixFQUF2QyxHQUE0QyxHQUE1QyxHQUFrREMsSUFBekU7QUFDSCxDQUZEOztB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LENBRGI7QUFFSUMsa0JBQVUsRUFBRSxLQUZoQjtBQUdJQyxhQUFLLEVBQUUsT0FIWDtBQUlJQyxpQkFBUyxFQUFFLEtBSmY7QUFLSUMsY0FBTSxFQUFFLGdCQUFTUCxJQUFULEVBQWVqQixJQUFmLEVBQXFCeUIsSUFBckIsRUFBMkJDLElBQTNCLEVBQWlDO0FBQ3JDLGNBQUlDLFFBQVEsR0FBQyxxQ0FBbUNWLElBQW5DLEdBQXdDLHFEQUF4QyxHQUNULHVEQURTLEdBRVQsTUFGSjs7QUFHQSxjQUFJUSxJQUFJLENBQUNHLE1BQUwsS0FBZ0IsU0FBcEIsRUFBOEI7QUFDMUJELG9CQUFRLElBQUksc0NBQW9DRixJQUFJLENBQUM5QyxFQUF6QyxHQUE0QywrREFBNUMsR0FDUixtREFEUSxHQUVSLE1BRlEsR0FHUixtQ0FIUSxHQUc0QnNDLElBSDVCLEdBR2lDLDhDQUhqQyxHQUlSLGtEQUpRLEdBS1IsTUFMSjtBQU1ILFdBUEQsTUFPTztBQUNIVSxvQkFBUSxJQUFJLEVBQVo7QUFDSDs7QUFFRCxpQkFBTywwQkFBMEJBLFFBQTFCLEdBQXFDLFNBQTVDO0FBQ0g7QUFyQkwsT0FEUTtBQWpCNEIsS0FBN0IsQ0FBZjtBQTJDSCxHQTVDRDs7QUE4Q0EsU0FBTztBQUVIO0FBQ0FFLFFBQUksRUFBRSxnQkFBVztBQUNibkIsZ0JBQVU7QUFDYjtBQUxFLEdBQVA7QUFTSCxDQXhEc0MsRUFBdkM7O0FBMERBb0IsTUFBTSxDQUFDQyxRQUFELENBQU4sQ0FBaUJDLEtBQWpCLENBQXVCLFlBQVc7QUFDOUJ2QixrQ0FBZ0MsQ0FBQ29CLElBQWpDO0FBRUFoQyxHQUFDLENBQUNvQyxTQUFGLENBQVk7QUFDUkMsV0FBTyxFQUFFO0FBQ0wsc0JBQWdCckMsQ0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJzQyxJQUE3QixDQUFrQyxTQUFsQztBQURYO0FBREQsR0FBWjtBQUtILENBUkQiLCJmaWxlIjoiLi9yZXNvdXJjZXMvc2NyaXB0cy9iYW5jb294aWdlbm8vaXRlbS9pbmRleC5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xuXG53aW5kb3cubG9hZFdpbmRvdyA9IGZ1bmN0aW9uKGlkLCB0aXBvKSB7XG4gICAgd2luZG93LmxvY2F0aW9uLmhyZWYgPSBIT1NUX1VSTCArICcvYmFuY29veGlnZW5vL2l0ZW0vdGFiLycgKyBpZCArICcvJyArIHRpcG8gO1xufTtcblxud2luZG93Lml0ZW1EZWxldGUgPSBmdW5jdGlvbihpZCl7XG4gICAgU3dhbC5maXJlKHtcbiAgICAgICAgdGl0bGU6ICdFc3RhIHNlZ3VybyBkZSBib3JyYXIgZWwgcmVnaXN0cm8/JyxcbiAgICAgICAgdGV4dDogXCJSZWN1ZXJkZSBxdWUgZWwgcmVnaXN0cm8gc2UgZWxpbWluYXLDoSBwZXJtYW5lbnRlbWVudGUuXCIsXG4gICAgICAgIGljb246ICd3YXJuaW5nJyxcbiAgICAgICAgc2hvd0NhbmNlbEJ1dHRvbjogdHJ1ZSxcbiAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6ICdTaSwgRWxpbWluYXIhISEnLFxuICAgICAgICBjYW5jZWxCdXR0b25UZXh0OiBcIk5vLCBjYW5jZWxhclwiXG4gICAgfSkudGhlbihmdW5jdGlvbihyZXN1bHQpIHtcbiAgICAgICAgaWYgKHJlc3VsdC52YWx1ZSkge1xuICAgICAgICAgICAgaXRlbURlbGV0ZUFjdGlvbihpZCk7XG4gICAgICAgIH1cbiAgICB9KTtcbn07XG5cbmZ1bmN0aW9uIGl0ZW1EZWxldGVBY3Rpb24oaWQpe1xuICAgICQuYWpheCh7XG4gICAgICAgIHVybCA6IEhPU1RfVVJMICsgJy9iYW5jb294aWdlbm8vaXRlbS9nZW5lcmFsLycgKyBpZCxcbiAgICAgICAgdHlwZTogJ0RFTEVURSdcbiAgICB9KS5kb25lKGZ1bmN0aW9uKHJlc3BvbnNlKXtcbiAgICAgICAgaWYgKHJlc3BvbnNlID09PSAxKXtcbiAgICAgICAgICAgIFN3YWwuZmlyZSh7XG4gICAgICAgICAgICAgICAgaWNvbjogJ3N1Y2Nlc3MnLFxuICAgICAgICAgICAgICAgIHRpdGxlOiAnRWwgcmVnaXN0cm8gZnVlIGJvcnJhZG8gc2F0aXNmYWN0b3JpYW1lbnRlJyxcbiAgICAgICAgICAgICAgICBzaG93Q29uZmlybUJ1dHRvbjogZmFsc2UsXG4gICAgICAgICAgICAgICAgdGltZXI6IDIwMDBcbiAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgd2luZG93LnRhYmxlLmRyYXcoKTtcbiAgICAgICAgfWVsc2V7XG4gICAgICAgICAgICBTd2FsLmZpcmUoe1xuICAgICAgICAgICAgICAgIGljb246ICdlcnJvcicsXG4gICAgICAgICAgICAgICAgdGl0bGU6ICdFbCByZWdpc3RybyBubyBwdWVkZSBzZXIgZWxpbWluYWRvLCBwcmltZXJvIGRlYmUgYm9ycmFyIGxvcyByZWdpc3Ryb3MgcmVsYWNpb25hZG9zJyxcbiAgICAgICAgICAgICAgICBzaG93Q29uZmlybUJ1dHRvbjogZmFsc2UsXG4gICAgICAgICAgICAgICAgdGltZXI6IDQwMDBcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgfSk7XG59XG53aW5kb3cuaXRlbVByaW50ID0gZnVuY3Rpb24oaWQpe1xuICAgIHdpbmRvdy5vcGVuKEhPU1RfVVJMICsgJy9iYW5jb294aWdlbm8vaXRlbS9maWNoYS8nICsgaWQsICdfYmxhbmsnLCAndG9vbGJhcj15ZXMsc2Nyb2xsYmFycz15ZXMscmVzaXphYmxlPXllcyx0b3A9NTAwLGxlZnQ9NTAwLHdpZHRoPTQwMCxoZWlnaHQ9NDAwJyk7XG59O1xuXG52YXIgdGFibGU7XG52YXIgS1REYXRhdGFibGVzRGF0YVNvdXJjZUFqYXhTZXJ2ZXIgPSBmdW5jdGlvbigpIHtcbiAgICB2YXIgaW5pdFRhYmxlMSA9IGZ1bmN0aW9uKCkge1xuICAgICAgICB3aW5kb3cudGFibGUgPSAkKCcja3RfZGF0YXRhYmxlJykuRGF0YVRhYmxlKHtcbiAgICAgICAgICAgIHJlc3BvbnNpdmU6IHRydWUsXG4gICAgICAgICAgICBzZWFyY2hEZWxheTogNTAwLFxuICAgICAgICAgICAgcHJvY2Vzc2luZzogdHJ1ZSxcbiAgICAgICAgICAgIHNlcnZlclNpZGU6IHRydWUsXG4gICAgICAgICAgICBhamF4OiB7XG4gICAgICAgICAgICAgICAgdXJsOiBIT1NUX1VSTCArICcvYmFuY29veGlnZW5vL2l0ZW0nLFxuICAgICAgICAgICAgICAgIHR5cGU6ICdHRVQnXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgY29sdW1uczogW1xuICAgICAgICAgICAgICAgIHsgZGF0YTogJ2lkJywgbmFtZTogJ2JpLmlkJywgdGl0bGU6ICdBY2Npb25lcycgfSxcbiAgICAgICAgICAgICAgICB7IGRhdGE6ICdjb2RpZ28nLCBuYW1lOiAnYmkuY29kaWdvJywgdGl0bGU6ICdDw7NkaWdvJyB9LFxuICAgICAgICAgICAgICAgIHsgZGF0YTogJ2VzdGFibGVjaW1pZW50bycsIG5hbWU6ICdjZS5ub21icmUnLCB0aXRsZTogJ0VzdGFibGVjaW1pZW50bycgfSxcbiAgICAgICAgICAgICAgICB7IGRhdGE6ICdmZWNoYV9mb3JtYXRlYWRhJywgbmFtZTogJ2JpLmZlY2hhJywgdGl0bGU6ICdGZWNoYScgfSxcbiAgICAgICAgICAgICAgICB7IGRhdGE6ICdlc3RhZG8nLCBuYW1lOiAnYmkuZXN0YWRvJywgdGl0bGU6ICdFc3RhZG8nIH1cbiAgICAgICAgICAgICAgICAvL3tkYXRhOiAnQWN0aW9ucycsIHJlc3BvbnNpdmVQcmlvcml0eTogLTF9LFxuICAgICAgICAgICAgXSxcbiAgICAgICAgICAgIGNvbHVtbkRlZnM6IFtcbiAgICAgICAgICAgICAgICB7XG4gICAgICAgICAgICAgICAgICAgIHRhcmdldHM6IDAsXG4gICAgICAgICAgICAgICAgICAgIHNlYXJjaGFibGU6IGZhbHNlLFxuICAgICAgICAgICAgICAgICAgICB3aWR0aDogXCIzNTBweFwiLFxuICAgICAgICAgICAgICAgICAgICBvcmRlcmFibGU6IGZhbHNlLFxuICAgICAgICAgICAgICAgICAgICByZW5kZXI6IGZ1bmN0aW9uKGRhdGEsIHR5cGUsIGZ1bGwsIG1ldGEpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhciBpbmdyZXNhcj0nPGEgaHJlZj1cImphdmFzY3JpcHQ6aXRlbVByaW50KFxcJycrZGF0YSsnXFwnKTtcIiBjbGFzcz1cImJ0biBidG4tb3V0bGluZS1zdWNjZXNzIGJ0bi1zbSBtci0yIFwiPicrXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJzxpIGNsYXNzPVwiZmEgZmxhdGljb24tdGVjaG5vbG9neSBcIj4mbmJzcDtJbXByaW1pcjwvaT4nK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICc8L2E+JztcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmIChmdWxsLmVzdGFkbyA9PT0gJ0FiaWVydG8nKXtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpbmdyZXNhciArPSAnPGEgaHJlZj1cImphdmFzY3JpcHQ6bG9hZFdpbmRvdyhcXCcnK2Z1bGwuaWQrJ1xcJyxcXCd1cGRhdGVcXCcpO1wiIGNsYXNzPVwiYnRuIGJ0bi1vdXRsaW5lLXByaW1hcnkgYnRuLXNtIG1yLTJcIj4nK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAnPGkgY2xhc3M9XCJmYSBmbGF0aWNvbjItbWVudS00XCI+Jm5ic3A7SW5ncmVzYXI8L2k+JytcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJzwvYT4nK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAnPGEgaHJlZj1cImphdmFzY3JpcHQ6aXRlbURlbGV0ZShcXCcnK2RhdGErJ1xcJyk7XCIgY2xhc3M9XCJidG4gYnRuLW91dGxpbmUtZGFuZ2VyIGJ0bi1zbVwiPicrXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICc8aSBjbGFzcz1cImZhIGZsYXRpY29uLWRlbGV0ZVwiPiZuYnNwO0VsaW1pbmFyPC9pPicrXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICc8L2E+JztcbiAgICAgICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaW5ncmVzYXIgKz0gJyc7XG4gICAgICAgICAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIHJldHVybiAnPGRpdiBhbGlnbj1cImNlbnRlclwiPiAnICsgaW5ncmVzYXIgKyAnIDwvZGl2Pic7XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgXSxcbiAgICAgICAgfSk7XG4gICAgfTtcblxuICAgIHJldHVybiB7XG5cbiAgICAgICAgLy9tYWluIGZ1bmN0aW9uIHRvIGluaXRpYXRlIHRoZSBtb2R1bGVcbiAgICAgICAgaW5pdDogZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICBpbml0VGFibGUxKCk7XG4gICAgICAgIH0sXG5cbiAgICB9O1xuXG59KCk7XG5cbmpRdWVyeShkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7XG4gICAgS1REYXRhdGFibGVzRGF0YVNvdXJjZUFqYXhTZXJ2ZXIuaW5pdCgpO1xuXG4gICAgJC5hamF4U2V0dXAoe1xuICAgICAgICBoZWFkZXJzOiB7XG4gICAgICAgICAgICAnWC1DU1JGLVRPS0VOJzogJCgnbWV0YVtuYW1lPVwiY3NyZi10b2tlblwiXScpLmF0dHIoJ2NvbnRlbnQnKVxuICAgICAgICB9XG4gICAgfSk7XG59KTtcblxuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/scripts/bancooxigeno/item/index.js\n");

/***/ }),

/***/ 168:
/*!************************************************************!*\
  !*** multi ./resources/scripts/bancooxigeno/item/index.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\gitlab\salud.asuss.gob.bo\resources\scripts\bancooxigeno\item\index.js */"./resources/scripts/bancooxigeno/item/index.js");


/***/ })

/******/ });