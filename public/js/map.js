    /**
     * 
     * In desperate need of refactoring!!
     * 
     * Now that we have data and a budget > $400 we can! Yay!!
     * 
     * The dynamic county list will come from the route's query,
     * and pass through through a slot property
     * Then we can DRY our code
     * 
     */


$( document ).ready(function() {    

    //map dimensions, target, and type
    var width = 380 + "px",
        height = 700 + "px";

    var svg = d3.select( ".map" )        
        .append( "svg" )             
        .attr( "width", width )     
        .attr( "height", height );

    var projection = d3.geo.albers()
         .center([0, 40.5])
         .rotate([83.7, 0, 0])
         .scale(8000);
         

    var geoPath = d3.geo.path()
        .projection(projection);

    //wait till GEOJson loads    
    queue()
        .defer(d3.json, "/json/indiana.json")
        .await(ready);

    //paint the map
    function ready(error, counties){

    svg.append('g')
        .selectAll('path')
        .data(counties.features)
        .enter()
        .append('path')
        .attr('d', geoPath)
        .attr('class', 'county')
        .style("fill", function(d){
          $name = d3.select(this).datum().properties.NAME_L;
          if( $name == "Monroe" || $name == "Lawrence" || $name == "Hamilton" || $name == "Pike" || $name == "Spencer"){
            return "#650a8b";
          }
        })

        .on("mouseover", function(d){
          $name = d3.select(this).datum().properties.NAME_L;
          if( $name == "Monroe" || $name == "Lawrence" || $name == "Hamilton" || $name == "Pike" || $name == "Spencer"){
          d3.select(this)
              .attr("data-toggle", "tooltip")
              .attr("data-placement", "top")
              .attr("title", $name)
           }
        })
        
        .on("click", function(d){          
          $name = d3.select(this).datum().properties.NAME_L;
           if( $name === "Monroe" || $name === "Lawrence" || $name === "Hamilton" 
               || $name === "Pike" || $name === "Spencer"){        
               d3.select("#county-info")
               .html('Scroll down to learn more about Dementia Friendly <b>' + $name + '</b> County. ');
               d3.select("#contact-form-header")
               .text("DF " + $name + " County")
               
               if(!d3.select("#dfdetails").empty()){
                    d3.select("#dfdetails").text("Scroll to the bottom of the page to contact this group")
                }  

               if( $name === "Monroe"){
                  d3.select("#leader").text("DF Bloomington's (Monroe County) lead is Amanda Mosier");
                  d3.select("#area").text("They serve Monroe, Morgan, Owen, Greene, Davies, Martin, Orange, Washington, Jackson, and Brown counties")
                  d3.select("#services").text("They offer Individual Consultation, Support Groups, Education, a Resource Library, Professional Consultation, Travel and respite vouchers, and Dementia Friendly Initiatives")
                  d3.select("#website").html("To find events and more visit <u><a href='http://dfbloomington.org/'>the DFB website</a></u>")
                  d3.select("#county-info")
                    .append("span")
                    .html(" Or visit <u><a href='http://dfbloomington.org/'> the website</a></u>")
                } 
               if( $name === "Lawrence" ){
                  d3.select("#leader")
                    .text("DF Lawrence County's lead is Shelly Gilbert");
                  d3.select("#area")
                    .text("They Serve Lawrence County")
                  d3.select("#services")
                    .text("They offer Professional Consultation, Web Resources, Education, and Dimentia Friendly Initiatives")
                  d3.select("#website")
                    .html("To see everything, visit <u><a href='http://dflawrencecounty.org/'>the DFLC website</a></u>")
                  d3.select("#county-info")
                    .append("span")
                    .html("Or visit <u><a href='http://dflawrencecounty.org/'>the website</a></u>")
               }  
               if($name === "Hamilton"){
                  d3.select("#leader").text("DF Hamilton County is led by Dustin Ziegler");
                  d3.select("#area").text("")
                  d3.select("#services").text("")
                  d3.select("#website").html("For a full list, visit <u><a href='https://cicoa.org/'>their website</a></u>")
                  d3.select("#county-info")
                    .append("span")
                    .html("Or visit <u><a href='https://cicoa.org/'>the website</a></u>")

               }
               if($name === "Pike"){
                  d3.select("#leader").text("DF Petersburg (Pike County) is led by Brenda Hancock");
                  d3.select("#area").text("")
                  d3.select("#services").text("")
                  d3.select("#website").html("")

               } 
               if($name === "Spencer"){
                  d3.select("#leader").text("DF Rockport (Spenser County) is led by Linda Wright");
                  d3.select("#area").text("")
                  d3.select("#services").text("")
                  d3.select("#website").html("")

               }
           
           } 
        })
        
}

$("body").tooltip({
    selector: '[data-toggle="tooltip"]'
})

});