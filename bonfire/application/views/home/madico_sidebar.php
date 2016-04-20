<!-- http://www.madico.com/category/window-films/feed/ -->
<style>

</style>
<div style="background: url('./bonfire/themes/default/images/grfx_hdr_feed.jpg'); height: 107px; width: 220px; text-align:center; font-weight:bold; font-size:16px; color:#fff; padding-top:5px;">Madico<br />Window Films<br />Blog</div>
<div style="background-color:#6F8598; color:#fff; padding:10px; font-weight:bold; font-size:12px;">
    
<?php if (isset($getfeed)) {?>    
    
<?php if (is_array($getfeed)) {?>
<?php foreach ($getfeed as $item) : ?>
	<p><a href="<?php echo $item['link'];?>" target="_blank" style="color:#fff;"><?php echo $item['title'];?></a><br />
	<span style="color:#000;"><?php echo substr($item['pubDate'],4,12); ?></span>
	</p>
	<br />
<?php endforeach; ?>
<?php }?>
    
<?php }?>   
    
</div>