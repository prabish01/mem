/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/js/app.js":
/*!************************************!*\
  !*** ./resources/assets/js/app.js ***!
  \************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
var app = new Vue({
  el: '#app'
});

/***/ }),

/***/ "./resources/assets/sass/app.scss":
/*!****************************************!*\
  !*** ./resources/assets/sass/app.scss ***!
  \****************************************/
/***/ (() => {

throw new Error("Module build failed (from ./node_modules/mini-css-extract-plugin/dist/loader.js):\nModuleBuildError: Module build failed (from ./node_modules/sass-loader/dist/cjs.js):\nSassError: Can't find stylesheet to import.\n  ╷\n9 │ @import '~bootstrap/scss/bootstrap';\n  │         ^^^^^^^^^^^^^^^^^^^^^^^^^^^\n  ╵\n  resources/assets/sass/app.scss 9:9  root stylesheet\n    at processResult (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/webpack/lib/NormalModule.js:891:19)\n    at /Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/webpack/lib/NormalModule.js:1037:5\n    at /Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/loader-runner/lib/LoaderRunner.js:400:11\n    at /Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/loader-runner/lib/LoaderRunner.js:252:18\n    at context.callback (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/loader-runner/lib/LoaderRunner.js:124:13)\n    at Object.loader (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/sass-loader/dist/index.js:69:5)");

/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ (() => {

throw new Error("Module build failed (from ./node_modules/mini-css-extract-plugin/dist/loader.js):\nModuleBuildError: Module build failed (from ./node_modules/postcss-loader/dist/cjs.js):\nError [ERR_REQUIRE_ESM]: require() of ES Module /Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/postcss.config.js from /Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/cosmiconfig/dist/loaders.js not supported.\nInstead change the require of postcss.config.js in /Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/cosmiconfig/dist/loaders.js to a dynamic import() which is available in all CommonJS modules.\n    at module.exports (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/import-fresh/index.js:33:91)\n    at loadJs (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/cosmiconfig/dist/loaders.js:16:18)\n    at Explorer.loadFileContent (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/cosmiconfig/dist/Explorer.js:84:32)\n    at Explorer.createCosmiconfigResult (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/cosmiconfig/dist/Explorer.js:89:36)\n    at Explorer.loadSearchPlace (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/cosmiconfig/dist/Explorer.js:70:31)\n    at async Explorer.searchDirectory (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/cosmiconfig/dist/Explorer.js:55:27)\n    at async run (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/cosmiconfig/dist/Explorer.js:35:22)\n    at async cacheWrapper (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/cosmiconfig/dist/cacheWrapper.js:16:18)\n    at async cacheWrapper (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/cosmiconfig/dist/cacheWrapper.js:16:18)\n    at async cacheWrapper (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/cosmiconfig/dist/cacheWrapper.js:16:18)\n    at async Explorer.search (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/cosmiconfig/dist/Explorer.js:27:20)\n    at async loadConfig (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/postcss-loader/dist/utils.js:68:16)\n    at async Object.loader (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/postcss-loader/dist/index.js:54:22)\n    at processResult (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/webpack/lib/NormalModule.js:891:19)\n    at /Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/webpack/lib/NormalModule.js:1037:5\n    at /Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/loader-runner/lib/LoaderRunner.js:400:11\n    at /Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/loader-runner/lib/LoaderRunner.js:252:18\n    at context.callback (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/loader-runner/lib/LoaderRunner.js:124:13)\n    at Object.loader (/Users/prabishdangi/Downloads/MEM/backup-mem.com.np-2-24-2025/mem_code/node_modules/postcss-loader/dist/index.js:56:7)");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	__webpack_modules__["./resources/assets/js/app.js"](0, {}, __webpack_require__);
/******/ 	// This entry module doesn't tell about it's top-level declarations so it can't be inlined
/******/ 	__webpack_modules__["./resources/assets/sass/app.scss"](0, {}, __webpack_require__);
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/css/app.css"](0, __webpack_exports__, __webpack_require__);
/******/ 	
/******/ })()
;