<div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Termini e condizioni</h4>
                </div>
                <div class="modal-body">
                <div class="modal-pap">
                    @include('includes.privacy')
                </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    //Start the DOM ready
    $( document ).ready(function() {


        //CODE NEEDED FOR THE IMPORTANT MESSAGE MODAL POPUP

            //Check to see if the cookie exists for the Don't show again option
            if (!$.cookie('focusmsg')) {
                //Launch the modal when you first visit the site            
                $('#important-msg').modal('show');
            }

            //Don't show again mouse click
            $("#dont-show-again").click( function() {

                //Create a cookie that lasts 14 days
                $.cookie('focusmsg', '1', { expires: 14 });     
                $('#important-msg').modal('hide');      

            }); //end the click function for don't show again

        //END CODE NEEDED FOR THE IMPORTANT MESSAGE MODAL POPUP


    }); //End the DOM ready
</script>