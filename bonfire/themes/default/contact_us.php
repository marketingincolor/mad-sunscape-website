<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />

	<title><?php echo $page_title; ?> - <?php echo config_item('site.title'); ?></title>

	<link rel="shortcut icon" href="<?php echo site_url();?>favicon.ico">
	<?php Assets::add_css('960','screen'); ?>
	<?php echo Assets::css(); ?>
	<?php echo Assets::external_js('js/jquery-1.6.4.min.js'); ?>
	<style>
		#togglebox_2, #togglebox_3 {
			display: none;
		}
	</style>
</head>
<body><a name="contact"></a>
<?php echo $google_analytics; ?>
	<div class="page container_16">

		<!-- Header -->
		<?php echo theme_view('header'); ?>
		<div class="logo">
			<a href="./"><img src="./bonfire/themes/default/images/grfx_logo.png" style="padding:4px 0px 0px 28px;"></a>
		</div>
		<div class="nav grid_4">
			<?php Template::block('navbar', 'home/main_nav'); ?>
			<h3 style="padding-top:20px; padding-left:20px; color:#416880;">1-888-887-2022</h3>
		</div>

		<div class="main grid_12">
			<br />
			<div class=" grid_8 alpha" id="togglebox_1">
				<div class="dkbluebox rounded">
					<div style="display:inline-block; margin:10px;">
						<p style="font-size:18px; line-height:20px; font-weight:bold; color:#fff; margin-bottom:14px; margin-top:5px;">
							<img src="images/grfx_arr_contactus.jpg" style="float:right;">
							For more information about Sunscape Films, use our Dealer Directory to contact a Sunscape Dealer near you.
						</p>
						<br />
						<p style="font-size:14px; font-weight:bold; color:#fff; margin-bottom:14px;">
							If you need help choosing a dealer or have any other questions, please contact the Sunscape manufacturing
							offices:
						</p>
						<div style="padding:0; width:50%; float:left; text-align:center;">
							<div style="padding:0; font-weight:bold; letter-spacing:1px; color:#fff;">Call us:</div>
							<div style="padding:0; font-size:14px; font-weight:bold; letter-spacing:1px; color:#fff; margin-bottom:14px;">1-888-887-2022</div>
						</div>
						<div style="padding:0; width:50%; float:right; text-align:center;">
							<div style="padding:0; font-weight:bold; letter-spacing:1px; color:#fff">Email us:</div>
							<div style="padding:0; font-size:14px; font-weight:bold; letter-spacing:1px; color:#fff; margin-bottom:14px;"><a href="mailto:windowfilm@madico.com?subject=Consumer Inquiry from Sunscape Films Website" style="color:#fff; text-decoration:underline;">sunscape@madico.com</a></div>
						</div>
						<br clear="all" /><br />
						<p style="font-size:14px; font-weight:bold; color:#fff; margin-bottom:12px; text-align:center;">
							<a href="join-us" style="color:#2c4f69; text-decoration:underline; display:inline-block; padding:4px 8px; background-color:#c1d2dc;">Interested in becoming a Sunscape dealer?</a><!-- href="#" name="revealer"-->
						</p>
                        <!--<p style="font-size:16px; font-weight:bold; color:#fff; margin-bottom:12px; text-align:center;">
                            <a href="#" name="revealer2" style="color:#fff; text-decoration:underline;">Sunscape Distribution Partners</a>
                        </p>
                        <br />-->
					</div>
				</div>
				<br />
				<img src="images/grfx_photo_contactus.jpg" width="460px" style="margin:10px 0px;">
				<br />
			</div>

			<div class=" grid_8 alpha" id="togglebox_2">
				<div class="dkbluebox rounded">
					<div>
						<p style="font-size:24px; font-weight:bold; color:#fff; margin-bottom:4px;">
							Become A Sunscape Dealer
						</p>
						<br />
						<p style="font-size:14px; font-weight:bold; color:#fff; margin-bottom:4px;">
							We're looking for highly qualified professionals to represent the Sunscape brand all across
							the United States. If you're interested in learning more about becoming a Sunscape dealer,
							please complete and submit the form below.
						</p>
						<br />
					</div>
				</div>
				<br />
				<div class="bluebox rounded">
					<div><?php echo isset($content) ? $content : Template::yield_content(); ?></div>
				</div>
			</div>

            <div class=" grid_8 alpha" id="togglebox_3">
                <div class="dkbluebox rounded">
                    <div>
                        <p style="font-size:24px; font-weight:bold; color:#fff; margin-bottom:4px;">
                            Sunscape Distribution Partners
                        </p>
                        <br />
                        <p style="font-size:14px; font-weight:normal; color:#fff; margin-bottom:4px;">
                            <strong>United States:</strong><br />
                            Midwest Marketing<br />
                            2000 E. War Memorial Dr<br />
                            Peoria, IL 61614<br />
                            Toll-Free: (800) 638-4332<br />
                            Tel: (309) 688-8858<br />
                            Fax: (309) 688-8894<br />
                            Email: <a href="mailto:jim@midwestmarketinginc.com" style="color:#fff;">jim@midwestmarketinginc.com</a><br />
                            Web: <a href="http://www.midwestmarketinginc.com" target="_blank" style="color:#fff;">www.midwestmarketinginc.com</a><br />
                            Markets: Illinois, Wisconsin, Indiana, Ohio, Michigan, Minnesota<br />
                            <br />
                            <strong>Canada:</strong><br />
                            Window Film Systems<br />
                            DIV. 1085 Holdings Ltd.<br />
                            1941 Mallard Road<br />
                            London, ON N6H 5M1<br />
                            Canada<br />
                            Toll-Free: (800) 387-1772<br />
                            Fax: (519) 641-7803<br />
                            Email: <a href="mailto:peter@windowfilmsystems.com" style="color:#fff;">peter@windowfilmsystems.com</a><br />
                            Web: <a href="http://www.windowfilmsystems.com" target="_blank" style="color:#fff;">www.windowfilmsystems.com</a><br />
                        </p>
                        <br />
                    </div>
                </div>
                <br />
            </div>

			<div class="grid_4 omega">
				<div>

                    <!--<style>
                        #showbar { text-align:center; width:100%; font-weight:bold; color:#000; }
                        #showbar a { color:#000; }
                        a.line { text-decoration:underline; }
                        a.noline { text-decoration:none; }
                        #side-outer { max-height:700px; width:220px; background-color:#FFEDBF; }
                        #side-inner-us, #side-inner-ca { padding-left:10px; max-height:540px; width:210px; overflow:auto; color:#2C4F69; }
                        #side-inner-us a, #side-inner-ca a { color:#2C4F69; text-decoration:underline; margin-bottom:3px; font-size:11px; }
                        #side-inner-us p, #side-inner-ca p { font-size:12px; }
                    </style>-->

                    <div id="side-outer">
                        <a href="http://dealerdirectory.madico.com/" target="_blank"><img src="./uploads/Dealer-Directory-Skyscaper-Ad.jpg" style="width:100%" /></a><br />
                        <!--<div id="showbar">
                            <a href="#" name="showus" class="noline">United States</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#" name="showca" class="line">Canada</a><hr style="width:90%;">
                        </div>
                        <div id="side-inner-us">
                            <?php //Template::block('sidebar', 'home/us_list_sidebar', $us_data_list); ?>
                        </div>

                        <div id="side-inner-ca" style="display:none;">
                            <?php //Template::block('sidebar', 'home/ca_list_sidebar', $ca_data_list); ?>
                        </div>-->
                    </div>

                </div>
			</div>

			<br clear="both" /><br />
		</div>	<!-- /main -->

	<?php echo theme_view('footer'); ?>
	<div id="contact">&nbsp;</div>
	</div>	<!-- /page -->
	<br />
	<div id="debug"></div>

	<script>
	$(document).ready(function() {
		if(location.hash) {
			//$('#togglebox_1').hide();
			//$('#togglebox_2').show();
            //$('#togglebox_3').show();
            $('#side-inner-us').show();
            $('#side-inner-ca').hide();
		};

        //select the a tag with name equal to revealer
        $('a[name=revealer]').click(function(e) {
            //Cancel the link behavior
            e.preventDefault();
            //$('#togglebox_1').hide();
            //$('#togglebox_2').show();
        });
        //select the a tag with name equal to revealer
        $('a[name=revealer2]').click(function(e) {
            //Cancel the link behavior
            e.preventDefault();
            //$('#togglebox_1').hide();
            //$('#togglebox_3').show();
        });
        //select the a tag with name equal to showus
        $('a[name=showus]').click(function(e) {
            //Cancel the link behavior
            e.preventDefault();
            $('a[name=showus]').removeClass("noline line").addClass("noline");
            $('a[name=showca]').removeClass("noline line").addClass("line");
            $('#side-inner-us').show();
            $('#side-inner-ca').hide();
        });
        //select the a tag with name equal to showca
        $('a[name=showca]').click(function(e) {
            //Cancel the link behavior
            e.preventDefault();
            $('a[name=showus]').removeClass("noline line").addClass("line");
            $('a[name=showca]').removeClass("noline line").addClass("noline");
            $('#side-inner-us').hide();
            $('#side-inner-ca').show();
        });

	});
	</script>


<?php //echo $google_analytics; ?>
</body>
</html>
