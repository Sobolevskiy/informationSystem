(function(){
	var but=document.querySelectorAll('.wrn');
	
	for(var i=0; i<but.length; i++){
		but[i].addEventListener('click', function(event){
		if(!confirm("Вы правда уверены, что хотите это сделать?")){
			event.preventDefault();}
			});
		};
})();