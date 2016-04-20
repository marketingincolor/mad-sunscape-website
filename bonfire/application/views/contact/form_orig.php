<style>
.hightlight { border:2px solid #9F1319; }
form input { margin-bottom:10px; }
#results { display:none; }
</style>

<div id="form" style="padding:0;">
	<br /><br />
	<a name="contact"></a>
	<form>
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
		<textarea type="text" name="comments" rows="6" cols="26" value="" style="vertical-align:top;"></textarea>
	
		<input type="hidden" name="msg_type" value="info">
		<input type="hidden" name="user_id" value="0">
	</form>

	<div class="submits">
		<input type="submit" name="submit" id="submit" value="Submit"  />	
	</div>
</div>

<div id="results" style="padding:0;">
	<p><strong>Thank you!</strong></p>
	<p>We will contact you at our earliest opportunity.</p>
</div>

<script>
$(document).ready(function() {

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
	    var msg_type = $('input[name=msg_type]');
	    var user_id = $('input[name=user_id]');

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
	            user_id : user_id.val(),
	            msg_type : msg_type.val(),
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
	            $('form')[0].reset();
    	        $('#form').hide();
	            $('#results').show();
	        }
	    });
	    return false;
	});

});
</script>
