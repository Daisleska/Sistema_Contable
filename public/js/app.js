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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
Template Name: Shreyu - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 1.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Main Js File
*/
!function ($) {
  "use strict";

  var Components = function Components() {}; //initializing tooltip


  Components.prototype.initTooltipPlugin = function () {
    $.fn.tooltip && $('[data-toggle="tooltip"]').tooltip();
  }, //initializing popover
  Components.prototype.initPopoverPlugin = function () {
    $.fn.popover && $('[data-toggle="popover"]').popover();
  }, //initializing Slimscroll
  Components.prototype.initSlimScrollPlugin = function () {
    //You can change the color of scroll bar here
    $.fn.slimScroll && $(".slimscroll").slimScroll({
      height: 'auto',
      position: 'right',
      size: "4px",
      touchScrollStep: 20,
      color: '#9ea5ab'
    });
  }, //initializing form validation
  Components.prototype.initFormValidation = function () {
    $(".needs-validation").on('submit', function (event) {
      $(this).addClass('was-validated');

      if ($(this)[0].checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        return false;
      }

      return true;
    });
  }, //initilizing
  Components.prototype.init = function () {
    var $this = this;
    this.initTooltipPlugin(), this.initPopoverPlugin(), this.initSlimScrollPlugin(), this.initFormValidation();
  }, $.Components = new Components(), $.Components.Constructor = Components;
}(window.jQuery), function ($) {
  'use strict';

  var App = function App() {
    this.$body = $('body'), this.$window = $(window);
  };
  /**
  Resets the scroll
  */


  App.prototype._resetSidebarScroll = function () {
    // sidebar - scroll container
    $('.slimscroll-menu').slimscroll({
      height: 'auto',
      position: 'right',
      size: "4px",
      color: '#9ea5ab',
      wheelStep: 5,
      touchScrollStep: 20
    });
  },
  /** 
   * Initlizes the menu - top and sidebar
  */
  App.prototype.initMenu = function () {
    var $this = this; // Left menu collapse

    $('.button-menu-mobile').on('click', function (event) {
      event.preventDefault();
      var layout = $this.$body.data('layout');

      if (layout === 'topnav') {
        $(this).toggleClass('open');
        $('#topnav-menu-content').slideToggle(400);
      } else {
        $this.$body.toggleClass('sidebar-enable');

        if ($this.$window.width() >= 768) {
          $this.$body.toggleClass('left-side-menu-condensed');
        } else {
          $this.$body.removeClass('left-side-menu-condensed');
        } // sidebar - scroll container


        $this._resetSidebarScroll();
      }
    }); // sidebar - main menu
    // activate the menu in left side bar based on url

    var layout = $this.$body.data('layout');

    if ($('#menu-bar').length) {
      if (layout !== 'topnav') {
        // init menu
        new MetisMenu('#menu-bar'); // sidebar - scroll container

        $this._resetSidebarScroll();

        $("#menu-bar a").each(function () {
          var pageUrl = window.location.href.split(/[?#]/)[0];

          if (this.href == pageUrl) {
            $(this).addClass("active");
            $(this).parent().addClass("mm-active"); // add active to li of the current link

            $(this).parent().parent().addClass("mm-show");
            $(this).parent().parent().prev().addClass("active"); // add active class to an anchor

            $(this).parent().parent().parent().addClass("mm-active");
            $(this).parent().parent().parent().parent().addClass("mm-show"); // add active to li of the current link

            $(this).parent().parent().parent().parent().parent().addClass("mm-active");
          }
        });
      } else {
        var menuRef = new MetisMenu('#menu-bar').on('shown.metisMenu', function (event) {
          window.addEventListener('click', function menuClick(e) {
            if (!event.target.contains(e.target)) {
              menuRef.hide(event.detail.shownElement);
              window.removeEventListener('click', menuClick);
            }
          });
        });
        $("#menu-bar a").each(function () {
          var pageUrl = window.location.href.split(/[?#]/)[0];

          if (this.href == pageUrl) {
            $(this).addClass("active");
            $(this).parent().addClass("active"); // add active to li of the current link

            $(this).parent().parent().prev().addClass("active"); // add active class to an anchor

            $(this).parent().parent().parent().addClass("active");
            $(this).parent().parent().parent().parent().parent().addClass("active");
          }
        });
      }
    } // right side-bar toggle


    $('.right-bar-toggle').on('click', function (e) {
      $('body').toggleClass('right-bar-enabled');
    });
    $(document).on('click', 'body', function (e) {
      if ($(e.target).closest('.right-bar-toggle, .right-bar').length > 0) {
        return;
      }

      if ($(e.target).closest('.left-side-menu, .side-nav').length > 0 || $(e.target).hasClass('button-menu-mobile') || $(e.target).closest('.button-menu-mobile').length > 0) {
        return;
      }

      $('body').removeClass('right-bar-enabled');
      $('body').removeClass('sidebar-enable');
      return;
    }); // activate topnav menu
    // $('#topnav-menu li a').each(function () {
    //     var pageUrl = window.location.href.split(/[?#]/)[0];
    //     if (this.href == pageUrl) {
    //         $(this).addClass('active');
    //         $(this).parent().parent().addClass('active'); // add active to li of the current link
    //         $(this).parent().parent().parent().parent().addClass('active');
    //         $(this).parent().parent().parent().parent().parent().parent().addClass('active');
    //     }
    // });
    // // horizontal menu
    // $('#topnav-menu .dropdown-menu a.dropdown-toggle').on('click', function () {
    //     console.log("hello");
    //     if (
    //         !$(this)
    //             .next()
    //             .hasClass('show')
    //     ) {
    //         $(this)
    //             .parents('.dropdown-menu')
    //             .first()
    //             .find('.show')
    //             .removeClass('show');
    //     }
    //     var $subMenu = $(this).next('.dropdown-menu');
    //     $subMenu.toggleClass('show');
    //     return false;
    // });
    // Preloader

    $(window).on('load', function () {
      $('#status').fadeOut();
      $('#preloader').delay(350).fadeOut('slow');
    });
  },
  /** 
   * Init the layout - with broad sidebar or compact side bar
  */
  App.prototype.initLayout = function () {
    // in case of small size, add class enlarge to have minimal menu
    if (this.$window.width() >= 768 && this.$window.width() <= 1024) {
      this.$body.addClass('left-side-menu-condensed');
    } else {
      if (this.$body.data('left-keep-condensed') != true) {
        this.$body.removeClass('left-side-menu-condensed');
      }
    } // if the layout is scrollable - let's remove the slimscroll class from menu


    if (this.$body.hasClass('scrollable-layout')) {
      $('#sidebar-menu').removeClass("slimscroll-menu");
    }
  }, //initilizing
  App.prototype.init = function () {
    var $this = this;
    this.initLayout();
    this.initMenu();
    $.Components.init(); // on window resize, make menu flipped automatically

    $this.$window.on('resize', function (e) {
      e.preventDefault();
      $this.initLayout();

      $this._resetSidebarScroll();
    }); // feather

    feather.replace();
  }, $.App = new App(), $.App.Constructor = App;
}(window.jQuery), //initializing main application module
function ($) {
  "use strict";

  $.App.init();
}(window.jQuery);

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/css-loader/index.js):\nModuleBuildError: Module build failed (from ./node_modules/sass-loader/dist/cjs.js):\n\r\n@import '../../node_modules/metismenujs/scss/metismenujs';\r\n       ^\r\n      Can't find stylesheet to import.\n  ╷\n2 │ @import '../../node_modules/metismenujs/scss/metismenujs';\r\n  │         ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^\n  ╵\n  resources\\sass\\custom\\plugins\\_metismenu.scss 2:9  @import\n  stdin 99:9                                         root stylesheet\r\n      in C:\\xampp\\htdocs\\Sistema_Contable\\resources\\sass\\custom\\plugins\\_metismenu.scss (line 2, column 9)\n    at C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\webpack\\lib\\NormalModule.js:316:20\n    at C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\loader-runner\\lib\\LoaderRunner.js:367:11\n    at C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\loader-runner\\lib\\LoaderRunner.js:233:18\n    at context.callback (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\loader-runner\\lib\\LoaderRunner.js:111:13)\n    at C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass-loader\\dist\\index.js:89:7\n    at Function.call$2 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:87203:16)\n    at _render_closure1.call$2 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:76994:12)\n    at _RootZone.runBinary$3$3 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:25521:18)\n    at _RootZone.runBinary$3 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:25525:19)\n    at _FutureListener.handleError$1 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:23975:19)\n    at _Future__propagateToListeners_handleError.call$0 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:24271:40)\n    at Object._Future__propagateToListeners (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:3500:88)\n    at _Future._completeError$2 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:24099:9)\n    at _AsyncAwaitCompleter.completeError$2 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:23491:12)\n    at Object._asyncRethrow (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:3256:17)\n    at C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:13326:20\n    at _wrapJsFunctionForAsync_closure.$protected (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:3279:15)\n    at _wrapJsFunctionForAsync_closure.call$2 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:23512:12)\n    at _awaitOnObject_closure0.call$2 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:23504:25)\n    at _RootZone.runBinary$3$3 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:25521:18)\n    at _RootZone.runBinary$3 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:25525:19)\n    at _FutureListener.handleError$1 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:23975:19)\n    at _Future__propagateToListeners_handleError.call$0 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:24271:40)\n    at Object._Future__propagateToListeners (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:3500:88)\n    at _Future._completeError$2 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:24099:9)\n    at _AsyncAwaitCompleter.completeError$2 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:23491:12)\n    at Object._asyncRethrow (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:3256:17)\n    at C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:15981:20\n    at _wrapJsFunctionForAsync_closure.$protected (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:3279:15)\n    at _wrapJsFunctionForAsync_closure.call$2 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:23512:12)\n    at _awaitOnObject_closure0.call$2 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:23504:25)\n    at _RootZone.runBinary$3$3 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:25521:18)\n    at _RootZone.runBinary$3 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:25525:19)\n    at _FutureListener.handleError$1 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:23975:19)\n    at _Future__propagateToListeners_handleError.call$0 (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:24271:40)\n    at Object._Future__propagateToListeners (C:\\xampp\\htdocs\\Sistema_Contable\\node_modules\\sass\\sass.dart.js:3500:88)");

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xampp\htdocs\Sistema_Contable\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\Sistema_Contable\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });