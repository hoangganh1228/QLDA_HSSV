src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"

$(document).ready(function(){
    $("#table #check_all").click(function(){
        $("#table input[type=checkbox]").prop('checked',this.checked);
    });
});