"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Admin_views_Tables_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/components/Cards/CardAuthorTable.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/components/Cards/CardAuthorTable.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: {
    data: {
      type: Array,
      "default": function _default() {
        return [];
      }
    },
    columns: {
      type: Array,
      "default": function _default() {
        return [];
      }
    }
  },
  data: function data() {
    return {
      // Active button for the "Authors" table's card header radio button group.
      authorsHeaderBtns: 'all'
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/components/Cards/CardProjectTable2.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/components/Cards/CardProjectTable2.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: {
    data: {
      type: Array,
      "default": function _default() {
        return [];
      }
    },
    columns: {
      type: Array,
      "default": function _default() {
        return [];
      }
    }
  },
  data: function data() {
    return {
      // Active button for the "Projects" table's card header radio button group.
      projectHeaderBtns: 'all'
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/views/Tables.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/views/Tables.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _components_Cards_CardAuthorTable__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../components/Cards/CardAuthorTable */ "./resources/js/Admin/components/Cards/CardAuthorTable.vue");
/* harmony import */ var _components_Cards_CardProjectTable2__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components/Cards/CardProjectTable2 */ "./resources/js/Admin/components/Cards/CardProjectTable2.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
// "Authors" table component.
 // "Projects" table component.

 // "Authors" table list of columns and their properties.

var table1Columns = [{
  title: 'AUTHOR',
  dataIndex: 'author',
  scopedSlots: {
    customRender: 'author'
  }
}, {
  title: 'FUNCTION',
  dataIndex: 'func',
  scopedSlots: {
    customRender: 'func'
  }
}, {
  title: 'STATUS',
  dataIndex: 'status',
  scopedSlots: {
    customRender: 'status'
  }
}, {
  title: 'EMPLOYED',
  dataIndex: 'employed',
  "class": 'text-muted'
}, {
  title: '',
  scopedSlots: {
    customRender: 'editBtn'
  },
  width: 50
}]; // "Authors" table list of rows and their properties.

var table1Data = [{
  key: '1',
  author: {
    avatar: 'images/face-2.jpg',
    name: 'Michael John',
    email: 'michael@mail.com'
  },
  func: {
    job: 'Manager',
    department: 'Organization'
  },
  status: 1,
  employed: '23/04/18'
}, {
  key: '2',
  author: {
    avatar: 'images/face-3.jpg',
    name: 'Alexa Liras',
    email: 'alexa@mail.com'
  },
  func: {
    job: 'Programator',
    department: 'Developer'
  },
  status: 0,
  employed: '23/12/20'
}, {
  key: '3',
  author: {
    avatar: 'images/face-1.jpg',
    name: 'Laure Perrier',
    email: 'laure@mail.com'
  },
  func: {
    job: 'Executive',
    department: 'Projects'
  },
  status: 1,
  employed: '13/04/19'
}, {
  key: '4',
  author: {
    avatar: 'images/face-4.jpg',
    name: 'Miriam Eric',
    email: 'miriam@mail.com'
  },
  func: {
    job: 'Marketing',
    department: 'Organization'
  },
  status: 1,
  employed: '03/04/21'
}, {
  key: '5',
  author: {
    avatar: 'images/face-5.jpeg',
    name: 'Richard Gran',
    email: 'richard@mail.com'
  },
  func: {
    job: 'Manager',
    department: 'Organization'
  },
  status: 0,
  employed: '23/03/20'
}, {
  key: '6',
  author: {
    avatar: 'images/face-6.jpeg',
    name: 'John Levi',
    email: 'john@mail.com'
  },
  func: {
    job: 'Tester',
    department: 'Developer'
  },
  status: 0,
  employed: '14/04/17'
}]; // "Projects" table list of columns and their properties.

var table2Columns = [{
  title: 'COMPANIES',
  dataIndex: 'company',
  scopedSlots: {
    customRender: 'company'
  },
  width: 300
}, {
  title: 'BUDGET',
  dataIndex: 'budget',
  "class": 'font-semibold text-muted'
}, {
  title: 'STATUS',
  dataIndex: 'status',
  "class": 'font-semibold text-muted text-sm'
}, {
  title: 'COMPLETION',
  scopedSlots: {
    customRender: 'completion'
  },
  dataIndex: 'completion'
}, {
  title: '',
  scopedSlots: {
    customRender: 'editBtn'
  },
  width: 50
}]; // "Projects" table list of rows and their properties.

var table2Data = [{
  key: '1',
  company: {
    name: 'Spotify Version',
    logo: 'images/logos/logo-spotify.svg'
  },
  status: "working",
  budget: '$14,000',
  completion: 60
}, {
  key: '2',
  company: {
    name: 'Progress Track',
    logo: 'images/logos/logo-atlassian.svg'
  },
  status: "working",
  budget: '$3,000',
  completion: 10
}, {
  key: '3',
  company: {
    name: 'Jira Platform Errors',
    logo: 'images/logos/logo-slack.svg'
  },
  status: "done",
  budget: 'Not Set',
  completion: {
    status: 'success',
    value: 100
  }
}, {
  key: '4',
  company: {
    name: 'Launch new Mobile App',
    logo: 'images/logos/logo-spotify.svg'
  },
  status: "canceled",
  budget: '$20,600',
  completion: {
    status: 'exception',
    value: 50
  }
}, {
  key: '5',
  company: {
    name: 'Web Dev',
    logo: 'images/logos/logo-webdev.svg'
  },
  status: "working",
  budget: '$4,000',
  completion: 80
}, {
  key: '6',
  company: {
    name: 'Redesign Online Store',
    logo: 'images/logos/logo-invision.svg'
  },
  status: "canceled",
  budget: '$2,000',
  completion: {
    status: 'exception',
    value: 0
  }
}];
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  components: {
    CardAuthorTable: _components_Cards_CardAuthorTable__WEBPACK_IMPORTED_MODULE_0__.default,
    CardProjectTable2: _components_Cards_CardProjectTable2__WEBPACK_IMPORTED_MODULE_1__.default
  },
  data: function data() {
    return {
      // Associating "Authors" table data with its corresponding property.
      table1Data: table1Data,
      // Associating "Authors" table columns with its corresponding property.
      table1Columns: table1Columns,
      // Associating "Projects" table data with its corresponding property.
      table2Data: table2Data,
      // Associating "Projects" table columns with its corresponding property.
      table2Columns: table2Columns
    };
  }
});

/***/ }),

