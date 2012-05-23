<style>
.context1{
	padding-left:30px;background:#ccc;
}
</style>

<script type="text/javascript" src="../libraries/js/jquery-1.7.2.min.js"></script>

<script type="text/javascript">

(function(){
	

	$.fn.myTablePlugin=function(options){
		var defaultVal={author:"manoj",name:"myPlugin",version:"1.0"};
		var obj=$.extend(defaultVal,options);
		this.each(function(){
			$(this).hover(function(){
						$(this).addClass('context1');
						console.log(obj);
				},function(){
						$(this).removeClass('context1');
					});
			});

		};
})(jQuery)



$(document).ready(function(){
	$('.target').myTablePlugin({}); 
	
});






</script>
<p class="target">1-I'm testing your jQuery plugin</p>
<p class="target">2-I'm testing your jQuery plugin</p>







