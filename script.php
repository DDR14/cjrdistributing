<script type="text/javascript" src="http://cjrtec.com/dist/js/jquery.js"></script>
<script type="text/javascript" src="http://cjrtec.com/dist/js/zip2.js"></script>
<script type="text/javascript" src="http://cjrtec.com/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://cjrtec.com/dist/js/bootstrap.js"></script>
<script type="text/javascript" src="http://cjrtec.com/dist/js/custom.js"></script>
<script type="text/javascript" src="http://cjrtec.com/dist/js/country-code.js"></script>
<script type="text/javascript" src='http://cjrtec.com/dist/js/myjs.js'></script>



<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha256-KM512VNnjElC30ehFwehXjx1YCHPiQkOPmqnrWtpccM=" crossorigin="anonymous"></script>
  


<script type="text/javascript">
      
  
    /*Scroll Spy*/
    $('body').scrollspy({ target: '#spy', offset:80});

    /*Smooth link animation*/
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });

   


</script>


<script type="text/javascript">
  var vid = document.getElementById("music");

function muteSound() { 
    vid.muted = true;
    document.getElementById('soundBtn').innerHTML = "Enable Sound";
    document.getElementById('soundBtn').setAttribute( "onClick", "enableSound()" );
}
function enableSound() {
  vid.muted = false;
    document.getElementById('soundBtn').innerHTML = "Mute Sound";
    document.getElementById('soundBtn').setAttribute( "onClick", "muteSound()" );

}
</script>


<script type="text/javascript">
   var targetOffset = $("#anchor-point").offset().top;

var $w = $(window).scroll(function(){
    if ( $w.scrollTop() > targetOffset ) {   
        $('#sidebar-wrapper').css({"position":"static"});
    } else {
      // ...
      $('#sidebar-wrapper').css({"position":"fixed"});
    }
});
</script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker({ minDate: 1, maxDate: "+1M +10D" });
  } );
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $(".navbar-toggle").on("click", function () {
      $(this).toggleClass("active");
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 50) {
        $('#back-to-top').fadeIn();
      } else {
        $('#back-to-top').fadeOut();
      }
    });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
          $('#back-to-top').tooltip('hide');
          $('body,html').animate({
            scrollTop: 0
          }, 800);
          return false;
        });

        $('#back-to-top').tooltip('show');
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function () {
        var winWidth = $(window).width();
        var winHeight = ($(window).height() - 120) + "px";
        $('.carousel').css({
          "height": winHeight
        });


        $(window).resize(function () {
          var winHeight = ($(window).height() - 120) + 'px';
          $('.carousel').css({
            "height": winHeight
          });

        });

        

      });
    </script>
    <script type="text/javascript">
      if (winWidth < 1000) {
        $('#presses-tab').removeClass('redirectAnchor');
      }else{
        $('.redirectAnchor').click(function(){
          window.location.href='clicker-press.php';
        });
      }
    </script>

    <script type="text/javascript">
     var $window = $(window),
     $dropdown = $('a.drop');

     $(window).on('resize', function () {
      if ($window.width() > 767) {
       $dropdown.removeClass('disabled');
     }else{

      $dropdown.removeClass('disabled')};
    });
  </script>



<script type="text/javascript">

  $(document).ready(function(){
    $(".divs div.panel").each(function(e) {
      if (e != 0)
        $(this).hide();
      console.log(e);
    });

    $("#nex").click(function(){
      if ($(".divs div.panel:visible").next().length != 0)
        $(".divs div.panel:visible").next().show().prev().hide();
      else {
          // $(".divs div.panel:visible").hide();
          // $(".divs div.panel:first").show();
        }
        return false;
      });

    $("#pre").click(function(){
      if ($(".divs div.panel:visible").prev().length != 0)
        $(".divs div.panel:visible").prev().show().next().hide();
      else {

          // $(".divs div.panel:visible").hide();
          // $(".divs div.panel:last").show();
        }
        return false;
      });
  });

</script>

<script type="text/javascript">

  $(document).ready(function(){
    $(".quote div.page").each(function(e) {
      if (e != 0)
        $(this).hide();
      console.log(e);
    });

    $("#nex").click(function(){
      if ($(".quote div.page:visible").next().length != 0)
        $(".quote div.page:visible").next().show().prev().hide();
      else {
          // $(".divs div.panel:visible").hide();
          // $(".divs div.panel:first").show();
        }
        return false;
      });

    $("#pre").click(function(){
      if ($(".quote div.page:visible").prev().length != 0)
        $(".quote div.page:visible").prev().show().next().hide();
      else {

          // $(".divs div.panel:visible").hide();
          // $(".divs div.panel:last").show();
        }
        return false;
      });
  });

