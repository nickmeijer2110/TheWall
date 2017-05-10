
$( document ).ready(function() {
    $('#bevestig').hide();
});

$('#verwijder').click(function() {
  $('#verwijder').fadeOut(1000);
	$('#bevestig').delay(1500).fadeIn(1000);
});

$('.menu-btn').on('click', function() {

		var elem = $(this),
		    item = $('.menu__item'),
		    active = 'is-active',
		    play = 'menu__item--play';

		if (  elem.hasClass(active) ) {
			elem.removeClass(active);
			$(item.get().reverse()).each(function(i) {
				var row = $(this);
					setTimeout(function() {
						row.removeClass(play);
				}, 50*i);
			});
		}

		else {
			elem.addClass(active);
			item.each(function(i) {
				var row = $(this);
					setTimeout(function() {
						row.addClass(play);
				}, 50*i);
			});
		}

	});

  document.addEventListener('DOMContentLoaded', function(){
       Typed.new('.slogan', {
         strings: ["The Wall", "Deel jouw in-game ervaringen met anderen."],
         typeSpeed: 30,
         showCursor: false,
          cursorChar: "",
          loop: true,
	        backDelay: 3000,
       });
   });

   if ($('#back-to-top').length) {
       var scrollTrigger = 100, // px
           backToTop = function () {
               var scrollTop = $(window).scrollTop();
               if (scrollTop > scrollTrigger) {
                   $('#back-to-top').addClass('show');
               } else {
                   $('#back-to-top').removeClass('show');
               }
           };
       backToTop();
       $(window).on('scroll', function () {
           backToTop();
       });
       $('#back-to-top').on('click', function (e) {
           e.preventDefault();
           $('html,body').animate({
               scrollTop: 0
           }, 700);
       });
   }


  $('.tegel')
    // tile mouse actions
    .on('mouseover', function(){
      $(this).children('.afbeelding').css({'transform': 'scale('+ $(this).attr('data-scale') +')'});
    })
    .on('mouseout', function(){
      $(this).children('.afbeelding').css({'transform': 'scale(1)'});
    })
    .on('mousemove', function(e){
      $(this).children('.afbeelding').css({'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +'%'});
    })

    .each(function(){
      $(this)
        .append('<div class="afbeelding"></div>')
        .children('.afbeelding').css({'background-image': 'url('+ $(this).attr('data-image') +')'});
    })

		$("#bibliotheek").click(function() {
    $('html,body').animate({
        scrollTop: $(".categorie-titel-content").offset().top},
        '3000');
});

function expand() {
  $(".search").toggleClass("close");
  $(".input").toggleClass("square");
  if ($('.search').hasClass('close')) {
    $('input').focus();
  } else {
    $('input').blur();
  }
}
$('button').on('click', expand);


$('body').on('click', '.plus-permalink', function() {
  var $post = $(this).closest('.post');
	$('.post').not($post).removeClass('open');
	$post.toggleClass('open');
  return false;
})

function showMyImage(fileInput) {
			 var files = fileInput.files;
			 for (var i = 0; i < files.length; i++) {
					 var file = files[i];
					 var imageType = /image.*/;
					 if (!file.type.match(imageType)) {
							 continue;
					 }
					 var img=document.getElementById("thumbnail");
					 img.file = file;
					 var reader = new FileReader();
					 reader.onload = (function(aImg) {
							 return function(e) {
									 aImg.src = e.target.result;
							 };
					 })(img);
					 reader.readAsDataURL(file);
			 }
	 }


var maxchar = 150;
var i = document.getElementById("beschrijving");
var c = document.getElementById("count");
c.innerHTML = maxchar;

i.addEventListener("keydown",count);

function count(e){
    var len =  i.value.length;
    if (len >= maxchar){
       e.preventDefault();
    } else{
       c.innerHTML = maxchar - len-1;
    }
}
