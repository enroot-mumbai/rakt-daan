var width = window.innerWidth, height = window.innerHeight;
var state = "";

    var projection = d3.geoMercator();

    var path = d3.geoPath()
        .projection(projection)
        .pointRadius(2);

    var svg = d3.select("#map").append("svg")
        .attr("width", width)
        .attr("height", height);

    var g = svg.append("g");

    // d3.json("maps/states.json", showmap);
    d3.json("maps/states.json", showmap);

    function showmap(error, data){

        var boundary = centerZoom(data);
        var subunits = drawSubUnits(data);
        colorSubunits(subunits);
        drawSubUnitLabels(data);
        drawPlaces(data);
        drawOuterBoundary(data, boundary);
  
      }

    function centerZoom(data){

      var o = topojson.mesh(data, data.objects.polygons, function(a, b) { return a === b; });

      projection
          .scale(1)
          .translate([0, 0]);

      var b = path.bounds(o),
          s = 1 / Math.max((b[1][0] - b[0][0]) / width, (b[1][1] - b[0][1]) / height),
          t = [(width - s * (b[1][0] + b[0][0])) / 2, (height - s * (b[1][1] + b[0][1])) / 2];

      var p = projection
          .scale(s)
          .translate(t);

      return o;

    }

    function drawOuterBoundary(data, boundary){

      g.append("path")
          .datum(boundary)
          .attr("d", path)
          .attr("class", "subunit-boundary")
          .attr("fill", "none")
          .attr("stroke", "#3a403d");

    }

    function drawPlaces(data){

      g.append("path")
          .datum(topojson.feature(data, data.objects.places))
          .attr("d", path)
          .attr("class", "place")
    
        
      g.selectAll(".place-label")
          .data(topojson.feature(data, data.objects.places).features)
        .enter().append("text")
          .attr("class", "place-label")
          .attr("transform", function(d) { return "translate(" + projection(d.geometry.coordinates) + ")"; })
          .attr("dy", ".35em")
          .attr("x", 6)
          .attr("text-anchor", "start")
          .style("font-size", ".7em")
          .style("text-shadow", "0px 0px 2px #fff")
          .text(function(d) { return d.properties.name; })
          ;

    }

    function drawSubUnits(data){

      var subunits = g.selectAll(".subunit")
          .data(topojson.feature(data, data.objects.polygons).features)
        .enter().append("path")
          .attr("class", "subunit")
          .attr("d", path)
          .style("stroke", "#fff")
          .style("stroke-width", "1px")
      return subunits;

    }

    function drawSubUnitLabels(data){

      g.selectAll(".subunit-label")
          .data(topojson.feature(data, data.objects.polygons).features)
        .enter().append("text")
          .attr("class", "subunit-label")
          .attr("transform", function(d) { return "translate(" + path.centroid(d) + ")"; })
          .attr("dy", ".35em")
          .attr("text-anchor", "middle")
          .style("font-size", ".5em")
          .style("text-shadow", "0px 0px 2px #fff")
          .style("text-transform", "uppercase")
          .text(function(d) { return d.properties.st_nm; });

    }

    function colorSubunits(subunits) {

      var c = d3.scaleOrdinal(d3.schemeCategory20);
      subunits
          .style("fill", function(d,i){ return c(i); })
          .style("opacity", ".6")
          .style("cursor","pointer")
          .on("mouseover", function(){ d3.select(this).style("opacity","1")} )
          .on("mouseout", function(){ d3.select(this).style("opacity",".6")} )
          .on("click", function(d,i,nodes){
            g.selectAll("path")
              .remove();
            g.selectAll("text")
              .remove();
            state = d3.select(this).data()[0].properties.st_nm;

            d3.json(mapMeta[state].geoDataFile,showstates);
            // state = "India"
            // d3.json("maps/india.json", showstates);
          })
          

    }

function showstates(geoData)
{
  const topology = topojson.feature(
    geoData,
    geoData.objects[mapMeta[state].graphObjectName]
  );
  console.log(topology)

  const projection = d3.geoMercator();

  projection.fitExtent(
    [
      [90, 20],
      [width, height],
    ],
    topology
  );

  const path = d3.geoPath(projection);

      let onceTouchedRegion = null;

      svg
        .append('g')
        .attr('class', 'states')
        .selectAll('path')
        .data(topology.features)
        .enter()
        .append('path')
        .attr('fill', function (d) {
          return 'white' ;
        })
        .attr('d', path)
        .attr('pointer-events', 'all')
        .style("stroke", "#000")
        .style("stroke-width", "1px")
        .on('mouseover', d=>console.log("nmouseover"))
        // .on('mouseleave', )
        .on('touchstart', (d) => {
          if (onceTouchedRegion === d) onceTouchedRegion = null;
          else onceTouchedRegion = d;
        })
        // .on('click', (d) => {
        //   if (onceTouchedRegion) {
        //     return;
        //   }
        //   if (mapMeta.mapType === MAP_TYPES.STATE) {
        //     return;
        //   }
        //   changeMap(d.properties[propertyField], mapMeta.mapType);
        // })
        .style('cursor', 'pointer')
        // .append('title')
        // .text(function (d) {
        //   const value = mapData[d.properties[propertyField]] || 0;
        //   return (
        //     parseFloat(100 * (value / (statistic.total || 0.001))).toFixed(2) +
        //     '% from ' +
        //     toTitleCase(d.properties[propertyField])
        //   );
        // })
        ;

      svg
        .append('path')
        .attr('stroke', '#fff')
        .attr('fill', 'none')
        .attr('stroke-width', 5)
        .attr(
          'd',
          path(topojson.mesh(geoData, geoData.objects[mapMeta.graphObjectName]))
        );
}