</script>

<script type="text/javascript">
  $(document).ready(function () {
    size_li = $("#myList .row").size();
    x=1;
    $('#myList .row:lt('+x+')').show();
    $('#loadMore').click(function () {
      x= (x+1 <= size_li) ? x+1 : size_li;
      $('#myList .row:lt('+x+')').show();
    });
    $('#showLess').click(function () {
      x=(x-1<1) ? 1 : x-1;
      $('#myList .row').not(':lt('+x+')').hide();
    });
  });
</script>
<script type="text/javascript">
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>


<script type="text/javascript">
  $(function()
  {
    $(document).on('click', '.btn-add', function(e)
    {
      e.preventDefault();

      var controlForm = $('.controls form .fields:first'),
      currentEntry = $(this).parents('.fields:first'),
      newEntry = $(currentEntry.clone()).appendTo(controlForm);

      newEntry.find('input').val('');
      controlForm.find('.btn-add:not(:last)')
      .removeClass('btn-default').addClass('btn-danger')
      .removeClass('btn-add').addClass('btn-remove')
      
      .html('<span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Remove   ');
    }).on('click', '.btn-remove', function(e)
    {
      $(this).parents('.fields:first').remove();

      e.preventDefault();
      return false;
    });
  });

</script>


<script type="text/javascript">

  $(document).ready(function(){
    var storedItems = [];

//Store selected items
function storeItem(item) {
  storedItems.push(item);

  localStorage.setItem("storage", storedItems);
}

//Remove item
function removeItem(item) {
  var index = storedItems.indexOf(item);

  storedItems.splice(index, 1);
}

//Show list according to Dropdown
function showList(type) {
  var $services11 = $("#services11");
  var $services13 = $("#services13");
  var $services14 = $("#services14");

  localStorage.setItem("list", type);

  if ( type == '11') {
    $services11.show();
    $services13.hide();
    $services14.hide();
  } else if ( type ==  '13') {
    $services13.show();
    $services11.hide();
    $services14.hide();
  } else if ( type ==  '14') {
    $services14.show();
    $services11.hide();
    $services13.hide();
  }else if ( type ==  '10') {
    $services14.hide();
    $services11.hide();
    $services13.hide();
  } else {
    $services11.hide();
    $services13.hide();
    $services14.hide();

  }
}

//Get list type
if (localStorage.getItem("list")) {
  showList(localStorage.getItem("list"));
}

//Get stored items
if (localStorage.getItem("storage")) {
  storedItems = localStorage.getItem("storage");

  $.each(storedItems, function(i, val) {
    $('input[type="checkbox"][value="'+val+'"]').prop("checked", true);
  });
}

    //Dropdown
    $('#loc_type1').on('change', function() {
      showList(this.value);
    });

//Checkbox
$('input[type="checkbox"]').on('change', function() {
  var $this = $(this);
  if ($this.is(':checked')) {
    storeItem(this.val())
  } else {
    removeItem(this.val());
  }
});
});


</script>



<script type="text/javascript">

  $(document).ready(function(){
    var storedItems = [];

//Store selected items
function storeItem(item) {
  storedItems.push(item);

  localStorage.setItem("storage", storedItems);
}

//Remove item
function removeItem(item) {
  var index = storedItems.indexOf(item);

  storedItems.splice(index, 1);
}

//Show list according to Dropdown
function showList(type) {
  var $services21 = $("#services21");
  var $services22 = $("#services22");
  var $services23 = $("#services23");
  var $services24 = $("#services24");

  localStorage.setItem("list", type);

  if ( type == '21') {
    $services21.show();
    $services22.hide();
    $services23.hide();
    $services24.hide();
  } else if ( type ==  '22') {
    $services22.show();
    $services21.hide();
    $services23.hide();
    $services24.hide();
  }else if ( type ==  '23') {
    $services23.show();
    $services21.hide();
    $services22.hide();
    $services24.hide();
  } else if ( type ==  '24') {
    $services24.show();
    $services21.hide();
    $services22.hide();
    $services23.hide();
  } else {
    $services21.hide();
    $services23.hide();
    $services22.hide();
    $services24.hide();
  }
}

//Get list type
if (localStorage.getItem("list")) {
  showList(localStorage.getItem("list"));
}

//Get stored items
if (localStorage.getItem("storage")) {
  storedItems = localStorage.getItem("storage");

  $.each(storedItems, function(i, val) {
    $('input[type="checkbox"][value="'+val+'"]').prop("checked", true);

  });
}

    //Dropdown
    $('#loc_type2').on('change', function() {
      showList(this.value);
    });

//Checkbox
$('input[type="checkbox"]').on('change', function() {
  var $this = $(this);
  if ($this.is(':checked')) {
    storeItem(this.val())
  } else {
    removeItem(this.val());
  }
});
});