/***/ "./resources/js/Admin/components/Cards/CardAuthorTable.vue":
/*!*****************************************************************!*\
  !*** ./resources/js/Admin/components/Cards/CardAuthorTable.vue ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _CardAuthorTable_vue_vue_type_template_id_60a9028c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CardAuthorTable.vue?vue&type=template&id=60a9028c& */ "./resources/js/Admin/components/Cards/CardAuthorTable.vue?vue&type=template&id=60a9028c&");
/* harmony import */ var _CardAuthorTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CardAuthorTable.vue?vue&type=script&lang=js& */ "./resources/js/Admin/components/Cards/CardAuthorTable.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _CardAuthorTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _CardAuthorTable_vue_vue_type_template_id_60a9028c___WEBPACK_IMPORTED_MODULE_0__.render,
  _CardAuthorTable_vue_vue_type_template_id_60a9028c___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Admin/components/Cards/CardAuthorTable.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Admin/components/Cards/CardProjectTable2.vue":
/*!*******************************************************************!*\
  !*** ./resources/js/Admin/components/Cards/CardProjectTable2.vue ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _CardProjectTable2_vue_vue_type_template_id_e8a03a34___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CardProjectTable2.vue?vue&type=template&id=e8a03a34& */ "./resources/js/Admin/components/Cards/CardProjectTable2.vue?vue&type=template&id=e8a03a34&");
/* harmony import */ var _CardProjectTable2_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CardProjectTable2.vue?vue&type=script&lang=js& */ "./resources/js/Admin/components/Cards/CardProjectTable2.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _CardProjectTable2_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _CardProjectTable2_vue_vue_type_template_id_e8a03a34___WEBPACK_IMPORTED_MODULE_0__.render,
  _CardProjectTable2_vue_vue_type_template_id_e8a03a34___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Admin/components/Cards/CardProjectTable2.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Admin/views/Tables.vue":
/*!*********************************************!*\
  !*** ./resources/js/Admin/views/Tables.vue ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Tables_vue_vue_type_template_id_04880c24___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Tables.vue?vue&type=template&id=04880c24& */ "./resources/js/Admin/views/Tables.vue?vue&type=template&id=04880c24&");
/* harmony import */ var _Tables_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Tables.vue?vue&type=script&lang=js& */ "./resources/js/Admin/views/Tables.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _Tables_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _Tables_vue_vue_type_template_id_04880c24___WEBPACK_IMPORTED_MODULE_0__.render,
  _Tables_vue_vue_type_template_id_04880c24___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Admin/views/Tables.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Admin/components/Cards/CardAuthorTable.vue?vue&type=script&lang=js&":
