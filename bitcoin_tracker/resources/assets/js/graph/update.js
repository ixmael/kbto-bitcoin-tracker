import * as d3 from "d3";
import jQuery from 'jquery';

import * as init from './init';

const update = function(source) {
    let last_date = null;
    d3.csv(source + "?last_row=" + window.last_row, function(d) {
        d.id = +d.id;
        d.last = +d.last;

        if(window.last_row < d.id) {
            window.last_row = d.id;
            last_date = d.date;
        }

        d.date = init.parseTime(d.date);
        window.values.push(d);

        return d;
    }, function(error, data) {
        if (error) throw error;

        if(0 < data.length) {
            init.x.domain(d3.extent(window.values, function(d) { return d.date; }));
            init.y.domain([d3.min(window.values, function(d) { return d.last; }),
                d3.max(window.values, function(d) { return d.last; })]);

            init.svg.select("g.x.axis")
                .call(d3.axisBottom(init.x))
                ;
            init.svg.select('g.y.axis')
                .call(d3.axisLeft(init.y))
                ;

            init.svg.select("path.line")
                .data([window.values])
                .attr('d', init.line)
                ;

            jQuery('#last_update').text(last_date);
        }
    });
}

export default update;