</script>

<script type="text/javascript">
  $(document).ready(function(){
        $counter = 0; // initialize 0 for limitting textboxes
        $('#buttonadd').click(function(){

          $counter++;
          $('#buttondiv').append('<br><div class="fields"><div class="row"><div class="col-md-6"><div class="col-md-1 padding-0">'+$counter+'</div><div class="col-md-4 padding-0"><select class="form-control" name="packaging[]" id="packaging"><option selected="selected" disabled="disable" value="">SELECT</option><option value="Boxed">Boxed</option><option value="Crated">Crated</option><option value="Drums or Barrels">Drums or Barrels</option><option value="Un-Packaged">Un-Packaged</option><option value="Pallets: Standard (40 x 48)">Pallets: Standard (40” x 48”)</option><option value="Pallets (48 x 48)">Pallets (48” x 48”)</option><option value="Pallets (60 x 48)">Pallets (60" x 48")</option><option value="Pallets (custom)">Pallets (custom)</option></select></div><div class="col-md-offset-1 col-md-2 padding-0"><input class="form-control" name="quantity[]" type="number"></div><div class="col-md-offset-1 col-md-3 padding-0"><input class="form-control" placeholder="LBS" name="total_weight[]" type="text"></div></div><div class="col-md-6"><div class="col-md-1 padding-0"><input class="form-control" name="length[]" placeholder="L" type="text"></div><div class="col-md-1 padding-0"><input class="form-control" name="width[]" placeholder="W" type="text"></div><div class="col-md-1 padding-0"><input class="form-control" placeholder="H" name="height[]" type="text"></div><div class="col-md-offset-1 col-md-2 padding-0"><select name="unit[]" class="form-control" id="unit" ><option selected="selected" disabled="disabled" value="">SELECT</option><option value="in">in</option><option value="ft">ft</option></select></div><div class="col-md-offset-1 col-md-3 padding-0"><select name="freight_class[]" id="freight_class" id="freight_class" class="form-control"><option selected="selected" disabled="disable" value="">SELECT</option><option value="I dont Know">I dont Know</option><option value="50">50</option><option value="55">55</option><option value="60">60</option><option value="65">65</option><option value="70">70</option><option value="77.5">77.5</option><option value="85">85</option><option value="92.5">92.5</option><option value="100">100</option><option value="110">110</option><option value="125">125</option><option value="150">150</option><option value="175">175</option><option value="200">200</option><option value="250">250</option><option value="300">300</option><option value="400">400</option><option value="500">500</option></select></div></div></div></div>');

        });

        $('#buttonremove').click(function(){
          if ($counter){
            $counter--;
                $('#buttondiv .row:last').parent().remove(); // get the last textbox and parent for deleting the whole div
              }else{
                alert('No More textbox to remove');
              }
            });
      });
    </script>

    <script type="text/javascript">
      $('#forklift_yes').click(function()
      {
        $('#forklift_capacity').removeAttr("disabled");
        $('#fork').removeAttr("disabled");
      });

      $('#forklift_no').click(function()
      {
        $('#forklift_capacity').attr("disabled","disabled");
        $('#fork').attr("disabled","disabled");
      });
    </script>
<script type="text/javascript">

$( 'a[data-toggle="tooltip-guarantee"]' ).tooltip({ content: '<img src="http://cjrtec.com/dist/img/undersold.png" class="img-responsive" />' });

</script>

<script type="text/javascript">
  $(document).on("click", ".open-modal", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #machineID").val( myBookId );
});
</script>

