<ul>
	<li <?php echo $this->uri->segment(1) == '' ? 'class="current"' : '' ?>>
	<?php echo anchor('/', 'Home', 'class="base"'); ?></li>
	
	<li <?php echo $this->uri->segment(1) == 'why-window-film' ? 'class="current"' : '' ?>>
	<?php echo anchor('/why-window-film', 'Why Window Film'); ?></li>
	
	<li <?php echo $this->uri->segment(1) == 'why-sunscape' ? 'class="current"' : '' ?>>
	<?php echo anchor('/why-sunscape', 'Why Sunscape'); ?></li>
	
	<li <?php echo $this->uri->segment(1) == 'our-products' ? 'class="current"' : '' ?>>
	<?php echo anchor('/our-products', 'Our Products'); ?></li>
	
	<li <?php echo $this->uri->segment(1) == 'performance-data' ? 'class="current"' : '' ?>>
	<?php echo anchor('/performance-data', 'Performance Data'); ?></li>
	
	<li <?php echo $this->uri->segment(1) == 'gallery' ? 'class="current"' : '' ?>>
	<?php echo anchor('/gallery', 'Gallery'); ?></li>
	
	<li <?php echo $this->uri->segment(1) == 'testimonials' ? 'class="current"' : '' ?>>
	<?php echo anchor('/testimonials', 'Testimonials'); ?></li>
	
	<li <?php echo $this->uri->segment(1) == 'about-madico' ? 'class="current"' : '' ?>>
	<?php echo anchor('/about-madico', 'About Madico'); ?></li>
	
	<li <?php echo $this->uri->segment(1) == 'associations' ? 'class="current"' : '' ?>>
	<?php echo anchor('/associations', 'Associations'); ?></li>
	
	<li <?php echo $this->uri->segment(1) == 'contact-us' ? 'class="current"' : '' ?>>
	<?php echo anchor('/contact-us', 'Contact Us'); ?></li>
	
</ul>

