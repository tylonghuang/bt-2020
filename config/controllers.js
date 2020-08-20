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

AFRAME.registerComponent('text-field', {


    init: function() {
        var el = this.el;
        el.addEventListener('mouseenter', function() {
            let infId = el.getAttribute('infId')
            let customQuery = 'a-text[infId="' + infId + '"]'
            let infField = document.querySelector(customQuery);
            infField.setAttribute('visible', true);
            if (infField.getAttribute('value') !== 'Not Found') {
                el.setAttribute('color', '#11adbf');
            }
        });

        el.addEventListener('mouseleave', function() {
            let infId = el.getAttribute('infId')
            let customQuery = 'a-text[infId="' + infId + '"]'
            let infField = document.querySelector(customQuery);
            infField.setAttribute('visible', false);
            if (infField.getAttribute('value') !== 'Not Found') {
                el.setAttribute('color', '#c0ebf0');
            }
        });
    }
});

var xOtherElem;
var yOtherElem;
var zOtherElem;
var cOtherElem;

function xInitColumns() {
    xOtherElem = document.querySelectorAll('a-text[data-type]');
}

function yInitColumns() {
    yOtherElem = document.querySelectorAll('a-text[data-type]');
}

function zInitColumns() {
    zOtherElem = document.querySelectorAll('a-text[data-type]');
}

function cInitColumns() {
    cOtherElem = document.querySelectorAll('a-text[data-type]');
}

AFRAME.registerComponent('x-axis-input', {
    init: function() {
        var el = this.el;
        var inputStatus = el.getAttribute('input-status');
        var activeColor = "lightblue";
        var defaultColor = "white";
        const acceptedDataTypes = ['varchar', 'int', 'decimal', 'date', 'double']


        el.addEventListener('mousedown', function() {
            if ((inputStatus == "empty") && (el.getAttribute('value') == "")) {

                xInitColumns();
                for (let i = 0; i < xOtherElem.length; i++) {
                    checkDataType(i);
                    xOtherElem[i].addEventListener('mousedown', xInputValue(i));
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
                    xOtherElem[i].addEventListener('mousedown', xInputValue(i));
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
                    el.setAttribute('table-name', xOtherElem[i].getAttribute('table-name'));
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


        el.addEventListener('mousedown', function() {
            if ((inputStatus == "empty") && (el.getAttribute('value') == "")) {

                yInitColumns();
                for (let i = 0; i < yOtherElem.length; i++) {
                    checkDataType(i);
                    yOtherElem[i].addEventListener('mousedown', yInputValue(i));
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
                    yOtherElem[i].addEventListener('mousedown', yInputValue(i));
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
                    el.setAttribute('table-name', yOtherElem[i].getAttribute('table-name'));
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


        el.addEventListener('mousedown', function() {
            if ((inputStatus == "empty") && (el.getAttribute('value') == "")) {

                zInitColumns();
                for (let i = 0; i < zOtherElem.length; i++) {
                    checkDataType(i);
                    zOtherElem[i].addEventListener('mousedown', zInputValue(i));
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
                    zOtherElem[i].addEventListener('mousedown', zInputValue(i));
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
                    el.setAttribute('table-name', zOtherElem[i].getAttribute('table-name'));
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

AFRAME.registerComponent('condition', {
    init: function() {
        var el = this.el;
        var inputStatus = el.getAttribute('input-status');
        var activeColor = "lightblue";
        var defaultColor = "white";
        const acceptedDataTypes = ['varchar', 'int', 'decimal', 'date', 'double']


        el.addEventListener('mousedown', function() {
            if ((inputStatus == "empty") && (el.getAttribute('value') == "")) {

                cInitColumns();
                for (let i = 0; i < cOtherElem.length; i++) {
                    checkDataType(i);
                    cOtherElem[i].addEventListener('mousedown', cInputValue(i));
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

                cInitColumns();
                for (let i = 0; i < cOtherElem.length; i++) {
                    checkDataType(i);
                    cOtherElem[i].addEventListener('mousedown', cInputValue(i));
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
            if (acceptedDataTypes.includes(cOtherElem[i].getAttribute('data-type')) == false) {
                cOtherElem[i].setAttribute('color', 'blue');
            }
        }

        function cInputValue(i) {
            return function() {
                try {
                    el.setAttribute('value', cOtherElem[i].getAttribute('value'));
                    el.setAttribute('table-name', cOtherElem[i].getAttribute('table-name'));
                    cOtherElem = [];
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


AFRAME.registerComponent('generate-button', {
    init: function() {
        var el = this.el;
        el.addEventListener('mousedown', function() {
            var xValues = document.querySelectorAll('a-text[x-axis-input]');
            var yValues = document.querySelectorAll('a-text[y-axis-input]');
            var zValues = document.querySelectorAll('a-text[z-axis-input]');
            var cColumns = document.querySelectorAll('a-text[condition]');
            var cValues = document.querySelectorAll('a-text[condition-value]');
            var xColumn = xValues[0].getAttribute('value');
            var xTable = xValues[0].getAttribute('table-name');
            var yColumn = yValues[0].getAttribute('value');
            var yTable = yValues[0].getAttribute('table-name');
            var zColumn = zValues[0].getAttribute('value');
            var zTable = zValues[0].getAttribute('table-name');
            var cColumn = cColumns[0].getAttribute('value');
            var cTable = cColumns[0].getAttribute('table-name');
            var cValue = cValues[0].getAttribute('value');
            this.setAttribute('material', 'color', 'lightblue');
            var requestLink = "href: plot.php?xC=" + xColumn + "&xT=" + xTable + "&yC=" + yColumn + "&yT=" + yTable + "&zC=" + zColumn + "&zT=" + zTable;
            if ((cColumn !== "") && (cValue !== "")) {
                requestLink += "&cC=" + cColumn + "&cT=" + cTable + "&cV=" + cValue;
            }
            this.setAttribute('link', requestLink);
        });
    }
})

var input = "";

function updateInput(e) {
    var code = parseInt(e.detail.code)
    switch (code) {
        case 8:
            input = input.slice(0, -1)
            break
        default:
            input = input + e.detail.value
            break
    }
    document.querySelector('#input').setAttribute('value', input)
}

AFRAME.registerComponent('condition-value', {
    init: function() {
        var el = this.el;
        var keyboard = document.querySelector('#keyboard')
        el.addEventListener('mousedown', function() {
            if (el.getAttribute('mousedowned') == 'false') {
                el.setAttribute('material', 'color', "lightblue");
                keyboard.setAttribute('visible', 'true');
                document.addEventListener('a-keyboard-update', updateInput)
                el.setAttribute('mousedowned', 'true');
            } else {
                el.setAttribute('material', 'color', "white");
                keyboard.setAttribute('visible', 'false');
                document.removeEventListener('a-keyboard-update', updateInput)
                el.setAttribute('mousedowned', 'false');
            }
        });
    }
})