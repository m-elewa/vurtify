try {
    window.Popper = require('popper.js').default;
    window.bootstrap = require('bootstrap');

    // custom scripts
    require('../navbar');
} catch (e) {}
