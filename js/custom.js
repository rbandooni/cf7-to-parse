/*
* Custom javascript file for form handling and other planned events
*
*/
jQuery(function(){
	
	jQuery('.button').on('click',function(evt){
		evt.preventDefault();
		var classname = document.getElementsByName('parseclass')[0].value;
		var appid = document.getElementsByName('appid')[0].value;
		var restid = document.getElementsByName('restid')[0].value;
		var masterid = document.getElementsByName('masterid')[0].value;
		jQuery.ajax({
			url:'../parseconnect.php',
			method:'post',
			data:data,
			success: function(rt){
				alert(rt);
			}
		});
	})
})