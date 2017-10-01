'use strict';

import init from './graph/init';
import update from './graph/update';

window.values = [];
window.last_row = 0;

const graph = document.getElementById('graph');
let data_trigger = null;

const data_update = function() {
    update(graph.getAttribute('data-source'));
}

const data_load = function() {
    if(0 < window.values.length) {
        data_trigger = data_update;
        data_trigger();
    }
    else {
        init(graph.getAttribute('data-source'));
    }
}

data_trigger = data_load;
if("0" !== graph.getAttribute('data-last-item')) {
    data_trigger();
    data_trigger = data_update;
}

//window.data_trigger = data_trigger;

var inter = setInterval(function() {
    data_trigger();
}, 5000); 
