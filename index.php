<?php
  function file_get_contents_curl($url) {
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_ENCODING, "");
      curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
      curl_setopt($ch, CURLOPT_HEADER, 0);

      $data = curl_exec($ch);
      curl_close($ch);

      return $data;
  }
?>
<!DOCTYPE html>
<html lang="en-us">
<head>

    <!-- BE PROUD OF YOUR MARKUP! -->

    <meta charset="UTF-8">

    <title>jsLint.it - Online JavaScript Code Quality Tool</title>

    <link rel="icon" type="image/png" href="favicon.png">
    <link href='assets/css/styles-min.css' rel='stylesheet'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>

    <script src="http://yui.yahooapis.com/3.5.1/build/yui/yui-min.js" charset="utf-8"></script>

    <style>
        #ie {
            display: none;
        }
    </style>

    <!--[if lt IE 9]>
        <style>
            #ie {
                display: block;
                text-align: center;
                font-size: 4em;
            }
            #header,
            #footer,
            #JSLINT_ {
                display: none;
            }
        </style>
    <![endif]-->

</head>

<body>

<a href="https://github.com/thierryk/JSLint"><img style="position: absolute; z-index: 10; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png" alt="Fork me on GitHub"></a>

<div id="ie">Chances are that you're a web developer, so I expect you to have a better browser than that ;-)</div>

<!-- #header > -->

    <div id="header" role="banner">

        <input type="checkbox" id="keyboardUserChoice" aria-labelledby="keybordOptionLabel"> <label id="keybordOptionLabel" for="keyboardUserChoice"> Enhance keyboard navigation on this page (the page will reload after your selection). See option table for more details.</label>

        <ul>
            <li id="logo">Home</li>
            <li><a href="about.html">About</a></li>
            <li><a id="help" href="lint.html">Read the <span class="forBro">f**king instructions</span> <span>instructions</span></a></li>
            <li><a id="github" href="https://github.com/thierryk/JSLint">Source</a></li>
            <li id="JSLINT_EDITION"></li>
        </ul>

    </div>

<!-- < #header -->

<!--
<script src="json2.js"></script>
<script src="jslint.js"></script>
<script src="adsafe.js"></script>
<script src="intercept.js"></script>

web_jslint.js = json2.js + jslint.js + adsafe.js + intercept.js
-->

<script src="web_jslint.js"></script>

<!--
    *
    * DO NOT PUT any <script> inside this DIV or ADSAFE.js will throw an error
    *
-->

    <div id="JSLINT_" role="main">

        <h2>JSLint directive</h2>

        <p id="JSLINT_JSLINTSTRING" class="jsLint-box"></p>

        <div id="wrapper" data-nav="input-btn">

<!-- #input > -->

            <div id="input" class="view">

                <h2 class="nomouse-alternative"><span class="forBro">Dump your awesome code below</span><span>Enter your code in the box below</span></h2>

<!-- do not add a class on this textarea. A class is already used as a flag for the background image -->
                <form action="" method="post" id="inputForm" class="jsLint-box">
                    <textarea id="JSLINT_INPUT" name="JSLINT_INPUT" title="Enter your code here"
                        value="<?php
                         echo file_get_contents_curl($_POST['JSLINT_INPUT']);
                        ?>"></textarea>
                </form>

            <div id="buttonsForInput">

                <button type="button" id="clear-btn"  class="btn secondary-btn" name="clear"><i></i> Clear</button>

<!-- This container does not show if the browser does not support file APIs -->

                <div id="file_api_stuff">

                    <div id="file_upload_group">
                        <button type="button" id="fileInput-btn" class="btn primary-btn" tabindex="-1"><i></i> Upload</button>
                        <input type="file" id="fileInput" multiple>
                    </div>

<!-- IMPORTANT: keep this as the ONLY dl in this file as init_ui.js relies on "dl" as a hook (?) -->
                    <dl id="file_info">
                        <dt>Name:</dt>
                            <dd id="file_info_name"></dd>
                        <dt>Size:</dt>
                            <dd id="file_info_size"></dd>
                        <dt>Last modified:</dt>
                            <dd id="file_info_lastModified"></dd>
                    </dl>

                </div>

            </div><!-- #buttonsForInput -->

        </div>

