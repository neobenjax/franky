function confirmarDelete(id)
{
    var r = confirm("¿Está seguro que desea eliminar este Featured Post?");
    if (r == true) 
        $('#delForm_'+id).submit()

}