/*!******************************************************************************************!*\
  !*** ./resources/js/Admin/components/Cards/CardAuthorTable.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CardAuthorTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CardAuthorTable.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/components/Cards/CardAuthorTable.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CardAuthorTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Admin/components/Cards/CardProjectTable2.vue?vue&type=script&lang=js&":
/*!********************************************************************************************!*\
  !*** ./resources/js/Admin/components/Cards/CardProjectTable2.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CardProjectTable2_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CardProjectTable2.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/components/Cards/CardProjectTable2.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CardProjectTable2_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Admin/views/Tables.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./resources/js/Admin/views/Tables.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Tables_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Tables.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/views/Tables.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Tables_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Admin/components/Cards/CardAuthorTable.vue?vue&type=template&id=60a9028c&":
/*!************************************************************************************************!*\
  !*** ./resources/js/Admin/components/Cards/CardAuthorTable.vue?vue&type=template&id=60a9028c& ***!
  \************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CardAuthorTable_vue_vue_type_template_id_60a9028c___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CardAuthorTable_vue_vue_type_template_id_60a9028c___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CardAuthorTable_vue_vue_type_template_id_60a9028c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CardAuthorTable.vue?vue&type=template&id=60a9028c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/components/Cards/CardAuthorTable.vue?vue&type=template&id=60a9028c&");


/***/ }),

/***/ "./resources/js/Admin/components/Cards/CardProjectTable2.vue?vue&type=template&id=e8a03a34&":
/*!**************************************************************************************************!*\
  !*** ./resources/js/Admin/components/Cards/CardProjectTable2.vue?vue&type=template&id=e8a03a34& ***!
  \**************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CardProjectTable2_vue_vue_type_template_id_e8a03a34___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CardProjectTable2_vue_vue_type_template_id_e8a03a34___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CardProjectTable2_vue_vue_type_template_id_e8a03a34___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CardProjectTable2.vue?vue&type=template&id=e8a03a34& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/components/Cards/CardProjectTable2.vue?vue&type=template&id=e8a03a34&");


/***/ }),