<!-- < #input -->

<!-- #options > -->

            <div id="options" class="view">

<!-- #JSLINT_OPTIONS > -->

                <div id="JSLINT_OPTIONS" class="jsLint-box">

                    <h2>Options</h2>

                    <a id="skipToOtherOptions"  class="skipLink" href="#JSLINT_FIELDS">Skip to '<em>More Options</em>' (Indentation)</a>

                    <ul id="optionsWrapper-pager">
                        <li class="active"><a id="sv-one">Assume...</a></li>
                        <li><a id="sv-two">Tolerate...</a></li>
                        <li><a id="sv-three">Tolerate (cont.)</a></li>
                        <li><a id="sv-four">More options</a></li>
                    </ul>
                    <ul id="JSLINT_TABLE" class="sv-one">
                        <li id="firstSection" class="section"><h3>Assume...</h3>
                            <ul>
                                <li class="firsInList">
                                    <fieldset title="bro">
                                        <legend> <b>Brogrammer</b> <button title="Click for more info" class="info-btn"></button></legend>
                                            <label><input name="bro" type="radio" value="true" class="true" id="IamBro"><b>true</b></label>
                                            <label><input name="bro" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="bro" type="radio" value="undefined" class="undefined" disabled><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select this option if the 'F' word is an important part of your life!</p>
                                        <p class="alert">Warning: foul language!</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="keyboard">
                                        <legend> No mouse (this page will reload)<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="keyboard" type="radio" value="true" class="true reload" id="nomouse-true"><b>true</b></label>
                                        <label><input name="keyboard" type="radio" value="false" class="false reload" id="nomouse-false" checked><b>false</b></label>
                                        <label><input name="keyboard" type="radio" value="undefined" class="undefined reload"  id="nomouse-undefined" disabled><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select this option to make this page easier to navigate without a mouse.</p>
                                        <p class="alert">This will also remove navigation links from tabbing navigation.</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="devel">
                                        <legend> <code>console</code>, <code>alert</code>, ...<button title="Click for more info" class="info-btn"></button></legend>
                                            <label><input name="devel" type="radio" value="true" class="true"><b>true</b></label>
                                            <label><input name="devel" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="devel" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select this option to predefine globals that are useful in development but that should be avoided in production, such as console and alert. It has the same effect as this comment:</p>
                                        <p class="code">/*global alert: false, confirm: false, console: false, Debug: false, opera: false, prompt: false, WSH: false */</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="browser">
                                        <legend> a browser<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="browser" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="browser" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="browser" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select this option to predefine the standard global properties that are supplied by web browsers, such as document and addEventListener. It has the same effect as this comment:</p>
                                        <p class="code">/*global clearInterval: false, clearTimeout: false, document: false, event: false, frames: false, history: false, Image: false, location: false, name: false, navigator: false, Option: false, parent: false, screen: false, setInterval: false, setTimeout: false, window: false, XMLHttpRequest: false */</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="node">
                                        <legend><a href="http://nodejs.org/">Node.js</a><button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="node" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="node" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="node" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select this option to predefine globals that are used in the Node.js environment. It has the same effect as this comment:</p>
                                        <p class="code">/*global Buffer: false, clearInterval: false, clearTimeout: false, console: false, exports: false, global: false, module: false, process: false, querystring: false, require: false, setInterval: false, setTimeout: false, __filename: false, __dirname: false */</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="rhino">
                                        <legend> <a href="http://www.mozilla.org/rhino/">Rhino</a><button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="rhino" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="rhino" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="rhino" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select this option to predefine the global properties provided by the Rhino environment. It has the same effect as this statement:</p>
                                        <p class="code">/*global defineClass: false, deserialize: false, gc: false, help: false, load: false, loadClass: false, print: false, quit: false, readFile: false, readUrl: false, runCommand: false, seal: false, serialize: false, spawn: false, sync: false, toint32: false, version: false */</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="widget">
                                        <legend> a <a href="http://widgets.yahoo.com/tools/">Yahoo Widget</a><button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="widget" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="widget" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="widget" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select this option to predefine the global properties provided by the Yahoo! Widgets environment. It has the same effect as this statement:</p>
                                        <p class="code">/*global alert: true, animator: true, appleScript: true, beep: true, bytesToUIString: true, Canvas: true, chooseColor: true, chooseFile: true, chooseFolder: true, closeWidget: true, COM: true, convertPathToHFS: true, convertPathToPlatform: true, CustomAnimation: true, escape: true, FadeAnimation: true, filesystem: true, Flash: true, focusWidget: true, form: true, FormField: true, Frame: true, HotKey: true, Image: true, include: true, isApplicationRunning: true, iTunes: true, konfabulatorVersion: true, log: true, md5: true, MenuItem: true, MoveAnimation: true, openURL: true, play: true, Point: true, popupMenu: true, preferenceGroups: true, preferences: true, print: true, prompt: true, random: true, Rectangle: true, reloadWidget: true, ResizeAnimation: true, resolvePath: true, resumeUpdates: true, RotateAnimation: true, runCommand: true, runCommandInBg: true, saveAs: true, savePreferences: true, screen: true, ScrollBar: true, showWidgetPreferences: true, sleep: true, speak: true, Style: true, suppressUpdates: true, system: true, tellWidget: true, Text: true, TextArea: true, Timer: true, unescape: true, updateNow: true, URL: true, Web: true, widget: true, Window: true, XMLDOM: true, XMLHttpRequest: true, yahooCheckLogin: true, yahooLogin: true, yahooLogout: true */</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="windows">
                                        <legend> Windows<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="windows" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="windows" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="windows" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select this option to predefine the global properties provided by Microsoft Windows. It has the same effect as this statement:</p>
                                        <p class="code">/*global ActiveXObject: false, CScript: false, Debug: false, Enumerator: false, System: false, VBArray: false, WScript: false, WSH: false */</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="passfail">
                                        <legend>Stop on first error<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="passfail" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="passfail" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="passfail" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if the scan should stop on first error.</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="safe">
                                        <legend>Safe Subset<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="safe" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="safe" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="safe" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if the safe subset rules are enforced. These rules are used by <a href="http://www.adsafe.org/">ADsafe</a>. It enforces the safe subset rules but not the widget structure rules. <code>safe</code> is used with the <code>option</code> object, but not with the <code>/*jslint */</code> comment.</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="adsafe">
                                        <legend>Verify <a href="http://www.ADsafe.org">ADsafe</a><button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="adsafe" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="adsafe" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="adsafe" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if <a href="http://www.adsafe.org/">ADsafe</a> rules should be enforced. See <a href="http://www.ADsafe.org/">http://www.ADsafe.org/</a>. <code>adsafe</code> is used with the <code>option</code> object, but not with the <code>/*jslint */</code> comment.</p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li id="secondSection" class="section"><h3>Tolerate...</h3>
                            <ul>
                                <li class="firsInList">
                                    <fieldset title="bitwise">
                                        <legend> bitwise operators<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="bitwise" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="bitwise" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="bitwise" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if bitwise operators should be allowed:</p>
                                        <p><a href="/lint.html#bitwise">More about this option... <b>bitwise operators</b></a></p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="continue">
                                        <legend> <code>continue</code><button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="continue" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="continue" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="continue" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if the continue statement should be allowed.</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="debug">
                                        <legend> <code>debugger</code> statements<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="debug" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="debug" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="debug" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if <code>debugger</code> statements should be allowed. Set this option to <code>false</code> before going into production.</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="eqeq">
                                        <legend> <code>==</code> and <code>!=</code><button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="eqeq" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="eqeq" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="eqeq" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if the <code>==</code> and <code>!=</code> operators should be tolerated.</p>
                                        <p><a href="/lint.html#eqeq">more about this option... <b>== and !=</b></a></p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="es5">
                                        <legend> ES5 syntax<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="es5" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="es5" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="es5" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if ES5 syntax should be allowed. It is likely that programs using this option will produce syntax errors on ES3 systems.</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="evil">
                                        <legend> <code>eval</code><button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="evil" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="evil" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="evil" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if <code>eval</code> should be allowed.</p>
                                        <p>The <code>eval</code> function (and its relatives, <code>Function</code>, <code>setTimeout</code>, and <code>setInterval</code>) provide access to the JavaScript compiler. This is sometimes necessary, but in most cases it indicates the presence of extremely bad coding. The <code>eval</code> function is the most misused feature of JavaScript.</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="forin">
                                        <legend> <a href="http://yuiblog.com/blog/2006/09/26/for-in-intrigue/">unfiltered</a> <code>for</code> <code>in</code><button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="forin" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="forin" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="forin" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if unfiltered for in statements should be allowed.</p>
                                        <p><a href="/lint.html#forin">More about this option... <b>unfiltered for in</b></a></p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="newcap">
                                        <legend> uncapitalized constructors<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="newcap" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="newcap" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="newcap" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if Initial Caps with constructor functions is optional.</p>
                                        <p><a href="/lint.html#new">More about this option... <b>uncapitalized constructors</b></a></p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="nomen">
                                        <legend> dangling <code>_</code> in identifiers<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="nomen" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="nomen" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="nomen" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if names should not be checked for initial or trailing underbars.</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="plusplus">
                                        <legend> <code>++</code> and <code>--</code><button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="plusplus" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="plusplus" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="plusplus" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if <code>++</code> and <code>--</code> should be allowed.</p>
                                        <p><a href="/lint.html#inc">More about this option... <b>++ and --</b></a></p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="regexp">
                                        <legend> <code>.</code> and <code>[^</code>...<code>]</code> in /RegExp/<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="regexp" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="regexp" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="regexp" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if <code>.</code> and <code>[^...]</code> should be allowed in RegExp literals. They match more material than might be expected, allowing attackers to confuse applications. These forms should not be used when validating in secure applications.</p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li id="thirdSection" class="section"><h3>Tolerate...</h3>
                            <ul>
                                <li class="firsInList">
                                    <fieldset title="undef">
                                        <legend> misordered definitions<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="undef" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="undef" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="undef" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if variables and functions need not be declared before used.</p>
                                        <p><a href="/lint.html#undefined">More about this option... <b>misordered definitions</b></a></p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="unparam">
                                        <legend> unused parameters<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="unparam" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="unparam" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="unparam" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if warnings should not be given for unused parameters.</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="sloppy">
                                        <legend> missing <code>'use strict'</code> pragma<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="sloppy" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="sloppy" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="sloppy" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> </p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="stupid">
                                        <legend> stupidity<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="stupid" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="stupid" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="stupid" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if the ES5 <code>'use strict';</code> <a href="http://www.yuiblog.com/blog/2010/12/14/strict-mode-is-coming-to-town/">pragma</a> is not required. Do not use this pragma unless you know what you are doing.</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="sub">
                                        <legend> inefficient subscripting<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="sub" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="sub" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="sub" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if subscript notation may be used for expressions better expressed in dot notation.</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="vars">
                                        <legend> many <code>var</code> statements per function<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="vars" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="vars" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="vars" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if multiple var statement per function should be allowed.</p>
                                        <p><a href="/lint.html#scope">More about this option... <b>var statements</b></a></p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="white">
                                        <legend> messy white space<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="white" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="white" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="white" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if strict whitespace rules should be ignored.</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="css">
                                        <legend> CSS workarounds<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="css" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="css" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="css" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if CSS workarounds should be tolerated.</p>
                                        <p><a href="/lint.html#css">More about this option... <b>css</b></a></p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="cap">
                                        <legend> <code>HTML</code> case<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="cap" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="cap" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="cap" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if uppercase HTML should be allowed.</p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="on">
                                        <legend> <code>HTML</code> event handlers<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="on" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="on" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="on" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if HTML event handlers should be allowed.</p>
                                        <p><a href="/lint.html#html">More about this option... <b>HTML event handlers</b></a></p>
                                    </div>
                                </li>
                                <li>
                                    <fieldset title="fragment">
                                        <legend> <code>HTML</code> fragments<button title="Click for more info" class="info-btn"></button></legend>
                                        <label><input name="fragment" type="radio" value="true" class="true"><b>true</b></label>
                                        <label><input name="fragment" type="radio" value="false" class="false"><b>false</b></label>
                                        <label><input name="fragment" type="radio" value="undefined" class="undefined"><b>neither</b></label>
                                    </fieldset>
                                    <div class="info">
                                        <p>Select <code>true</code> if HTML fragments should be allowed.</p>
                                        <p><a href="/lint.html#html">More about this option... <b>HTML fragments</b></a></p>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <!-- #JSLINT_FIELDS > -->

                        <li id=JSLINT_FIELDS class="section"><h3><b class="forBro">More f**king options!</b> <span>More options</span></h3>
                            <input id="JSLINT_INDENT" type="text" size="2" title="indent" value="" autocomplete=off> <label for="JSLINT_INDENT" title="indent">Indentation</label><br>
                            <input id="JSLINT_MAXLEN" type="text" size="2" title="maxlen" value="" autocomplete=off> <label for="JSLINT_MAXLEN" title="maxlen">Maximum line length</label><br>
                            <input id="JSLINT_MAXERR" type="text" size="2" title="maxerr" value="" autocomplete=off> <label for="JSLINT_MAXERR" title="maxerr">Maximum number of errors</label><br>
                            <label title=predef for="JSLINT_PREDEF">Predefine global variables here</label><input id="JSLINT_PREDEF" type="text" autocomplete="off" title="predef"><span class="extra"> &quot;,&quot; separated</span>
                        </li>

                        <!-- < #JSLINT_FIELDS -->

                    </ul>

                </div>

