/*! Reporting Function Jquery */

$(document).ready(function() {
	// put write of data to reporting table here.
	
    var ip = '111.222.111.222';//'<!--#echo var="REMOTE_ADDR"-->';
    var dts = Math.round(new Date().getTime() / 1000);
	
    $.ajax({
        url : 'report',
        type : 'post',
        dataType : 'json',
        data : {
            ip_address : ip,
            datetime : dts,
            other : 'other'
        },
        beforeSend : function() {
            //insert here to execute before data is sent to url
        },
        complete : function() {
            //insert here to execute when data has been sent to url
        },
        success : function(result) {
        	//insert here to execcute when url has returned a result/success
            if (result) {
            	// execute if true
            } else {
                //execute if false
            }

        }
    });
});
