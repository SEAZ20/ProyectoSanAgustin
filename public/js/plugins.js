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

/***/ "./resources/js/plugins.js":
/*!*********************************!*\
  !*** ./resources/js/plugins.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*================================================================================
  Item Name: Materialize - Material Design Admin Template
  Version: 4.0
  Author: PIXINVENT
  Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================*/

/*Preloader*/
$(window).on('load', function () {
  setTimeout(function () {
    $('body').addClass('loaded');
  }, 200);
});
$(function () {
  "use strict";

  var window_width = $(window).width(); // Search class for focus

  $('.header-search-input').focus(function () {
    $(this).parent('div').addClass('header-search-wrapper-focus');
  }).blur(function () {
    $(this).parent('div').removeClass('header-search-wrapper-focus');
  }); // Check first if any of the task is checked

  $('#task-card input:checkbox').each(function () {
    checkbox_check(this);
  }); // Task check box

  $('#task-card input:checkbox').change(function () {
    checkbox_check(this);
  }); // Check Uncheck function

  function checkbox_check(el) {
    if (!$(el).is(':checked')) {
      $(el).next().css('text-decoration', 'none'); // or addClass
    } else {
      $(el).next().css('text-decoration', 'line-through'); //or addClass
    }
  } // Plugin initialization


  $('select').material_select(); // Set checkbox on forms.html to indeterminate

  var indeterminateCheckbox = document.getElementById('indeterminate-checkbox');
  if (indeterminateCheckbox !== null) indeterminateCheckbox.indeterminate = true; // Commom, Translation & Horizontal Dropdown

  $('.dropdown-button, .translation-button, .dropdown-menu').dropdown({
    inDuration: 300,
    outDuration: 225,
    constrainWidth: false,
    hover: true,
    gutter: 0,
    belowOrigin: true,
    alignment: 'left',
    stopPropagation: false
  }); // Notification, Profile & Settings Dropdown

  $('.notification-button, .profile-button, .dropdown-settings').dropdown({
    inDuration: 300,
    outDuration: 225,
    constrainWidth: false,
    hover: true,
    gutter: 0,
    belowOrigin: true,
    alignment: 'right',
    stopPropagation: false
  }); // Materialize scrollSpy

  $('.scrollspy').scrollSpy(); // Materialize tooltip

  $('.tooltipped').tooltip({
    delay: 50
  }); //Main Left Sidebar Menu

  $('.sidebar-collapse').sideNav({
    edge: 'left' // Choose the horizontal origin

  }); // Overlay Menu (Full screen menu)

  $('.menu-sidebar-collapse').sideNav({
    menuWidth: 240,
    edge: 'left',
    // Choose the horizontal origin
    //closeOnClick:true, // Set if default menu open is true
    menuOut: false // Set if default menu open is true

  }); //Main Left Sidebar Chat

  $('.chat-collapse').sideNav({
    menuWidth: 300,
    edge: 'right'
  }); // Pikadate datepicker

  $('.datepicker').pickadate({
    selectMonths: true,
    // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year

  }); // Perfect Scrollbar

  $('select').not('.disabled').material_select();
  var leftnav = $(".page-topbar").height();
  var leftnavHeight = window.innerHeight - leftnav;

  if (!$('#slide-out.leftside-navigation').hasClass('native-scroll')) {
    $('.leftside-navigation').perfectScrollbar({
      suppressScrollX: true
    });
  }

  var righttnav = $("#chat-out").height();
  $('.rightside-navigation').perfectScrollbar({
    suppressScrollX: true
  }); // Fullscreen

  function toggleFullScreen() {
    if (document.fullScreenElement && document.fullScreenElement !== null || !document.mozFullScreen && !document.webkitIsFullScreen) {
      if (document.documentElement.requestFullScreen) {
        document.documentElement.requestFullScreen();
      } else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
      } else if (document.documentElement.webkitRequestFullScreen) {
        document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
      }
    } else {
      if (document.cancelFullScreen) {
        document.cancelFullScreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitCancelFullScreen) {
        document.webkitCancelFullScreen();
      }
    }
  }

  $('.toggle-fullscreen').click(function () {
    toggleFullScreen();
  }); // Toggle Flow Text

  var toggleFlowTextButton = $('#flow-toggle');
  toggleFlowTextButton.click(function () {
    $('#flow-text-demo').children('p').each(function () {
      $(this).toggleClass('flow-text');
    });
  }); // Detect touch screen and enable scrollbar if necessary

  function is_touch_device() {
    try {
      document.createEvent("TouchEvent");
      return true;
    } catch (e) {
      return false;
    }
  }

  if (is_touch_device()) {
    $('#nav-mobile').css({
      overflow: 'auto'
    });
  }
});

/***/ }),

/***/ 1:
/*!***************************************!*\
  !*** multi ./resources/js/plugins.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\contas\resources\js\plugins.js */"./resources/js/plugins.js");


/***/ })

/******/ });