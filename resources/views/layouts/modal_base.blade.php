<div class="modal fade" tabindex="-1" role="dialog" id="@yield('modal_id')" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@yield('modal_title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @yield('modal_body')
            </div>
            <div class="modal-footer">
                @yield('modal_footer', `
                    <button type="button" class="btn btn-primary">Готово</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                `)
            </div>
        </div>
    </div>
</div>