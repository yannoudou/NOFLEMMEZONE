 $(function(){

    $('#changetabbutton').click(function(e){
    	e.preventDefault();
        $('#mytabs a[href="#second"]').tab('show');
    })

})