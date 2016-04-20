<!doctype html>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
<head>
	<meta charset="UTF-8" />
	<meta property="og:description"
          content="Sunscape Window Films celebrate everything we love about the sun, while creating a safe, energy-efficient environment that captivates as well as it protects. Your family will enjoy cooler summers and warmer winters, along with the benefits of reduced glare and UV exposure, in a superior window film product that lasts for a lifetime."/>
	<title><?php echo $user_busname.' - '.$user_city.', '.$user_state.' - '.config_item('site.title'); ?></title>
	
	<link rel="shortcut icon" href="<?php echo site_url();?>favicon.ico">
	<?php echo Assets::css('screen','screen', true); ?>
	<?php echo Assets::css('960','screen', true); ?>
	<?php echo Assets::external_js('js/jquery-1.6.4.min.js'); ?>

<style>
/* Z-index of #mask must lower than #boxes .window */
#mask {
	position:absolute;
	z-index:9000;
	background-color:#000;
	display:none;
}
#boxes .window {
	position:absolute;
	width:440px;
	/*height:200px;*/
	display:none;
	z-index:9999;
	padding:20px;
	font-size: 12px;
}

/* Customize your modal window here, you can add background image too */
#boxes #dialog {
	width:520px;
	height:460px;
	background-color:#fff;
}
#boxes #dialog #actual, #boxes #dialog #ractual {
	overflow: auto;
	height:460px;
	position: absolute;
}
#dialog p {
	margin: 10px 14px;
}
#closex {
    left: 538px;
    position: absolute;
    top: -18px;
}
#boxes label {
	margin-bottom:15px;
	vertical-align: top;
	
}
.hightlight {
    border:2px solid #9F1319;
}
#fbsneak {
	display:none;
}
</style>

