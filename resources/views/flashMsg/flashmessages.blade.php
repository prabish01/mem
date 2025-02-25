@if ($message = Session::get('success'))
    <div class="m-3">
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="m-3 px-2">
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="m-3">
        <div class="alert alert-warning alert-block m-4">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="m-3 px-3">
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    </div>
@endif


@if ($errors->any())
    <div class="m-3 px-3">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
