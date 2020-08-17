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


AFRAME.registerComponent('generate-button', {
    init: function() {
        var el = this.el;
        el.addEventListener('click', function() {
            var xValues = document.querySelectorAll('a-text[x-axis-input]');
            var yValues = document.querySelectorAll('a-text[y-axis-input]');
            var zValues = document.querySelectorAll('a-text[z-axis-input]');
            var xColumn = xValues[0].getAttribute('value');
            var xTable = xValues[0].getAttribute('table-name');
            var yColumn = yValues[0].getAttribute('value');
            var yTable = yValues[0].getAttribute('table-name');
            var zColumn = zValues[0].getAttribute('value');
            var zTable = zValues[0].getAttribute('table-name');
            this.setAttribute('material', 'color', 'lightblue');
            var requestLink = "href: fetchData.php?xC=" + xColumn + "&xT=" + xTable + "&yC=" + yColumn + "&yT=" + yTable + "&zC=" + zColumn + "&zT=" + zTable;
            this.setAttribute('link', requestLink);
        });
    }
})