<div class="form-group">
    <x-form.label for="image" label="Image" />
    <x-form.input  name="image" type="file" :vlaue="$profile->image"   />
</div>
<div class="form-group">
    <x-form.label for="facebook_link" label="Facebook Link" />
    <x-form.input  name="facebook_link" type="text" :vlaue="$profile->facebook_link"   />
</div>
<div class="form-group">
    <x-form.label for="linkedin_link" label="LinkedIn Link" />
    <x-form.input  name="linkedin_link" type="text" :vlaue="$profile->linkedin_link"   />
</div>
<div class="form-group">
    <x-form.label for="twitter_link" label="Twitter Link" />
    <x-form.input  name="twitter_link" type="text" :vlaue="$profile->twitter_link"   />
</div>



<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_label }}</button>
</div>
