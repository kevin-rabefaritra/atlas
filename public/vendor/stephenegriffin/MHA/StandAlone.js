/* global $ */
/* global appInsights */
/* global mhaStrings */
/* global HeaderModel */
/* global Diagnostics */
/* global Table */
(function () {
    "use strict";
    var viewModel = null;
    function enableSpinner() {
        $("#response").css("background-image", "url(./vendor/stephenegriffin/MHA/loader.gif)");
        $("#response").css("background-repeat", "no-repeat");
        $("#response").css("background-position", "center");
    }
    function disableSpinner() {
        $("#response").css("background", "none");
    }
    function updateStatus(statusText) {
        $("#status").text(statusText);
        if (viewModel !== null) {
            viewModel.status = statusText;
        }
        Table.recalculateVisibility();
    }
    // Do our best at recognizing RFC 2822 headers:
    // http://tools.ietf.org/html/rfc2822
    function analyze() {
        // Can't do anything without jQuery
        if (!$)
            return;
        if (appInsights)
            appInsights.trackEvent("analyzeHeaders");
        viewModel = HeaderModel($("#inputHeaders").val());
        enableSpinner();
        updateStatus(mhaStrings.mhaLoading);
        Table.rebuildTables(viewModel);
        updateStatus("");
        disableSpinner();
    }
    function clear() {
        $("#inputHeaders").val("");
        viewModel = HeaderModel();
        Table.resetArrows();
        Table.rebuildSections(viewModel);
    }
    function copy() {
        mhaStrings.copyToClipboard(viewModel.toString());
    }
    if ($) {
        $(document).ready(function () {
            Diagnostics.set("API used", "standalone");
            viewModel = HeaderModel();
            document.querySelector("#analyzeButton").onclick = analyze;
            document.querySelector("#clearButton").onclick = clear;
        });
    }
    return;
})();
