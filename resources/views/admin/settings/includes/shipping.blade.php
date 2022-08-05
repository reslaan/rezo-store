<div class="card">
    <div class="card-header pb-0"><h3 class="tile-title">Shipping Methods</h3></div>
    <div class="card-body">
        <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
            @csrf

            <div class="tile-body">
                <div class="form-group">
                    <label class="control-label" for="freeShipping">Free shipping</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Enter free shipping value"
                        id="freeShipping"
                        name="free_shipping"
                        value="{{ \App\Models\Setting::get('free_shipping') }}"
                    />
                    @error("free_shipping")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label" for="localShipping">Local Shipping</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Enter local shipping value"
                        id="localShipping"
                        name="local_shipping"
                        value="{{  \App\Models\Setting::get('local_shipping') }}"
                    />
                    @error("local_shipping")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label" for="outerShipping">Outer Shipping</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Enter outer shipping value"
                        id="outerShipping"
                        name="outer_shipping"
                        value="{{ \App\Models\Setting::get('outer_shipping')}}"
                    />
                    @error("outer_shipping")
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
