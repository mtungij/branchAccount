<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#login_form').submit(function() {
            $('#loaderIcon').css('visibility', 'visible');
            $('#loaderIcon').show();
        });
    })
</script>

<!-- HTML -->
<img id="loaderIcon" style="visibility:hidden; display:none"
src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif" alt="..."/>
<form id="login_form">

    <input type="submit" value="submit" />
</form>