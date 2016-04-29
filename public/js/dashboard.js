$(document).ready(function() {

	$('select').material_select();

	$('.datepicker').pickadate({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: 15 // Creates a dropdown of 15 years to control year
	});

	$('textarea#desc').characterCounter();

	// Initialize collapse button
	$(".button-collapse").sideNav();
	// Initialize collapsible (uncomment the line below if you use the dropdown variation)
	//$('.collapsible').collapsible();

	$('.button-collapse').sideNav({
			menuWidth: 300, // Default is 240
			edge: 'right', // Choose the horizontal origin
			closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
		}
	);

	// Show sideNav
	$('.button-collapse').sideNav('show');
	// Hide sideNav
	$('.button-collapse').sideNav('hide');

	//$(".dropdown-button").dropdown();

	$('.notification-button').dropdown({
			inDuration: 300,
			outDuration: 225,
			constrain_width: false, // Does not change width of dropdown to that of the activator
			hover: true, // Activate on hover
			gutter: 0, // Spacing from edge
			belowOrigin: false, // Displays dropdown below the button
			alignment: 'left' // Displays dropdown with edge aligned to the left of button
		}
	);

	//$('.btn-close a').click(function(e){
	//    e.preventDefault();
	//
	//    var link = $(this);
	//    $.ajax({
	//        url: link.attr('href'),
	//        type: "GET",
	//        success : function(html){
	//            alert('le film est bien supprimer')
	//        },
	//        error : function(resultat, statut, erreur){
	//            alert(statut);
	//        }
	//    });
	//});


	function readImage(input){
		if(input.files && input.files[0]){
			var reader = new FileReader();

			reader.onload = function(e){
				$('#img').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$('#imgInp').change(function(){
		readImage(this);
		$('div').removeClass('hide');

	})

});



