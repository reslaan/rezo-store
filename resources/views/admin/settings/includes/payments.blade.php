<div class="card">
    <div class="card-header pb-0"><h3 class="tile-title">Payment Methods</h3></div>
    <div class="card-body">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="stripe_payment_method">Stripe Payment Method</label>
                <select name="stripe_payment_method" id="stripe_payment_method" class="form-control">
                    <option value="1" {{ (config('settings.stripe_payment_method')) == 1 ? 'selected' : '' }}>Enabled</option>
                    <option value="0" {{ (config('settings.stripe_payment_method')) == 0 ? 'selected' : '' }}>Disabled</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="stripe_key">Key</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter stripe key"
                    id="stripe_key"
                    name="stripe_key"
                    value="{{ \App\Models\Setting::get('stripe_key') }}"
                />
                @error("stripe_key")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group pb-2">
                <label class="control-label" for="stripe_secret_key">Secret Key</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter stripe secret key"
                    id="stripe_secret_key"
                    name="stripe_secret_key"
                    value="{{ \App\Models\Setting::get('stripe_secret_key') }}"
                />
                @error("stripe_secret_key")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group pt-2">
                <label class="control-label" for="paypal_payment_method">PayPal Payment Method</label>
                <select name="paypal_payment_method" id="paypal_payment_method" class="form-control">
                    <option value="1" {{ \App\Models\Setting::get('paypal_payment_method') == 1 ? 'selected' : '' }}>Enabled</option>
                    <option value="0" {{ \App\Models\Setting::get('paypal_payment_method') == 0 ? 'selected' : '' }}>Disabled</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="paypal_client_id">Client ID</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter paypal client Id"
                    id="paypal_client_id"
                    name="paypal_client_id"
                    value="{{ \App\Models\Setting::get('paypal_client_id') }}"
                />
                @error("paypal_client_id")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="control-label" for="paypal_secret_id">Secret ID</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter paypal secret id"
                    id="paypal_secret_id"
                    name="paypal_secret_id"
                    value="{{\App\Models\Setting::get('paypal_secret_id') }}"
                />
                @error("paypal_secret_id")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Settings</button>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
