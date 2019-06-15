(function (global, factory) {
  if (typeof define === "function" && define.amd) {
    define('/forms/validation', ['jquery', 'Site'], factory);
  } else if (typeof exports !== "undefined") {
    factory(require('jquery'), require('Site'));
  } else {
    var mod = {
      exports: {}
    };
    factory(global.jQuery, global.Site);
    global.formsValidation = mod.exports;
  }
})(this, function (_jquery, _Site) {
  'use strict';

  var _jquery2 = babelHelpers.interopRequireDefault(_jquery);

  (0, _jquery2.default)(document).ready(function ($$$1) {
    (0, _Site.run)();
  });

  // Login Validataion Full
  // ------------------------
  (function () {
    (0, _jquery2.default)('#login_form').formValidation({
      framework: "bootstrap4",
      button: {
        selector: '#submit_login',
        disabled: 'disabled'
      },
      icon: null,
      fields: {
        email: {
          validators: {
            notEmpty: {
              message: 'email address is required and cannot be empty'
            },
            emailAddress: {
              message: 'email address is not valid'
            }
          }
        },
        password: {
          validators: {
            notEmpty: {
              message: 'password is required and cannot be empty'
            }
          }
        }
      },
      err: {
        clazz: 'invalid-feedback'
      },
      control: {
        // The CSS class for valid control
        valid: 'is-valid',

        // The CSS class for invalid control
        invalid: 'is-invalid'
      },
      row: {
        invalid: 'has-danger'
      }
    });
  })();
  
  // Advertisement Validataion Full
  // ------------------------
  (function () {
    (0, _jquery2.default)('#login_form').formValidation({
      framework: "bootstrap4",
      button: {
        selector: '#submit_login',
        disabled: 'disabled'
      },
      icon: null,
      fields: {
        email: {
          validators: {
            notEmpty: {
              message: 'email address is required and cannot be empty'
            },
            emailAddress: {
              message: 'email address is not valid'
            }
          }
        },
        password: {
          validators: {
            notEmpty: {
              message: 'password is required and cannot be empty'
            }
          }
        }
      },
      err: {
        clazz: 'invalid-feedback'
      },
      control: {
        // The CSS class for valid control
        valid: 'is-valid',

        // The CSS class for invalid control
        invalid: 'is-invalid'
      },
      row: {
        invalid: 'has-danger'
      }
    });
  })();

});