<!-- < #JSLINT_OPTIONS -->

                <div id="lint-btn-group">
                    <button type="button" id="JSLINT_CLEARALL" class="btn secondary-btn reload"><i></i> Reset All</button>
                    <button type="button" id="lint-btn" class="btn primary-btn" data-anchor="lint-btn" name="jslint"><i></i> Lint</button>
                </div>

                 <a id="skipToTextarea" class="skipLink" href="#JSLINT_INPUT">Skip back to '<em>Textarea</em>'</a>

            </div>

<!-- < #options -->

<!-- #output > -->

            <div id="output" class="view">

            <div id="warning">
                <p class="forBro">No red shit? Get a beer, tell your buddy, celebrate!<br> A lot of red shit? No sweat bro! Your code may be too badass for this tool!</p>
                <p><b>Warning! <a href="http://jslint.com/lint.html">JSLint will hurt your feelings&trade;</a></b></p>
            </div>

            <div id="JSLINT_OUTPUT"> </div>

            <pre id="JSLINT_TREE"> </pre>

        </div>

<!-- < #output -->

            <div id="tree" class="view"> </div>

<!-- < #tree -->

        </div>

<!-- < #wrapper -->

        <script>ADSAFE.id("JSLINT_");</script>
        <script src="init_ui.js"></script>
        <script>ADSAFE.go("JSLINT_",function(dom,lib){"use strict";lib.init_ui(dom);});</script>

    </div>

