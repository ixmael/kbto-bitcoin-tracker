import * as d3 from "d3";
import jQuery from 'jquery';

export const parseTime = d3.timeParse("%Y-%m-%d %H:%M:%S");

export var svg = d3.select("svg");

export var margin = {top: 20, right: 20, bottom: 30, left: 50};
export var width = +svg.attr("width") - margin.left - margin.right;
export var height = +svg.attr("height") - margin.top - margin.bottom;
export var g = svg.append("g")
    .attr('class', 'graph')
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

export var x = d3.scaleTime().rangeRound([0, width]);
export var y = d3.scaleLinear().rangeRound([height, 0]);

export var line = d3.line()
    .x(function(d) { return x(d.date); })
    .y(function(d) { return y(d.last); })
    .curve(d3.curveMonotoneX);

const init = function(source) {
    let last_date = null;
    d3.csv(source, function(d) {
            d.id = +d.id;
            d.last = +d.last;

            if(window.last_row < d.id) {
                window.last_row = d.id;
                last_date = d.date;
            }

            d.date = parseTime(d.date);
            window.values.push(d);

            return d;
        }, function(error, data) {
            if (error) throw error;

            x.domain(d3.extent(window.values, function(d) { return d.date; }));
            y.domain(d3.extent(window.values, function(d) { return d.last; }));

            g.append("g")
                .attr("class", "x axis")
                .call(d3.axisBottom(x))
                .attr("transform", "translate(0," + height + ")");
                //.select(".domain");
                //.remove();

            g.append("g")
                .attr("class", "y axis")
                .call(d3.axisLeft(y))
                .append("text")
                    .attr("fill", "#000")
                    .attr("transform", "rotate(-90)")
                    .attr("y", 6)
                    .attr("dy", "0.71em")
                    .attr("text-anchor", "end")
                    .text("BTN - MXN");

            g.append("path")
                .attr("class", "line")
                .data([window.values])
                .attr("d", line)
                .attr("fill", "none")
                .attr("stroke", "steelblue")
                .attr("stroke-linejoin", "round")
                .attr("stroke-linecap", "round")
                .attr("stroke-width", 1.5);

            jQuery('#graph > div.alert').addClass('hidden');
            jQuery('#last_update_label').text('Última actualización');
            jQuery('#last_update').text(last_date);
        }
    );
}

export default init;
