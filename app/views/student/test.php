<div>
    <label id="search_checkbox_label">Text Input?</label>
    <input type="checkbox" class="myCheckbox" />
</div>
<div id="text_div" hidden>
    <label id="emp_id_search_label">Employee ID:</label>
    <input type="text" name="emp_id" id="employee_id_search"></input>
</div>
<div id="select_div">
    <label id="emp_id_add_label">Employee ID:</label>
    <select name="emp_id" id="employee_id">
        <option>--Select--</option>
        <option>INCB001</option>
        <option>INCB002</option>
        <option>INCB003</option>
    </select>
</div>

<?php require APPROOT . '/views/inc_student/footer.php'; ?>

<script>
$(function () {
    $('.admission_toggle').change(function () {
        if ($(this).is(':checked')) {
            $("div#course_span").show();
            $("div#course_span").children().prop('disabled', false);
    
        } else {
           
            $("div#course_span").hide();
            $("div#course_span").children().prop('disabled', true);
        }
    });
});

</script>

<select onchange="yesnoCheck(this);">
    <option value="">Valitse automerkkisi</option>
    <option value="lada">Lada</option>
    <option value="mosse">Mosse</option>
    <option value="volga">Volga</option>
    <option value="vartburg">Vartburg</option>
    <option value="other">Muu</option>
</select>

<div id="ifYes" style="display: none;">
    <label for="car">Muu, mikä?</label> <input type="text" id="car" name="car" /><br />
</div>

<script>

function yesnoCheck(that) {
    if (that.value == "other") {
  alert("check");
        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}
</script>