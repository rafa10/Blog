 $(document).ready(function() {

	$('textarea#content').characterCounter();
// -------------------------navbar--------------------------------
	$(".button-collapse").sideNav();
//--------------------------bloc comments-------------------------
	 $("a#show").click(function(){
		 var form = $('.form').attr('id');
		 var comments = $('.comments').attr('id');
		 console.log(form);
		 console.log(comments);
		 $('#'+form).removeClass("hide").slideDown( 5000 );
		 $('#'+comments).removeClass("hide").slideDown( 5000 );
	 });
	 $("a#hide").click(function(){
		 var form = $('.form').attr('id');
		 var comments = $('.comments').attr('id');
		 $('#'+form).addClass("hide").slideUp( 5000 );
		 $('#'+comments).addClass("hide").slideUp( 5000 );
	 });
//-------------------------------------------------------------------
	 $("a#showPara").click(function(){
		 var para1 = $('#para1').data("field-id");
		 var para2 = $('#para2').data("field-id");
		 console.log(para1);
		 console.log(para2);
		 $('#' + para2).removeClass("hide").slideDown( 5000 );
		 $('#' + para1).addClass("hide");
	 });
//--------------------------------------------------------------------
	 /*$('a#pub').click(function(e){
		 e.preventDefault();
		 var link = $(this);
		 $.ajax({
			 url: link.attr('href'),
			 type: "GET",
			 success : function(html){
				 alert('l`\'article bien est bien desactiver')
				 location.reload();
			 },
			 error : function(resultat, statut, erreur){
				 alert(statut);
			 }
		 });
	 });
//-------------------------------------------------------------------
	 $('a#pub_off').click(function(e){
		 e.preventDefault();
		 var link = $(this);
		 $.ajax({
			 url: link.attr('href'),
			 type: "GET",
			 success : function(html){
				 alert('l`\'article est bien publier')
			 },
			 error : function(resultat, statut, erreur){
				 alert(statut);
			 }
		 });
	 });*/

      
  });

 