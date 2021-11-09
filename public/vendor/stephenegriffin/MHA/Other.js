/* global mhaStrings */
/* exported Other */
var Other = (function () {
    "use strict";
    var row = function (number, header, value) {
        return {
            number: number,
            header: header,
            url: mhaStrings.mapHeaderToURL(header, null),
            value: value,
            toString: function () { return header + ": " + value; }
        };
    };
    var otherRows = [];
    var sortColumn = "number";
    var sortOrder = 1;
    function doSort(col) {
        var _this = this;
        if (sortColumn === col) {
            sortOrder *= -1;
        }
        else {
            sortColumn = col;
            sortOrder = 1;
        }
        if (sortColumn + "Sort" in otherRows[0]) {
            col = col + "Sort";
        }
        otherRows.sort(function (a, b) {
            return _this.sortOrder * (a[col] < b[col] ? -1 : 1);
        });
    }
    function add(otherHeader) {
        otherRows.push(row(otherRows.length + 1, otherHeader.header, row.value = otherHeader.value));
    }
    function exists() { return otherRows.length > 0; }
    return {
        tableName: "otherHeaders",
        add: add,
        exists: exists,
        get otherRows() { return otherRows; },
        doSort: doSort,
        get sortColumn() { return sortColumn; },
        get sortOrder() { return sortOrder; },
        toString: function () {
            if (!exists())
                return "";
            var ret = ["Other"];
            otherRows.forEach(function (row) {
                if (row.value) {
                    ret.push(row);
                }
            });
            return ret.join("\n");
        }
    };
});
