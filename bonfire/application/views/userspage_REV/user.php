<!-- <h2>Watch the SunScape Video.</h2>
<img alt="" src="./uploads/video.jpg" style="width: 460px;"> -->
<!-- <p><?php //echo $user_content; ?></p> -->
<br />

<script src="./assets/js/jquery.ad-gallery.js" type="text/javascript" ></script>


<style>
.ad-gallery {
  width: 460px;
}
.ad-gallery, .ad-gallery * {
  /*margin: 0;
  padding: 0;*/
}
  .ad-gallery .ad-image-wrapper {
    /*width: 100%;*/
    height: 324px;
   /* margin-bottom: 10px;*/
    position: relative;
    overflow: hidden;
  }
    .ad-gallery .ad-image-wrapper .ad-loader {
      position: absolute;
      z-index: 10;
      top: 48%;
      left: 48%;
      border: 1px solid #CCC;
    }
    .ad-gallery .ad-image-wrapper .ad-next {
      position: absolute;
      right: 0;
      top: 0;
      width: 25%;
      height: 100%;
      cursor: pointer;
      display: block;
      z-index: 100;
    }
    .ad-gallery .ad-image-wrapper .ad-prev {
      position: absolute;
      left: 0;
      top: 0;
      width: 25%;
      height: 100%;
      cursor: pointer;
      display: block;
      z-index: 100;
    }
    .ad-gallery .ad-image-wrapper .ad-prev, .ad-gallery .ad-image-wrapper .ad-next {
      /* Or else IE will hide it */
      background: url(non-existing.jpg)\9
    }
      .ad-gallery .ad-image-wrapper .ad-prev .ad-prev-image, .ad-gallery .ad-image-wrapper .ad-next .ad-next-image {
        background: url(./images/ad_prev.png);
        width: 64px;
        height: 64px;
        display: none;
        position: absolute;
        top: 47%;
        left: 0;
        z-index: 101;
      }
      .ad-gallery .ad-image-wrapper .ad-next .ad-next-image {
        background: url(./images/ad_next.png);
        width: 64px;
        height: 64px;
        right: 0;
        left: auto;
      }
    .ad-gallery .ad-image-wrapper .ad-image {
      position: absolute;
      overflow: hidden;
      top: 0;
      left: 0;
      z-index: 9;
    }
      .ad-gallery .ad-image-wrapper .ad-image a img {
        border: 0;
      }
      .ad-gallery .ad-image-wrapper .ad-image .ad-image-description {
        position: absolute;
        bottom: 0px;
        left: 0px;
        padding: 7px;
        text-align: left;
        width: 100%;
        z-index: 2;
        background: url(./images/opa75.png);
        color: #fff;
      }
      * html .ad-gallery .ad-image-wrapper .ad-image .ad-image-description {
        background: none;
        filter:progid:DXImageTransform.Microsoft.AlphaImageLoader (enabled=true, sizingMethod=scale, src='images/opa75.png');
      }
        .ad-gallery .ad-image-wrapper .ad-image .ad-image-description .ad-description-title {
          display: block;
        }
  .ad-gallery .ad-controls {
    height: 20px;
  }
    .ad-gallery .ad-info {
      float: left;
    }
    .ad-gallery .ad-slideshow-controls {
      float: right;
    }
      .ad-gallery .ad-slideshow-controls .ad-slideshow-start, .ad-gallery .ad-slideshow-controls .ad-slideshow-stop {
        padding-left: 5px;
        cursor: pointer;
      }
      .ad-gallery .ad-slideshow-controls .ad-slideshow-countdown {
        padding-left: 5px;
        font-size: 0.9em;
      }
    .ad-gallery .ad-slideshow-running .ad-slideshow-start {
      cursor: default;
      font-style: italic;
    }
  .ad-gallery .ad-nav {
    width: 100%;
    position: relative;
  }
    .ad-gallery .ad-forward, .ad-gallery .ad-back {
      position: absolute;
      top: 0;
      height: 100%;
      z-index: 10;
    }
    /* IE 6 doesn't like height: 100% */
    * html .ad-gallery .ad-forward, .ad-gallery .ad-back {
      height: 100px;
    }
    .ad-gallery .ad-back {
      cursor: pointer;
      left: -0px;
      width: 32px;
      display: block;
      background: url(./images/ad_scroll_back.png) 0px 10px no-repeat;
    }
    .ad-gallery .ad-forward {
      cursor: pointer;
      display: block;
      right: -0px;
      width: 32px;
      background: url(./images/ad_scroll_forward.png) 0px 10px no-repeat;
    }
    .ad-gallery .ad-nav .ad-thumbs {
      overflow: hidden;
      width: 100%;
    }
      .ad-gallery .ad-thumbs .ad-thumb-list {
        float: left;
        width: 9000px;
        list-style: none;
      }
      .ad-gallery .ad-thumbs ul {
      	margin-left: 0;
      }
        .ad-gallery .ad-thumbs li {
          float: left;
          /*padding-right: 5px;*/
        }
          .ad-gallery .ad-thumbs li a {
            display: block;
          }
            .ad-gallery .ad-thumbs li a img {
              border: 5px solid #D8E4EA;
              display: block;
            }
            .ad-gallery .ad-thumbs li a.ad-active img {
              border: 5px solid #616161;
            }
