<!-- Event Name -->
<div class="form-group">
    <x-form.label for="name" label="Event Name" />
    <x-form.input name="name" type="text" :value="old('name')" required />
</div>

<!-- Event Description -->
<div class="form-group">
    <x-form.label for="description" label="Event Description" />
    <x-form.textarea name="description" rows="5" :value="old('description')" required></x-form.textarea>
</div>

<!-- Event Image -->
<div class="form-group">
    <x-form.label for="image" label="Event Image" />
    <x-form.input name="image" type="file" />
</div>

<!-- Event Start Date -->
<div class="form-group">
    <x-form.label for="start_date" label="Start Date" />
    <x-form.input name="start_date" type="date" :value="old('start_date')" required />
</div>

<!-- Event End Date -->
<div class="form-group">
    <x-form.label for="end_date" label="End Date" />
    <x-form.input name="end_date" type="date" :value="old('end_date')" required />
</div>

<!-- Event Time -->
<div class="form-group">
    <x-form.label for="time" label="Time" />
    <x-form.input name="time" type="time" :value="old('time')" required />
</div>

<!-- Event Category -->
<div class="form-group">
    <x-form.label for="category" label="Category" />
    <x-form.input name="category" type="text" :value="old('category')" required />
</div>

<!-- Event Type (Free or Paid) -->
<div class="form-group">
    <x-form.label for="type" label="Event Type" />
    <select name="type" class="form-control form-select" required>
        <option value="free">Free</option>
        <option value="paid">Paid</option>
    </select>
</div>

<!-- Booking Link -->
<div class="form-group">
    <x-form.label for="booking_link" label="Booking Link" />
    <x-form.input name="booking_link" type="url" :value="old('booking_link')" />
</div>

<!-- Event Goals -->
<div class="form-group">
    <x-form.label for="goals" label="Event Goals" />
    <x-form.textarea name="goals[]" rows="2" placeholder="Goal 1"></x-form.textarea>
    <x-form.textarea name="goals[]" rows="2" placeholder="Goal 2"></x-form.textarea>
    <!-- You can add more fields as needed for multiple goals -->
</div>

<!-- Event Location -->
<div class="form-group">
    <x-form.label for="location_address" label="Event Location Address" />
    <x-form.input name="location_address" type="text" :value="old('location_address')" required />
</div>

<div class="form-group">
    <x-form.label for="latitude" label="Latitude" />
    <x-form.input name="latitude" type="text" :value="old('latitude')" required />
</div>

<div class="form-group">
    <x-form.label for="longitude" label="Longitude" />
    <x-form.input name="longitude" type="text" :value="old('longitude')" required />
</div>

<!-- Event Speakers -->
<div class="form-group">
    <x-form.label for="speakers" label="Event Speakers" />
    <x-form.input name="speakers[]" type="text" placeholder="Speaker 1" />
    <x-form.input name="speakers[]" type="text" placeholder="Speaker 2" />
    <!-- You can add more fields as needed for multiple speakers -->

    <div class="form-group">
        <x-form.label for="bio" label="bio" />
        <x-form.input name="bio" type="text" :value="old('bio')" required />
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary mt-2">Create Event</button>
    </div>
</div>
