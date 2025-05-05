<!DOCTYPE html>
<html>
   <head>
      <style>
         .scp-quizzes-main{ width:100%; font-family:Verdana, Arial, Helvetica, sans-serif;}	 
.scp-quizzes-data{ 
box-shadow: 0px 1px 3px -1px #DCDCDC;
padding:10px;
margin-top:15px;
}
pre{ border:2px solid #f5f5f5; padding:10px; overflow-x:scroll;}
 input[type=radio] {
    display:none; 
}
input[type=radio] + label {
    display:inline-block;
	width:95%;
	padding:10px;
	border:1px solid #ddd;
	margin-bottom:10px;
	cursor:pointer;
}
input[type=radio] + label:hover{ border:1px solid #000000;}
input[type=radio]:checked + label { 
   background-image: none;
   background-color:#0C0;
	color:#fff;
	border:1px solid #0C0 !important;
	-webkit-transition: all 0.2s ease-in-out;
-moz-transition: all 0.2s ease-in-out;
-o-transition: all 0.2s ease-in-out;
-ms-transition: all 0.2s ease-in-out;
transition: all 0.2s ease-in-out;
}
.worngans{ background-color:#F36;color:#fff; border:1px solid #F36 !important;-webkit-transition: all 0.2s ease-in-out;
-moz-transition: all 0.2s ease-in-out;
-o-transition: all 0.2s ease-in-out;
-ms-transition: all 0.2s ease-in-out;
transition: all 0.2s ease-in-out;}

</style>
      <title>C Programming Language Output this code Quizzes 1</title>
    
                <link rel="stylesheet" type="text/css" href="./css/style.css" />
                
 
    <script src="http://www.fastlearning.in/controller/js/jquery-1.9.1.min.js"></script>
    
     <script type="text/javascript">
	$(document).ready(function() {
    $('label').click(function() {
        $('label').removeClass('worngans');
        $(this).addClass('worngans');
    });
});
	</script>
   
    
   </head>
   <body >
<div class="scp-quizzes-main">
<div class="scp-quizzes-data">
  <h3>1. What is the output of the below c code?</h3>
    <pre>#include&lt;stdio.h>	
main() 
{
   int x = 5;
   
   if(x=5)
   {	
      if(x=5) printf("Fast");
   } 
   printf("learning");
}</pre>
<br/>
    <input type="radio"  name="question1">
       <label >1. Fastlearning</label><br/>
    <input type="radio"  id="Fastlearning" name="question1">
       <label for="Fastlearning">2. learning</label><br/>
    <input type="radio" name="question1">
       <label>3. learningFast</label> <br/>
    <input type="radio" name="question1">
     <label>4. Fast</label> 
 </div>
 <!-- <div class="scp-quizzes-data">
  <h3>2. How would you insert pre-written code into a current program ?</h3>
    <pre>#include&lt;stdio.h>	
main() 
{
   int x = 5;
   
   if(x=5)
   {	
      if(x=5) printf("Fast");
   } 
   printf("learning");
}</pre>
<br/>
    <input type="radio" name="question2">
       <label>1. #read&lt;file></label><br/>
    <input type="radio"  name="question2">
       <label>2. #get &lt;file></label><br/>
    <input type="radio" name="question2" id="inculdefile">
       <label for="inculdefile">3. #include &lt;file></label> <br/>
    <input type="radio" name="question2">
     <label>4. #pre &lt;file></label> 
 </div> -->
</div>


</body></html>