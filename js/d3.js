    var width = window.innerWidth,
        height = window.innerHeight;

    var svg = d3.select( ".screen" )        
        .append( "svg" )             
        .attr( "width", width )     
        .attr( "height", height );

    var projection = d3.geo.albers()
        .center([0, 37.8])
        .rotate([85.8, 0])
        .scale(8000)
        .translate([width/ 2, height / 1.5 ]);

    var geoPath = d3.geo.path()
        .projection(projection);

    queue()
        .defer(d3.json, "indiana.json")
        .await(ready);
    
    function ready(error, counties){

    svg.append('g')
        .selectAll('path')
        .data(counties.features)
        .enter()
        .append('path')
        .attr('d', geoPath)
        .attr('class', 'county')
        
      
    .on("mouseover", function(d){
        d3.select('h2').text(d3.select(this).datum().properties.NAME_L);
        d3.select(this).attr('class', 'countyhover');
    })
    .on("mouseout", function(d){
        d3.select('h2').text('');
        d3.select(this).attr('class', 'county');
    });

 } 