// init_ui.js
// 2012-05-13

// This is the web browser companion to fulljslint.js. It is an ADsafe
// lib file that implements a web ui by adding behavior to the widget's
// html tags.

// It stores a function in lib.init_ui. Calling that function will
// start up the JSLint widget ui.

// option = {adsafe: true, fragment: false}

/*properties check, cookie, each, edition, get, getCheck, getTitle, getValue,
    has, indent, isArray, join, jslint, klass, length, lib, maxerr, maxlen, on,
    predef, push, q, select, set, split, stringify, style, target, tree, value
*/

ADSAFE.lib("init_ui", function (lib) {
    'use strict';

    return function (dom) {
        var table = dom.q('#JSLINT_TABLE'),
            allfieldsets = table.q('fieldset'),
            allradiobuttons = table.q('input'),
            allradiodefaults = table.q('input[value=undefined]'),
            indent = dom.q('#JSLINT_INDENT'),
            inputform = document.getElementById('inputForm'),
            input = dom.q('#JSLINT_INPUT'),
            jslintstring = dom.q('#JSLINT_JSLINTSTRING'),
            maxerr = dom.q('#JSLINT_MAXERR'),
            maxlen = dom.q('#JSLINT_MAXLEN'),
            option = lib.cookie.get(),
            output = dom.q('#JSLINT_OUTPUT'),
            tree = dom.q('#JSLINT_TREE'),
            predefined = dom.q('#JSLINT_PREDEF'),
            // TJK for some weird reason trying to get to this via an ID fails
            fileinfo = dom.q('dl'),
            lastChars;

// TJK check if an URL is passed and if it is then fetch the content of the file
// (remove white-space and then check the last characters) and feed the textarea
        function fetchURL(){
            lastChars = input.getValue().replace(/\s/g, '').slice(input.getValue().lastIndexOf(".")+1);
            if(input !== "" && lastChars === "js") {
                inputform.submit();
            }
        }

// Take care of the JSLint directive ('/*jslint ... */') box
        function show_jslint_control() {


// Build and display a /*jslint*/ control comment.
// The comment can be copied into a .js file.

            var a = [];

            allfieldsets.each(function (fieldset) {
                var name = fieldset.getTitle(),
                    value = ADSAFE.get(option, name);

                if (typeof value === 'boolean') {
// TJK: first 2 options ('bro' and 'keyboard') should not be part of the JSLint directive (/*jslint   */)
                    if (name !== 'adsafe' && name !== 'safe' && name !== 'bro' && name !== 'keyboard') {
                        a.push(name + ': ' + value);
                    }

// TJK: tristate via classes true/false/undefined

                    fieldset.klass(value ? 'true' : 'false');

                    if (value) {
                        fieldset.q('input.true').check(true);
                    } else {
                        fieldset.q('input.false').check(true);
                    }

                } else {
                    fieldset.klass('undefined');
                    fieldset.q('input.undefined').check(true);
                }

            });
            if (typeof option.maxerr === 'number' && option.maxerr >= 0) {
                a.push('maxerr: ' + String(option.maxerr));
            }
            if (typeof option.maxlen === 'number' && option.maxlen >= 0) {
                a.push('maxlen: ' + String(option.maxlen));
            }
            if (typeof option.indent === 'number' && option.indent >= 0) {
                a.push('indent: ' + String(option.indent));
            }
            jslintstring.value('/*jslint ' + a.join(', ') + ' */');

// Make a JSON cookie of the option object.

            lib.cookie.set(option);
        }

        function show_options() {
            indent.value(String(option.indent));
            maxlen.value(String(option.maxlen || ''));
            maxerr.value(String(option.maxerr));
            predefined.value(ADSAFE.isArray(option.predef)
                ? option.predef.join(',')
                : '');
            show_jslint_control();
        }

//  Boxes are tristate, cycling true, false, undefined.
//  TJK: keeping things in sync from the radio buttons.

        function update_box_from_radio_button(event) {

            var title = event.target.getName();
            if (title) {
                ADSAFE.set(option, title,
                    event.target.getValue() === 'true'
                        ? true
                        : event.target.getValue() === 'false'
                        ? false
                        : undefined);
            }
            show_jslint_control();
        }

        function update_number(event) {
            var value = event.target.getValue();
            if (value.length === 0 || +value < 0 || !isFinite(value)) {
                value = '';
                ADSAFE.set(option, event.target.getTitle(), undefined);
            } else {
                ADSAFE.set(option, event.target.getTitle(), +value);
            }
            event.target.value(String(value));
            show_jslint_control();
        }

        function update_list(event) {
            var value = event.target.getValue().split(/\s*,\s*/);
            ADSAFE.set(option, event.target.getTitle(), value);
            event.target.value(value.join(', '));
            show_jslint_control();
        }


// Restore the options from a JSON cookie.

        if (!option || typeof option !== 'object') {
            option = {
                indent: 4,
                maxerr: 50
            };
        } else {
            option.indent = typeof option.indent === 'number' && option.indent >= 0
                ? option.indent
                : 4;
            option.maxerr = typeof option.maxerr === 'number' && option.maxerr >= 0
                ? option.maxerr
                : 50;
        }
        show_options();


// Display the edition.

        dom.q('#JSLINT_EDITION').value('Edition ' + lib.edition());

// Add click event handlers to the [JSLint] and [clear] buttons.
// TJK if the textarea is empty we quit. If it is not we check if we're dealing with a URL

        dom.q('button&jslint').on('click', function () {
            if(input.getValue() === "") {
                return;
            }
            fetchURL();
            tree.value('');

// Call JSLint and display the report.

            tree.value(String(lib.jslint(input.getValue(), option, output) / 1000) + ' seconds.');
            input.select();
            return false;
        });

        dom.q('button&tree').on('click', function () {
            output.value('Tree:');
            tree.value(JSON.stringify(lib.tree(), [
                'label', 'id', 'string', 'number', 'arity', 'name', 'first',
                'second', 'third', 'block', 'else', 'quote', 'flag', 'type'
            ], 4));
            input.select();
        });

        dom.q('button&clear').on('click', function () {
            output.value('');
            tree.value('');
            input.value('').select();
            // TJK clean up/hide the file info (the DL) and flag from textarea
            fileinfo.klass('visibilityHidden');
            input.klass('');
            input.blur();
        });

        dom.q('#JSLINT_CLEARALL').on('click', function () {
            option = {
                indent: 4,
                maxerr: 50
            };

// TJK: reset all radiobuttons and fieldsets to 'undefined'

            allradiodefaults.each(function (radio) {
                radio.check(true);
            });

            allfieldsets.each(function (fieldset) {
                fieldset.check();
            });

            show_options();

        });

        allradiobuttons.on('click', update_box_from_radio_button);

        indent.on('change', update_number);
        maxerr.on('change', update_number);
        maxlen.on('change', update_number);
        predefined.on('change', update_list);
        input
            .on('change', function () {
                output.value('');
            })
            .select();
    };
});