</head>
<body>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '308562475865736', // App ID
      channelUrl : '//www.sunscapefilms.com/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional initialization code here
  };

  (function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=308562475865736";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
  
</script>

<div id="fbsneak">Sunscape Window Films celebrate everything we love about the sun, while creating a safe, energy-efficient environment that captivates as well as it protects. Your family will enjoy cooler summers and warmer winters, along with the benefits of reduced glare and UV exposure, in a superior window film product that lasts for a lifetime.</div>


<div id="boxes">
	<!-- #customize your modal window here -->
	<div id="dialog" class="window">
		<img src="<?php echo base_url(); ?>bonfire/themes/linkbox/images/btn_close.png" id="closex">
		<div id="actual">
			<img src="<?php echo base_url(); ?>bonfire/themes/admin/images/grfx_admin_logo.png" width="140">
			<p>For more information about Sunscape Window Films and our services, 
			please complete and submit the form below. 
			<b>With your inquiry, you'll also be able to download a free report from 
			IWFA (International Window Film Association) - "Window Film: Surprising 
			Facts You Need To Know."</b></p>
			<br />
			<form>
				<input type="hidden" name="id" value="<?php echo $user_id; ?>">
				<label for="first_name">First Name:</label>
				<input type="text" name="first_name" value="">
				<label for="last_name">Last Name:</label>
				<input type="text" name="last_name" value="">
				<!-- <label for="address_1">Address:</label> -->
				<input type="hidden" name="address_1" value="">
				<!-- <label for="address_2">&nbsp;</label> -->
				<input type="hidden" name="address_2" value="">
				<!-- <label for="city">City:</label> -->
				<input type="hidden" name="city" value="">
				<!-- <label for="state">State:</label> -->
				<input type="hidden" name="state" value="">
				<!-- <label for="zip">ZIP:</label> -->
				<input type="hidden" name="zip" value="">
				<label for="email">Email Address:</label>
				<input type="text" name="email" value="">
				<label for="phone">Phone Number:</label>
				<input type="text" name="phone" value="">
	        	<label for="comments">Comments:</label>
	        	<textarea name="comments" value="" cols="35" rows="5"></textarea><br />
	        </form>
	        <p style="float:left; padding-left:150px;">
	        <input type="button" name="submit" id="submit" value="Submit"><input type="button" name="cancel" value="Cancel" class="close">
	        </p>
        </div>
		<div id="ractual" style="display:none;">
			<img src="<?php echo base_url(); ?>bonfire/themes/admin/images/grfx_admin_logo.png" width="140">
			<p>Thank you for your inquiry! We will contact you at our earliest opportunity. In the meantime, please feel free to 
			<b>download this FREE report</b> (optional).</p>
			<br />
			<p style="text-align:center;"><a href="../uploads/IWFA-Booklet.pdf"><img src="../images/btn_download.png"></a></p>
			<br /><br /><br />
	        <p style="text-align:center;">
	        <input type="button" name="close" value="Close" class="closer">
	        </p>
		</div>
    </div>

    <!-- Do not remove div#mask, because you'll need it to fill the whole screen --> 
    <div id="mask"></div>
</div>	

	<div class="page container_16">
	
		<!-- Header -->
		<?php echo theme_view('header'); ?>
		<div class="logo">
			<a href="../"><img src="<?php echo base_url(); ?>bonfire/themes/linkbox/images/grfx_logo.png" style="padding:4px 0px 0px 28px;"></a>
		</div>
		<br clear="all" />
		<div class="nav grid_4">
			<?php Template::block('navbar', 'home/lbx_nav'); ?>
		</div>
		
		<div class="main grid_8">
			<div class="card whitebox">
				
				<div class="cardphoto">
					<img src="<?php echo base_url(); ?><?php echo ($user_image ? $user_image : 'images/grfx_photo_dealer.jpg' ); ?>"><br />
					<?php if ($user_address != ' ') { ?>
					<a href = "http://maps.google.com/maps?f=q&hl=en&q=<?php echo str_replace(array(' ','<br>','#'),'+',$user_address) ?>,+<?php echo str_replace(' ','+',$user_city) ?>,+<?php echo $user_state ?>,+<?php echo $user_zip ?>" target = "_new"><img src="<?php echo base_url(); ?>images/btn_find_us.jpg"></a><br />
					<?php } ?>
					<?php echo anchor('/contact-us', 'Find a Dealer closer to you','style="color:#bbb;"'); ?>
				</div>
					
				<?php Template::block('address'); ?>
				
			</div>
			<div class="vcard whitebox">
			
				<p style="float:left;">
				<a href="http://twitter.com/home/?status=Looking+for+a+quality+window+film+installer+in+<?php echo str_replace(' ','+',$user_city) ?>?+<?php echo current_url(); ?>"  target="_blank" style="display:inline-block; height:22px;"><img src="<?php echo base_url(); ?>images/twitter_icon.png"></a>
				<fb:like href="http://www.sunscapefilms.com/<?php echo $get_vcard; ?>" send="true" layout="button_count" width="150" show_faces="false" style="top:-4px;"></fb:like>
				</p>
				<p style="float:right;"><?php echo anchor('vcard/'.$get_vcard.'', 'Download Vcard','style="color:#bbb;"'); ?>&nbsp;<img src="../images/btn_vcard.png" style="vertical-align: middle;"></p>
			</div>
					
				<?php echo isset($content) ? $content : Template::yield(); ?>

		</div>	<!-- /main -->
		<div class="right grid_4 blackbox">
			
			<!-- #dialog is the id of a DIV defined in the code below href="#dialog" -->
			<a href="" name="modal"><img src="<?php echo base_url(); ?>images/btn_contact.jpg"></a>
			<br /><br />
			<p style="text-align:left; margin:10px 10px; font-weight:bold;">FREE DOWNLOAD:<br />Contact Us Now and Receive A Free Report From IWFA (International Window Film Association) - "Window Film: Surprising Facts You Need To Know"</p>
			<p style="text-align:left; margin:10px 10px;">
			<a href="" name="modal"><img src="<?php echo base_url(); ?>images/grfx_whitepaper.jpg" style="float:left;"></a>
			Through advanced engineering, today's window films give you energy savings, a neutral carbon footprint, UV blocking, 
			glare reduction and security benefits, along with a wide range of aesthetic possibilities. <a href="" name="modal" style="color:white;"><strong>Download it here.</strong></a></p>
			<!-- this is the right column -->
			
		</div>
	<?php echo theme_view('footer'); ?>

	</div>	<!-- /page -->
	<br />
	<div id="debug"></div>

	

	<script>
	$(document).ready(function() {
		// Reporting Function Jquery
		// write pageveiw data to reporting table
	    var ip = '<?php echo $_SERVER['REMOTE_ADDR']?>';
	    var ref = '<?php echo $_SERVER['REQUEST_URI']?>';
	    var brs = '<?php echo $_SERVER['HTTP_USER_AGENT']?>';
	    var dts = Math.round(new Date().getTime() / 1000);
	    $.ajax({
	        url : 'report',
	        type : 'post',
	        dataType : 'json',
	        data : {
	            user_id : '<?php echo $user_id; ?>',
	            ip_address : ip,
	            ref : ref,
	            agent : brs
	        }
	    });

		// Jquery functions for modal lightbox operation
        //select all the a tag with name equal to modal
        $('a[name=modal]').click(function(e) {
            //Cancel the link behavior
            e.preventDefault();
            //Get the A tag
            //var id = $(this).attr('href');
            var id = '#dialog';
            //Get the screen height and width
            var maskHeight = $(document).height();
            var maskWidth = $(window).width();
            //Set height and width to mask to fill up the whole screen
            $('#mask').css({'width':maskWidth,'height':maskHeight});
            //transition effect
            $('#mask').fadeIn(1000);
            $('#mask').fadeTo("fast",0.8);
            //Get the window height and width
            var winH = $(window).height();
            var winW = $(window).width();
            //Set the popup window to center
            $(id).css('top',  winH/2-$(id).height()/2);
            $(id).css('left', winW/2-$(id).width()/2);
            //transition effect
            $(id).fadeIn(2000);
        });
         
        //if close button is clicked
        $('.window .close').click(function (e) {
            //Cancel the link behavior
            e.preventDefault();
            $('form')[0].reset();
            $('#mask, .window').hide();
        });
        $('.closer').click(function (e) {
            //Cancel the link behavior
            e.preventDefault();
            $('form')[0].reset();
            $('#mask, .window').hide();
        	$('#actual').show();
        	$('#ractual').hide();
        });
        
        //if mask is clicked
        $('#mask').click(function () {
        	$('form')[0].reset();
            $(this).hide();
            $('.window').hide();
        });
        
        //if closex is clicked
        $('#closex').click(function () {
        	$('form')[0].reset();
            $('#mask, .window').hide();
        });
        
		//if submit button is clicked
        $('#submit').click(function () {
            //Get the data from all the fields
    	    var first_name = $('input[name=first_name]');
    	    var last_name = $('input[name=last_name]');
    	    var address_1 = $('input[name=address_1]');
    	    var address_2 = $('input[name=address_2]');
    	    var city = $('input[name=city]');
    	    var state = $('input[name=state]');
    	    var zip = $('input[name=zip]');
    	    var email = $('input[name=email]');
    	    var phone = $('input[name=phone]');
    	    var comments = $('textarea[name=comments]');

    		if (first_name.val()=='') {
    			first_name.addClass('hightlight');
    			return false;
    		} else first_name.removeClass('hightlight');
    		if (last_name.val()=='') {
    			last_name.addClass('hightlight');
    			return false;
    		} else last_name.removeClass('hightlight');
			if (email.val()=='') {
				email.addClass('hightlight');
				return false;
			} else email.removeClass('hightlight');
            
    	    $.ajax({
    	        url : 'submit',
    	        type : 'post',
    	        dataType : 'json',
    	        data : {
    	            user_id : '<?php echo $user_id; ?>',
    	            to_email : '<?php echo $user_email; ?>',
    	            user_sms :  '<?php echo $user_sms; ?>',
    	            msg_type : 'contact',
    	            first_name : first_name.val(),
    	            last_name : last_name.val(),
    	            address_1 : address_1.val(),
    	            address_2 : address_2.val(),
    	            city : city.val(),
    	            state : state.val(),
    	            zip : zip.val(),
    	            email : email.val(),
    	            phone : phone.val(),
    	            comments : comments.val()
    	        },

    	        success : function(result) {
    	        	//insert here to execute when url has returned a result/success
    	            /*if (result) {
    	            	// execute if true
    	            	$('form')[0].reset();
    	            	$('#mask, .window').hide();
    	            } else {
    	                //execute if false
    	                $('form')[0].reset();
    	            	$('#mask, .window').hide();
    	            }*/
    	            $('form')[0].reset();
    	        	$('#actual').hide();
	            	$('#ractual').show();
    	        }
    	    });
            return false;
        });

	    
        $('.sadfdsf').click(function (event){
        	 
            var url = $(this).attr("href");
            var windowName = "popUp";//$(this).attr("name");
            var windowSize = windowSizeArray[$(this).attr("rel")];

            window.open(url, windowName, windowSize);

            event.preventDefault();

        });

	    
	});

	</script>
<?php echo $google_analytics; ?>
</body>
</html>