/***/ "./resources/js/Admin/views/Tables.vue?vue&type=template&id=04880c24&":
/*!****************************************************************************!*\
  !*** ./resources/js/Admin/views/Tables.vue?vue&type=template&id=04880c24& ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Tables_vue_vue_type_template_id_04880c24___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Tables_vue_vue_type_template_id_04880c24___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Tables_vue_vue_type_template_id_04880c24___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Tables.vue?vue&type=template&id=04880c24& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/views/Tables.vue?vue&type=template&id=04880c24&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/components/Cards/CardAuthorTable.vue?vue&type=template&id=60a9028c&":
/*!***************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/components/Cards/CardAuthorTable.vue?vue&type=template&id=60a9028c& ***!
  \***************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "a-card",
    {
      staticClass: "header-solid h-full",
      attrs: { bordered: false, bodyStyle: { padding: 0 } },
      scopedSlots: _vm._u([
        {
          key: "title",
          fn: function() {
            return [
              _c(
                "a-row",
                { attrs: { type: "flex", align: "middle" } },
                [
                  _c("a-col", { attrs: { span: 24, md: 12 } }, [
                    _c("h5", { staticClass: "font-semibold m-0" }, [
                      _vm._v("Authors Table")
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "a-col",
                    {
                      staticStyle: {
                        display: "flex",
                        "align-items": "center",
                        "justify-content": "flex-end"
                      },
                      attrs: { span: 24, md: 12 }
                    },
                    [
                      _c(
                        "a-radio-group",
                        {
                          attrs: { size: "small" },
                          model: {
                            value: _vm.authorsHeaderBtns,
                            callback: function($$v) {
                              _vm.authorsHeaderBtns = $$v
                            },
                            expression: "authorsHeaderBtns"
                          }
                        },
                        [
                          _c("a-radio-button", { attrs: { value: "all" } }, [
                            _vm._v("ALL")
                          ]),
                          _vm._v(" "),
                          _c("a-radio-button", { attrs: { value: "online" } }, [
                            _vm._v("ONLINE")
                          ])
                        ],
                        1
                      )
                    ],
                    1
                  )
                ],
                1
              )
            ]
          },
          proxy: true
        }
      ])
    },
    [
      _vm._v(" "),
      _c("a-table", {
        attrs: {
          columns: _vm.columns,
          "data-source": _vm.data,
          pagination: false
        },
        scopedSlots: _vm._u([
          {
            key: "author",
            fn: function(author) {
              return [
                _c(
                  "div",
                  { staticClass: "table-avatar-info" },
                  [
                    _c("a-avatar", {
                      attrs: { shape: "square", src: author.avatar }
                    }),
                    _vm._v(" "),
                    _c("div", { staticClass: "avatar-info" }, [
                      _c("h6", [_vm._v(_vm._s(author.name))]),
                      _vm._v(" "),
                      _c("p", [_vm._v(_vm._s(author.email))])
                    ])
                  ],
                  1
                )
              ]
            }
          },
          {
            key: "func",
            fn: function(func) {
              return [
                _c("div", { staticClass: "author-info" }, [
                  _c("h6", { staticClass: "m-0" }, [_vm._v(_vm._s(func.job))]),
                  _vm._v(" "),
                  _c("p", { staticClass: "m-0 font-regular text-muted" }, [
                    _vm._v(_vm._s(func.department))
                  ])
                ])
              ]
            }
          },
          {
            key: "status",
            fn: function(status) {
              return [
                _c(
                  "a-tag",
                  {
                    staticClass: "tag-status",
                    class: status ? "ant-tag-primary" : "ant-tag-muted"
                  },
                  [
                    _vm._v(
                      "\n\t\t\t\t" +
                        _vm._s(status ? "ONLINE" : "OFFLINE") +
                        "\n\t\t\t"
                    )
                  ]
                )
              ]
            }
          },
          {
            key: "editBtn",
            fn: function(row) {
              return [
                _c(
                  "a-button",
                  {
                    staticClass: "btn-edit",
                    attrs: { type: "link", "data-id": row.key }
                  },
                  [_vm._v("\n\t\t\t\tEdit\n\t\t\t")]
                )
              ]
            }
          }
        ])
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/components/Cards/CardProjectTable2.vue?vue&type=template&id=e8a03a34&":
/*!*****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/components/Cards/CardProjectTable2.vue?vue&type=template&id=e8a03a34& ***!
  \*****************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "a-card",
    {
      staticClass: "header-solid h-full",
      attrs: { bordered: false, bodyStyle: { padding: 0 } },
      scopedSlots: _vm._u([
        {
          key: "title",
          fn: function() {
            return [
              _c(
                "a-row",
                { attrs: { type: "flex", align: "middle" } },
                [
                  _c("a-col", { attrs: { span: 24, md: 12 } }, [
                    _c("h5", { staticClass: "font-semibold m-0" }, [
                      _vm._v("Projects Table")
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "a-col",
                    {
                      staticStyle: {
                        display: "flex",
                        "align-items": "center",
                        "justify-content": "flex-end"
                      },
                      attrs: { span: 24, md: 12 }
                    },
                    [
                      _c(
                        "a-radio-group",
                        {
                          attrs: { size: "small" },
                          model: {
                            value: _vm.projectHeaderBtns,
                            callback: function($$v) {
                              _vm.projectHeaderBtns = $$v
                            },
                            expression: "projectHeaderBtns"
                          }
                        },
                        [
                          _c("a-radio-button", { attrs: { value: "all" } }, [
                            _vm._v("ALL")
                          ]),
                          _vm._v(" "),
                          _c("a-radio-button", { attrs: { value: "online" } }, [
                            _vm._v("ONLINE")
                          ]),
                          _vm._v(" "),
                          _c("a-radio-button", { attrs: { value: "stores" } }, [
                            _vm._v("STORES")
                          ])
                        ],
                        1
                      )
                    ],
                    1
                  )
                ],
                1
              )
            ]
          },
          proxy: true
        }
      ])
    },
    [
      _vm._v(" "),
      _c("a-table", {
        attrs: {
          columns: _vm.columns,
          "data-source": _vm.data,
          pagination: false
        },
        scopedSlots: _vm._u([
          {
            key: "name",
            fn: function(text) {
              return [_c("a", [_vm._v(_vm._s(text))])]
            }
          },
          {
            key: "members",
            fn: function(members) {
              return _c(
                "a-space",
                { staticClass: "avatar-chips", attrs: { size: -12 } },
                [
                  _vm._l(members, function(member) {
                    return [
                      _c("a-avatar", {
                        key: member,
                        attrs: { size: "small", src: member }
                      })
                    ]
                  })
                ],
                2
              )
            }
          },
          {
            key: "company",
            fn: function(company) {
              return [
                _c("h6", { staticClass: "m-0" }, [
                  _c("img", {
                    staticStyle: { "margin-right": "10px" },
                    attrs: { src: company.logo, width: "25" }
                  }),
                  _vm._v("\n\t\t\t\t" + _vm._s(company.name) + "\n\t\t\t")
                ])
              ]
            }
          },
          {
            key: "completion",
            fn: function(completion) {
              return [
                _c(
                  "div",
                  { staticClass: "progress-right" },
                  [
                    _c(
                      "div",
                      {
                        staticClass:
                          "text-right text-sm font-semibold text-muted pr-15"
                      },
                      [
                        _vm._v(
                          _vm._s(
                            completion.value || completion.value == 0
                              ? completion.value
                              : completion
                          ) + "%"
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c("a-progress", {
                      staticClass: "m-0",
                      attrs: {
                        percent:
                          completion.value || completion.value == 0
                            ? completion.value
                            : completion,
                        "show-info": false,
                        size: "small",
                        status: completion.status ? completion.status : "normal"
                      }
                    })
                  ],
                  1
                )
              ]
            }
          },
          {
            key: "editBtn",
            fn: function(row) {
              return [
                _c(
                  "a-button",
                  { attrs: { type: "link", "data-id": row.key } },
                  [
                    _c(
                      "svg",
                      {
                        attrs: {
                          width: "20",
                          height: "20",
                          viewBox: "0 0 20 20",
                          fill: "none",
                          xmlns: "http://www.w3.org/2000/svg"
                        }
                      },
                      [
                        _c("path", {
                          staticClass: "fill-gray-7",
                          attrs: {
                            d:
                              "M13.5858 3.58579C14.3668 2.80474 15.6332 2.80474 16.4142 3.58579C17.1953 4.36683 17.1953 5.63316 16.4142 6.41421L15.6213 7.20711L12.7929 4.37868L13.5858 3.58579Z"
                          }
                        }),
                        _vm._v(" "),
                        _c("path", {
                          staticClass: "fill-gray-7",
                          attrs: {
                            d:
                              "M11.3787 5.79289L3 14.1716V17H5.82842L14.2071 8.62132L11.3787 5.79289Z"
                          }
                        })
                      ]
                    )
                  ]
                )
              ]
            }
          }
        ])
      }),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "table-upload-btn" },
        [
          _c("a-button", { attrs: { type: "dashed", block: "" } }, [
            _c(
              "svg",
              {
                attrs: {
                  width: "16",
                  height: "16",
                  viewBox: "0 0 20 20",
                  fill: "none",
                  xmlns: "http://www.w3.org/2000/svg"
                }
              },
              [
                _c("path", {
                  attrs: {
                    "fill-rule": "evenodd",
                    "clip-rule": "evenodd",
                    d:
                      "M3 17C3 16.4477 3.44772 16 4 16H16C16.5523 16 17 16.4477 17 17C17 17.5523 16.5523 18 16 18H4C3.44772 18 3 17.5523 3 17ZM6.29289 6.70711C5.90237 6.31658 5.90237 5.68342 6.29289 5.29289L9.29289 2.29289C9.48043 2.10536 9.73478 2 10 2C10.2652 2 10.5196 2.10536 10.7071 2.29289L13.7071 5.29289C14.0976 5.68342 14.0976 6.31658 13.7071 6.70711C13.3166 7.09763 12.6834 7.09763 12.2929 6.70711L11 5.41421L11 13C11 13.5523 10.5523 14 10 14C9.44771 14 9 13.5523 9 13L9 5.41421L7.70711 6.70711C7.31658 7.09763 6.68342 7.09763 6.29289 6.70711Z",
                    fill: "#111827"
                  }
                })
              ]
            ),
            _vm._v("\n\t\t\tUpload New Project\n\t\t")
          ])
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/views/Tables.vue?vue&type=template&id=04880c24&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Admin/views/Tables.vue?vue&type=template&id=04880c24& ***!
  \*******************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c(
        "a-row",
        { attrs: { gutter: 24, type: "flex" } },
        [
          _c(
            "a-col",
            { staticClass: "mb-24", attrs: { span: 24 } },
            [
              _c("CardAuthorTable", {
                attrs: { data: _vm.table1Data, columns: _vm.table1Columns }
              })
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "a-row",
        { attrs: { gutter: 24, type: "flex" } },
        [
          _c(
            "a-col",
            { staticClass: "mb-24", attrs: { span: 24 } },
            [
              _c("CardProjectTable2", {
                attrs: { data: _vm.table2Data, columns: _vm.table2Columns }
              })
            ],
            1
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);