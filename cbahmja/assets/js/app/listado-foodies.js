function confirmarDelete(id)
{
    var r = confirm("¿Está seguro que desea eliminar este Foodie?");
    if (r == true)
        $('#delForm_'+id).submit()

}