<!-- < #JSLINT_ (main) -->

<!-- #footer > -->

    <div id="footer">
        <p><a id="toTop" title="Beam me up!" href="#"><img src="assets/img/clear.png" alt="Top of the page"></a> Crafted with care, in a cave, somewhere in Marin County - sunny California. Follow me on <a href="http://www.twitter.com/#!/thierrykoblentz">Twitter</a> or <a href="https://github.com/thierryk">GitHub</a>.</p>
    </div>

<!-- < #footer -->

<!-- #overlay > -->

    <div id="overlay"></div>

<!-- < #overlay -->

<script>
    /**
     * FILE APIs stuff
     * http://www.html5rocks.com/en/tutorials/file/dndfiles/
     * http://www.nczonline.net/blog/2012/05/08/working-with-files-in-javascript-part-1/
     */
    var OVERLAY = document.getElementById('overlay');
    // Check for the various File API support.
    if (window.File && window.FileReader && window.FileList) {
      // Awesome! All the File APIs are supported. We can display input and drop_zone (textarea).
        document.getElementById('file_api_stuff').style.visibility='visible';
    } else {
      //The File APIs are not fully supported in this browser. Don't try anything fancy.
        document.getElementById('JSLINT_INPUT').style.background='none';
        document.getElementById('JSLINT_INPUT').value='// Enter your code here.';
    }

    var selectedFile;

    /**
     * UPLOADING a file
     */
    var control = document.getElementById("fileInput");

    function handleFileSelect(evt) {

        selectedFile = evt.target.files[0];

        checkFileSelection(
            evt.target.files.length,
            selectedFile.type,
            selectedFile.name,
            selectedFile.size,
            selectedFile.lastModifiedDate.toLocaleDateString()
        );

    }
    // Listen to it
    document.getElementById('fileInput').addEventListener('change', handleFileSelect, false);

    /**
     * DROP a file
     */
    function handleFileDrop(evt) {

        evt.stopPropagation();
        evt.preventDefault();

        selectedFile = evt.dataTransfer.files[0];

        checkFileSelection(
            evt.dataTransfer.files.length,
            selectedFile.type,
            selectedFile.name,
            selectedFile.size,
            selectedFile.lastModifiedDate.toLocaleDateString()
        );

    }

    function handleDragOver(evt) {
        evt.stopPropagation();
        evt.preventDefault();
        evt.dataTransfer.dropEffect = 'copy'; // Explicitly show this is a copy.
    }

    var dropZone = document.getElementById('JSLINT_INPUT');
    // Setup the dnd listeners.
    dropZone.addEventListener('dragover', handleDragOver, false);
    dropZone.addEventListener('drop', handleFileDrop, false);

    /**
     * FIRST, check the file. Then write some info about it
     */
    function checkFileSelection(length, type, name, size, date) {
        var message;
        // get the file extension
        var extension = name.slice(name.lastIndexOf(".")+1);

        if (!length) {
            OVERLAY.innerHTML = '<div id="overlay-wrap" class="fileUpload">Please select a JavaScript file!</div>';
            return;
        }
        if (type !== "text/javascript") {

            if (document.getElementById('IamBro').checked ===  'true') {
                message = '<p>What\'s wrong with you, bro?\nThis ain\'t http://www.' + extension.toUpperCase() + 'Lint.it.<br>You need to select a damn JavaScript file!!!<p>';
            } else {
                message = '<p>This is JSLint.it not ' + extension.toUpperCase() + 'Lint.it.<br>Please select a JavaScript file!<p>';
            }
            OVERLAY.innerHTML = '<div id="overlay-wrap" class="fileUpload">'+message+'</div>';
            return;
        }

        // Reveal the DL then feed the info (name, etc.)
        document.getElementById('file_info').className='visible';
        document.getElementById('file_info_name').innerHTML=name;
        document.getElementById('file_info_size').innerHTML=size;
        document.getElementById('file_info_lastModified').innerHTML=date;

        // plug the content in the textarea
        var reader = new FileReader();

        reader.onload = function(event) {

            var contents = event.target.result;

            // Feed #JSLINT_INPUT (textarea) and flag the textarea ('fed')
            document.getElementById('JSLINT_INPUT').value = contents;
            document.getElementById('JSLINT_INPUT').className = 'fed';

        };

        // just in case
        reader.onerror = function(event) {
            OVERLAY.innerHTML = '<div id="overlay-wrap" class="fileUpload"><p>File could not be read! Code ' + event.target.error.code + '</p></div>';

        };

        reader.readAsText(selectedFile);
    }

    // Flag the textarea to remove the background image if there is content in there (i.e. via copy/paste)
    document.getElementById('JSLINT_INPUT').addEventListener('change', checkTextarea, false);

    function checkTextarea(evt) {
        this.className = "fed";
        if (this.value === "") {
            this.className = "";
        }
    }


