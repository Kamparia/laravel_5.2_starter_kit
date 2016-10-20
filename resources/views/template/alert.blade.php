<div class="row">
    <div class="col-md-12">
        <div>
            @if(Session::has('message'))
                <div class="alert alert-{{ Session::get('message.type') }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('message.text') }}
                </div>
            @endif
        </div>                            
    </div>
</div>