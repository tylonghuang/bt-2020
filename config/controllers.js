AFRAME.registerComponent('change-color-on-hover', {
    schema: {
        color: { default: 'white' }
    },

    init: function() {
        var data = this.data;
        var el = this.el; // <a-box>
        var defaultColor = el.getAttribute('material').color;

        el.addEventListener('mouseenter', function() {
            el.setAttribute('color', data.color);
        });

        el.addEventListener('mouseleave', function() {
            el.setAttribute('color', defaultColor);
        });
    }
});