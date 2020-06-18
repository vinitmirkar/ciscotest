<script type="text/javascript">
    var rTable = '';
    $(function () {
        
        rTable = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('example1.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'sapid', name: 'SAPID'},
                {data: 'hostname', name: 'HOSTNAME'},
                {data: 'loopback', name: 'LOOPBACK'},
                {data: 'mac_address', name: 'MAC ADDRESS'},
                {data: 'type', name: 'TYPE'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });
        
        $('body #createrecord').on('click',function(){
            $.ajax({
                method : 'POST',
                url : "{{ route('router.create') }}",
                beforeSend: function(xhr){xhr.setRequestHeader('Authorization', 'Bearer VOSp1SqEaAQXQrI10RgY1NTtH2eDjM8bOsoCuGXBW7EcrR4HeI6XTTF1sL6p');},
                data : $('#create-update-frm').serialize(),
                success : function(result, textStatus, xhr){
                    if(xhr.status == 200){
                        rTable.ajax.url("{{ route('example1.list') }}").load();
                        $('#closecreaterecord').trigger('click');
                        $('#message').html('Router Info Added Successfully').show();
                        setTimeout(function(){
                            $('#message').val('').hide();
                        },10000);
                    }else if(xhr.status == 202){
                        $('#closecreaterecord').trigger('click');
                        var msg = '';
                        $.each(result.error, function(k,v){
                            msg += v+' ';
                        });
                        $('#message').html(msg).show();
                        setTimeout(function(){
                            $('#message').val('').hide();
                        },10000);
                    }
                },
                error : function(xhr, textStatus, errorThrown){                
                    $('#message').html('Router Info Additon failed').show();
                    setTimeout(function(){
                        $('#message').html('').hide();
                    },10000);
                }
            })
        });

        $('body #updaterecord').on('click',function(){
            $.ajax({
                method : 'PUT',
                url : '/api/router/update/'+$('#update_id').val(),
                beforeSend: function(xhr){xhr.setRequestHeader('Authorization', 'Bearer VOSp1SqEaAQXQrI10RgY1NTtH2eDjM8bOsoCuGXBW7EcrR4HeI6XTTF1sL6p');},
                data : $('#update-frm').serialize(),
                success : function(result, textStatus, xhr){
                    if(xhr.status == 200){
                        rTable.ajax.url("{{ route('example1.list') }}").load();
                        $('#closeupdaterecord').trigger('click');
                        $('#message').html('Router Info Updated Successfully').show();
                        setTimeout(function(){
                            $('#message').val('').hide();
                        },10000);
                    }else if(xhr.status == 202){
                        $('#closeupdaterecord').trigger('click');
                        var msg = '';
                        $.each(result.error, function(k,v){
                            msg += v+' ';
                        });
                        $('#message').html(msg).show();
                        setTimeout(function(){
                            $('#message').val('').hide();
                        },10000);
                    }
                },
                error : function(xhr, textStatus, errorThrown){
                    $('#message').html('Router Info Updation failed').show();
                    setTimeout(function(){
                        $('#message').html('').hide();
                    },10000);
                }
            })
        });
    });

    function deleteRouterInfo(id)
    {
        var isConfirm = confirm('Are you sure you want to delete?')
        if(isConfirm){
            $.ajax({
                method : 'DELETE',
                url : "/api/router/delete/"+id,
                beforeSend: function(xhr){xhr.setRequestHeader('Authorization', 'Bearer VOSp1SqEaAQXQrI10RgY1NTtH2eDjM8bOsoCuGXBW7EcrR4HeI6XTTF1sL6p');},
                success : function(result, textStatus, xhr){
                    if(xhr.status == 200){
                        rTable.ajax.url("{{ route('example1.list') }}").load();
                        $('#message').html('Router Info Deleted Successfully').show();
                        setTimeout(function(){
                            $('#message').val('').hide();
                        },10000);
                    }
                },
                error : function(xhr, textStatus, errorThrown){
                    $('#message').html('Router Info Deletion failed').show();
                    setTimeout(function(){
                        $('#message').html('').hide();
                    },10000);
                }
            });
        }
    }

    function openRouterInfo(id)
    {
        $.ajax({
            method : 'GET',
            url : "/api/router/"+id,
            beforeSend: function(xhr){xhr.setRequestHeader('Authorization', 'Bearer VOSp1SqEaAQXQrI10RgY1NTtH2eDjM8bOsoCuGXBW7EcrR4HeI6XTTF1sL6p');},
            success : function(result, textStatus, xhr){
                if(xhr.status == 200){
                    $("#updateModal").modal();
                    $('#update_id').val(result.id);
                    $('#update_loopback').val(result.loopback);
                    $('#update_mac_address').val(result.mac_address);
                    $('#update_sapid').val(result.sapid);
                    $('#update_hostname').val(result.hostname);
                    $('#update_type').val(result.type);
                }
            }
        });
    }
</script>