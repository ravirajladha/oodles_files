<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.1.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<?php
 $prev_test = $data['id'] - 1;
 $url = $_SERVER['REQUEST_URI'];
 $trimmed_url = trim($url, '/');
 $exploded_value = explode('/', $trimmed_url);
 $page_path = end($exploded_value);


 $adminMod = new admins;
 $get_single_question = $adminMod->get_single_question($page_path);
//  $get_single_question = $data['get_single_question'];
//  $get_single_question_val = $_SESSION['get_single_question'.$data['id']];


?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
    
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }
    
   
    .container{
    background-color: #ccc;
    color: #333;
    border-radius: 10px;
    padding: 20px;
    font-family: 'Montserrat', sans-serif;
    max-width: 700px;
    }
    .container > p{
    font-size: 32px;
    }
    .question{
    width: 75%;
    }
    .options{
    position: relative;
    padding-left: 40px;
    }
    #options label{
    display: block;
    margin-bottom: 15px;
    font-size: 14px;
    cursor: pointer;
    }
    .options input{
    opacity: 0;
    }
    .checkmark {
    position: absolute;
    top: -1px;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #555;
    border: 1px solid #ddd;
    border-radius: 50%;
    }
    .options input:checked ~ .checkmark:after {
    display: block;
    }
    .options .checkmark:after{
    content: "";
    width: 10px;
    height: 10px;
    display: block;
    background: white;
    position: absolute;
    top: 50%;
    left: 50%;
    border-radius: 50%;
    transform: translate(-50%,-50%) scale(0);
    transition: 300ms ease-in-out 0s;
    }
    .options input[type="radio"]:checked ~ .checkmark{
    background: #21bf73;
    transition: 300ms ease-in-out 0s;
    }
    .options input[type="radio"]:checked ~ .checkmark:after{
    transform: translate(-50%,-50%) scale(1);
    }
    .btn-primary{
    background-color: #555;
    color: #ddd;
    border: 1px solid #ddd;
    }
    .btn-primary:hover{
    background-color: #21bf73;
    border: 1px solid #21bf73;
    }
    .btn-success{
    padding: 5px 25px;
    background-color: #21bf73;
    }
    @media(max-width:576px){
    .question{
    width: 100%;
    word-spacing: 2px;
    }
    }
    .answer { display:none }
</style>
<div class="container">
<progress value="0" max="10" id="progressBar" style="height:24px;width:100%"></progress>
</div>
<form style="margin-top: 5px;" method="POST" id="get_single_question_test" action="<?php echo URLROOT; ?>/student/quiz_submit/<?php echo $page_path; ?>">
<div class="container mt-sm-5 my-1">
    <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5"><b>Q. <?php echo  $get_single_question->question?></b></div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
            <label class="options"><?php echo  $get_single_question->option1?>
                <input id="quiz_option" type="radio" name="radio"  value="1">
                <span class="checkmark" ></span>
            </label>
            <label class="options"><?php echo  $get_single_question->option2?>
                <input id="quiz_option"  type="radio" name="radio" value="2">
                <span class="checkmark"></span>
            </label>
            <label class="options"><?php echo  $get_single_question->option3?>
                <input id="quiz_option" type="radio" name="radio" value="3"> 
                <span class="checkmark"></span>
            </label>
            <label class="options"><?php echo  $get_single_question->option4?>
                <input id="quiz_option" type="radio" name="radio" value="4">
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="d-flex align-items-center pt-3">
        <!-- <div id="prev">
        <?php if($data['id']>16): ?>
        <a href="<?php echo URLROOT; ?>/test/pick_quiz/<?php echo $prev_test; ?>" style="padding-right:100px"><button class="button button2">Previous</button></a>
        <?php endif; ?>
        </div> -->
        
        <div class="ml-auto mr-sm-5">
        <button class="button" onclick="document.getElementById('get_single_question_test').submit();" name="timer_button">Next</button></a>  
        </div>
    </div>
</div>
<div class="desc container mt-sm-5 my-1" id="1">
    <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5"><b>Explanation</b></div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
            <label class="options"><?php echo  $get_single_question->explanation?>
               
                
            </label>
         
        </div>
    </div>
  
</div>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<!-- Modal -->
<?php if (!isset($_SESSION['switch_off_modal'])){ ?>
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Welcome to OodlesIN Quiz Participation Page</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Each question will be provided with 10 seconds to answer. All the best!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- Script to show explanation on click of radio -->
<script>
// $(function() {
//   $("#quiz_option").on("click",function() {
//     $(".answer").toggle(this.checked);
//   });
// });


</script>
<!-- script to disable other radio, if single got selected -->
<script>
$("input[type=radio]").click(function() {
  //getting name attribute if radio which is clicked
  var name = $(this).attr("name");
  
  //loop only through those radio where name is same
  $('input[name="' + name + '"]').each(function() {
    //if not selected
    if ($(this).is(":not(:checked)")) {
      // add disable
      $(this).attr('disabled', 'disabled');
    }
  });

});

</script>
<!-- Displaying explanation in the div -->
<script>
$(document).ready(function() {
    $("div.desc").hide();
    $("input[name$='radio']").click(function() {
        // var test = $(this).val();
        $("div.desc").hide();
        $("#" + "1").show();
    });
});
    </script>


<!-- Shwing timer and change to next page -->
<script>
var timeleft = 10;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
  }
  document.getElementById("progressBar").value = 10 - timeleft;
  timeleft -= 1;
}, 1000);
    </script>

<script>
    var btn = document.querySelector("[name='timer_button']");
//console.log(btn);
setInterval(function(){
btn.click();
},10000);
</script>

<!-- Script to show modal onloading of page -->
<script type="text/javascript">
     $(window).load(function(){
         $('#myModal').modal('show');
      });
</script>










<!-- Script to change the quiz page through AJAX -->
<script>
jQuery(document).ready(function () {
    function openFancybox() {
        setTimeout(function () {
        $("#consolPopup").fancybox({'overlayShow': true}).trigger('click');
        }, 500);
        setTimeout(function () {
            jQuery('.fancybox-close').trigger('click');
        }, 10000);
    };
    var visited = jQuery.cookie('visited');
    var x = <?php echo $data['id']; ?>;

    if (visited == 'yes' && x!='1') {
        
    } else {
        openFancybox(); 
    }
    jQuery.cookie('visited', 'yes', {
        expires: 1 
    });
    jQuery("#popuplink").fancybox({modal:true, maxWidth: 400, overlay : {closeClick : true}});
});
</script>