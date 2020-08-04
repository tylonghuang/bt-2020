AFRAME.registerComponent('change-color-on-hover', {
    schema: {
        color: { default: 'white' }
    },

    init: function() {
        var data = this.data;
        var el = this.el; // <a-box>
        var defaultColor = "white";

        el.addEventListener('mouseenter', function() {
            el.setAttribute('color', data.color);
        });

        el.addEventListener('mouseleave', function() {
            el.setAttribute('color', defaultColor);
        });
    }
});

/*
AFRAME.registerComponent('cursor-listener', {
    init: function() {
        var lastIndex = -1;
        var COLORS = ['red', 'green', 'blue'];
        this.el.addEventListener('click', function(evt) {
            lastIndex = (lastIndex + 1) % COLORS.length;
            this.setAttribute('material', 'color', COLORS[lastIndex]);
            console.log('I was clicked at: ', evt.detail.intersection.point);
        });
    }
});
*/

/* AFRAME.registerComponent('data-type', {
    init: function() {
        var dataType = this.data;
        var el = this.el;
        var value = el.getAttribute('value');
        var tableName = el.getAttribute('table-name');
        el.addEventListener('click', function() {
            if (dataType != "table") {
                console.log("column-name: " + value);
                console.log("data-type: " + dataType);
                console.log("table-name: " + tableName);
            } else if (dataType == "table") {
                console.log("table-name: " + value);
                console.log("data-type: " + dataType);
            }
            console.log("__________");
        });
    }
}); */

var xOtherElem;
var yOtherElem;
var zOtherElem;

function xInitColumns() {
    xOtherElem = document.querySelectorAll('a-text[data-type]');
}

function yInitColumns() {
    yOtherElem = document.querySelectorAll('a-text[data-type]');
}

function zInitColumns() {
    zOtherElem = document.querySelectorAll('a-text[data-type]');
}

AFRAME.registerComponent('x-axis-input', {
    init: function() {
        var el = this.el;
        var inputStatus = el.getAttribute('input-status');
        var activeColor = "lightblue";
        var defaultColor = "white";
        const acceptedDataTypes = ['varchar', 'int', 'decimal', 'date', 'double']


        el.addEventListener('click', function() {
            if ((inputStatus == "empty") && (el.getAttribute('value') == "")) {

                xInitColumns();
                for (let i = 0; i < xOtherElem.length; i++) {
                    checkDataType(i);
                    xOtherElem[i].addEventListener('click', xInputValue(i));
                }

                inputStatus = "active";
                console.log(inputStatus);
                this.setAttribute('material', 'color', activeColor);
                console.log(el.getAttribute('value'));
                console.log("__________");


            } else if ((inputStatus == "active") && (el.getAttribute('value') == "")) {


                inputStatus = "empty";
                console.log(inputStatus);
                this.setAttribute('material', 'color', defaultColor);
                console.log(el.getAttribute('value'));
                console.log("__________");


            } else if ((inputStatus == "filled") && (el.getAttribute('value') != "")) {

                xInitColumns();
                for (let i = 0; i < xOtherElem.length; i++) {
                    checkDataType(i);
                    xOtherElem[i].addEventListener('click', xInputValue(i));
                }

                this.setAttribute('material', 'color', activeColor);
                inputStatus = "active";
                console.log(inputStatus);
                console.log(el.getAttribute('value'));
                console.log("__________");


            } else if ((inputStatus == "active") && (el.getAttribute('value') != "")) {



                inputStatus = "filled";
                console.log(inputStatus);
                console.log(el.getAttribute('value'));
                this.setAttribute('material', 'color', defaultColor);
                console.log("__________");


            }
        });

        function checkDataType(i) {
            if (acceptedDataTypes.includes(xOtherElem[i].getAttribute('data-type')) == false) {
                xOtherElem[i].setAttribute('color', 'blue');
            }
        }

        function xInputValue(i) {
            return function() {
                try {
                    el.setAttribute('value', xOtherElem[i].getAttribute('value'));
                    xOtherElem = [];
                    el.setAttribute('material', 'color', defaultColor);
                    inputStatus = "filled";
                    console.log(inputStatus);
                    console.log(el.getAttribute('value'));
                    console.log("__________");
                } catch (err) {}
            }
        }
    }
});