</script>

<script defer="defer">

    /**
     * TODO: clean all this stuff
     */
YUI().use('node', 'selector-css3', 'node-event-simulate', 'event-key', 'io-xdr', function (Y) {

        var BODY = Y.one('body'),
            VIEWS = Y.one('#JSLINT_TABLE'),
            IamBroRadios = Y.all('input[name="bro"]'),
            IamBroRadio = Y.one('#IamBro'),
            keyboardRadios = Y.all('input[name="keyboard"]'),
            keyboardRadio = Y.one('#nomouse-true'),
            headerLinks = Y.one('#header').all('a'),
            textArea = Y.one('#JSLINT_INPUT');

        // If the page loads with stuff in the textarea it means the page is loading the content of an URL
        // so we can lint that content
        Y.on("load", function() {
            if(textArea.get('value') !== "") {
                textArea.addClass('fed');
                Y.one('#lint-btn').simulate("click");
            }
        });

       /**
        * DOMREADY stuff
        */
        // Set Brogrammer and nomouse-true class according to cookie
        // Also set the checkbox status at the very top (keyboard)
        Y.on("domready", function() {
            if(IamBroRadio.get('checked')) BODY.addClass('brogrammer');

            if(keyboardRadio.get('checked')) {
                BODY.addClass('nomouse-true');
                Y.one('#keyboardUserChoice').setAttribute('checked','checked');
                headerLinks.setAttribute('tabindex','-1');
            } else {
                headerLinks.setAttribute('tabindex','');
            }
         });

        /**
         * CHANGE stuff
         *
         * Keyboard navigation options.
         * Reload the page to enable keyboard features (via a class on <body>)
         */
        keyboardRadios.on('change', function() {
            document.location.reload();
        });
        /**
         * Brogrammer option. Maintaining state - We tag <body> with '.brogrammer'
         */
        IamBroRadios.on('change', IamBro);
        function IamBro(evt) {
            if(evt.currentTarget.get('value') === 'true') {
                BODY.addClass('brogrammer');
            } else {
                BODY.removeClass('brogrammer');
            }
        }

        /**
         * Checkbox for keyboard user at the very top of the page
         * Its on value is set on 'domready'
         * If a selection is made, set the radio button (option) to the same value
         */
        Y.one('#keyboardUserChoice').on('click', function(evt) {
            if(Y.Node.getDOMNode(this).checked) {
                Y.one('#nomouse-true').simulate("click");
                Y.one('#overlay').setHTML('<p>This will remove all links in the menu out of tabbing navigation (among other things).<br>Turn this option off if you want to access links in the menu.</p>');
            } else {
                Y.one('#nomouse-false').simulate("click");
            }
        });

        /**
         * MORE INFO/OVERLAY (in #options)
         * Clicking on the info icon reveals the information text
         * Different behavior for keyboard and mouse
         */
        Y.all('.info-btn').on('click', function(evt) {
            if(BODY.hasClass('nomouse-true')) {
                evt.currentTarget.ancestor('li').one('.info').toggleClass('show');
            } else {
                Y.one('#overlay').setHTML('<div id="overlay-wrap" class="info"><b>'+evt.currentTarget.ancestor('li').one('legend').getHTML()+'</b>'+evt.currentTarget.ancestor('li').one('.info').getHTML()+'</div>');
            }
        });
        // CLOSE the overlay (clicking anywhere will close the overlay)
        Y.one('#overlay').on('click', function(){Y.one('#overlay').setHTML()})

        // CLEAR button will focus on textarea when user clicks on it
        Y.one('#clear-btn').on('click', function(evt) {
            Y.one('#JSLINT_INPUT').focus();
        });

        // SKIP LINKS to focus on specific elements
        Y.one('#skipToOtherOptions').on('click', function(evt) {
            Y.one('#JSLINT_INDENT').focus();
        });
        Y.one('#skipToTextarea').on('click', function(evt) {
            Y.one('#JSLINT_INPUT').focus();
        });
        Y.one('#lint-btn').on('click', function(evt) {
            if(BODY.hasClass('nomouse-true')) {
                Y.one('#errors').focus();
            }
        });

        // OPTIONS TABS the active item/view in #optionsWrapper
        Y.one('#optionsWrapper-pager').on('click', tagIt);
        function tagIt(evt) {
            // Get the ID of the selected link
            currentLink = evt.target;
            linkID = currentLink.get('id');
            this.get('children').removeClass('active');
            evt.target.get('parentNode').addClass('active');

            // Tag the container with the name of the selected view so we can use this hook to toggle the different views
            VIEWS.setAttribute('class',linkID);
        }

        // Kill the overlay if the user presses the escape key
        Y.on("key", function () {
            Y.one('#overlay').setHTML('');
        }, 'body' ,"down:27");

});

</script>

</body>
</html>