/* Can't do display none, since Opera won't load the images then */
.ad-preloads {
  position: absolute;
  left: -9000px;
  top: -9000px;
}
  #descriptions {
    position: relative;
    height: 50px;
    background: #EEE;
    margin-top: 10px;
    width: 640px;
    padding: 10px;
    overflow: hidden;
  }
    #descriptions .ad-image-description {
      position: absolute;
    }
      #descriptions .ad-image-description .ad-description-title {
        display: block;
      }
</style>

<div class="ad-gallery">
	<div class="ad-image-wrapper">
	</div>
	<div class="ad-controlszzz">
	</div>
	<div class="ad-nav">
		<div class="ad-thumbs">
			<ul class="ad-thumb-list">
				<li>
					<a href="./uploads/sunscape-gallery-images01_lg.jpg">
						<img src="./uploads/sunscape-gallery-images01_tn.jpg" alt="Beautifies, as well as it protects">
					</a>
				</li>
				<li>
					<a href="./uploads/sunscape-gallery-images02_lg.jpg">
						<img src="./uploads/sunscape-gallery-images02_tn.jpg" alt="Rejects up to 83% of the summer sun's solar energy to reduce air conditioning costs">
					</a>
				</li>
				<li>
					<a href="./uploads/sunscape-gallery-images03_lg.jpg">
						<img src="./uploads/sunscape-gallery-images03_tn.jpg" alt="Dramatically reduces energy costs and increases comfort">
					</a>
				</li>
				<li>
					<a href="./uploads/sunscape-gallery-images04_lg.jpg">
						<img src="./uploads/sunscape-gallery-images04_tn.jpg" alt="Eliminates more than 99% of harmful UV rays">
					</a>
				</li>
				<li>
					<a href="./uploads/sunscape-gallery-images05_lg.jpg">
						<img src="./uploads/sunscape-gallery-images05_tn.jpg" alt="Eliminates visual clutter to enhance your building's appearance">
					</a>
				</li>
				<li>
					<a href="./uploads/sunscape-gallery-images06_lg.jpg">
						<img src="./uploads/sunscape-gallery-images06_tn.jpg" alt="Reduces annoying glare">
					</a>
				</li>
				<li>
					<a href="./uploads/sunscape-gallery-images07_lg.jpg">
						<img src="./uploads/sunscape-gallery-images07_tn.jpg" alt="Maintain a consistent indoor climate for greater productivity">
					</a>
				</li>
				<li>
					<a href="./uploads/sunscape-gallery-images08_lg.jpg">
						<img src="./uploads/sunscape-gallery-images08_tn.jpg" alt="Provides additional protection against shattered windows">
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<br clear="both" />

<script>
  $(function() {
	$('img.image3').data('ad-desc', 'This description is stored in the jquery code on the page, and not in the image alt tag.');  
    var galleries = $('.ad-gallery').adGallery({
      width: 460,
      height: 324,
	  slideshow: {
	    autostart: true,
	    stop_on_scroll: false
	  }
        });
    galleries[0].settings.effect = 'fade';
    
    $('#toggle-description').click(
      function() {
        if(!galleries[0].settings.description_wrapper) {
          galleries[0].settings.description_wrapper = $('#descriptions');
        } else {
          galleries[0].settings.description_wrapper = false;
        }
        return false;
      }
    );
  });
</script>
  
