$(document).ready(function () {
        $(".delete-conf").on("submit", function(){
        return confirm("Do you want to delete this job?");
        
    });
});