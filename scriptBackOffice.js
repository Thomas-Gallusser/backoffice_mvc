// SIDE BAR MENU
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}


// GALERIE
var maxImg = 1;
// Display/hide galery
//$('#preview')[0].src = './' + $('#imgFromGalery')[0].value;
function toggleGalery(){
  $( "#galeryBg" ).toggle();

  if($('#imgFromGalery')[0].value != ""){
    $('#preview').attr("src",$('#imgFromGalery').val());
  }

  if ($('#contentGalery').width() > 0) {
    maxImg = parseInt($('#contentGalery').width() / 134)*2;
    $('#paginGalery').empty();
    var pagination = "";
    if(typeof(nbImg) != "undefined"){
      if (nbImg > maxImg) {
        for(var i=1, v=Math.ceil(nbImg/maxImg) ; i<=v ; i++){
          pagination += '<li class="page-item '+((i==1)?'active':'') +'"><a class="page-link" onClick="switchPageGalery('+i+')">'+i+'</a></li>';
        }
      }

      $('#paginGalery').append(pagination);

      createImage(1);
    }
  }
}

window.onresize = function() {
  if ($('#contentGalery').width() > 0) {
    maxImg = parseInt($('#contentGalery').width() / 134)*2;
    $('#paginGalery').empty();
    var pagination = "";
    if(typeof(nbImg) != "undefined"){
      if (nbImg > maxImg) {
        for(var i=1, v=Math.ceil(nbImg/maxImg) ; i<=v ; i++){
          pagination += '<li class="page-item '+((i==1)?'active':'') +'"><a class="page-link" onClick="switchPageGalery('+i+')">'+i+'</a></li>';
        }
      }

      $('#paginGalery').append(pagination);

      createImage(1);
    }
  }
}

// Select an image in the galery
function selectImg(el){
  resetSelectImg();
  $(el).parent().css('box-shadow','0px 0px 5px 2px rgba(0,123,255,1)');
  $(el).parent().append('<i id="checkIcon" class="fas fa-check-square fa-2x"></i>');
  $('#imgFromGalery').val($(el).attr('src'));
}

// Reset selection of an image in the galery
function resetSelectImg(){
  var el = $('.cImg');
  $('#checkIcon').remove();
  $(el).each(function() {
    $(this).css('box-shadow','none');
  });
}

// Create page with table of images
function createImage(page){
  $('#contentGalery').empty();
  var images = "";
  for(var i=((page-1)*maxImg), v=i+maxImg-1 ; i<=v ; i++){
    if(i < nbImg)
      images += '<div class="text-center cImg"><img src="img/uploads/'+tableImg[i]+'" onClick="selectImg(this)" /></div>';
    else
      break;
  }

  $('#contentGalery').append(images);
}

// Switch page
function switchPageGalery(page){
  var nbDisplayed = $('.cImg').length;
  if((page * maxImg) > nbDisplayed && nbImg > nbDisplayed){
    createImage(page);
  }

  // displayElements(page);

  var pagination = $('#paginGalery li');
  for(var i=0, v=pagination.length ; i<=v ; i++){
    if((i+1) == page)
      $(pagination[i]).addClass('active');
    else
      $(pagination[i]).removeClass('active');
  }
}

function onSignIn(googleUser) {
  $.ajax({
  type: 'POST',
  url: 'views/backoffice/logingoogle.php',
  dataeType: 'text',
  data: 'id=' + googleUser.getAuthResponse().id_token,
  success: function(result) {
    console.log(result);
   }
 });
}

// Display elements
// function displayElements(page){
//   var img = $('.cImg');
//   var firstElement =((page - 1) * maxImg);
//   var lastElement = firstElement + maxImg-1;
//
//   for(var i=0, v=img.length ; i<=v ; i++){
//     if(i >= firstElement && i<= lastElement)
//       $(img[i]).css('display','inline-block');
//     else
//       $(img[i]).css('display','none');
//   }
// }