const mapMeta = {
  India: {
    name: 'India',
    geoDataFile: `maps/india.json`,

    graphObjectName: 'india',
  },
  'Andaman & Nicobar Island': {
    name: 'Andaman & Nicobar Island',
    geoDataFile: `maps/andamannicobarislands.json`,
    
    graphObjectName: 'andamannicobarislands_district',
  },
  'Arunachal Pradesh': {
    name: 'Arunachal Pradesh',
    geoDataFile: `maps/arunachalpradesh.json`,
    
    graphObjectName: 'arunachalpradesh_district',
  },
  'Andhra Pradesh': {
    name: 'Andhra Pradesh',
    geoDataFile: `maps/andhrapradesh.json`,
    
    graphObjectName: 'andhrapradesh_district',
  },

  Assam: {
    name: 'Assam',
    geoDataFile: `maps/assam.json`,
    
    graphObjectName: 'assam_district',
  },
  Bihar: {
    name: 'Bihar',
    geoDataFile: `maps/bihar.json`,
    
    graphObjectName: 'bihar_district',
  },
  Chhattisgarh: {
    name: 'Chhattisgarh',
    geoDataFile: `maps/chhattisgarh.json`,
    
    graphObjectName: 'chhattisgarh_district',
  },
  Delhi: {
    name: 'Delhi',
    geoDataFile: `maps/delhi.json`,
    
    graphObjectName: 'delhi_1997-2012_district',
  },
  Karnataka: {
    name: 'Karnataka',
    geoDataFile: `maps/karnataka.json`,
    
    graphObjectName: 'karnataka_district',
  },
  Kerala: {
    name: 'Kerala',
    geoDataFile: `maps/kerala.json`,
    
    graphObjectName: 'kerala_district',
  },
  Goa: {
    name: 'Goa',
    geoDataFile: `maps/goa.json`,
    
    graphObjectName: 'goa_district',
  },
  Gujarat: {
    name: 'Gujarat',
    geoDataFile: `maps/gujarat.json`,
    
    graphObjectName: 'gujarat_district_2011',
  },
  Haryana: {
    name: 'Haryana',
    geoDataFile: `maps/haryana.json`,
    
    graphObjectName: 'haryana_district',
  },
  'Himachal Pradesh': {
    name: 'Himachal Pradesh',
    geoDataFile: `maps/himachalpradesh.json`,
    
    graphObjectName: 'himachalpradesh_district',
  },
  'Jammu and Kashmir': {
    name: 'Jammu and Kashmir',
    geoDataFile: `maps/jammukashmir.json`,
    
    graphObjectName: 'jammukashmir_district',
  },
  Jharkhand: {
    name: 'Jharkhand',
    geoDataFile: `maps/jharkhand.json`,
    
    graphObjectName: 'jharkhand_district',
  },
  Ladakh: {
    name: 'Ladakh',
    geoDataFile: `maps/ladakh.json`,
    
    graphObjectName: 'ladakh_district',
  },
  'Madhya Pradesh': {
    name: 'Madhya Pradesh',
    geoDataFile: `maps/madhyapradesh.json`,
    
    graphObjectName: 'madhyapradesh_district',
  },
  Maharashtra: {
    name: 'Maharashtra',
    geoDataFile: `maps/maharashtra.json`,
    
    graphObjectName: 'maharashtra_district',
  },
  Manipur: {
    name: 'Manipur',
    geoDataFile: `maps/manipur.json`,
    
    graphObjectName: 'manipur_pre2016_districts',
  },
  Meghalaya: {
    name: 'Meghalaya',
    geoDataFile: `maps/meghalaya.json`,
    
    graphObjectName: 'meghalaya_district',
  },
  Mizoram: {
    name: 'Mizoram',
    geoDataFile: `maps/mizoram.json`,
    
    graphObjectName: 'mizoram_district',
  },
  Nagaland: {
    name: 'Nagaland',
    geoDataFile: `maps/nagaland.json`,
    
    graphObjectName: 'nagaland_district',
  },
  Odisha: {
    name: 'Odisha',
    geoDataFile: `maps/odisha.json`,
    
    graphObjectName: 'odisha_district',
  },
  Punjab: {
    name: 'Punjab',
    geoDataFile: `maps/punjab.json`,
    
    graphObjectName: 'punjab_district',
  },
  Rajasthan: {
    name: 'Rajasthan',
    geoDataFile: `maps/rajasthan.json`,
    
    graphObjectName: 'rajasthan_district',
  },
  Sikkim: {
    name: 'Sikkim',
    geoDataFile: `maps/sikkim.json`,
    
    graphObjectName: 'sikkim_district',
  },
  'Tamil Nadu': {
    name: 'Tamil Nadu',
    geoDataFile: `maps/tamil-nadu.json`,
    
    graphObjectName: 'tamilnadu_district',
  },
  Telangana: {
    name: 'Telangana',
    geoDataFile: `maps/telugana.json`,
    
    graphObjectName: 'telugana',
  },
  Tripura: {
    name: 'Tripura',
    geoDataFile: `maps/tripura.json`,
    
    graphObjectName: 'tripura_district',
  },
  Uttarakhand: {
    name: 'Uttarakhand',
    geoDataFile: `maps/uttarakhand.json`,
    
    graphObjectName: 'uttarakhand_district',
  },
  'Uttar Pradesh': {
    name: 'Uttar Pradesh',
    geoDataFile: `maps/uttarpradesh.json`,
    
    graphObjectName: 'uttarpradesh_district',
  },

  'West Bengal': {
    name: 'West Bengal',
    geoDataFile: `maps/westbengal.json`,
    
    graphObjectName: 'westbengal_district',
  },
};

console.log(mapMeta)