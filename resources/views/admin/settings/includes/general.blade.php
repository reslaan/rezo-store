<div class="card">
    <div class="card-header pb-0"><h3 class="tile-title">General Settings</h3></div>
    <div class="card-body">
        <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
            @csrf

            <div class="tile-body">
                <div class="form-group">
                    <label class="control-label" for="site_name">Site Name</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Enter site name"
                        id="site_name"
                        name="site_name"
                        value="{{ \App\Models\Setting::get('site_name') }}"
                    />
                    @error("site_name")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label" for="site_title">Site Title</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Enter site title"
                        id="site_title"
                        name="site_title"
                        value="{{  \App\Models\Setting::get('site_title') }}"
                    />
                    @error("site_title")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label" for="currency_code">Currency Code</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Enter store currency code"
                        id="currency_code"
                        name="currency_code"
                        value="{{ \App\Models\Setting::get('currency_code')}}"
                    />
                    @error("currency_code")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label" for="currency_symbol">Currency Symbol</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Enter store currency symbol"
                        id="currency_symbol"
                        name="currency_symbol"
                        value="{{\App\Models\Setting::get('currency_symbol') }}"
                    />
                    @error("currency_symbol")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="tile-footer">
                <div class="row d-print-none mt-2">
                    <div class="col-12 text-end">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Settings</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
