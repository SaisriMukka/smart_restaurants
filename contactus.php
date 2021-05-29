<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximun-scale=1.0, user-scalable=0">
    <link href="style3.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
	<link rel="stylesheet" href="hello.css">
    </head>
    <body>
	<div class="header" id="myHeader">
				<ul>
					<li><button class="dropbtn"><a href="index.html"><font color="white">Home</a></button></li>
					<li><button class="dropbtn"><a href="contactus.php"><font color="white">Contact Us</a></button></li>
					<li><button class="dropbtn" ><a href="login.php"><font color="white">LOGIN</font></a></button></li>
				</ul>
			</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <section class="banner-area">
            
            <div class="container">
                <div class="fullpage-center-align" style="height: 613px;">
                    <div class="banner-content">
                        <br><br><br><br>
                        <h1 class="text-white">Contact Us</h1><br>
                        <p class="text-white">012-6532-568-9746 </p>
                         <p class="text-white">012-6532-569-9748 </p> 
                    </div>
                </div>
            </div>
         </section><br><br><br>
            <section class="findus">
                <div class="overlay overlay-bg"></div>
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-6 findus-left">
                            <h1 class="text-white">Find Us using Google Maps</h1>
                        </div>
                        <div class="col-lg-5 findus-right">
                            <iframe width="400" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=newpeacock&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div> 
                    </div>
                </div>
            </section><br><br><br><br>
            <section class="fillbox">
                <h1 style="color:black">Contact Form</h1>
                <div class="fb">
                     <form name="myform"  onsubmit="return validateform()">
                         <label for="fname">First Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

                         <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

                         <label for="subject">Subject</label>
                        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"  required></textarea>

                             <input type="submit" name='sub' value="Submit">
                         </form>
                    </div>
            </section>
		<script>  
        function validateform(){  
       
			swal("Thank You", "Form submitted successfully", "success");
           
		  
         
        }  
        </script> 
    </body>
</html>