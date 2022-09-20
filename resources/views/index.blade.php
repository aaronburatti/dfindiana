<!DOCTYPE html>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Dementia Friendly Indiana is the Indiana state affiliate of Dementia Friendly America">
  <meta name="author" content="Aaron Buratti, Dementia Friendly Bloomington, Dementia Friendly Indiana">

  <title>Dementia Friendly Indiana</title>

  <link href="/css/bootstrap.min.css" rel="stylesheet">

  <link rel="shortcut icon" href="img/CDAlogo.png"> 
  <link rel="stylesheet" href="/css/simple-line-icons.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
  <link rel="stylesheet" href="/css/app.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/queue-async/1.0.7/queue.min.js"></script>


<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#">DF Indiana</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#">Map</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#groups">Group</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-lg-7 my-auto">
          <div class="header-content mx-auto">
            <h1 class="mb-5">Welcome to Dementia Friendly Indiana!</h1>
            <h4 class="d-purple bolder">
              This map shows the counties with Indiana partners of Dementia Friendly America.
              Colored-in counties have Dementia Friendly groups!
              <br/>
              <br/>
              <br/> 
                <span id="county-info">
                Click on a colored county to learn more about that group!
              </span>
            </h4>
          </div>
        </div>
        <div class="col-lg-5 my-auto">
          <div class="map">
            
          </div>
        </div>
      </div>
    </div>
  </header>

  <section class="features" id="groups">
    <div class="container">
      <div class="section-heading text-center">
        <h2>Dementia Friendly Group Details</h2>
        <p id="dfdetails"></p>
        <hr>
      </div>
      <div class="row">
        <div class="col-lg-2 my-auto">
        </div>
        <div class="col-lg-8 my-auto">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6">
                <div class="feature-item">
                  <i class="icon-user-female text-primary"></i>
                  <h3>Leader</h3>
                  <p class="text-muted" id="leader">Click on a county above to see details!</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="feature-item">
                  <i class="icon-heart text-primary"></i>
                  <h3>Services</h3>
                  <p class="text-muted" id="services"></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="feature-item">
                  <i class="icon-globe text-primary"></i>
                  <h3>Service Area</h3>
                  <p class="text-muted" id="area"></p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="feature-item">
                  <i class="icon-screen-desktop text-primary"></i>
                  <h3>Website</h3>
                  <p class="text-muted" id="website"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="download bg-primary text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto" style="color: white;">
          <h2 class="bolder">What is Dementia Friendly America?</h2>
          <h5 class="boldest">Dementia Friendly America (DFA) is a national network of communities, organizations and individuals seeking to ensure that 
          communities across the U.S. are equipped to support people living with 
          dementia and their caregivers
          </h5>
        </div>
      </div>
    </div>
  </section>

  <section class="cta" id="contact">
    <div class="cta-content">
      <div class="container">
        <h2>Contact<br/><span id="contact-form-header">Us</span></h2>
        <h5 class="light">
          <p class="mail-message">
            <?php 
              if(!empty($_SESSION['msg'])){
                  echo $_SESSION['msg']; 
                }
            ?>
          </p>
        </h5>
        <form action="phpmailer/mail.php" method="POST">
          <div class="form-group">
            <label for="senderEmail">Your Name*</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="e.g. Andrew Smith" required>
          </div>
          <div class="form-group">
            <label for="senderEmail">Email Address*</label>
            <input type="email" name="email" class="form-control" id="sender" placeholder="your@email.com" required>
          </div>
          <div class="form-group">
            <label for="emailAbout">Subject</label>
            <input type="about" name="subject" class="form-control" id="about" placeholder="Subject">
          </div>
          <div class="form-group">
            <label for="message">Message*</label>
            <textarea type="message" name="message" class="form-control" id="message" rows="3" placeholder="Enter Your Message" required></textarea>
          </div>
          <small>* = required</small>
              </br>
          <button type="submit" id="contactSubmit" class="btn btn-outline btn-xl js-scroll-trigger">Submit</button>
        </form>
      </div>
    </div>
    <div class="overlay"></div>
  </section>

  <footer>
    <div class="container">
      <p>&copy; Dementia Friendly Indiana 2021. All Rights Reserved.</p>
      <ul class="list-inline">
        <li class="list-inline-item">
          <!-- <a href="#">Privacy</a> -->
        </li>
        <li class="list-inline-item">
          <!-- <a href="#">Terms</a> -->
        </li>
        <li class="list-inline-item">
          <!-- <a href="#">FAQ</a> -->
        </li>
      </ul>
    </div>
  </footer>
  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script> 
  <script src="/js/eaze.js"></script>
  <script>
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

    queue()
        .defer(d3.json, "/json/indiana.json")
        .await(ready);

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

              //  d3.select("option").attr('value', $name);
              //  d3.select("option").html($name + ' County');
               
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
  </script>
  <script type="text/javascript">
    $("body").tooltip({
        selector: '[data-toggle="tooltip"]'
    });
  </script>

</body>

</html>