AFRAME.registerComponent('y-axis-input', {
    init: function() {
        var el = this.el;
        var inputStatus = el.getAttribute('input-status');
        var activeColor = "lightblue";
        var defaultColor = "white";
        const acceptedDataTypes = ['int', 'decimal', 'double']


        el.addEventListener('click', function() {
            if ((inputStatus == "empty") && (el.getAttribute('value') == "")) {

                yInitColumns();
                for (let i = 0; i < yOtherElem.length; i++) {
                    checkDataType(i);
                    yOtherElem[i].addEventListener('click', yInputValue(i));
                }

                inputStatus = "active";
                console.log(inputStatus);
                this.setAttribute('material', 'color', activeColor);
                console.log(el.getAttribute('value'));
                console.log("__________");


            } else if ((inputStatus == "active") && (el.getAttribute('value') == "")) {


                inputStatus = "empty";
                console.log(inputStatus);
                this.setAttribute('material', 'color', defaultColor);
                console.log(el.getAttribute('value'));
                console.log("__________");


            } else if ((inputStatus == "filled") && (el.getAttribute('value') != "")) {

                yInitColumns();
                for (let i = 0; i < yOtherElem.length; i++) {
                    checkDataType(i);
                    yOtherElem[i].addEventListener('click', yInputValue(i));
                }

                this.setAttribute('material', 'color', activeColor);
                inputStatus = "active";
                console.log(inputStatus);
                console.log(el.getAttribute('value'));
                console.log("__________");


            } else if ((inputStatus == "active") && (el.getAttribute('value') != "")) {



                inputStatus = "filled";
                console.log(inputStatus);
                console.log(el.getAttribute('value'));
                this.setAttribute('material', 'color', defaultColor);
                console.log("__________");


            }
        });

        function checkDataType(i) {
            if (acceptedDataTypes.includes(yOtherElem[i].getAttribute('data-type')) == false) {
                yOtherElem[i].setAttribute('color', 'blue');
            }
        }

        function yInputValue(i) {
            return function() {
                try {
                    el.setAttribute('value', yOtherElem[i].getAttribute('value'));
                    yOtherElem = [];
                    el.setAttribute('material', 'color', defaultColor);
                    inputStatus = "filled";
                    console.log(inputStatus);
                    console.log(el.getAttribute('value'));
                    console.log("__________");
                } catch (err) {}
            }
        }
    }
});

AFRAME.registerComponent('z-axis-input', {
    init: function() {
        var el = this.el;
        var inputStatus = el.getAttribute('input-status');
        var activeColor = "lightblue";
        var defaultColor = "white";
        const acceptedDataTypes = ['varchar', 'int', 'decimal', 'date', 'double']


        el.addEventListener('click', function() {
            if ((inputStatus == "empty") && (el.getAttribute('value') == "")) {

                zInitColumns();
                for (let i = 0; i < zOtherElem.length; i++) {
                    checkDataType(i);
                    zOtherElem[i].addEventListener('click', zInputValue(i));
                }

                inputStatus = "active";
                console.log(inputStatus);
                this.setAttribute('material', 'color', activeColor);
                console.log(el.getAttribute('value'));
                console.log("__________");


            } else if ((inputStatus == "active") && (el.getAttribute('value') == "")) {


                inputStatus = "empty";
                console.log(inputStatus);
                this.setAttribute('material', 'color', defaultColor);
                console.log(el.getAttribute('value'));
                console.log("__________");


            } else if ((inputStatus == "filled") && (el.getAttribute('value') != "")) {

                zInitColumns();
                for (let i = 0; i < zOtherElem.length; i++) {
                    checkDataType(i);
                    zOtherElem[i].addEventListener('click', zInputValue(i));
                }

                this.setAttribute('material', 'color', activeColor);
                inputStatus = "active";
                console.log(inputStatus);
                console.log(el.getAttribute('value'));
                console.log("__________");


            } else if ((inputStatus == "active") && (el.getAttribute('value') != "")) {



                inputStatus = "filled";
                console.log(inputStatus);
                console.log(el.getAttribute('value'));
                this.setAttribute('material', 'color', defaultColor);
                console.log("__________");


            }
        });

        function checkDataType(i) {
            if (acceptedDataTypes.includes(zOtherElem[i].getAttribute('data-type')) == false) {
                zOtherElem[i].setAttribute('color', 'blue');
            }
        }

        function zInputValue(i) {
            return function() {
                try {
                    el.setAttribute('value', zOtherElem[i].getAttribute('value'));
                    zOtherElem = [];
                    el.setAttribute('material', 'color', defaultColor);
                    inputStatus = "filled";
                    console.log(inputStatus);
                    console.log(el.getAttribute('value'));
                    console.log("__________");
                } catch (err) {}
            }
        }
    }
});