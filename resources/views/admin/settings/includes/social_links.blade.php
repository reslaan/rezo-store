<div class="card">
    <div class="card-header pb-0"><h3 class="tile-title">Social Links</h3></div>
    <div class="card-body">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf

        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="social_facebook">Facebook Profile</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter facebook profile link"
                    id="social_facebook"
                    name="social_facebook"
                    value="{{ \App\Models\Setting::get('social_facebook') }}"
                />
                @error("social_facebook")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="control-label" for="social_twitter">Twitter Profile</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter twitter profile link"
                    id="social_twitter"
                    name="social_twitter"
                    value="{{ \App\Models\Setting::get('social_twitter') }}"
                />
                @error("social_twitter")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="control-label" for="social_instagram">Instagram Profile</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter instagram profile link"
                    id="social_instagram"
                    name="social_instagram"
                    value="{{  \App\Models\Setting::get('social_instagram') }}"
                />
                @error("social_instagram")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="control-label" for="social_linkedin">LinkedIn Profile</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter linkedin profile link"
                    id="social_linkedin"
                    name="social_linkedin"
                    value="{{  \App\Models\Setting::get('social_linkedin') }}"
                />
                @error("social_linkedin")
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
