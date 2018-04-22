<div id="modal_account-update" class="modal fade" role="dialog">
    <div class="modal-dialog w-710" style="height: 220px;">
        <div class="modal-content text-center">
            <div class="moda-header">
                <a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
            </div>
            <div class="modal-body">
                <p><i class="fo fo-ok fo-large red"></i></p>
                <p>Деталі вашого профіля успішно збережені!</p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(function(){
    $('#modal_account-update').on('show.bs.modal', function(){
        var modalWindow = $(this);
        clearTimeout(modalWindow.data('hideInterval'));
        modalWindow.data('hideInterval', setTimeout(function(){
            modalWindow.modal('hide');
        }, 2000));
    });
});
</script>
@endpush