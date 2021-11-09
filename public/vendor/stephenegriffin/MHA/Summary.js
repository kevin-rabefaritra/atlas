/* global mhaStrings */
/* global mhaDates */
/* exported Summary */
var Summary = (function () {
    "use strict";
    var SummaryRow = function (header, label, onSet, onGet, onGetUrl) {
        var value = "";
        return {
            header: header,
            label: label,
            url: mhaStrings.mapHeaderToURL(header, label),
            set value(_value) { value = onSet ? onSet(_value) : _value; },
            get value() { return onGet ? onGet(value) : value; },
            get valueUrl() { return onGetUrl ? onGetUrl(value) : ""; },
            toString: function () { return label + ": " + value; }
        };
    };
    var totalTime = "";
    function creationTime(date) {
        if (!date && !totalTime) {
            return null;
        }
        var time = [date || ""];
        if (totalTime) {
            time.push(" ", mhaStrings.mhaDeliveredStart, " ", totalTime, mhaStrings.mhaDeliveredEnd);
        }
        return time.join("");
    }
    var dateRow = SummaryRow("Date", mhaStrings.mhaCreationTime, function (value) { return mhaDates.parseDate(value); }, function (value) { return creationTime(value); });
    var archivedRow = SummaryRow("Archived-At", mhaStrings.mhaArchivedAt, null, null, function (value) { return mhaStrings.mapValueToURL(value); });
    var summaryRows = [
        SummaryRow("Subject", mhaStrings.mhaSubject),
        SummaryRow("Message-ID", mhaStrings.mhaMessageId),
        archivedRow,
        dateRow,
        SummaryRow("From", mhaStrings.mhaFrom),
        SummaryRow("Reply-To", mhaStrings.mhaReplyTo),
        SummaryRow("To", mhaStrings.mhaTo),
        SummaryRow("CC", mhaStrings.mhaCc)
    ];
    function exists() {
        for (var i = 0; i < summaryRows.length; i++) {
            if (summaryRows[i].value) {
                return true;
            }
        }
        return false;
    }
    function add(header) {
        if (!header) {
            return false;
        }
        for (var i = 0; i < summaryRows.length; i++) {
            if (summaryRows[i].header.toUpperCase() === header.header.toUpperCase()) {
                summaryRows[i].value = header.value;
                return true;
            }
        }
        return false;
    }
    return {
        add: add,
        exists: exists,
        get summaryRows() { return summaryRows; },
        get totalTime() { return totalTime; },
        set totalTime(value) { totalTime = value; },
        toString: function () {
            if (!exists())
                return "";
            var ret = ["Summary"];
            summaryRows.forEach(function (row) {
                if (row.value) {
                    ret.push(row.toString());
                }
            });
            return ret.join("\n");
        }
    };
});
