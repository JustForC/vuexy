<script>
    window.addEventListener('closeCreate', event => {
        $("#create").modal('hide');                
    })

    window.addEventListener('showUpdate', event => {
        $("#update").modal('show');
    })

    window.addEventListener('closeUpdate', event => {
        $("#update").modal('hide');
    })

    window.addEventListener('showDelete', event => {
        $('#delete').modal('show');
    })

    window.addEventListener('closeDelete', evenet => {
        $('#delete').modal('hide');
    })
</script>