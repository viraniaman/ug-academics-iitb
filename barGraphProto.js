  
	// properties are directly passed to `create` method
	var BarGraph = Class.create({
	  initialize: function(datajson,xaxisName,xaxisPos,yaxisName,yaxisPos,d3Format) {
		this.datajson = datajson;
		this.xaxisName = xaxisName;
		this.xaxisPos = xaxisPos;
		this.yaxisName = yaxisName;
		this.yaxisPos = yaxisPos;
		this.d3Format = d3Format;
	  },
	  workOnElement: function(element) {
		this.element = element;
	  },
	  generateGraph: function(width , height) {
	  	// var svg = d3.select('svg')
    //       svg.selectAll("*").remove();
		
		//d3 specific coding

		var margin = {top: 20, right: 20, bottom: 30, left: 40},
						width = width - margin.left - margin.right,
						height = height*7/8 - margin.top - margin.bottom;

		var formatPercent = d3.format(this.d3Format);

		var x = d3.scale.ordinal()
			.rangeRoundBands([0, width], .1);

		var y = d3.scale.linear()
			.range([height, 0]);

		var xAxis = d3.svg.axis()
			.scale(x)
			.orient("bottom");

		var yAxis = d3.svg.axis()
			.scale(y)
			.orient("left")
			.ticks(6)
			.tickSize(-width, 0, 0)
			;

		var svg = d3.select(this.element).append("svg")
			.attr("width", width + margin.left + margin.right)
			.attr("height", height + margin.top + margin.bottom)
			.append("g")
			.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

		// var tip = d3.tip()
		// 	  .attr('class', 'd3-tip')
		// 	  .offset([-10, 0])
		// 	  .html(function(d) {
		// 	    return "<strong>Power Consumed:</strong> <span style='color:red'>" + d.units + "</span>";
		// 	  })	
		// svg.call(tip);
		
		d3.json(this.datajson, function(error, data) {
			if (error) return console.warn(error);
			//console.log(this.xaxisName);
			x.domain(data.map(function(d) { return d.power_consumption; }));
			y.domain([0, d3.max(data, function(d) { return d.units; })]);
			
			svg.append("g")
				.attr("class", "x axis")
				.attr("transform", "translate(0," + height + ")")
				.call(xAxis)
			.append("text")
				.attr("x", width / 2 )
			    .attr("y",  25 )
			    .style("text-anchor", "middle")
			    .style("font-size", "large")

				.text(this.xaxisName);



			svg.append("g")
				.attr("class", "y axis")
				.call(yAxis)
			.append("text")
				.attr("transform", "rotate(-90)")
				.attr("y", this.yaxisPos)
				.attr("dy", ".71em")
				.style("text-anchor", "end")
				.text(this.yaxisName);

			// svg.selectAll("text")
		 //         .data(data)
		 //         .enter()
		 //         .append("text")
		 //         .text(function(d) {
		 //            return d.units;
		 //         })
		 //         .attr("text-anchor", "middle")
		 //         .attr("x", function(d, i) {
			// 		return i * (w / d.power_consumption) + (w / d.power_consumption);	
		 //         })
		 //         .attr("y", function(d) {
		 //            return y(d.units - 20) ;
		 //         })
		 //         .attr("font-family", "sans-serif")
		 //         .attr("font-size", "30px")
		 //         .attr("fill", "black");

			svg.selectAll(".bar")
				.data(data)
				.enter().append("rect")
				.attr("class", "bar")			
				.attr("x", function(d) { return x(d.power_consumption); })
				.attr("width", x.rangeBand())
				.attr("height", 0)
				.attr("y", height )

				// .on('mouseover', tip.show)
    			// .on('mouseout', tip.hide)
				.transition()
                  .duration(3000) // time of duration
                  .delay(function (d,i){ return i * 100;})
                  .attr("y", function(d) { return y(d.units); })
				  .attr("height", function(d) { return height - y(d.units); });

			svg.selectAll("rect")
				.data(data)
				.enter()
				 .append("text")
		         .text(function(d) {
		            return d.units;
		         })
		         .attr("text-anchor", "middle")
		         .attr("x", function(d, i) {
					return i * (w / d.power_consumption) + (w / d.power_consumption);	
		         })
		         .attr("y", function(d) {
		            return y(d.units - 20) ;
		         })
		         .attr("font-family", "sans-serif")
		         .attr("font-size", "30px")
		         .attr("fill", "black")
		         ;

				
		}.bind(this));



  			



	  }
	});

	
	
